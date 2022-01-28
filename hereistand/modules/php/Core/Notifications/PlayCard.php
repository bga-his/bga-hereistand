<?php
namespace HIS\Notifications;
use HIS\Core\Notifications;

class PlayCard extends \HIS\Core\Notifications {
	public static function playCardCP($player, $card) {
		self::notifyAll('playCard', '${player_name} played ${card_name} for ${card_cp}CP', [
			"player" => $player,
			"card" => $card,
		]);
	}
}