<?php
namespace HIS\States;

use HIS\Core\Game;
use HIS\Core\Globals;
use HIS\Core\Notifications;
use HIS\Helpers\Utils;
use HIS\Managers\Players;
use HIS\Managers\Map;
use HIS\Managers\Tokens;
use HIS\Notifications\Move;
use HIS\Helpers\UserException;

trait MovementTrait {
	function argDeclareFormation() {
		//when you click on the "move (1-2 CP) button, before you have to start to select a formation.
		Notifications::message("MovementTrait::argDeclareFormation");
		return [];
	}

	function argDeclareDestination() {
		$spaces = Game::get()->spaces;
		$formation = Globals::getFormation();

		if (is_null($formation)) {
			Notifications::message("invalid formation selected: is null");
			throw new UserException("Game error: no formation selected.");
		}
		if (!$formation->bolMayMove()) {
			Notifications::message("invalid formation selected: ".Utils::varToString($formation));
			throw new UserException("Game error: the formation may not move.");
		}
		$space_id = $formation->getSpaceID();
		$space = $spaces[$space_id];
		Globals::setOrigin($space_id);
		$connections = $space['connections'];
		if (Globals::intGetRemainingCP() >= 2) {
			$connections = array_merge($connections, $space['passes']);
		}
		return [
			"space" => $space,
			"valid_space_ids" => $connections,
			"formation" => $formation,
		];
	}

	function stFindMovementResponses() {
		$this->gamestate->nextState("none");
	}

	function stMoveFormation() {
		$formation = Globals::getFormation();
		$destination = Globals::intGetDestination();
		//TODO check that move is valid (Formation valid, CP cost valid, target space valid.)
		Map::moveFormation($formation, $destination);
		$this->gamestate->nextState("done");
	}

	function argResponseMovement() {
		return [];
	}

}
