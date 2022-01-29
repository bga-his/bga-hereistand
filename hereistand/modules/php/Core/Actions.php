<?php
namespace HIS\Core;
use HIS\Core\Globals;
use HIS\Helpers\UserException;
use HIS\Managers\Cards;
use HIS\Managers\Players;
use HIS\Notifications\PlayCard;

class Actions {

	public static function pass() {
		Game::get()->gamestate->nextState("pass");
	}

	public static function undo() {
		Game::get()->gamestate->nextState("undo");
	}

	public static function play($cardId, $asEvent) {
		$card = Cards::get($cardId);
		$player = Players::getActive();
		if ($card['pId'] != $player->id) {
			throw new UserException("Attempt to play card you do not have");
		}
		if ($card['location'] != 'hand') {
			throw new UserException("Attempt to play card not from hand");
		}
		PlayCard::playCardCP($player, $card);
		Globals::setRemainingCP($card['cp']);
		Cards::discard($card);
		Game::get()->gamestate->nextState("playCP");
	}

	public static function move() {
		Game::get()->gamestate->nextState("move");
	}

	public static function withdraw() {
		Game::get()->gamestate->nextState("withdraw");
	}

	public static function declareDestination($destination_id) {
		Globals::setDestination($destination_id);
		Globals::incRemainingCP(-1);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareFormation($token_ids) {
		Globals::setFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareIntercept($token_ids) {
		Globals::setInterceptFormation($token_ids);
		Game::get()->gamestate->nextState("declare");
	}

	public static function declareAvoid($token_ids) {
		Game::get()->gamestate->nextState("declare");
	}

}