<?php
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Helpers\UserException;

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
