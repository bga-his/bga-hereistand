<?php
namespace HIS\States;
use HIS\Core\Game;
use HIS\Core\Globals;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Notifications\Move;

trait MovementTrait {
	function argDeclareFormation() {
		return [];
	}

	function argDeclareDestination() {
		$spaces = Game::get()->spaces;
		$formation = Tokens::getMany(Globals::getFormation());
		if ($formation->empty()) {
			throw new UserException("Game error: no formation selected.");
		}
		$space_id = $formation->first()['location_id'];
		$space = $spaces[$space_id];
		Globals::setOrigin($space_id);
		$connections = $space['connections'];
		if (Globals::getRemainingCP() >= 2) {
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
		$player = Players::getActive();
		$spaces = Game::get()->spaces;
		$formation = Globals::getFormation();
		$destination = Globals::getDestination();
		$origin = Globals::getOrigin();
		$from_space = $spaces[$origin];
		$to_space = $spaces[$destination];
		Tokens::move($formation, ['map', 'space', $destination]);
		Move::moveFormation($player, $formation, $from_space, $to_space);
		$this->gamestate->nextState("done");
	}

	function argResponseMovement() {
		return [];
	}

}
