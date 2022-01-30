<?php
namespace HIS\States;
use HIS\Core\Globals;

trait FieldBattleTrait {
	function stFindBattle() {
		if (Globals::getRemainingCP() > 0) {
			$this->gamestate->nextState("more");
		} else {
			$this->gamestate->nextState("none");
		}
	}

	function stFindFieldBattleResponses() {
		$this->gamestate->nextState("none");
	}

	function stFieldBattleDice() {
		$this->gamestate->nextState("next");
	}

	function stFieldBattleCard() {
		$this->gamestate->nextState("defender");
	}

	function argFieldBattleCard() {
		return [];
	}

	function argPlayJanissaries() {
		return [];
	}

	function stDeclareFieldBattleWinner() {
		$this->gamestate->nextState("next");
	}

	function stFieldBattleCasualties() {
		$this->gamestate->nextState("defender");
	}

	function argTakeFieldBattleCasualties() {
		return [];
	}

	function stFieldBattleCaptureLeaders() {
		$this->gamestate->nextState("next");
	}

	function stFieldBattleRetreats() {
		$this->gamestate->nextState("none");
	}

	function argDeclareRetreatDestination() {
		return [];
	}

	function stFindSiege() {
		$this->gamestate->nextState("next");
	}

	function stConcludeFieldBattle() {
		$this->gamestate->nextState("more");
	}

	function argResponseFieldBattle() {
		return [];
	}
}
