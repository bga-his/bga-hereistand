<?php
namespace HIS\Core;

use HIS\Managers\Players;
use HIS\Managers\Map;
use SpaceAttributs;
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

	public static function js_createToken($token_add, string $addLocation) : void{
		self::notifyAll("createToken", "", ["token_add" => $token_add, "dest" => $addLocation]);
	}
  
	public static function js_moveToken(string $tokenId, string $dest) : void{
		self::notifyAll("moveToken", "", ["tokenId" => $tokenId, "dest"=> $dest]);
	}

	public static function js_moveTokens(array $tokenIds, string $dest) : void{
		self::notifyAll("moveTokens", "", ["tokenIds" => $tokenIds, "dest"=> $dest]);
	}
  
	public static function js_createAndMoveToken($token_add, string $addLocation, string $dest) : void{
		self::notifyAll("createAndMoveToken", "", ["token_add" => $token_add, "addLocation" => $addLocation, "dest" => $dest]);
	}
  
	public static function js_destroyToken(string $tokenId) : void{
		self::notifyAll("destroyToken", "", ["tokenId" => $tokenId]);
	}
  
	public static function js_moveAndDestroyToken(string $tokenId, string $dest) : void{
		self::notifyAll("moveAndDestroyToken", "", ["tokenId" => $tokenId, "dest" => $dest]);
	}

	public static function notif_setReligion($spaceName, $spaceID, $religion, $token_weg, $token_add) {
		if($token_weg !== null){
			self::js_destroyToken($token_weg[TokenAttributes::id]);
		}
		if($token_add !== null){
			self::js_createToken($token_add, "space_".$spaceID);
		}
		self::message('the religios control of ${spaceName} was set to ${religion}.', [
			"spaceName" => $spaceName,
			"religion" => $religion
		]);
	}
	
	public static function notif_setPoliticalControl($spaceID, $spaceName, $power, $token_weg, $token_add, $scmLocation) {
		if($token_weg !== null){
			if(in_array(tokenTypeIDs::KEYS, $token_weg["types"])){
				self::js_moveToken($token_weg[TokenAttributes::id], "location_".$scmLocation);
			}else{
				self::js_moveAndDestroyToken($token_weg[TokenAttributes::id], "player_board_".Players::getFromPower($token_weg[TokenAttributes::power])->getId());
			}
		}
		if($token_add !== null){
			if(in_array(tokenTypeIDs::KEYS, $token_add["types"])){
				self::js_moveToken($token_add[TokenAttributes::id], "space_".$spaceID);
			}else{
				self::js_createAndMoveToken($token_add, "player_board_".Players::getFromPower($token_add[TokenAttributes::power])->getId(), "space_".$spaceID);
			}
		}
		self::message('the political control of ${spaceName} was set to ${power}', [
			"spaceName" => $spaceName,
			"power" => $power
		]);
	}

	public static function notif_addUnrest($spaceID, $token_add){
		self::js_createToken($token_add, "space_".$spaceID);
		self::message('addUnrest', 'add Unrest to ${spaceName}', [
			"spaceName" => Map::getSpaceName($spaceID)
		]);
	}

	public static function notif_removeUnrest($spaceID, $tokenID){
		self::js_destroyToken($tokenID);
		self::message('removeUnrest', 'remove Unrest from ${spaceName}', [
			"spaceName" => Map::getSpaceName($spaceID)
		]);
	}

	public static function notif_buyUnit($player, $token, $space) {
		self::js_createAndMoveToken($token, "player_board_".$player->getId(), "space_".$space[SpaceAttributs::id]);
		self::message('${player_name} bought ${unit} in ${space_name}', [
			"player_name" => $player->getName(),
			"space_name" => $space[SpaceAttributs::name],
			"unit" => $token['name'],
		]);
	}

	public static function notif_buyNavalUnit($player, $token, $space){
		self::notif_buyUnit($player, $token, $space);
	}

	
	public static function notif_addLeader($spaceId, $spaceName, $leaderToken, $player){
		self::js_createAndMoveToken($leaderToken, "player_board_".$player->getId(), "space_".$spaceId);
		self::message('added Leader ${leader_name} to space ${space_name}', [
			"leader_name" => $leaderToken[TokenAttributes::name],
			"space_name" => $spaceName
		]);
	}

	public static function notif_destroyUnits($player, $token, string $spaceName) {
		self::js_moveAndDestroyToken($token[TokenAttributes::id], "player_board_".$player->getId());
		self::message('${player_name} removed ${unit_name} from ${space_name}', [
			"player_name" => $player->getName(),
			"space_name" => $spaceName,
			"unit_name" => $token['name']
		]);
	}

	public static function notif_playCardCP($player, $card) {
		self::js_destroyToken($card["id"]);
		self::message('${player_name} played ${card_name} for ${card_cp} CP', [
			"player_name" => $player->getName(),
			"card_name" => $card['name'],
			"card_cp" => $card['cp']
		]);
	}

	public static function notif_disardCard($player, $card){
		self::js_destroyToken($card["id"]);
		self::message('${player_name} Discarded ${card_name}', [
			"player_name" => $player->getName(),
			"card_name" => $card["name"]
		]);
	}

	public static function notif_playCardEvent($player, $card){
		self::js_destroyToken($card["id"]);
		self::message('${player_name} played ${card_name} as Event', [
			"player_name" => $player->getName(),
			"card_name" => $card["name"]
		]);
	}

	public static function notif_drawCards($power, $num){
		self::message('${player_name} drew ${num} cards', [
			"player_name" => Players::getFromPower($power)->getName(),
			"num" => $num
		]);
	}

	public static function notif_discard($player, $cardId){
		self::js_destroyToken($cardId);
		self::message('discardCard', '${player_name} discarded ${card_name}', [
			"player_name" => $player->getName(),
			"card_name" => $cardId["name"],
		]);
	}

	public static function battleRolls($attacker_dice, $defender_dice) {
		self::message('Attacker rolls: [${attacker_rolls}], Defender rolls: [${defender_rolls}]', [
			"attacker_rolls" => implode(',', $attacker_dice),
			"defender_rolls" => implode(',', $defender_dice),
		]);
	}

	public static function notif_moveFormation($player, $formation, $space_toId, $from_space_Name, $to_space_Name, $strength) {
		//$formation is array of IDs (not an actual formation class)

		$dest = "space_".$space_toId;
		self::js_moveTokens($formation, $dest);

		self::message('${player_name} moved a formation of strength ${formation_strength} from ${from_name} to ${to_name}', [
			"player_name" => $player->getName(),
			"formation_strength" => $strength,
			"from_name" => $from_space_Name,
			"to_name" => $to_space_Name,
		]);
	}

	public static function notif_moveNavalFormation($player, array $ids, string $seazoneIdTo, string $from_space_Name, string $to_space_Name) {
		#foreach($ids as $tokenId){
		#  self::js_moveToken($tokenId, $seazoneIdTo);
		#}
		self::js_moveTokens($ids, $seazoneIdTo);
		self::message('${player_name} moved ${formation_strength} naval units from ${from_name} to ${to_name}', [
			"player_name" => $player->getName(),
			"formation_strength" => count($ids),
			"formation" => $ids,
			"from_name" => $from_space_Name,
			"to_name" => $to_space_Name
		]);
	}

	public static function notif_moveLeader($player, string $leaderId, string $leader_Name, int $spaceToId, string $from_space_Name, string $to_space_Name) : void {
		self::js_moveToken($leaderId, "space_".$spaceToId);
		self::message('${player_name} moved ${leader_Name} from ${from_name} to ${to_name}', [
			"player_name" => $player->getName(),
			"leader_Name" => $leader_Name,
			"from_name" => $from_space_Name,
			"to_name" => $to_space_Name
		]);
	}

	public static function notif_moveNavalLeader($player, string $leaderId, string $leader_Name, string $spaceToId, string $from_space_Name, string $to_space_Name) : void {
		self::js_moveToken($leaderId, $spaceToId);
		self::message('${player_name} moved ${leader_Name} from ${from_name} to ${to_name}', [
			"player_name" => $player->getName(),
			"leader_Name" => $leader_Name,
			"from_name" => $from_space_Name,
			"to_name" => $to_space_Name
		]);
	}

	public static function notif_captureLeader(string $leaderId, string $prision, string $leader_Name, string $capturer, string $from_space_Name) : void {
		self::js_moveToken($leaderId, $prision);
		self::message('${leader_Name} was captured by ${capturer} on ${from_name}.', [
			"leader_Name" => $leader_Name,
			"from_name" => $from_space_Name,
			"capturer" => $capturer
		]);
	}
	
	public static function notif_removeLeader(string $leaderId, string $leaderName) : void{
		self::js_destroyToken($leaderId);
		self::message('removed leader ${leader_name} from play.', [
			"leader_name" => $leaderName
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
