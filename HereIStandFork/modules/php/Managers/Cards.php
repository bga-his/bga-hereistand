<?php
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Managers\Players;

/**
 * Cards: id, type
 *  pId is stored as second part of the location, eg : table_2322020
 */
class Cards extends \HIS\Helpers\Pieces {
	protected static $table = 'cards';
	protected static $prefix = 'card_';
	protected static $customFields = [];
	protected static $autoreshuffle = true;
	protected static $autoIncrement = false;
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
	//////////// GETTERS /////////////
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
	///////////// SETTERS ////////////
	//////////////////////////////////
	//////////////////////////////////

	/**
	 * setupNewGame: create the deck of cards
	 */
	public function setupNewGame($players, $options) {
		foreach (Game::get()->cards as $card_id => $card) {
			$piece = [
				"id" => $card_id,
				"nbr" => 1,
			];
			$location = ['box'];
			if ($card['type'] == HOME_CARD) {
				switch ($card_id) {
				case CARD_JANISSARIES:
					$location = ['hand', Players::getFromPower(OTTOMAN)->id];
					break;
				case CARD_HOLY_ROMAN_EMPEROR:
					$location = ['hand', Players::getFromPower(HAPSBURG)->id];
					break;
				case CARD_SIX_WIVES_OF_HENRY_VIII:
					$location = ['hand', Players::getFromPower(ENGLAND)->id];
					break;
				case CARD_PATRON_OF_THE_ARTS:
					$location = ['hand', Players::getFromPower(FRANCE)->id];
					break;
				case CARD_PAPAL_BULL:
					$location = ['hand', Players::getFromPower(PAPACY)->id];
					break;
				case CARD_LEIPZIG_DEBATE:
					$location = ['hand', Players::getFromPower(PAPACY)->id];
					break;
				case CARD_HERE_I_STAND:
					$location = ['hand', Players::getFromPower(PROTESTANT)->id];
					break;
				case 'default':
					break;
				}
			} elseif ($card['type'] == DIPLOMACY_CARD) {
				$location = ['diplomacy'];
			} elseif ($card['turn_added'] == 1) {
				$location = ['deck'];
			}
			if ($card_id == CARD_LUTHER_95_THESES) {
				$location = ['hand', Players::getFromPower(PROTESTANT)->id];
			}
			self::create([$piece], $location);
		}
		foreach ($players as $pId => $player) {
			self::pickForLocation(2, ['deck'], ['hand', $pId]);
		}
	}

	public static function discard($card) {
		self::move([$card['id']], ['discard']);
	}

	public static function playEvent($cardId) {
		
		switch($cardId){
			case CARD_JANISSARIES:
				Game::get()->gamestate->nextState("playEvtJanissaries");
				break;
		}
		//

	}
}
