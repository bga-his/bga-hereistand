<?php
namespace HIS\Core;
use HIS\Core\Globals;
use HIS\Helpers\UserException;
use HIS\Managers\Cards;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Notifications\Buy;
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
		PlayCard::playCardCP($player, $card);
		Globals::setRemainingCP($card['cp']);
		Cards::discard($card);
		Game::get()->gamestate->nextState("playCP");
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
		Tokens::checkFormation($token_ids);
		Globals::setFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareIntercept($token_ids) {
		Tokens::checkFormation($token_ids);
		Globals::setInterceptFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareAvoid($token_ids) {
		Tokens::checkFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function pickBuyCity($city) {
		$unit_type = Globals::getUnitBuyType();
		$player = Players::getActive();
		$buy_id = Game::get()->getPowerUnits()[$player->power][$unit_type];
		$bad_info = Game::get()->tokens[$buy_id];
		$side = $unit_type == MERC ? BACK : FRONT;
		$token = Tokens::pickOneForLocation(['supply', $bad_info['power'], $buy_id], ['board', 'city', $city['id']], $side);
		if ($token == null) {
			throw new UserException("You are out of " . $bad_info['name'] . " tokens.");
		}
		Buy::buyUnit($player, $token, $unit_type, $city);
		Game::get()->gamestate->nextState("buy");
	}

}