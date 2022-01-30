<?php
namespace HIS\States;

trait InterceptionTrait {
	function stFindInterceptions() {
		$this->gamestate->nextState("done");
	}

	function argInterceptIntent() {
		return [];
	}

	function stRollInterception() {
		$this->gamestate->nextState("done");
	}

}
