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
	protected static $autoIncrement = false;
	protected static function cast($token) {
		$locations = explode('_', $token['location']);
		$token = [
			'id' => $token['id'],
			'board' => $locations[0],
			'type' => $token['type'],
			'location_type' => $locations[1] ?? null,
			'location_id' => $locations[2] ?? null,
			'flipped' => $token['state'] == BACK ? 'flipped' : '',
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
					self::pickForLocation(1, ['supply', $tokens[$unit]['power'], $unit], ['board', 'city', $city_name]);
				}
			}
		}
		// Hack to flip starting units
		self::setState('tbd_31_1', BACK);
	}
}
