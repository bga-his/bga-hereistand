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
		$cities = [];
		$tokens = Tokens::getAll();
		foreach (Game::get()->cities as $city_id => $city) {
			if($city_id = $cityId){
				return new City($city, $tokens);
			}
		}
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

	public static function getControllPowerById($citiy_id){
		return Cities::getByID($city_id)->getControl();
	}
}
