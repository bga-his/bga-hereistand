<?php
namespace HIS\Managers;

use HIS\Core\Game;

/**
 * Cards: id, type
 *  pId is stored as second part of the location, eg : table_2322020
 */
class Cards extends \HIS\Helpers\Pieces {
	protected static $table = 'cards';
	protected static $prefix = 'card_';
	protected static $customFields = [];
	protected static $autoreshuffle = false;
	protected static function cast($card) {
		$locations = explode('_', $card['location']);
		$card = [
			'id' => $card['id'],
			'location' => $locations[0],
			'pId' => $locations[1] ?? null,
		];
		return array_merge(Game::get()->cards[$card['id']], $card);
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
		$card_nums = count(Game::get()->cards);
		$cards = array_fill(0, $card_nums, 0);
		self::create($cards, ['deck']);
	}
}
