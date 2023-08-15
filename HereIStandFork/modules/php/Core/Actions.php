<?php
namespace HIS\Core;
use HIS\Core\Globals;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use HIS\Managers\Cards;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Managers\Diplomancy;
use HIS\Models\Formation;
use HIS\Core\Notifications;
use HIS\AdditionalStaticTrait;
use HIS\Managers\Diplomacy;

class Actions {

	public static function pass() {
		Game::get()->gamestate->nextState("pass");
	}

	public static function undo() {
		Game::get()->gamestate->nextState("undo");
	}

	public static function play($cardId, $asEvent) {
		Notifications::message("play Card id=".$cardId.", evt=".$asEvent);
		$card = Cards::get($cardId);
		$player = Players::getActive();
		if ($card['pId'] != $player->id) {
			throw new UserException("Attempt to play card you do not have");
		}
		if ($card['location'] != 'hand') {
			throw new UserException("Attempt to play card not from hand");
		}
		if( $asEvent){
			Notifications::notif_playCardEvent($player, $card);
			//Push MajorPower who played card to DB
			Cards::playEvent($card);
			
			//discard in event, as player might cancel
		}else{
			Notifications::notif_playCardCP($player, $card);
			Globals::setRemainingCP($card['cp']);
			Cards::discard($card);
			Game::get()->gamestate->nextState("playCP");
		}
	}

	public static function actDiscardCard($cardId){
		$card = Cards::get($cardId);
		Notifications::notif_disardCard(Players::getActive(), $card);
		Cards::discardByID($cardId);
	}

	public static function move() {
		Game::get()->gamestate->nextState("move");
	}

	public static function withdraw() {
		Game::get()->gamestate->nextState("withdraw");
	}

	public static function pickCity($city_id, $statename) {
		Notifications::message("Actions::pickCity: statename = ".$statename." = game.get() ".game::get()->getStateName());
		$cities = Game::get()->cities;
		$city = $cities[$city_id];
		switch ($statename) {
		case 'declareDestination':
			self::declareDestination($city);
			break;
		case 'buyUnit':
			self::pickBuyCity($city);
			break;
		case 'evtJanissaries':
			self::BuildJanissaries($city);
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
		Notifications::destroyUnits($player, $tokens);
		Game::get()->gamestate->setPlayerNonMultiactive($player->id, 'done');
	}

	public static function pickBuyCity($city) {
		$unit_type = Globals::getUnitBuyType();
		$player = Players::getActive();
		$remainingCP = Globals::getRemainingCP();
		if (($remainingCP < 1) || ($remainingCP < 2 && $unit_type == REGULAR)) {
			throw new UserException("You cannot afford " . $unit_type . ".");
		}
		TOKENS::addLandunits($city['id'], $player->power, 1, $unit_type);
		if ($unit_type == MERC) {
			$remainingCP -= 1;
			Globals::incRemainingCP(-1);
		} else {
			$remainingCP -= 2;
			Globals::incRemainingCP(-2);
		}
		if ($remainingCP == 0) {
			Game::get()->gamestate->nextState("next");
		} else {
			Game::get()->gamestate->nextState("buy");
		}
	}

	public static function BuildJanissaries($city){
		$side = strval(FRONT);
		Notifications::message("OTTOMAN placed 4 Regulars On ".Utils::varToString($city['id']));
		Tokens::addLandunits($city['id'], OTTOMAN, 4, REGULAR);
		Cards::discardByID(CARD_JANISSARIES);
		Game::get()->gamestate->nextState("resolve");

		//TODO add cancel option
		//TODO by the rules the units may be build in any combination of spaces, not only in one.
	}

	public static function EvtHolyRoman($city, $bolBoth){
		$tokenCharlsV = Tokens::tokenGetLeader("CharlesV");
		//TODO check that CharlsV is not captured or under siege.
		if($tokenCharlsV['location_type'] != 'city' Or Tokens::bolIsSieged($tokenCharlsV['location_id'])){
			Notifications::message("Charles V must not be captured or under siege");
			Game::get()->gamestate->nextState("undo");
			return;
		}
		if($bolBoth){
			$tokenDukeOfAlva = Tokens::tokenGetLeader("DukeOfAlva");
			if($tokenDukeOfAlva->Position = $tokenCharlsV->Position){
				Tokens::moveLeader($tokenCharlsV->Position, $city["id"], $tokenDukeOfAlva);
				Notifications::moveLeader(Players::getFromPower(HAPSBURG), $tokenCharlsV, $tokenCharlsV->Position, $city);
			}else{
				Notifications::message("DukeOfAlva must be in the same space to accompany Charles V");
				Game::get()->gamestate->nextState("undo");
			}
		}
		Tokens::moveLeader($tokenCharlsV->Position, $city["id"], $tokenCharlsV);
		Globals::setRemainingCP(5);
		Notifications::moveLeader(Players::getFromPower(HAPSBURG), $tokenCharlsV, $tokenCharlsV->Position, $city);
		Game::get()->gamestate->nextState("move_Charles");
	}

	public static function EvtSixWivesWar($power){
		//check that action is possible
		//England declares war on power
		//
		if($power="france" or $power="hapsburg"){
			if($power="france"){
				Diplomacy::declareWar(ENGLAND, FRANCE);
			}
			if($power="hapsburg"){
				Diplomacy::declareWar(ENGLAND, HAPSBURG);
			}
			//England declares war on france
			Globals::setRemainingCP(5);
			Game::get()->gamestate->nextState("make_war");
			return;
		}
		if($power="Scotland"){
			//TODO check if France might intervene
			Diplomacy::declareWar(ENGLAND, MINOR_SCOTLAND);
			//set England as Impulse power
			//set active player to France.
			Players::setActivePlayer(FRANCE);
			Game::get()->gamestate->nextState("make_war_scotland");
			return;
		}
		Notififications::message("invalid power in Actions.php::EvtSixWivesWar(".$power.")");
	}

	public static function EvtSixWivesMary(){

	}

	public static function EvtSixWivesFranceIntervention($do){
		if($do){
			//france declares war on England, gains alience with Scotland
			Diplomacy::declareWar(FRANCE, ENGLAND);
			Diplomacy::addAlience(FRANCE, MINOR_SCOTLAND);
		}
		Players::setActivePlayer(ENGLAND);
		Globals::setRemainingCP(5);
		Game::get()->gamestate->nextState("make_war_scotland");
	}

	public static function EvtPatronOfArts(){
		$modfier = ArgsOnEnteringStateTrait::argPatronOfArts()["modfier"];
		$chateauxRoll = Utils::rollDice(1)[0]+$modfier;
		if($chateauxRoll <= 2){
			//draw 2, discard 1
			Cards::draw(FRANCE, 2);
			Cards::discard(FRANCE, 1);
		}elseif($chateauxRoll <= 4){
			//1VP, draw 1, discard 1
			//Tokens::move("ChateauxVP", +1);
			Tokens::incCounter(VP_CHATEAUX);
			Cards::draw(FRANCE, 1);
			Cards::discard(FRANCE, 1);
		}elseif($chateauxRoll <= 7){
			//1VP, draw 1, discard 0
			//Tokens::move("ChateauxVP", +1);
			Cards::draw(FRANCE, 1);
		}else{
			//1VP, draw 2, discard 1
			//Tokens::move("ChateauxVP", +1);
			Cards::draw(FRANCE, 2);
			//Tokens::move("ChateauxVP", +1);
			Cards::discard(FRANCE, 1);
		}
		Game::get()->gamestate->nextState("rollChatteaux");
	}

}