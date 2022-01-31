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
	protected static function cast($token) {
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

	//////////////////////////////////
	//////////////////////////////////
	///////////// SETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

	/**
	 * setupNewGame: create the tokens
	 */
	public function setupNewGame($players, $options) {
		foreach (Game::get()->starting_token_counts as $token_type => $num) {
			$tokens = Game::get()->tokens;
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
		// Hack to flip starting units
		self::setState('tbd_31_1', FLIPPED);
		$locations = Game::get()->board_locations;
		foreach (Game::get()->getTokenSetup() as $placement) {
			$token_id = $placement[0];
			$location_id = $placement[1];
			$location = $locations[$location_id];
			self::pickForLocation(1, ['supply', $tokens[$token_id]['power'], $token_id], [$location['board'], 'location', $location_id]);
		}
	}
}
