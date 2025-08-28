<?php
namespace HIS\States;

use HIS\Core\Globals;
use HIS\Managers\Players;

trait NextPlayerTrait {
	function stNextPlayer() {
		Globals::setRemainingCP(0);
		Globals::incImpulseId(1);
		Players::activeNext();
		$this->gamestate->nextState("nextPlayer");
	}
}
