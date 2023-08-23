<?php
namespace HIS\States;

use HIS\Core\Game;
use HIS\Core\Globals;
use HIS\Managers\Cities;
use HIS\Managers\Players;
use HIS\Managers\Diplomacy;

trait ArgsOnEnteringStateTrait {

	public static function freeHomeSpaces($power){
		$cities = Game::get()->cities;//This works (Game::get() is a reference to the game object), but VScode underlines it as wrong.
		$home_cities = [];
		foreach ($cities as $city_id => $city) {
			
			if ($city['home_power'] == $power) {// and not contain enemy units and not unrest
				$home_cities[] = $city_id;
			}
		}
		return [
			'valid_city_ids' => $home_cities,
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
        return ArgsOnEnteringStateTrait::freeHomeSpaces(OTTOMAN);
    }

	function argEvtHolyRoman(){
		return ArgsOnEnteringStateTrait::freeHomeSpaces(HAPSBURG);
	}

	function argSixWives(){
		return [
			'can_declare_war_on_france' => !Diplomacy::IsAtWar(ENGLAND, FRANCE) && ! Diplomacy::IsAllied(ENGLAND, FRANCE), 
			'can_declare_war_on_hapsburg' => True,
			'can_declare_war_on_scotland' => True, 
			'nextWive_name' => ""];
	}

	function argPatronOfArts(){
		$modifer = 0;
		if(Cities::getControllPowerByName("milan") == FRANCE){
			$modifer += 2;
		}
		if(Cities::getControllPowerByName("florence") == FRANCE){
			$modifer += 1;
		}
		//TODO 3 citys in Italy -> +2
		$homeCities = Cities::getHomeCities(FRANCE);
		foreach ($homeCities as $city_id => $city) {
			//TODO if contains enemy units: -2
			//TODO only one time per enemy or total, I think.
			if(Cities::getControllPowerById($city_id) != FRANCE){
				$modifer -= 1;
			}
		}
		return [
			'modifier' => $modifer
		];
	}
}
