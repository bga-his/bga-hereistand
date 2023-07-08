<?php
namespace HIS\Notifications;
use HIS\Core\Notifications;

class Battle extends \HIS\Core\Notifications {
	public static function battleRolls($attacker_dice, $defender_dice) {
		self::notifyAll('battleRolls', 'Attacker rolls: [${attacker_rolls}], Defender rolls: [${defender_rolls}]', [
			"attacker_rolls" => implode(',', $attacker_dice),
			"defender_rolls" => implode(',', $defender_dice),
		]);
	}

	public static function destroyUnits($player, $tokens) {
		self::notifyAll('destroyUnits', '${player_name} took casualties', [
			"player" => $player,
			"tokens" => $tokens,
		]);
	}

	public static function retreatUnits($token_ids, $city) {
		self::notifyAll('moveFormation', 'Units retreat to ${city_name}', [
			'formation' => $token_ids,
			'city' => $city,
		]);

	}
}