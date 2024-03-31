<?php
namespace HIS\States;

use SpaceIDs;
use HIS\Core\Game;
use HIS\Core\Globals;
use HIS\Managers\Spaces;
use HIS\Managers\Players;
use HIS\Managers\Diplomacy;
use HIS\Managers\Tokens;
use HIS\Helpers\Pieces;
use Powers;
use TrackTokens;
use tokenIDs_DEBATER;
use ExkomunikationLocations;
use tokenIDs_RULER;
use TokenIDs;
trait ArgsOnEnteringStateTrait {

	public static function freeHomeSpaces($power){
		$spaces = Game::get()->spaces;
		$home_spaces = [];
		foreach ($spaces as $space_id => $space) {
			
			if ($space['home_power'] == $power) {// and not contain enemy units and not unrest
				$home_spaces[] = $space_id;
			}
		}
		return [
			'valid_space_ids' => $home_spaces,
		];
	}
	function argBuyUnit() {
		$player = Players::getActive();
		return ArgsOnEnteringStateTrait::freeHomeSpaces($player->power);
	}

    function argPickCard() {
        return [];
    }

    function argDeclareAvoid() {
		return [];
	}

	function argDeclareAvoidDestination() {
		return [];
	}

    function argFieldBattleCard() {
		return [];
	}

	function argPlayJanissaries() {
		return [];
	}

    function argTakeFieldBattleCasualties() {
		if (Players::isActive() == false) {
			return [];
		}
		$field = Globals::getFieldBattle();
		$current_power = Players::getCurrent()->power;
		$tokens = $field['powers'][$current_power]['tokens'];
		$casualties = $field['powers'][$current_power]['casualties'];
		return [
			'tokens' => $tokens,
			'casualties' => $casualties,
		];
	}

    function argDeclareRetreatDestination() {
		return [];
	}

    function argResponseFieldBattle() {
		return [];
	}

    function argWithdrawIntent() {
		return [];
	}

    function argEvtJanissaries(){
        return ArgsOnEnteringStateTrait::freeHomeSpaces(Powers::OTTOMAN);
    }

	function argEvtHolyRoman(){
		return ArgsOnEnteringStateTrait::freeHomeSpaces(Powers::HAPSBURG);
	}

	function argSixWives(){
		return [
			'can_declare_war_on_France' => Diplomacy::IsNeutral(Powers::ENGLAND, Powers::FRANCE), 
			'can_declare_war_on_hapsburg' => Diplomacy::IsNeutral(Powers::HAPSBURG, Powers::FRANCE),
			'can_declare_war_on_scotland' => Diplomacy::IsNeutral(Powers::MINOR_SCOTLAND, Powers::FRANCE), 
			'nextWive_name' => Tokens::getTrackPosition(TrackTokens::ANNE_BOLEYN)];
	}

	function argPatronOfArts(){
		$modifer = 0;
		if(Spaces::getControllPowerById(SpaceIDs::MILAN) == Powers::FRANCE){
			$modifer += 2;
		}
		if(Spaces::getControllPowerById(SpaceIDs::FLORENCE) == Powers::FRANCE){
			$modifer += 1;
		}
		//TODO 3 spaces in Italy -> +2
		$homeSpaces = Spaces::getHomeSpaces(Powers::FRANCE);
		foreach ($homeSpaces as $space_id => $space) {
			//TODO if contains enemy units: -2
			//TODO only one time per enemy or total, I think.
			if(Spaces::getControllPowerById($space_id) != Powers::FRANCE){
				$modifer -= 1;
			}
		}
		return [
			'modifier' => $modifer
		];
	}

	function argPapalBull(){
		$debators = [];
		$tmp = [[ExkomunikationLocations::EXCOMMUNICATED_LUTHER, tokenIDs_DEBATER::LUTHER], [ExkomunikationLocations::EXCOMMUNICATED_CALVIN, tokenIDs_DEBATER::CALVIN], [ExkomunikationLocations::EXCOMMUNICATED_CRANMER, tokenIDs_DEBATER::CRANMER], [ExkomunikationLocations::EXCOMMUNICATED_ZWINGLI, tokenIDs_DEBATER::ZWINGLI], 
			[ExkomunikationLocations::EXCOMMUNICATED_HENRYVIII, tokenIDs_RULER::HENRY_VIII], [ExkomunikationLocations::EXCOMMUNICATED_FRANCISI, tokenIDs_RULER::FRANCIS_I], [ExkomunikationLocations::EXCOMMUNICATED_CHARLESV, tokenIDs_RULER::CHARLES_V]];
		// TODO: Rulers is undefined, but all of them are also military leaders.
		foreach ($tmp As $tmpI) {
			if( !Pieces::getInLocation($tmpI[0]) == TokenIDs::EXCOMMUNICATED){//TODO im very certain this wont work.
				$debators[] = $tmpI[1];
			}
		}
		return [
			'debators' => [],
			'leaders' => []
		];
	}
}
