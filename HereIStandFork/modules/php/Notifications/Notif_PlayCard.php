<?php
namespace HIS\Notifications;
use HIS\Core\Notifications;

class Notif_PlayCard extends \HIS\Core\Notifications {
	public static function playCardCP($player, $card) {
		self::notifyAll('playCard', '${player_name} played ${card_name} for ${card_cp}CP', [
			"player" => $player,
			"card" => $card,
			"card_cp" => $card['cp'],
		]);
	}

	public static function playCardEvent($player, $card){
		self::notifyAll('playCard', '${player_name} played ${card_name} as Event', [
			"player" => $player,
			"card" => $card,
		]);
	}
}