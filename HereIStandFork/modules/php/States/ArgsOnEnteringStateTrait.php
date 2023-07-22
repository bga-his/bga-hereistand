<?php
namespace HIS\States;

use HIS\Core\Game;
use HIS\Core\Globals;
use HIS\Managers\Players;

trait ArgsOnEnteringStateTrait {

	function argBuyUnit() {
		$player = Players::getActive();
		$cities = Game::get()->cities;//THis works (I dont know how), but VScode underlines it as wrong.
		$home_cities = [];
		foreach ($cities as $city_id => $city) {
			if ($city['home_power'] == $player->power) {// and not contain enemy units and not unrest and TODO look up rules where Buying Units is allowed
				$home_cities[] = $city_id;
			}
		}
		return [
			'valid_city_ids' => $home_cities,
		];
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

	//Unexpected error:  Invalid 'args' method for state 38: argEvtJanissaroes
    function argEvtJanissaries(){
        return ArgsOnEnteringStateTrait::argBuyUnit();
    }
}
