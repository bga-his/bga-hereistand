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
		$cities = Game::get()->cities;
		$formation = Tokens::getMany(Globals::getFormation());
		if ($formation->empty()) {
			throw new UserException("Game error: no formation selected.");
		}
		$city_id = $formation->first()['location_id'];
		$city = $cities[$city_id];
		Globals::setOrigin($city_id);
		$connections = $city['connections'];
		if (Globals::getRemainingCP() >= 2) {
			$connections = array_merge($connections, $city['passes']);
		}
		return [
			"city" => $city,
			"valid_city_ids" => $connections,
			"formation" => $formation,
		];
	}

	function stFindMovementResponses() {
		$this->gamestate->nextState("none");
	}

	function stMoveFormation() {
		$player = Players::getActive();
		$cities = Game::get()->cities;
		$formation = Globals::getFormation();
		$destination = Globals::getDestination();
		$origin = Globals::getOrigin();
		$from_city = $cities[$origin];
		$from_city['id'] = $origin;
		$to_city = $cities[$destination];
		$to_city['id'] = $destination;
		Tokens::move($formation, ['board', 'city', $destination]);
		Move::moveFormation($player, $formation, $from_city, $to_city);
		$this->gamestate->nextState("done");
	}

	function argResponseMovement() {
		return [];
	}

}
