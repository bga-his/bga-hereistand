<?php
namespace HIS\Managers;

use HIS\Core\Game;

/**
 * Tokens: id, value, faction
 */
class Tokens extends \HIS\Helpers\Pieces {
	protected static $table = 'tokens';
	protected static $prefix = 'token_';
	protected static $customFields = ['type'];
	protected static $autoreshuffle = false;
	protected static function cast($token) {
		$locations = explode('_', $token['location']);
		$token = [
			'id' => $token['id'],
			'board' => $locations[0],
			'type' => $token['type'],
			'location_type' => $locations[1] ?? null,
			'location_name' => $locations[2] ?? null,
		];
		return array_merge($token, Game::get()->tokens[$token['type']]);
	}

	//////////////////////////////////
	//////////////////////////////////
	//////////// GETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

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
			$tokens = array_fill(0, $num, ['type' => $token_type]);
			self::create($tokens, ['supply', 'supply', $token_type]);
		}
		foreach (Game::get()->setup_base as $faction => $cities) {
			foreach ($cities as $city_name => $city) {
				foreach ($city as $unit) {
					self::pickForLocation(1, ['supply', 'supply', $unit], ['board', 'city', $city_name]);
				}
			}
		}
	}
}
