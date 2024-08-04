<?php
namespace HIS\States;

use HIS\Core\Globals;
use HIS\Core\Game;
use HIS\Managers\Players;
use HIS\Managers\Map;

use UnitTypes;

trait BuyTrait {

	function argBuyUnit() {
		$player = Players::getActive();
		$cities = Game::get()->cities;
		$home_cities = [];
		$unit_type = Globals::getUnitBuyType();
		if($unit_type == UnitTypes::SHIP){
			foreach ($cities as $city_id => $city) {
				if(Map::bolMayAddShips($city_id, $player->power, 1)){
					$home_cities[] = $city_id;
				}
			}
		}else{
			foreach ($cities as $city_id => $city) {
				if(Map::bolMayAddLandUnits($city_id, $player->power, 1, $unit_type)){
					$home_cities[] = $city_id;
				}
			}
		}
		
		return [
			'valid_city_ids' => $home_cities,
		];
	}

}
