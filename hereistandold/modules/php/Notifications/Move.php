<?php
namespace HIS\Notifications;
use HIS\Core\Notifications;

class Move extends \HIS\Core\Notifications {
	public static function moveFormation($player, $formation, $from_city, $to_city) {
		self::notifyAll('moveFormation', '${player_name} moved ${formation_count} formation from ${from_name} to ${city_name}', [
			"player" => $player,
			"formation_count" => count($formation),
			"formation" => $formation,
			"from_id" => $from_city['id'],
			"from_name" => $from_city['name'],
			"city" => $to_city,
		]);
	}
}