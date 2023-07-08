<?php
namespace HIS\Notifications;
use HIS\Core\Notifications;

class Buy extends \HIS\Core\Notifications {
	public static function buyUnit($player, $token, $unit_type, $city) {
		self::notifyAll('buyUnit', '${player_name} bought ${unit_name} in ${city_name}', [
			"player" => $player,
			"token" => $token,
			"city" => $city,
			"unit_name" => $token['name'],
		]);
	}
}