<?php
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\Utils;
use HIS\Managers\Players;
use HIS\Models\Player;
use Random\Engine;

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
		//TODO read number of square controll markers on board and leader to calc correct number of cards.
		Cards::draw(OTTOMAN, 3);
		Cards::draw(HAPSBURG, 5);
		Cards::draw(ENGLAND, 3);
		Cards::draw(FRANCE, 4);
		Cards::draw(PAPACY, 2);
		Cards::draw(PROTESTANT, 3);
		
	}

	public static function draw($num, $power){
		//TODO shuffle deck
		self::pickForLocation(3, ['deck'], ['hand', Players::getFromPower($power)->getId()]);
	}

	public static function discard($card) {
		self::move([$card['id']], ['discard']);
	}
	public static function discardByID($cardId) {
		$query = self::move([strval($cardId)], ['discard']);
		Notifications::message("Cards::discardByID: query=".Utils::varToString($query));
	}

	public static function playEvent($card) {
		Notifications::message("Cards::playEvent: cardId".Utils::varToString($card));
		//Notifications::notif_playCardEvent($player, $card);// the notification is done somewhere else before here. after play Card.
		switch($card['id']){
			case CARD_JANISSARIES:
				Game::get()->gamestate->nextState("playEvtJanissaries");
				break;
			case CARD_HOLY_ROMAN_EMPEROR:
				Game::get()->gamestate->nextState("playEvtHolyRoman");
				break;
			case CARD_SIX_WIVES_OF_HENRY_VIII:
				Game::get()->gamestate->nextState("playEvtSixWives");
				break;
			case CARD_PATRON_OF_THE_ARTS:
				Game::get()->gamestate->nextState("playEvtPatronOfArts");
				break;
				//TODO add the other 
		}
	}
}
