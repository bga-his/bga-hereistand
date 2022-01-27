<?php
namespace HIS\Managers;

use HIS\Core\Game;

/**
 * Tokens: id, value, faction
 */
class Tokens extends \HIS\Helpers\Pieces {
	protected static $table = 'tokens';
	protected static $prefix = 'token_';
	protected static $customFields = ['value', 'faction', 'side', 'type'];
	protected static $autoreshuffle = false;
	protected static function cast($token) {
		$locations = explode('_', $token['location']);
		return [
			'id' => $token['id'],
			'board' => $locations[0],
			'type' => $token['type'],
			'value' => $token['value'],
			'side' => $token['side'],
			'faction' => $token['faction'],
			'location' => $locations[1] ?? null,
		];
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
		foreach (Game::get()->setup_base as $power => $cities) {
			foreach ($cities as $city_name => $city) {
				$tokens = [];
				foreach ($city as $unit) {
					if ($unit == 'SCM') {
						$tokens[] = ['value' => 0, 'faction' => $power, 'type' => 'SCM', 'side' => FRONT];
					}
				}
				self::create($tokens, ['city', $city_name]);
			}
		}
	}
}
