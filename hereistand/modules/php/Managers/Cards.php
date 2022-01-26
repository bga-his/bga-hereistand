<?php
namespace HIS\Managers;

/**
 * Cards: id, type
 *  pId is stored as second part of the location, eg : table_2322020
 */
class Cards extends \HIS\Helpers\Pieces {
	protected static $table = 'cards';
	protected static $prefix = 'card_';
	protected static $customFields = ['type'];
	protected static $autoreshuffle = false;
	protected static function cast($card) {
		$locations = explode('_', $card['location']);
		return [
			'id' => $card['id'],
			'location' => $locations[0],
			'type' => $card['type'],
			'pId' => $locations[1] ?? null,
		];
	}

	//////////////////////////////////
	//////////////////////////////////
	//////////// GETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

	/**
	 * getOfPlayer: return the cards in the hand of given player
	 */
	public static function getOfPlayer($pId) {
		return self::getInLocation(['hand', $pId]);
	}

	//////////////////////////////////
	//////////////////////////////////
	///////////// SETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

	/**
	 * setupNewGame: create the deck of cards
	 */
	public function setupNewGame($players, $options) {
	}
}