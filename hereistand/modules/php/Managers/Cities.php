<?php
namespace HIS\Managers;
use HIS\Core\Game;
use HIS\Managers\Tokens;
use HIS\Models\City;

/*
 * Cities: all utility functions concerning cities
 */

class Cities {
	public static function getAll() {
		$cities = [];
		$tokens = Tokens::getAll();
		foreach (Game::get()->cities as $city_id => $city) {
			$cities[] = new City($city, $tokens);
		}
	}

	public static function getByID($cityId) {
		return Game::get()->cities[$cityId];
		// //city of id3109 = HIS\Models\City::__set_state(array( 'attributes' => NULL, 'tokens' => array ( ), 'id' => array ( 'x' => 4188, 'y' => 1777, 'name' => 'Nezh', 'home_power' => 'ottoman', 'language' => 'other', 'connections' => array ( 0 => 3114, 1 => 3105, ), 'id' => 3109, 'passes' => array ( 0 => 3101, ), ), ))
		//$cities = [];
		//$tokens = Tokens::getAll();
		//foreach (Game::get()->cities as $city_id => $city) {
		//	if($city_id == $cityId){
		//		return new City($city, $tokens);
		//	}
		//}
	}

	public static function getByName($name){
		$cities = [];
		$tokens = Tokens::getAll();
		foreach (Game::get()->cities as $city_id => $city) {
			if($city->attributes['name'] = $name){
				return new City($city, $tokens);
			}
		}
	}

	public static function getHomeCities($power){
		$cities = Game::get()->cities;//This works (Game::get() is a reference to the game object), but VScode underlines it as wrong.
		$home_cities = [];
		foreach ($cities as $city_id => $city) {
			
			if ($city['home_power'] == $power) {
				$home_cities[] = $city_id;
			}
		}
		return $home_cities;
	}

	//string -> power
	public static function getControllPowerByName($name){
		return Cities::getByName($name)->getControl();
	}

	public static function getControllPowerById($city_id){
		return Cities::getByID($city_id)->getControl();
	}
}
