<?php
namespace HIS\States;
use HIS\Core\Globals;
use HIS\Core\Notifications;
use HIS\Helpers\Utils;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Notifications\Battle;

trait FieldBattleTrait {
	function stFindBattle() {
		$destination = Globals::getDestination();
		$tokens = Tokens::getInLocation(['board', 'city', $destination]);
		$active_power = Players::getActive()->power;
		$field = [];
		$powers = [];
		$defending_powers = [];
		foreach ($tokens as $token_id => $token) {
			if (in_array(MILITARY, $token['types'])) {
				$power = $token['power'];
				if ($power != $active_power && in_array($power, $defending_powers) == false) {
					$defending_powers[] = $power;
				}
				if (array_key_exists($power, $powers) == false) {
					$powers[$power] = [
						'strength' => 0,
						'battle_rating' => 0,
						'tokens' => [],
						'casualties' => 0,
					];
				}
				$powers[$power]['strength'] += array_key_exists('strength', $token) ? $token['strength'] : 0;
				if (array_key_exists('battle_rating', $token)) {
					if ($token['battle_rating'] > $powers[$power]['battle_rating']) {
						$powers[$power]['battle_rating'] = $token['battle_rating'];
					}
				}
				$powers[$power]['tokens'][$token_id] = $token;
			}
		}
		$field['powers'] = $powers;
		Globals::setFieldBattle($field);
		if (count($field['powers']) > 1) {
			$field['attacking_power'] = $active_power;
			$field['defending_powers'] = $defending_powers;
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
		$attacker_strength = $field['powers'][$field['attacking_power']]['strength'];
		$attacker_max_power = $field['powers'][$field['attacking_power']]['battle_rating'];
		$defender_strength = 0;
		$defender_max_power = 0;
		foreach ($field['defending_powers'] as $power) {
			$defender_strength += $field['powers'][$power]['strength'];
			if ($field['powers'][$power]['battle_rating'] > $defender_max_power) {
				$defender_max_power = $field['powers'][$power]['battle_rating'];
			}
		}
		$attacker_dice_count = $attacker_strength + $attacker_max_power;
		$defender_dice_count = $defender_strength + $defender_max_power + 1;
		$field['attacker_dice_count'] = $attacker_dice_count;
		$field['defender_dice_count'] = $defender_dice_count;
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

	function argFieldBattleCard() {
		return [];
	}

	function argPlayJanissaries() {
		return [];
	}

	function stDeclareFieldBattleWinner() {
		$winner = DEFENDER;
		$field = Globals::getFieldBattle();
		$attacker_hits = Utils::countHits($field['attacker_dice'], 5);
		$defender_hits = Utils::countHits($field['defender_dice'], 5);
		if ($attacker_hits > $defender_hits) {
			$winner = ATTACKER;
		}
		$field['winner'] = $winner;
		Globals::setFieldBattle($field);
		Notifications::message("${winner} wins.", ['winner' => $winner]);
		$this->gamestate->nextState("next");
	}

	function stFieldBattleCasualties() {
		$field = Globals::getFieldBattle();
		$attacker_hits = Utils::countHits($field['attacker_dice'], 5);
		$defender_hits = Utils::countHits($field['defender_dice'], 5);
		$field['powers'][$field['attacking_power']]['casualties'] = $defender_hits;
		$defender_count = count($field['defending_powers']);
		if ($defender_count > 1) {
			$remainder_casualty = $attacker_hits % $defender_count;
			$defender_casulaties = floor($attacker_hits / $defender_count);
			foreach ($field['defending_powers'] as $defender) {
				$field['powers'][$defender]['casualties'] = $defender_casulaties;
			}
			if ($remainder_casualty == 1) {
				$unlucky_defender = $field['defending_powers'][bga_rand(0, $defender_count)];
				$field['powers'][$unlucky_defender]['casualties'] += 1;
			}
		} else {
			$field['powers'][$field['defending_powers'][0]]['casualties'] = $attacker_hits;
		}
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

	function argTakeFieldBattleCasualties() {
		if (Players::isActive() == false) {
			return [];
		}
		$field = Globals::getFieldBattle();
		$current_power = Players::getCurrent()->power;
		$tokens = $field['powers'][$current_power]['tokens'];
		$casualties = $field['powers'][$current_power]['casualties'];
		return [
			'tokens' => $tokens,
			'casualties' => $casualties,
		];
	}

	function stFieldBattleCaptureLeaders() {
		$this->gamestate->nextState("next");
	}

	function getRetreatingUnits($power, $field, $city_id) {
		$starting_units = [];
		foreach ($field['powers'][$power]['tokens'] as $token_id => $token) {
			$starting_units[] = $token_id;
		}
		$destination_ids = [];
		foreach (Tokens::getInLocation(['board', 'city', $city_id]) as $token) {
			$destination_ids[] = $token['id'];
		}
		return array_intersect($starting_units, $destination_ids);
	}

	function stFieldBattleRetreats() {
		$field = Globals::getFieldBattle();
		$destination = Globals::getDestination();
		if ($field['winner'] == DEFENDER) {
			$origin = Globals::getOrigin();
			$cities = $this->cities;
			$city = $cities[$origin];
			$retreating_units = self::getRetreatingUnits($field['attacking_power'], $field, $destination);
			Tokens::move($retreating_units, ['board', 'city', $origin]);
			Battle::retreatUnits($retreating_units, $city);
			$this->gamestate->nextState("none");
		} else {
			$retreats = [];
			foreach ($field['defending_powers'] as $power) {
				$retreating_units = self::getRetreatingUnits($power, $field, $destination);
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
