<?php
namespace HIS\Core;
use HIS\Core\Globals;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use HIS\Managers\Cards;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Managers\Diplomancy;
use HIS\Managers\Map;
use HIS\Models\Formation;
use HIS\Core\Notifications;
use HIS\Managers\Diplomacy;
use HIS\States\ArgsOnEnteringStateTrait;
use Powers;
use tokenIDs_VP_MARKER;
use UnitTypes;
use CardIDs;

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

	public static function pickSpace($space_id, $statename) {
		Notifications::message("Actions::pickSpace: statename = ".$statename." = game.get() ".game::get()->getStateName());
		$spaces = Game::get()->spaces;
		$space = $spaces[$space_id];
		switch ($statename) {
		case 'declareDestination':
			self::declareDestination($space);
			break;
		case 'buyUnit':
			self::pickBuySpace($space);
			break;
		case 'evtJanissaries':
			self::BuildJanissaries($space);
			break;
		default:
			throw new UserException("Picking space in wrong state: " . $statename);
		}
	}

	public static function declareDestination($space) {
		$destination_id = $space['id'];
		$spaces = Game::get()->spaces;
		$origin = Globals::getOrigin();
		$origin_space = $spaces[$origin];
		$remainingCP = Globals::getRemainingCP();
		if (in_array($destination_id, $origin_space['connections'])) {
			Globals::incRemainingCP(-1);
		} elseif (in_array($destination_id, $origin_space['passes'])) {
			if ($remainingCP < 2) {
				throw new UserException("Attempt to move over pass with less than 2 CP remaining");
			}
			Globals::incRemainingCP(-2);
		} else {
			throw new UserException("Attempt to move to a non-connected space");
		}
		Globals::setDestination($destination_id);
		Game::get()->gamestate->nextState("declare");
	}

	public static function pickLocation($location_id) {
		$spaces = Game::get()->spaces;
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

	public static function pickBuySpace($space) {
		$unit_type = Globals::getUnitBuyType();
		$player = Players::getActive();
		$remainingCP = Globals::getRemainingCP();
		if (($remainingCP < 1) || ($remainingCP < 2 && $unit_type == UnitTypes::REGULAR)) {
			throw new UserException("You cannot afford " . $unit_type . ".");
		}
		MAP::addLandunits($space['id'], $player->power, 1, $unit_type);
		if ($unit_type == UnitTypes::MERC || $unit_type == UnitTypes::CAV) {
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

	public static function BuildJanissaries($space){
		Notifications::message("OTTOMAN placed 4 Regulars On ".Utils::varToString($space['id']));
		Map::addLandunits($space['id'], Powers::OTTOMAN, 4, UnitTypes::REGULAR);
		Cards::discardByID(CardIDs::JANISSARIES);
		Game::get()->gamestate->nextState("resolve");

		//TODO add cancel option
		//TODO by the rules the units may be build in any combination of spaces, not only in one.
	}

	public static function EvtHolyRoman($space, $bolBoth){
		$tokenCharlsV = Tokens::tokenGetLeader("CharlesV");
		//TODO check that CharlsV is not captured or under siege.
		if($tokenCharlsV['location_type'] != 'space' Or Tokens::bolIsSieged($tokenCharlsV['location_id'])){
			Notifications::message("Charles V must not be captured or under siege");
			Game::get()->gamestate->nextState("undo");
			return;
		}
		if($bolBoth){
			$tokenDukeOfAlva = Tokens::tokenGetLeader("DukeOfAlva");
			if($tokenDukeOfAlva->Position = $tokenCharlsV->Position){
				Map::moveLeader($tokenCharlsV->Position, $space["id"], $tokenDukeOfAlva);
				Notifications::moveLeader(Players::getFromPower(Powers::HAPSBURG), $tokenCharlsV, $tokenCharlsV->Position, $space);
			}else{
				Notifications::message("DukeOfAlva must be in the same space to accompany Charles V");
				Game::get()->gamestate->nextState("undo");
			}
		}
		Map::moveLeader($tokenCharlsV->Position, $space["id"], $tokenCharlsV);
		Globals::setRemainingCP(5);
		Notifications::moveLeader(Players::getFromPower(Powers::HAPSBURG), $tokenCharlsV, $tokenCharlsV->Position, $space);
		Game::get()->gamestate->nextState("move_Charles");
	}

	public static function EvtSixWivesWar($power){
		//check that action is possible
		//England declares war on power
		//
		if($power="france" or $power="hapsburg"){
			if($power="france"){
				Diplomacy::declareWar(Powers::ENGLAND, Powers::FRANCE);
			}
			if($power="hapsburg"){
				Diplomacy::declareWar(Powers::ENGLAND, Powers::HAPSBURG);
			}
			//England declares war on france
			Globals::setRemainingCP(5);
			Game::get()->gamestate->nextState("make_war");
			return;
		}
		if($power="Scotland"){
			//TODO check if France might intervene
			Diplomacy::declareWar(Powers::ENGLAND, Powers::MINOR_SCOTLAND);
			//set England as Impulse power
			//set active player to France.
			Players::setActivePlayer(Powers::FRANCE);
			Game::get()->gamestate->nextState("make_war_scotland");
			return;
		}
		Notifications::message("invalid power in Actions.php::EvtSixWivesWar(".$power.")");
	}

	public static function EvtSixWivesMary(){

	}

	public static function EvtSixWivesFranceIntervention($do){
		if($do){
			//france declares war on England, gains alience with Scotland
			Diplomacy::declareWar(Powers::FRANCE, Powers::ENGLAND);
			Diplomacy::declareAlience(Powers::FRANCE, Powers::MINOR_SCOTLAND);
		}
		Players::setActivePlayer(Powers::ENGLAND);
		Globals::setRemainingCP(5);
		Game::get()->gamestate->nextState("make_war_scotland");
	}

	public static function EvtPatronOfArts(){
		$modfier = ArgsOnEnteringStateTrait::argPatronOfArts()["modfier"];
		$chateauxRoll = Utils::rollDice(1)[0]+$modfier;
		Notifications::message("France rolled an ".($chateauxRoll-$modfier)." + ".$modfier." on the Chateaux table");
		if($chateauxRoll <= 2){
			//draw 2, discard 1
			Cards::draw(Powers::FRANCE, 2);
			Cards::discard(Powers::FRANCE, 1);
		}elseif($chateauxRoll <= 4){
			//1VP, draw 1, discard 1
			Tokens::incCounter(tokenIDs_VP_MARKER::CHATEAUX_VP, 1);
			Cards::draw(Powers::FRANCE, 1);
			Cards::discard(Powers::FRANCE, 1);
		}elseif($chateauxRoll <= 7){
			//1VP, draw 1, discard 0
			Tokens::incCounter(tokenIDs_VP_MARKER::CHATEAUX_VP, 1);
			Cards::draw(Powers::FRANCE, 1);
		}else{
			//1VP, draw 2, discard 1
			Tokens::incCounter(tokenIDs_VP_MARKER::CHATEAUX_VP, 1);
			Cards::draw(Powers::FRANCE, 2);
			Cards::discard(Powers::FRANCE, 1);
		}
		Game::get()->gamestate->nextState("rollChatteaux");
	}

}