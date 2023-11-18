<?php
namespace HIS\Core;

use HIS\Managers\Players;

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

	public static function notif_buyUnit($player, $token, $unit_type, $space) {
		self::notifyAll('buyUnit', '${player_name} bought ${unit_name} in ${space_name}', [
			"player" => $player,
			"token" => $token,
			"space" => $space,
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

	public static function notif_drawCards($power, $num){
		self::notifyAll('drawCard', '${player_name} drew ${num} cards', [
			"player" => Players::getFromPower($power),
			"num" => $num,
		]);
	}

	public static function notif_discard($player, $cardId){
		self::notifyAll('discardCard', '${player_name} discarded ${card_name} as Event', [
			"player" => $player,
			"card" => $cardId,
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

	public static function retreatUnits($token_ids, $space) {
		self::notifyAll('moveFormation', 'Units retreat to ${space_name}', [
			'formation' => $token_ids,
			'space' => $space,
		]);

	}

	public static function moveFormation($player, $formation, $from_space, $to_space) {
		self::notifyAll('moveFormation', '${player_name} moved ${formation_count} formation from ${from_name} to ${space_name}', [
			"player" => $player,
			"formation_count" => count($formation),
			"formation" => $formation,
			"from_id" => $from_space['id'],
			"from_name" => $from_space['name'],
			"space" => $to_space,
		]);
	}

	public static function moveLeader($player, $leader, $from_space, $to_space){
		self::notifyAll('moveFormation', '${player_name} moved ${formation_count} formation from ${from_name} to ${space_name}', [
			"player" => $player,
			"leader" => $leader,
			"from_id" => $from_space['id'],
			"from_name" => $from_space['name'],
			"space" => $to_space,
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

		if (isset($args['space'])) {
			$c = $args['space'];

			$args['space_name'] = $c['name'];
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
