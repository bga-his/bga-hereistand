<?php
namespace HIS\States;

trait AvoidBattleTrait {

	function stFindAvoid() {
		$this->gamestate->nextState("none");
	}



	function stRollAvoid() {
		$this->gamestate->nextState("done");
	}
}
