<?php
namespace HIS\States;

use CityIDs;
use HIS\Core\Game;
use HIS\Core\Globals;
use HIS\Managers\Cities;
use HIS\Managers\Players;
use HIS\Managers\Diplomacy;
use HIS\Managers\Tokens;
use HIS\Helpers\Pieces;
use Powers;
use TrackTokens;
use Debators;
use ExkomunikationLocations;
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
		if(Cities::getControllPowerById(CityIDs::MILAN) == Powers::FRANCE){
			$modifer += 2;
		}
		if(Cities::getControllPowerById(CityIds::FLORENCE) == Powers::FRANCE){
			$modifer += 1;
		}
		//TODO 3 citys in Italy -> +2
		$homeCities = Cities::getHomeCities(Powers::FRANCE);
		foreach ($homeCities as $city_id => $city) {
			//TODO if contains enemy units: -2
			//TODO only one time per enemy or total, I think.
			if(Cities::getControllPowerById($city_id) != Powers::FRANCE){
				$modifer -= 1;
			}
		}
		return [
			'modifier' => $modifer
		];
	}

	function argPapalBull(){
		$debators = [];
		$tmp = [[ExkomunikationLocations::EXCOMMUNICATED_LUTHER, Debators::LUTHER], [ExkomunikationLocations::EXCOMMUNICATED_CALVIN, Debators::CALVIN], [ExkomunikationLocations::EXCOMMUNICATED_CRANMER, DEBATORS::CRANMER], [ExkomunikationLocations::EXCOMMUNICATED_ZWINGLI, Debators::ZWINGLI], 
			[ExkomunikationLocations::EXCOMMUNICATED_HENRYVIII, Rulers::HenryVIII], [ExkomunikationLocations::EXCOMMUNICATED_FRANCISI, Rulers::FrancisI], [ExkomunikationLocations::EXCOMMUNICATED_CHARLESV, Rulers::CHARLESV]];
		// TODO: Rulers is undefined, but all of them are also military leaders.
		foreach ($tmp As $tmpI) {
			if( !Pieces::getInLocation($tupI[0]) == TokenIDs::EXCOMMUNICATED){//TODO im very certain this wont work.
				$debators[] = $tupI[1];
			}
		}
		return [
			'debators' => [],
			'leaders' => []
		]
	}
}
