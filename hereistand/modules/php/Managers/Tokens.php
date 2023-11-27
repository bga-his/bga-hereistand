<?php
declare(strict_types=1);
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use TokenAttributes;
use tokenIDs_EXPLORATION;
use tokenIDs_HEX;
use UnitTypes;
use tokenIDs_UNITS;
use TokenSides;
use tokenTypeIDs;
use Locationtypes;

/**
 * Tokens: id, value, faction
 */
class Tokens extends \HIS\Helpers\Pieces {
	protected static $table = 'tokens';
	protected static $prefix = 'token_';
	protected static $customFields = ['type'];
	protected static $autoreshuffle = false;
	protected static $autoIncrement = false;

	//static function cast(Pieces $token) : Tokens {
	static function cast($token) {
		//$token = array ( 'id' => 'tbd_1156', 'location' => 'map_location_4075', 'state' => '0', 'type' => '1156', )
		$locations = explode('_', $token['location']);
		$token = [
			'id' => $token['id'],
			'board' => $locations[0],
			'type' => $token['type'],
			'location_type' => $locations[1] ?? null,
			'location_id' => $locations[2] ?? null,
			'flipped' => $token['state'] == TokenSides::BACK ? 'flipped' : '',
		];
		$token_static = Game::get()->tokens[$token['type']];
		$token = array_merge($token, $token_static);
		if ($token['flipped'] == 'flipped') {
			$token = array_merge($token, $token_static[TokenAttributes::back]);
		}
		return $token;
	}

	public static function getTrackPosition(int $token) : int{
		//token element of TrackTokens
		//TODO dosent work for MARITAL_STATUS_TRACK. Wife locations is not always current martial status position.
		foreach([[TURN_TRACK, TURN_TRACK_TOKENS], [VICTORY_TRACK, VICTORY_TRACK_TOKENS], [PIRACY_TRACK, PIRACY_TRACK_TOKENS], [CHATEAUX_TRACK, CHATEAUX_TRACK_TOKENS], [MARITAL_STATUS_TRACK, MARTIAL_STATUS_TRACK_TOKENS], [PROTESTANT_SPACES_TRACK, PROTESTANT_SPACES_TRACK_TOKENS], [SAINT_PETERS_CP_TRACK, SAINT_PETERS_CP_TRACK_TOKENS], [SAINT_PETERS_VP_TRACK, SAINT_PETERS_VP_TRACK_TOKENS], [NT_TRANSLATION_TRACK, NT_TRANSLATION_TRACK_TOKENS], [BIBLE_TRANSLATION_TRACK, BIBLE_TRANSLATION_TRACK_TOKENS]] as $track_tokens){
			if(in_array($token, $track_tokens[1], true)){
				for($i = 0; $i < count($track_tokens[0]); $i++){
					if($token['location'] == $track_tokens[0][$i]){
						return $i;
					}
				}
				Notifications::message("error: token ".Utils::varToString(($token))." isnt on its track.");
				return -1;
			}
		}
	}

	public static function incCounter(int $counterId, int $intAmount) : void{
		//counterId element of TrackTokens
		$token = Tokens::get($counterId);
		if(in_array($counterId, VICTORY_TRACK_TOKENS, true)){
			for($i = 0; $i < count(VICTORY_TRACK); $i++){
				if($token['location'] == VICTORY_TRACK[$i]){
					//TODO check for index out of bounds
					$token['location'] = VICTORY_TRACK[min($i+$intAmount, count(VICTORY_TRACK)-1)];
					Notifications::message("Position of ".$token['name']." was incremented by ".$intAmount." to the new value of ".($i+$intAmount));
					return;
				}
			}
		}
		//if Piracy/Chateux track advance -> also update VP track.
		//if SAINT_PETERS_CP > 5 -> incCounter(SAINT_PETERS_VP, 1), set CP to 0
	}

	//////////////////////////////////
	//////////////////////////////////
	//////////// GETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

	public static function checkFormation(array $token_ids) : bool {
		$formation = self::getMany($token_ids);
		if ($formation->empty()) {
			throw new UserException("Game error: no formation selected.");
			return false;
		}
		$space_id = $formation->first()['location_id'];
		foreach ($formation as $formation_id => $formation) {
			if ($formation['location_id'] != $space_id) {
				throw new UserException("All units in formation must start in same space");
				return false;
			}
		}
	}

	public static function checkOwner($token_ids, $player) {
		$formation = self::getMany($token_ids);
		if ($formation->empty()) {
			throw new UserException("Game error: no formation selected.");
		}
		foreach ($formation as $formation_id => $formation) {
			if ($formation['power'] != $player->power) {
				throw new UserException("All units in formation must be owned by player");
			}
		}
	}

	public static function dbIDIndex($db_id, $id) {
		return preg_replace('/\{INDEX\}/', $id, $db_id);
	}

	public static function inSpace($token, $space_id) {
		return ($token['location_id'] == $space_id) && ($token['location_type'] == 'space');
	}

	public static function bolIsSieged($space_id){
		//return space_id contains units of two powers that are at war and current_state != field battle
		return false;
	}

	public static function tokenGetLeader($leaderName){
		$tokens = Game::get()->tokens;
		Notifications::message("tokens=".Utils::varToString($tokens));
		return $tokens["leader"]['power'];
	}

	public static function GetControlMarker($spaceID){
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
		foreach ($tokens as $token) {
			if(in_array(tokenTypeIDs::CONTROL, $token["types"], true)){
				return $token;
			}
		}
		return null;
	}

	//////////////////////////////////
	//////////////////////////////////
	///////////// SETTERS //////////////
	//////////////////////////////////
	//////////////////////////////////

	/**
	 * setupNewGame: create the tokens
	 */
	public function setupNewGame($players, $options) {
		$tokens = Game::get()->tokens;
		foreach (Game::get()->starting_token_counts as $token_type => $num) {
			$piece = [
				"id" => $tokens[$token_type]['db_id'],
				"nbr" => $num,
				"type" => $token_type,
			];
			self::create([$piece], ['supply', $tokens[$token_type]['power'], $token_type], 0);
		}
		foreach (Game::get()->getSetup() as $power => $spaces) {
			foreach ($spaces as $spaceID => $space) {
				foreach ($space as $tokenID) {
					self::pickForLocation(1, ['supply', $tokens[$tokenID]['power'], $tokenID], ['map', 'space', $spaceID]); //locationtypes[$tokens[$unit]['power']]
				}
			}
		}
		$locations = Game::get()->board_locations;
		foreach (Game::get()->getTokenSetup() as $placement) {
			$token_id = $placement[0];
			$location_id = $placement[1];
			$location = $locations[$location_id];
			self::pickForLocation(1, ['supply', $tokens[$token_id]['power'], $token_id], [$location['board'], 'location', $location_id]);
		}

		// Hack to flip starting units
		$id = self::dbIDIndex($tokens[tokenIDs_UNITS::OTTOMAN_1UNIT]['db_id'], 1);
		self::setState($id, TokenSides::BACK);
		$id = $tokens[tokenIDs_EXPLORATION::HAPSBURG_EXPLORATION]['db_id'];
		self::setState($id, TokenSides::BACK);
	}
}
