<?php
namespace HIS\States;

use HIS\Core\Globals;
use HIS\Managers\Players;

trait ReformationAttempsTrait {
	function stEvt95Theses() {
		Globals::setRemainingRef(5);
		Globals::set95ThesesActive(1);
		$this->gamestate->nextState("resolve");
	}
}
