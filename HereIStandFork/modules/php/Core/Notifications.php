<?php
namespace HIS\Core;

class Notifications {
	/*************************
		   **** GENERIC METHODS ****
	*/
	protected static function notifyAll($name, $msg, $data) {
		self::updateArgs($data);
		Game::get()->notifyAllPlayers($name, $msg, $data);
	}

	protected static function notify($player, $name, $msg, $data) {
		$pId = is_int($player) ? $player : $player->getId();
		self::updateArgs($data);
		Game::get()->notifyPlayer($pId, $name, $msg, $data);
	}

	public static function message($txt, $args = []) {
		self::notifyAll('message', $txt, $args);
	}

	public static function messageTo($player, $txt, $args = []) {
		$pId = is_int($player) ? $player : $player->getId();
		self::notify($pId, 'message', $txt, $args);
	}

	public static function notif_buyUnit($player, $token, $unit_type, $city) {
		self::notifyAll('buyUnit', '${player_name} bought ${unit_name} in ${city_name}', [
			"player" => $player,
			"token" => $token,
			"city" => $city,
			"unit_name" => $token['name'],
		]);
	}

	public static function notif_playCardCP($player, $card) {
		self::notifyAll('playCard', '${player_name} played ${card_name} for ${card_cp}CP', [
			"player" => $player,
			"card" => $card,
			"card_cp" => $card['cp'],
		]);
	}

	public static function notif_disardCard($player, $card){
		self::notifyAll('discardCard', '${player_name} Discarded ${card_name}', [
			"player" => $player,
			"card" => $card,
		]);
	}

	public static function notif_playCardEvent($player, $card){
		self::notifyAll('playCard', '${player_name} played ${card_name} as Event', [
			"player" => $player,
			"card" => $card,
		]);
	}

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

	public static function moveLeader($player, $leader, $from_city, $to_city){
		self::notifyAll('moveFormation', '${player_name} moved ${formation_count} formation from ${from_name} to ${city_name}', [
			"player" => $player,
			"leader" => $leader,
			"from_id" => $from_city['id'],
			"from_name" => $from_city['name'],
			"city" => $to_city,
		]);
	}

	/*********************
		   **** UPDATE ARGS ****
	*/
	/*
		   * Automatically adds some standard field about player and/or card
	*/
	protected static function updateArgs(&$args) {
		if (isset($args['player'])) {
			$args['player_name'] = $args['player']->getName();
			$args['player_id'] = $args['player']->getId();
			$args['power_name'] = $args['player']->power; //TODO
			unset($args['player']);
		}

		if (isset($args['card'])) {
			$c = $args['card'];

			$args['card_cp'] = $c['cp'];
			$args['card_name'] = $c['name']; // The substitution will be done in JS format_string_recursive function
		}

		if (isset($args['city'])) {
			$c = $args['city'];

			$args['city_name'] = $c['name'];
		}

		// if (isset($args['task'])) {
		//   $c = $args['task'];
		//   $args['task_desc'] = $c->getText();
		//   $args['i18n'][] = 'task_desc';
		//
		//   if (isset($args['player_id'])) {
		//     $args['task'] = $args['task']->jsonSerialize($args['task']->getPId() == $args['player_id']);
		//   }
		// }
	}
}

?>
