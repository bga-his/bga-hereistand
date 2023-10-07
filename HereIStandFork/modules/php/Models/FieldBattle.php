<?php
namespace HIS\Models;
use HIS\Helpers\Utils;
use HIS\Managers\Tokens;
use tokenTypeIDs;
/*
 * Formation: all utility functions concerning a formation
 */

class FieldBattle {

	public function __construct() {
	}

	public static function findOpposingPowers($destination, $tokens, $active_power) {
		$powers = [];
		foreach ($tokens as $token_id => $token) {
			if (in_array(tokenTypeIDs::MILITARY, $token['types'])) {
				$power = $token['power'];
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
		return $powers;
	}

	public static function getDefendingPowers($destination, $tokens, $active_power) {
		$defending_powers = [];
		foreach ($tokens as $token_id => $token) {
			if (in_array(tokenTypeIDs::MILITARY, $token['types'])) {
				$power = $token['power'];
				if ($power != $active_power && in_array($power, $defending_powers) == false) {
					$defending_powers[] = $power;
				}
			}
		}
		return $defending_powers;
	}

	public static function defenderDiceCount($field) {
		$defender_strength = 0;
		$defender_max_power = 0;
		foreach ($field['defending_powers'] as $power) {
			$defender_strength += $field['powers'][$power]['strength'];
			if ($field['powers'][$power]['battle_rating'] > $defender_max_power) {
				$defender_max_power = $field['powers'][$power]['battle_rating'];
			}
		}
		$defender_dice_count = $defender_strength + $defender_max_power + 1;
		return $defender_dice_count;
	}

	public static function attackerDiceCount($field) {
		$attacker_strength = $field['powers'][$field['attacking_power']]['strength'];
		$attacker_max_power = $field['powers'][$field['attacking_power']]['battle_rating'];
		$attacker_dice_count = $attacker_strength + $attacker_max_power;
		return $attacker_dice_count;
	}

	public static function declareWinner($field) {
		$winner = DEFENDER;
		$attacker_hits = Utils::countHits($field['attacker_dice'], 5);
		$defender_hits = Utils::countHits($field['defender_dice'], 5);
		if ($attacker_hits > $defender_hits) {
			$winner = ATTACKER;
		}
		return $winner;
	}

	public static function battleCasualties($field) {
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
		return $field;
	}

	public static function getRetreatingUnits($power, $field, $city_id) {
		$starting_units = [];
		foreach ($field['powers'][$power]['tokens'] as $token_id => $token) {
			$starting_units[] = $token_id;
		}
		$destination_ids = [];
		foreach (Tokens::getInLocation(['map', 'city', $city_id]) as $token) {
			$destination_ids[] = $token['id'];
		}
		return array_values(array_intersect($starting_units, $destination_ids));
	}
}
