<?php
namespace HIS\States;

trait MovementTrait {
	function argDeclareFormation() {
		return [];
	}

	function argDeclareDestination() {
		return [
			"valid_city_ids" => [LYON],
		];
	}

	function stFindMovementResponses() {
		$this->gamestate->nextState("none");
	}

	function stFindInterceptions() {
		$this->gamestate->nextState("done");
	}

	function argInterceptIntent() {
		return [];
	}

	function stRollInterception() {
		$this->gamestate->nextState("done");
	}

	function stMoveFormation() {
		$this->gamestate->nextState("done");
	}

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

	function stFindWithdraw() {
		$this->gamestate->nextState("none");
	}

	function argWithdrawIntent() {
		return [];
	}

	function stFindBattle() {
		$this->gamestate->nextState("none");
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
		$this->gamestate->nextState("done");
	}

	function argResponseMovement() {
		return [];
	}

	function argResponseFieldBattle() {
		return [];
	}
}
