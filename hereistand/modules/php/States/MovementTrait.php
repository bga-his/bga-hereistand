<?php
namespace HIS\States;
use HIS\Core\Game;
use HIS\Core\Globals;
use HIS\Managers\Tokens;

trait MovementTrait {
	function argDeclareFormation() {
		return [];
	}

	function argDeclareDestination() {
		$cities = Game::get()->cities;
		$formation = Tokens::getMany(Globals::getFormation());
		if ($formation->empty()) {
			throw new UserException("Game error: no formation selected.");
		}
		$city = $cities[$formation->first()['location_id']];
		$connections = array_merge($city['connections'], $city['passes']);
		return [
			"city" => $city,
			"valid_city_ids" => $connections,
			"formation" => $formation,
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
		$this->gamestate->nextState("done");
	}

	function argResponseMovement() {
		return [];
	}

	function argResponseFieldBattle() {
		return [];
	}
}
