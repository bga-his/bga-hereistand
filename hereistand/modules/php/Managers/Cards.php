<?php
namespace HIS\Managers;

use cardIds;
use cardTypes;
use Powers;
use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\Utils;
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
		return array_merge(Game::get()->cards[$card['id']], $card); //no "Card" type, its only an array
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
	public function setupNewGame($p_players, $options) : void {
		foreach (Game::get()->cards as $card_id => $card) {
			$piece = [
				"id" => $card_id,
				"nbr" => 1,
			];
			$location = ['box'];
			if ($card['type'] == CardTypes::HOME_CARD) {
				switch ($card_id) {
				case CardIds::JANISSARIES:
					$location = ['hand', Players::getFromPower(Powers::OTTOMAN)->id];
					break;
				case CardIds::HOLY_ROMAN_EMPEROR:
					$location = ['hand', Players::getFromPower(Powers::HAPSBURG)->id];
					break;
				case CardIds::SIX_WIVES_OF_HENRY_VIII:
					$location = ['hand', Players::getFromPower(Powers::ENGLAND)->id];
					break;
				case CardIds::PATRON_OF_THE_ARTS:
					$location = ['hand', Players::getFromPower(Powers::FRANCE)->id];
					break;
				case CardIds::PAPAL_BULL:
					$location = ['hand', Players::getFromPower(Powers::PAPACY)->id];
					break;
				case CardIds::LEIPZIG_DEBATE:
					$location = ['hand', Players::getFromPower(Powers::PAPACY)->id];
					break;
				case CardIds::HERE_I_STAND:
					$location = ['hand', Players::getFromPower(Powers::PROTESTANT)->id];
					break;
				case 'default':
					break;
				}
			} elseif ($card['type'] == CardTypes::DIPLOMACY_CARD) {
				$location = ['diplomacy'];
			} elseif ($card['turn_added'] <= 1) { //TODO replace 1 by current turn
				$location = ['deck'];
			}
			if ($card_id == CardIds::LUTHER_95_THESES) {
				$location = ['hand', Players::getFromPower(Powers::PROTESTANT)->id];
			}
			self::create([$piece], $location);
		}
		
		Cards::winterCardDraw();
	}

	public static function winterCardDraw() : void{
		Cards::draw(Powers::OTTOMAN, Players::getCardDraw(Powers::OTTOMAN));
		Cards::draw(Powers::HAPSBURG, Players::getCardDraw((Powers::HAPSBURG)));
		Cards::draw(Powers::ENGLAND, Players::getCardDraw((Powers::ENGLAND)));
		Cards::draw(Powers::FRANCE, Players::getCardDraw((Powers::FRANCE)));
		Cards::draw(Powers::PAPACY, Players::getCardDraw(Powers::PAPACY));
		Cards::draw(Powers::PROTESTANT, Players::getCardDraw(Powers::PROTESTANT));
	}

	public static function draw(String $power, int $num) : void{
		//$power: element of Powers
		//$num: number of cards drawn
		//TODO shuffle deck
		Notifications::notif_drawCards($power, $num);
		self::pickForLocation($num, ['deck'], ['hand', Players::getFromPower($power)->getId()]);
	}

	public static function discard($card): void {
		self::discardByID($card['id']);
	}
	public static function discardByID($card): void {
		//$card: element of CardIds
		$query = self::move([strval($card)], ['discard']);
	}

	public static function playEvent($card): void {
		Notifications::message("Cards::playEvent: cardId".Utils::varToString($card));
		//Notifications::notif_playCardEvent($player, $card);// the notification is done somewhere else before here. after play Card.
		switch($card['id']){
			case CardIds::JANISSARIES:
				Game::get()->gamestate->nextState("playEvtJanissaries");
				break;
			case CardIds::HOLY_ROMAN_EMPEROR:
				Game::get()->gamestate->nextState("playEvtHolyRoman");
				break;
			case CardIds::SIX_WIVES_OF_HENRY_VIII:
				Game::get()->gamestate->nextState("playEvtSixWives");
				break;
			case CardIds::PATRON_OF_THE_ARTS:
				Game::get()->gamestate->nextState("playEvtPatronOfArts");
				break;
			case CardIds::PAPAL_BULL:
				Game::get()->gamestate->nextState("playEvtPapalBull");
				break;
			case cardIds::LEIPZIG_DEBATE:
				Game::get()->gamestate->nextState("playEvLeipzigDebate");
				break;
				//TODO add the other events
		}
	}
}
