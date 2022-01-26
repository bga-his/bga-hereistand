<?php
namespace HIS\Managers;

/**
 * Tokens: id, value, faction
 */
class Tokens extends \HIS\Helpers\Pieces {
	protected static $table = 'tokens';
	protected static $prefix = 'token_';
	protected static $customFields = ['value', 'faction'];
	protected static $autoreshuffle = false;
	protected static function cast($token) {
		$locations = explode('_', $card['location']);
		return [
			'id' => $card['id'],
			'board' => $locations[0],
			'value' => $card['value'],
			'faction' => $card['faction'],
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
	}
}
