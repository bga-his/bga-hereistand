<?php
namespace HIS\Core;

use HIS\Managers\Players;
use HIS\Managers\Map;
use TokenAttributes;
use tokenTypeIDs;
use tokenIDs;

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

	public static function notif_setReligion($spaceName, $spaceID, $religion, $token_weg, $token_add) {
		self::notifyAll('setReligion', 'the religios control of ${spaceName} was set to ${religion}.', [
			"spaceName" => $spaceName,
			"spaceID" => $spaceID,
			"religion" => $religion,
			"token_weg" => $token_weg,
			"token_add" => $token_add,
		]);
	}
	
	public static function notif_setPoliticalControl($spaceID, $spaceName, $power, $token_weg, $token_add, $scmLocation) {
		self::notifyAll('setPoliticalControl', 'the political control of ${spaceName} was set to ${power}', [
			"spaceName" => $spaceName,
			"spaceID" => $spaceID,
			"power" => $power,
			"token_weg" => $token_weg,
			"token_add" => $token_add,
			"player_id_weg" => $token_weg!=null?Players::getFromPower($token_weg["power"])->getId():null,
			"player_id_add" => $token_add!=null?Players::getFromPower($token_add["power"])->getId():null,
			"type" => ($token_add!=null && in_array(tokenTypeIDs::KEYS, $token_add["types"]))?"scm":"hex",
			"scmLocation" => $scmLocation,
		]);
	}

	public static function notif_addUnrest($spaceID, $token_add){
		self::notifyAll('addUnrest', 'add Unrest to ${spaceName}', [
			"spaceID" => $spaceID,
			"spaceName" => Map::getName($spaceID),
			"token_add" => $token_add
		]);
	}

	public static function notif_removeUnrest($spaceID, $tokenID){
		self::notifyAll('removeUnrest', 'remove Unrest from ${spaceName}', [
			"spaceID" => $spaceID,
			"spaceName" => Map::getName($spaceID),
			"unrestTokenID" => $tokenID
		]);
	}

	public static function notif_buyUnit($player, $token, $space) {
		self::notifyAll('buyUnit', '${player_name} bought ${unit_name} in ${space_name}', [
			"player" => $player,
			"token" => $token,
			"space" => $space,
			"unit_name" => $token['name'],
		]);
	}

	
	public static function notif_addLeader($spaceId, $leaderId, $spaceName, $leaderToken, $player){
		self::notifyAll('addLeader', 'added Leader ${leader_name} to space ${space_name}', [
			"spaceId" => $spaceId,
			"leaderId" => $leaderId,
			"leader_name" => $leaderToken[TokenAttributes::name],
			"space_name" => $spaceName,
			"token" => $leaderToken,
			"player" => $player
		]);
	}

	public static function notif_moveLeader($player, $leaderToken, $leader_Name, $from_space, $to_space, $from_space_Name, $to_space_Name) {
		self::notifyAll('moveLeader', '${player_name} moved ${leader_Name} from ${from_name} to ${to_name}', [
			"player" => $player,
			"leader" => $leaderToken,
			"leader_Name" => $leader_Name,
			"from_id" => $from_space,
			"from_name" => $from_space_Name,
			"to_id" => $to_space,
			"to_name" => $to_space_Name,
		]);
	}

	public static function notif_destroyUnits($player, $token, $space) {
		self::notifyAll('destroyUnit', '${player_name} removed ${unit_name} from ${space_name}', [
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

	public static function notif_moveFormation($player, $formation, $from_space, $to_space, $from_space_Name, $to_space_Name, $strength) {
		self::notifyAll('moveFormation', '${player_name} moved a formation of strength ${formation_strength} from ${from_name} to ${to_name}', [
			"player" => $player,
			"formation_strength" => $strength,
			"formation" => $formation,
			"from_id" => $from_space,
			"from_name" => $from_space_Name,
			"to_id" => $to_space,
			"to_name" => $to_space_Name,
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
