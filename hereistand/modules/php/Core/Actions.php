<?php
namespace HIS\Core;
use HIS\Core\Globals;
use HIS\Managers\Cards;
use HIS\Managers\Players;
use HIS\Notifications\PlayCard;

class Actions {

	public static function pass() {
		Game::get()->gamestate->nextState("pass");
	}

	public static function play($cardId, $asEvent) {
		$card = Cards::get($cardId);
		$player = Players::getActive();
		if ($card->pId != $player->id) {
			throw new UserException("Attempt to play card you do not have");
		}
		if ($card->location != 'hand') {
			throw new UserException("Attempt to play card not from hand");
		}
		PlayCard::playCardCP($player, $card);
		Globals::setRemainingCP($card->cp);
		Cards::discard($card);
		Game::get()->gamestate->nextState("playCP");
	}

}