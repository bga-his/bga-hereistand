<?php
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;

/**
 * Tokens: id, value, faction
 */
class Tokens extends \HIS\Helpers\Pieces {
	protected static $table = 'tokens';
	protected static $prefix = 'token_';
	protected static $customFields = ['type'];
	protected static $autoreshuffle = false;
	protected static $autoIncrement = false;
	static function cast($token) {
		$locations = explode('_', $token['location']);
		$token = [
			'id' => $token['id'],
			'board' => $locations[0],
			'type' => $token['type'],
			'location_type' => $locations[1] ?? null,
			'location_id' => $locations[2] ?? null,
			'flipped' => $token['state'] == FLIPPED ? 'flipped' : '',
		];
		$token_static = Game::get()->tokens[$token['type']];
		$token = array_merge($token, $token_static);
		if ($token['flipped'] == 'flipped') {
			$token = array_merge($token, $token_static[BACK]);
		}
		return $token;
	}

	
	public static function addLandunits($cityId, $power, $count, $type){
		//Add Landunits from supply to location
		//$cityId As ?NumericString?
		//$power As String From {constans::FRANCE, constants::HAPSBURG, ..., constants::MINOR_VENICE, ..., constants::INDEPENDENT}
		//$count As int, total strength of land units to add
		//$type As int from {regular, merc, cav}//somewehre these constants have been defined, I think

		$buy_id = strval(Game::get()->getPowerUnits()[$power][REGULAR][$count]);
		if($type == REGULAR){//if major power.
			$side = strval(FRONT);
		}elseif($type == MERC || $type == MERCENARY || $type == CAVALRY){
			$side = strval(BACK);
		}else{
			throw new UserException("invalid unit type in Tokens::addLandUnits: ".Utils::varToString($type));
		}
		//if minor power: select front/back to match the requested count, throw error if type != REGULAR
		//$already_there = number of units with type=$type on $cityId
		//calculate "optimal" counter mix to represent $count + $already_there
		//place these counters and remove the units already there.
		$token = Tokens::pickOneForLocation(['supply', $power, $buy_id], ['board', 'city', $cityId], $side);
		if ($token == null) {
			throw new UserException("You are out of buy_id=" . Utils::varToString($buy_id) . " tokens.");
		}

		//Notification
		
		//Notifications::message("city of id".$cityId." = ".Utils::varToString(Cities::getByID($cityId)));
		Notifications::notif_buyUnit(Players::getFromPower($power), $token, $type, Cities::getByID($cityId));
	}

	public static function removeLandUnits($cityId, $power, $count, $type){

	}

	public static function moveFormation($cityIdFrom, $cityIdTo, $formation){

	}

	public static function moveLeader($cityIdFrom, $cityIdTo, $leader){

	}

	//////////////////////////////////
	//////////////////////////////////
	//////////// GETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

	public static function checkFormation($token_ids) {
		$formation = self::getMany($token_ids);
		if ($formation->empty()) {
			throw new UserException("Game error: no formation selected.");
		}
		$city_id = $formation->first()['location_id'];
		foreach ($formation as $formation_id => $formation) {
			if ($formation['location_id'] != $city_id) {
				throw new UserException("All units in formation must start in same city");
			}
		}
	}

	public static function checkOwner($token_ids, $player) {
		$formation = self::getMany($token_ids);
		if ($formation->empty()) {
			throw new UserException("Game error: no formation selected.");
		}
		foreach ($formation as $formation_id => $formation) {
			if ($formation['power'] != $player->power) {
				throw new UserException("All units in formation must be owned by player");
			}
		}
	}

	public static function dbIDIndex($db_id, $id) {
		return preg_replace('/\{INDEX\}/', $id, $db_id);
	}

	public static function inCity($token, $city_id) {
		return ($token['location_id'] == $city_id) && ($token['location_type'] == 'city');
	}

	public static function bolIsSieged($city_id){
		//return city_id contains units of two powers that are at war and current_state != field battle
		return false;
	}

	public static function tokenGetLeader($leaderName){
		$tokens = Game::get()->tokens;
		Notifications::message("tokens=".Utils::varToString($tokens));
		return $tokens["leader"]['power'];
	}

	//////////////////////////////////
	//////////////////////////////////
	///////////// SETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

	/**
	 * setupNewGame: create the tokens
	 */
	public function setupNewGame($players, $options) {
		$tokens = Game::get()->tokens;
		foreach (Game::get()->starting_token_counts as $token_type => $num) {
			$piece = [
				"id" => $tokens[$token_type]['db_id'],
				"nbr" => $num,
				"type" => $token_type,
			];
			self::create([$piece], ['supply', $tokens[$token_type]['power'], $token_type], 0);
		}
		foreach (Game::get()->getSetup() as $power => $cities) {
			foreach ($cities as $city_name => $city) {
				foreach ($city as $unit) {
					self::pickForLocation(1, ['supply', $tokens[$unit]['power'], $unit], ['map', 'city', $city_name]);
				}
			}
		}
		$locations = Game::get()->board_locations;
		foreach (Game::get()->getTokenSetup() as $placement) {
			$token_id = $placement[0];
			$location_id = $placement[1];
			$location = $locations[$location_id];
			self::pickForLocation(1, ['supply', $tokens[$token_id]['power'], $token_id], [$location['board'], 'location', $location_id]);
		}

		// Hack to flip starting units
		$id = self::dbIDIndex($tokens[OTTOMAN_1UNIT]['db_id'], 1);
		self::setState($id, FLIPPED);
		$id = $tokens[HAPSBURG_EXPLORATION]['db_id'];
		self::setState($id, FLIPPED);
	}
}
