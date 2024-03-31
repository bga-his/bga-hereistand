<?php
namespace HIS\States;
use HIS\Core\Globals;
use HIS\Core\Notifications;
use HIS\Helpers\Utils;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Models\FieldBattle;
use HIS\Notifications\Battle;

trait FieldBattleTrait {
	function stFindBattle() {
		$destination = Globals::getDestination();
		$tokens = Tokens::getInLocation(['map', 'space', $destination]);
		$active_power = Players::getActive()->power;
		$field = [];
		// Get list of units from opposing powers
		$field['powers'] = FieldBattle::findOpposingPowers($destination, $tokens, $active_power);
		Globals::setFieldBattle($field);
		if (count($field['powers']) > 1) {
			$field['attacking_power'] = $active_power;
			$field['defending_powers'] = FieldBattle::getDefendingPowers($destination, $tokens, $active_power);
			Globals::setFieldBattle($field);
			$this->gamestate->nextState("found");
		} else {
			if (Globals::getRemainingCP() > 0) {
				$this->gamestate->nextState("more");
			} else {
				$this->gamestate->nextState("none");
			}
		}
	}

	function stFindFieldBattleResponses() {
		$this->gamestate->nextState("none");
	}

	function stFieldBattle() {
		$this->gamestate->nextState("next");
	}

	function stFieldBattleDice() {
		$field = Globals::getFieldBattle();
		$field['attacker_dice_count'] = FieldBattle::attackerDiceCount($field);
		$field['defender_dice_count'] = FieldBattle::defenderDiceCount($field);
		Globals::setFieldBattle($field);
		$this->gamestate->nextState("next");
	}

	function stRollFieldBattleDice() {
		$field = Globals::getFieldBattle();
		$attacker_dice = Utils::rollDice($field['attacker_dice_count']);
		$defender_dice = Utils::rollDice($field['defender_dice_count']);
		$field['attacker_dice'] = $attacker_dice;
		$field['defender_dice'] = $defender_dice;
		Battle::battleRolls($attacker_dice, $defender_dice);
		Globals::setFieldBattle($field);
		$this->gamestate->nextState("next");
	}

	function stFieldBattleCard() {
		$this->gamestate->nextState("defender");
	}



	function stDeclareFieldBattleWinner() {
		$field = Globals::getFieldBattle();
		$winner = FieldBattle::declareWinner($field);
		$field['winner'] = $winner;
		Globals::setFieldBattle($field);
		Notifications::message("${winner} wins.", ['winner' => $winner]);
		$this->gamestate->nextState("next");
	}

	function stFieldBattleCasualties() {
		$field = FieldBattle::battleCasualties(Globals::getFieldBattle());
		Globals::setFieldBattle($field);
		$players_taking_losses = [];
		foreach ($field['powers'] as $power => $army) {
			if ($army['casualties'] > 0) {
				$players_taking_losses[] = Players::getFromPower($power)->id;
			}
		}
		if ($this->gamestate->setPlayersMultiactive($players_taking_losses, 'none') == false) {
			$this->gamestate->nextState("start");
		}
	}

	function stFieldBattleCaptureLeaders() {
		$this->gamestate->nextState("next");
	}

	function stFieldBattleRetreats() {
		$field = Globals::getFieldBattle();
		$destination = Globals::getDestination();
		if ($field['winner'] == DEFENDER) {
			$origin = Globals::getOrigin();
			$spaces = $this->spaces;
			$space = $spaces[$origin];
			$retreating_units = FieldBattle::getRetreatingUnits($field['attacking_power'], $field, $destination);
			Tokens::move($retreating_units, ['map', 'space', $origin]);
			Battle::retreatUnits($retreating_units, $space);
			$this->gamestate->nextState("none");
		} else {
			$retreats = [];
			foreach ($field['defending_powers'] as $power) {
				$retreating_units = FieldBattle::getRetreatingUnits($power, $field, $destination);
				if (count($retreating_units) > 0) {
					$retreats[$power] = $retreating_units;
				}
			}
			if (count($retreats) == 0) {
				$this->gamestate->nextState("none");
				return;
			}
			Globals::setRetreats($retreats);
			$next_power = array_key_first($retreats);
			$next_player = Players::getFromPower($next_power);
			$this->gamestate->changeActivePlayer($next_player->id);
			$this->gamestate->nextState("found");
		}
	}

	function stFindSiege() {
		$this->gamestate->nextState("next");
	}

	function stConcludeFieldBattle() {
		$this->gamestate->nextState("more");
	}
}
