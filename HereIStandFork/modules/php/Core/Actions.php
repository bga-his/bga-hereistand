<?php
namespace HIS\Core;
use HIS\Core\Globals;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use HIS\Managers\Cards;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Models\Formation;
use HIS\Notifications\Battle;
use HIS\Notifications\Buy;
use HIS\Notifications\Notif_debug;
use HIS\Notifications\Notif_PlayCard;
use HIS\Notifications\PlayCard;

class Actions {

	public static function pass() {
		Game::get()->gamestate->nextState("pass");
	}

	public static function undo() {
		Game::get()->gamestate->nextState("undo");
	}

	public static function play($cardId, $asEvent) {
		$card = Cards::get($cardId);
		$player = Players::getActive();
		if ($card['pId'] != $player->id) {
			throw new UserException("Attempt to play card you do not have");
		}
		if ($card['location'] != 'hand') {
			throw new UserException("Attempt to play card not from hand");
		}
		if( $asEvent){
			Notif_PlayCard::playCardEvent($player, $card);
			//Push MajorPower who played card to DB
			Cards::playEvent($card);
			//Pull MajorPower who played card from DB
			//change state to nextPlayer_praeTurn
			
			
		}else{
			Notif_PlayCard::playCardCP($player, $card);
			Globals::setRemainingCP($card['cp']);
			Cards::discard($card);
			Game::get()->gamestate->nextState("playCP");
		}
		

	}

	public static function move() {
		Game::get()->gamestate->nextState("move");
	}

	public static function withdraw() {
		Game::get()->gamestate->nextState("withdraw");
	}

	public static function pickCity($city_id, $statename) {
		$cities = Game::get()->cities;
		$city = $cities[$city_id];
		$city['id'] = $city_id;
		switch ($statename) {
		case 'declareDestination':
			self::declareDestination($city);
			break;
		case 'buyUnit':
			self::pickBuyCity($city);
			break;
		default:
			throw new UserException("Picking city in wrong state: " . $statename);
			break;
		}
	}

	public static function declareDestination($city) {
		$destination_id = $city['id'];
		$cities = Game::get()->cities;
		$origin = Globals::getOrigin();
		$origin_city = $cities[$origin];
		$remainingCP = Globals::getRemainingCP();
		if (in_array($destination_id, $origin_city['connections'])) {
			Globals::incRemainingCP(-1);
		} elseif (in_array($destination_id, $origin_city['passes'])) {
			if ($remainingCP < 2) {
				throw new UserException("Attempt to move over pass with less than 2 CP remaining");
			}
			Globals::incRemainingCP(-2);
		} else {
			throw new UserException("Attempt to move to a non-connected city");
		}
		Globals::setDestination($destination_id);
		Game::get()->gamestate->nextState("declare");
	}

	public static function pickLocation($location_id) {
		$cities = Game::get()->cities;
		$remainingCP = Globals::getRemainingCP();
		Game::get()->gamestate->nextState("declare");
	}

	public static function buyUnit($unit_type) {
		Globals::setUnitBuyType($unit_type);
		Game::get()->gamestate->nextState("buy");
	}

	public static function declareFormation($token_ids) {
		$formation = new Formation(Tokens::getMany($token_ids)->toArray());
		if ($formation->isValid() == false) {
			throw new UserException("Invalid formation");
		}
		if ($formation->getPower() != Players::getActive()->power) {
			throw new UserException("Formation is " . $formation->getPower() . " troops, you are: " . Players::getActive()->power);
		}
		Globals::setFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareIntercept($token_ids) {
		Tokens::checkFormation($token_ids);
		Tokens::checkOwner($token_ids, Players::getActive());
		Globals::setInterceptFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareAvoid($token_ids) {
		Tokens::checkFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareCasualties($token_ids) {
		$player = Players::getCurrent();
		$tokens = Tokens::getMany($token_ids);
		Tokens::checkFormation($token_ids);
		Tokens::checkOwner($token_ids, Players::getCurrent());
		foreach ($tokens as $token) {
			Tokens::move([$token['id']], ['supply', $token['power'], $token['type']]);
		}
		Battle::destroyUnits($player, $tokens);
		Game::get()->gamestate->setPlayerNonMultiactive($player->id, 'done');
	}

	public static function voidMergeTokens($city){
		$all_tokens_in_city = Tokens::getInLocation(['board', 'city', $city['id']]);
		Notifications::message("pickBuyCity: allTokens = ".Utils::strVarDump($all_tokens_in_city));
		//TODO combine tokens on $city (e.g. replace to two 1-unit tokens into one 2-unit token)
		$regular_unit_count = 0;
		$merc_unit_count = 0;
		$naval_unit_count = 0;  //TODO
		foreach($all_tokens_in_city As $token){
			if($token['flipped'] = ''){
				$regular_unit_count += $token['strength'];
			}elseif($token['flipped'] = 'flipped'){
				$merc_unit_count += $token['strength'];
			}else{
				Notifications::message("pickBuyCity: invalid flipped token = ".Utils::strVarDump($token));
			}
		}
	}

	public static function pickBuyCity($city) {
		$unit_type = Globals::getUnitBuyType();
		$player = Players::getActive();
		$buy_id = Game::get()->getPowerUnits()[$player->power][$unit_type];
		$bad_info = Game::get()->tokens[$buy_id];
		$side = $unit_type == MERC ? FLIPPED : FRONT;
		$remainingCP = Globals::getRemainingCP();
		if (($remainingCP < 1) || ($remainingCP < 2 && $unit_type != MERC)) {
			throw new UserException("You cannot afford " . $bad_info['name'] . ".");
		}
		$token = Tokens::pickOneForLocation(['supply', $bad_info['power'], $buy_id], ['board', 'city', $city['id']], $side);
		Actions::voidMergeTokens($city);
		if ($token == null) {
			throw new UserException("You are out of " . $bad_info['name'] . " tokens.");
		}
		if ($unit_type == MERC) {
			$remainingCP -= 1;
			Globals::incRemainingCP(-1);
		} else {
			$remainingCP -= 2;
			Globals::incRemainingCP(-2);
		}
		Buy::buyUnit($player, $token, $unit_type, $city);
		if ($remainingCP == 0) {
			Game::get()->gamestate->nextState("next");
		} else {
			Game::get()->gamestate->nextState("buy");
		}
	}

}