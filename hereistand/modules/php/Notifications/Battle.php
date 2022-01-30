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
}