<?php
namespace HIS\States;
use HIS\Core\Globals;
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
		$defending_powers = [];
		foreach ($tokens as $token_id => $token) {
			if (in_array(MILITARY, $token['types'])) {
				$power = $token['power'];
				if ($power != $active_power && in_array($power, $defending_powers)) {
					$defending_powers[] = $power;
				}
				if (array_key_exists($power, $field) == false) {
					$field[$power] = [
						'strength' => 0,
						'battle_rating' => 0,
						'tokens' => [],
					];
				}
				$field[$power]['strength'] += array_key_exists('strength', $token) ? $token['strength'] : 0;
				if (array_key_exists('battle_rating', $token)) {
					if ($token['battle_rating'] > $field[$power]['battle_rating']) {
						$field[$power]['battle_rating'] = $token['battle_rating'];
					}
				}
				$field[$power]['tokens'][] = $token;
			}
		}
		Globals::setFieldBattle($field);
		if (count($field) > 1) {
			$field['attacking_powers'] = [$active_power];
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
		$attacker_strength = 0;
		$defender_strength = 0;
		$attacker_max_power = 0;
		$defender_max_power = 0;
		foreach ($field['attacking_powers'] as $power) {
			$attacker_strength += $field[$power]['strength'];
			if ($field[$power]['battle_rating'] > $attacker_max_power) {
				$attacker_max_power = $field[$power['battle_rating']];
			}
		}
		foreach ($field['defending_powers'] as $power) {
			$defender_strength += $field[$power]['strength'];
			if ($field[$power]['battle_rating'] > $defender_max_power) {
				$defender_max_power = $field[$power['battle_rating']];
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
		$this->gamestate->nextState("next");
	}

	function stFieldBattleCasualties() {
		$this->gamestate->nextState("defender");
	}

	function argTakeFieldBattleCasualties() {
		$field = Globals::getFieldBattle();
		$attacker_hits = Utils::countHits($field['attacker_dice'], 5);
		$defender_hits = Utils::countHits($field['defender_dice'], 5);
		$current_power = Player::getActive()->power;
		$tokens = $field[$current_power]['tokens'];
		$hits = $attacker_hits;
		if (in_array($current_power, $field['defenders'])) {
			$hits = $defender_hits;
		}
		return [
			'tokens' => $tokens,
			'hits' => $hits,
		];
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
