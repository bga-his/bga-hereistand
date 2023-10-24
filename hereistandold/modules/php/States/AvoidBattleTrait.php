<?php
namespace HIS\States;

trait AvoidBattleTrait {

	function stFindAvoid() {
		$this->gamestate->nextState("none");
	}

	function argDeclareAvoid() {
		return [];
	}

	function argDeclareAvoidDestination() {
		return [];
	}

	function stRollAvoid() {
		$this->gamestate->nextState("done");
	}
}
