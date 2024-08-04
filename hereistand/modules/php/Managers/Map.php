<?php
declare(strict_types=1);
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use HIS\Models\Formation;
use HIS\Models\Player;
use locationIDs;
use Powers;
use ReligionIDs;
use UnitTypes;
use TokenSides;
use Locationtypes;
use SpaceTypes;
use TokenAttributes;
use tokenIDs;
use tokenTypeIDs;

class Map extends \HIS\Helpers\Pieces {
	public static function getHomePower(int $spaceID) : String{
		Notifications::message("spaceID=".$spaceID);
		Notifications::message("place=".Utils::varToString(Game::get()->spaces[$spaceID]));
		return Game::get()->spaces[$spaceID]["home_power"];
	}
	public static function getSpaceName(int $spaceID) : String{
		return Game::get()->spaces[$spaceID]["name"];
	}
	public static function getSeazoneName(int $spaceID) : String{
		return Game::get()->seazones[$spaceID]["name"];
	}
	public static function bolIsKey(int $spaceID) : bool{
		return Game::get()->spaces[$spaceID]["type"] == SpaceTypes::SPACE_CAPITAL || Game::get()->spaces[$spaceID]["type"] == SpaceTypes::SPACE_KEY;
	}
	public static function strReligionIdToName(int $relID) : String{
		if($relID == ReligionIDs::CATHOLIC){
			return "Catholic";
		}
		if($relID == ReligionIDs::REFORMED){
			return "Reformed";
		}
		if($relID == ReligionIDs::OTHER){
			return "no religion";
		}
		return "invalid religion id: ".$relID;
	}

	/**
	 * @return int element of constants.locationIDs
	 */
	public static function getSCMPowerCardLocation(String $power, bool $firstOccupied) : int{
		// firstoccupied: false -> return last open scm place; true -> return first open scm place.
		//returns first free location for SquareControlMarkers on power card of $power. (where the current VP and card draw stand, or where the next lost scm should go)
		$scm_location_free = null;
		foreach (HomeCard_key_locations[$power] as $keyLocation) {
			$scm = Tokens::getInLocation(Locationtypes::powercards."_".$keyLocation);
			if(count($scm) > 0){
				Notifications::message("First free scm location of ".$power." = ".$scm_location_free);
				if($firstOccupied){
					return $keyLocation;
				}else{
					return $scm_location_free;
				}
			}
			$scm_location_free = $keyLocation;
			//autowin.
		}
		Notifications::message("no free key location of power card of ".$power." (This shouldnt be possible)");
		return $scm_location_free;
	}

	/**
	 * add hex or square control marker of power $power to space $spaceID
	 */
	public static function addControlToken(int $spaceID, String $power) : void{
		Notifications::message("Map::addControlToken(".$spaceID.", ".$power.");");
		if(Map::bolIsKey($spaceID) && $power != Powers::PROTESTANT){
			foreach (HomeCard_key_locations[$power] as $keyLocations) {
				$scm = Tokens::getInLocation(Locationtypes::powercards."_".$keyLocations);
				if(count($scm) > 0){
					Notifications::message("move scm ".$scm->first()["id"]." to map_space_".$spaceID.".");
					Tokens::move($scm->first()["id"], "map_space_".$spaceID);
					//TODO update VP track.
					return;
				}
				//autowin.
			}
		}else{
			Tokens::pickForLocation(1, ['supply',$power, hexControlMarkers[$power]], ['map', 'space', $spaceID]);
		}
		
	}

	/**
	 * remove one hex or square control marker from §spaceID
	 */
	public static function removeControlToken(int $spaceID) : void{
		$token = Tokens::GetControlMarker($spaceID);
		if($token != null){
			if(in_array(tokenTypeIDs::KEYS, $token["types"])){ // if type($token) == scm
				// move scm to power card, not supply.
				for($intI = count(HomeCard_key_locations[$token["power"]])-1; $intI >= 0; $intI--){
					$keyLocation = HomeCard_key_locations[$token["power"]][$intI];
					if(count(Tokens::getInLocation(Locationtypes::powercards."_".$keyLocation)) == 0){
						Notifications::message("move scm of ".$token["power"]." to ".$keyLocation);
						Tokens::move($token["id"], "powercards_location_".$keyLocation);
						//TODO update VP track.
						return;
					}
				}
			}else{
				Tokens::move($token['id'], Locationtypes::supply[$token["power"]]); //TODO supply seems to have other name
			}
		}
	}

	/**
	 * Get the major power that has control of the space
	 * @return string element of constants.Powers
	 */
    public static function getPoliticalControl(int $spaceID) : String{
        // SpaceIDs -> constants::Powers
		$token = Tokens::GetControlMarker($spaceID);
		//TODO Oran, Algiers, Tripoli?
		if($token == null){
			return Map::getHomePower($spaceID);
		}else{
			return $token["power"];
		}
    }

	/**
	 * sets the Political control of $spaceID to $power.
	 * @param int $spaceID element of generated_constants::SpaceIDs
	 * @param string $power element of constants::Powers
	 */
	public static function setPoliticalControl(int $spaceID, String $power){
		Notifications::message("Map::setPoliticalControl(".Map::getSpaceName($spaceID).", ".$power.");");
		
        $token_original = Tokens::GetControlMarker($spaceID);
		if($token_original == null){
			$flipped = Map::getHomePower($spaceID) == Powers::PROTESTANT; // $flipped <=> new token has to be flipped.
		}else{
			$flipped = $token_original["flipped"] != "";
		}
		Notifications::message("flipped = ".$flipped);

		Map::removeControlToken($spaceID);
		if(Map::getHomePower($spaceID) != $power || $flipped || Map::bolIsKey($spaceID) || (!$flipped && Map::getHomePower($spaceID) == Powers::PROTESTANT && $power == Powers::PROTESTANT)){
			Map::addControlToken($spaceID, $power);
			$token_add = Tokens::GetControlMarker($spaceID);
			//Notifications::message("Map::setPoliticalControl: added Control Marker ".Utils::varToString($token));
			if($flipped){
				Tokens::setState($token_add['id'], TokenSides::BACK);
			}else{
				Tokens::setState($token_add['id'], TokenSides::FRONT);
			}
		}
		$token_add = Tokens::GetControlMarker($spaceID);
		Notifications::message("token_add = ".Utils::varToString($token_add));
		if($token_original != null && in_array(tokenTypeIDs::KEYS, $token_original["types"])){
			Notifications::notif_setPoliticalControl($spaceID, Map::getSpaceName($spaceID), $power, $token_original, $token_add, Map::getSCMPowerCardLocation($token_original["power"], true));
		}else{
			Notifications::notif_setPoliticalControl($spaceID, Map::getSpaceName($spaceID), $power, $token_original, $token_add, null);
		}
    }

	/**
	 * Get the religios control of $spaceID
	 * @param int $spaceID element of generated_constants::SpaceIDs
	 * @return int religionID element of constants::ReligionIDs
	 */
    public static function getReligiosControl(int $spaceID) : int{
        // SpaceIDs -> constants::ReligionIDs
		if(map::bolGetSpaceIsInUnrest($spaceID) || Map::getHomePower($spaceID) == Powers::OTTOMAN){
			return ReligionIDs::OTHER;
		}

		$token = Tokens::GetControlMarker($spaceID);
		//Notifications::message("control token on space ".Map::getSpaceName($spaceID)." = ".Utils::varToString($token));
		if($token == null){
			if(Map::getHomePower($spaceID) == Powers::PROTESTANT){
				return ReligionIDs::REFORMED;
			}else{
				return ReligionIDs::CATHOLIC;
			}
		}else{
			if($token["flipped"] == ''){
				//token unflipped:
				return ReligionIDs::CATHOLIC;
			}else{
				//flipped token
				return ReligionIDs::REFORMED;
			}
		}
    }

	/**
	 * change the religios control of $spaceID to $religion
	 * @param int $spaceID element of generated_constants::SpaceIDs
	 * @param int $religion element of constants::ReligionIDs
	 */
    public static function setReligiosControl(int $spaceID, int $religion) : void{
		$power = Map::getPoliticalControl($spaceID);
		$homePower = Map::getHomePower($spaceID);
		$token_original = Tokens::GetControlMarker($spaceID);
		Notifications::message("Map::setReligiosControl(".Map::getSpaceName($spaceID).", ".Map::strReligionIdToName($religion).");");
		if($power == Powers::PROTESTANT && $homePower == Powers::PROTESTANT){
			if($religion == ReligionIDs::REFORMED && $token_original != null){
				Map::removeControlToken($spaceID);
			}
			if($religion == ReligionIDs::CATHOLIC){
				if($token_original == null){
					Map::addControlToken($spaceID, Powers::PROTESTANT);
					$token_add = Tokens::GetControlMarker($spaceID);
				}
				if($religion == ReligionIDs::REFORMED){
					Tokens::setState($token_add['id'], TokenSides::BACK);
				}else{
					Tokens::setState($token_add['id'], TokenSides::FRONT);
				}
			}
		}else{
			//no protestand home space involved.
			if($religion == ReligionIDs::REFORMED){
				if($token_original == null){
					Map::addControlToken($spaceID, $homePower);
					$token_add = Tokens::GetControlMarker($spaceID);
				}else{
					$token_add = $token_original;
				}
				Tokens::setState($token_add['id'], TokenSides::BACK);
			}else{
				if($token_original != null){
					if($power == $homePower && !Map::bolIsKey($spaceID)){
						Map::removeControlToken($spaceID);
					}else{
						Tokens::setState($token_original['id'], TokenSides::FRONT);
					}
				}
			}
		}
		$token_add = Tokens::GetControlMarker($spaceID); 
		Notifications::notif_setReligion(Map::getSpaceName($spaceID), $spaceID, Map::strReligionIdToName($religion), $token_original, $token_add);
    }

	/**
	 * Return True iff the space $spaceID is fortified (Key, Captial, Fortess, eloctrorate or Fortess marker.)
	 * @param $sapceID element of generated_constants.SpaceIDs
	 */
    public static function bolGetSpaceIsFortified(int $spaceID) : bool{
        // SpaceID -> boolean
        //returns true for keys, fortresses, elektrorates or spaces containing the fortress marker.

		//TODO place fortress marker to test if this works.
		
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
		foreach($tokens as $token){
			if($token["type"] == tokenTypeIDs::FORTRESS_MARKER){
				return true;
			}
		}

		$space = Game::get()->spaces[$spaceID];
		return $space["type"] == SpaceTypes::SPACE_CAPITAL || $space["type"] == SpaceTypes::SPACE_KEY || $space["type"] == SpaceTypes::SPACE_FORTRESS || $space["type"] == SpaceTypes::SPACE_ELECTORATE;
    }

	/**
	 * Return true Iff the space $spaceID is in unrest (contains an unrest marker)
	 * * @param $spaceID element of generated_constants.SpaceIDs
	 */
    public static function bolGetSpaceIsInUnrest(int $spaceID) : bool{
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
		foreach($tokens as $token){
			if($token["type"] == tokenIDs::UNREST){
				return true;
			}
		}
        return false;
    }

	/**
	 * Set weather $spaceID is in unrest ($isInRest == True -> add unrest marker, else remove all unrest markers.)
	 * @param $spaceID element of generated_constants.SpaceIDs
	 */
	public static function setUnrest(int $spaceID, bool $isInRest) : void{
		if($isInRest){
			Tokens::pickForLocation(1, ['supply', 'other', tokenIDs::UNREST], ['map', 'space', $spaceID]);// 'supply_other_1070'
			
			$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
			foreach($tokens as $token){
				if($token["type"] == tokenIDs::UNREST){
					Notifications::notif_addUnrest($spaceID, $token);
					return;
				}
			}
		}else{
			$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
			foreach($tokens as $token){
				if($token["type"] == tokenIDs::UNREST){
					Tokens::move($token['id'], ['supply', 'other', tokenIDs::UNREST]);
					Notifications::notif_removeUnrest($spaceID, $token['id']);
				}
			}
		}
	}

	/**
	 * Return true if $spaceID is sieged (is Fortified and contains units that are at war with the Power that has political control of the key)
	 * @param $spaceID element of generated_constants.SpaceIDs
	 */
    public static function bolGetSpaceIsSieged($spaceID) : bool{
		//returns true if space is fortified and contains units that are at war with political owner.

		//TODO test
		if(!Map::bolGetSpaceIsFortified($spaceID)){
			return false;
		}
		$power = Map::getPoliticalControl($spaceID);
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
		foreach($tokens as $token){
			if($token["type"] == tokenTypeIDs::UNITS && Diplomacy::IsAtWar($power, $token["power"])){
				return true;
			}
		}
        return false;
    }

	/**
	 * @param token a token. (Has constants.TokenAttributs::types defined.)
	 */
	public static function bolIsLandUnit(array $token) : bool{
		$types = $token[TokenAttributes::types];
		return in_array(tokenTypeIDs::MILITARY, $types, true) && in_array(tokenTypeIDs::UNITS, $types, true);
	}

	public static function bolIsShip(array $token) : bool{
		$types = $token[TokenAttributes::types];
		return in_array(tokenTypeIDs::NAVAL, $types, true) && in_array(tokenTypeIDs::UNITS, $types, true);
	}
	/**
	 * @return array [n -> number of strength n land units in supply] ' normally n in [1, 2, 4, 6]
	 */
	public static function getLandUnitsInSupply(String $power) : array{
		$res = [1=>0, 2=>0, 4=>0, 6=>0];
		$tokens = Tokens::getInLocation(Locationtypes::supply[$power]."_%");
		foreach($tokens as $token){
			if(Map::bolIsLandUnit($token)){
				$res[$token[TokenAttributes::strength]] += 1;
			}
		}
		return $res;
	}

	/**
	 * get the number of ships in the supply of $power. (so the number of ships that could be build this turn.)
	 */
	public static function intGetShipsInSupply(String $power) : int{
		$res = 0;
		$tokens = Tokens::getInLocation(Locationtypes::supply[$power]."_%");
		foreach($tokens as $token){
			if(Map::bolIsShip($token)){
				$res += 1;
			}
		}
		return $res;
	}

	/**
	 * @return array [n -> number of strength n land units of $power in $spaceID] ' normally n in [1, 2, 4, 6]
	 */
	public static function getLandUnitsInSpace(int $spaceID, String $power, int $unitType) : array{
		$res = [1=>0, 2=>0, 4=>0, 6=>0];
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
		$flipped = "flipped";
		if($unitType == UnitTypes::REGULAR){
			$flipped = "";
		}
		foreach($tokens as $token){
			if(Map::bolIsLandUnit($token) && $token[TokenAttributes::power] == $power && $token[TokenAttributes::flipped] == $flipped){
				$res[$token[TokenAttributes::strength]] += 1;
			}
		}
		return $res;
	}

	/**
	* get all Land units of $power in space $spaceId;
	* @param int $spaceID element of generated_constants.SpaceIDs
	* @param String $power: element of Powers
	* @return array of tokens of all land units of power $power in space $spaceId.
	*   if power is the empty string "", land units of all powers are returned.
	*/
	public static function getLandUnits(int $spaceId, String $power = "") : array{
		$res = array();
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		$num_reg = 0;
		$num_merc = 0;
		Notifications::message("getLandUnits.inLocation(".Map::getSpaceName($spaceId).") = ".count($inLocation));
		foreach($inLocation as $token){

			if(Map::bolIsLandUnit($token)){
				if($power == "" || $token[TokenAttributes::power] == $power){
					$res[] = $token;
					if($token[TokenAttributes::flipped] == ""){
						$num_reg += $token[TokenAttributes::strength];
					}else{
						$num_merc += $token[TokenAttributes::strength];
					}
				}
			}
		}
		Notifications::message("getLandUnits.inLocation(".Map::getSpaceName($spaceId).") = count(token) = ".count($res)."{reg =>".$num_reg.", merc=>".$num_merc.");");
		return $res;
	}

	/**
	 * @param int $spaceID element of generated_constants.SpaceIDs
	 * @return [int $num_reg, int $num_merc] array with the summed unit strength of all (regular units, merc/cav units) that belong to $power (or all powers, when no $power is passed). 
	 */
	public static function getUnitCount(int $spaceId, String $power = "") : array{
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		$num_reg = 0;
		$num_merc = 0;
		Notifications::message("getLandUnits.inLocation(".Map::getSpaceName($spaceId).") = ".count($inLocation));
		foreach($inLocation as $token){
			//Notifications::message("token = ".Utils::varToString($token));
			if(in_array(tokenTypeIDs::UNITS, $token["types"]) && in_array(tokenTypeIDs::MILITARY, $token["types"])){
				if($power == "" || $token["power"] == $power){
					if($token["flipped"] == ""){
						$num_reg += $token["strength"];
					}else{
						$num_merc += $token["strength"];
					}
				}
			}
		}
		Notifications::message("getLandUnits.inLocation(".Map::getSpaceName($spaceId).") = {reg =>".$num_reg.", merc=>".$num_merc."};");
		return [$num_reg, $num_merc];
	}

	/**
	 * @param int $spaceID element of generated_constants.SpaceIDs
	 * @param string $power element of constants.Powers
	 * @return [array of all leaders (of power $power or all powers) in $spaceId, max battle Rating of those leaders, total command rating of the two highest leaders];
	 */
	public static function getLeader(int $spaceId, String $power = "") : array{
		$res = array();
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		$battleRating = 0;
		$commandRating = [4, 0]; // here it is set that you can move 4 units without leader (and in one other location). Ever heard about good code quality?
		$intTokenCommandRating = 0;
		Notifications::message("getLeader.inLocation(".Map::getSpaceName($spaceId).")");
		foreach($inLocation as $token){
			//Notifications::message("token = ".Utils::varToString($token));
			if(in_array(tokenTypeIDs::LEADER, $token[TokenAttributes::types]) && ($power == "" || $power == $token[TokenAttributes::power])){
				$res[] = $token;
				$intTokenCommandRating = intval($token[TokenAttributes::command_rating]);
				if($intTokenCommandRating > $commandRating[0]){
					$commandRating[1] = $commandRating[0];
					$commandRating[0] = $intTokenCommandRating;
				}else{
					if($intTokenCommandRating > $commandRating[1]){
						$commandRating[1] = $intTokenCommandRating;
					}
				}
				$battleRating = max($battleRating, $token[TokenAttributes::battle_rating]);
			}
		}
		Notifications::message("getLeader.inLocation(".Map::getSpaceName($spaceId).") = count(token) = ".count($res)."{combat =>".$battleRating.", command=>".($commandRating[0]+$commandRating[1]).");");
		return [$res, $battleRating, $commandRating[0]+$commandRating[1]];
	}

	/**
	 * check if it possible to have a stack of $count land units with $supply tokens available
	 * @param array $supply [$strength => number of $strength tokens] for $strength in [1, 2, 4, 6]
	 */
	private static function bolLandUnitCountPossible(array $supply, int $count) : bool{
		foreach([6, 4, 2, 1] as $i){
			while($count >= $i && $supply[$i] >= 0){
				$count -= $i;
				$supply[$i] -= 1;
			}
		}
		return $count == 0;
	}
	/**
	* check that enough land units tokens are in supply, and that $spaceId is valid target. (home power and no unrest or enemy units)
	* @param int $spaceID element of generated_constants.SpaceIDs
	* @param String $power element of constants.Powers
	* @param int $count number of land units to add (might be negative to remove land units instead.)
	* @param int $type element of constants.UnitTypes
	* @return int maximum number of land units, so that adding that count to $space would be valid (and number not greater than $count).
	*/
	public static function bolMayAddLandUnits(int $spaceId, String $power, int $count, int $type) : int{
		$space = Game::get()->spaces[$spaceId];
		if($space["home_power"] != $power || Map::bolGetSpaceIsInUnrest($spaceId)){
			return 0;
		}
		// contains enemy units
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		foreach($tokens as $token){
			if($token["type"] == tokenTypeIDs::UNITS && Diplomacy::IsAtWar($power, $token["power"])){
				return 0;
			}
		}

		//supply contains enough land units:
		$supply = Map::getLandUnitsInSupply($power);
		//TODO getLandUnits returns array of all tokens.
		//getUnitsCount gets count of regular/merc units
		//dont now if there is a method to get the count i need here.
		$already_there = Map::getLandUnitsInSpace($spaceId, $power, $type);
		//TODO supply = [1=>0, 2=>1, 4=>1, 6=>0]
		//already_there = [1=>0, 2=>1, 4=>0, 6=>0]
		
		foreach([1, 2, 4, 6] as $i){
			$supply[$i] += $already_there[$i];
			$count += $already_there[$i] * $i;
		}
		while(!map::bolLandUnitCountPossible($supply, $count)){
			$count--;
			
		}
		return $count;
	}

	/**
	 * return true if $power can add $count naval squadrons in $spaceId
	 */
	public static function bolMayAddShips(int $spaceId, String $power, int $count){
		$space = Game::get()->spaces[$spaceId];
		$supply = Map::intGetShipsInSupply($power);

		if(count($space["seazones"]) == 0){
			// spaceId has no harbour -> cant build ships
			return false;
		}
		if($supply < $count){
			return false;
		}
		
		if($space["home_power"] != $power || Map::bolGetSpaceIsInUnrest($spaceId)){
			return false;
		}
		// contains enemy units
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		foreach($tokens as $token){
			if($token["type"] == tokenTypeIDs::UNITS && Diplomacy::IsAtWar($power, $token["power"])){
				return false;
			}
		}
		return true;
	}

	/**
	* moves tokens from supply to $spaceId, so that the total strength of $type units of $power in $spaceId increases by $count. Exchanges tokens to use the highest denomination possible
	* @param int $spaceID element of generated_constants.SpaceIDs
	* @param String $power element of constants.Powers
	* @param int $count mumber of land units to add (may be negative to remove land units)
	* @param int $type element of if($power <> Powers::Ottoman, {UnitTypes::REGULAR, UnitTypes::MERC}, {UnitTypes::REGULAR, UnitTypes::CAV})
	*/
    public static function addLandunits(int $spaceId, String $power, int $count, int $type) : void{
		//Add Landunits from supply to location
		//$spaceId As ?NumericString?
		//$power As String From constans::Powers
		//$count As int, total strength of land units to add
		//$type As int from constants::UnitTypes
		Notifications::message("call Map::addLandUnits(".Map::getSpaceName($spaceId).", ".$power.", ".$count.", ".$type==UnitTypes::REGULAR?"regular":"merc");
		$already_there = array(1=>0, 2=>0, 4=>0, 6=>0);
		$already_there_units = Map::getLandUnits($spaceId);
		$target_mix = array(1=>0, 2=>0, 4=>0, 6=>0);
		$total_strength = $count;
		$flipped = "";

		//if minor power: select front/back to match the requested count, throw error if type != REGULAR
		if($type == UnitTypes::REGULAR){//if major power.
			$side = strval(TokenSides::FRONT);
			$flipped = "";
		}elseif($type == UnitTypes::MERC ||  $type == UnitTypes::CAV){
			$side = strval(TokenSides::BACK);
			$flipped = "flipped";
		}else{
			throw new UserException("invalid unit type in Map::addLandUnits: ".Utils::varToString($type));
		}

		foreach($already_there_units as $landUnit){
			if($landUnit["flipped"] == $flipped){
				$already_there[$landUnit["strength"]] += 1;
				$total_strength += $landUnit["strength"];
			}
		}
		foreach(array(6, 4, 2, 1) as $denomination){
			while($total_strength >= $denomination){
				$target_mix[$denomination] += 1;
				$total_strength -= $denomination;
			}
		}
		
		Notifications::message("addLandUnits: existing_mix = ".Utils::varToString($already_there).", target_mix = ".Utils::varToString($target_mix).", total_strength = ".$total_strength);

		foreach(array(6, 4, 2, 1) as $denomination){
			while($target_mix[$denomination] > $already_there[$denomination]){
				$already_there[$denomination] += 1;
				
				Notifications::message("add unit of strength ".$denomination." to place ");
				$buy_id = strval(Game::get()->getPowerUnits()[$power][$type][$denomination]); // buy_id element of LandUnitTokens or NavalUnitTokens

				$token = Tokens::pickOneForLocation(['supply', $power, $buy_id], Locationtypes::space."_".$spaceId, $side);
				if ($token == null) {
					if($denomination == 6){
						$target_mix[6]--;
						$target_mix[4] += 1;
						$target_mix[2] += 1;
					}
					if($denomination == 4){
						$target_mix[4]--;
						$target_mix[2] += 2;
					}
					if($denomination == 2){
						$target_mix[2]--;
						$target_mix[1] += 2;
					}
					if($denomination == 1){
						throw new UserException("You are out of Unit tokens. TODO show supply somewhere");
					}
				}else{
					Notifications::notif_buyUnit(Players::getFromPower($power), $token, Spaces::getByID($spaceId));
				}
			}
			while($target_mix[$denomination] < $already_there[$denomination]){
				$already_there[$denomination] -= 1;
				// move a unit of strength $denomination and flipped fitting with $type from $spaceID to supply
				// TODO notification to move token 
				$buy_id = strval(Game::get()->getPowerUnits()[$power][$type][$denomination]);
				
				foreach($already_there_units as $landUnit){
					if($landUnit["type"] == $buy_id && $landUnit["flipped"] == $flipped){
						Tokens::move([$landUnit["id"]], ['supply', $power, $buy_id]);
						Notifications::notif_destroyUnits(Players::getFromPower($power), $landUnit, Spaces::getByID($spaceId));
						break;
					}
				}
			}
		}
	}

	/**
	* moves tokens from supply to $spaceId, so that the total strength of $type units of $power in $spaceId increases by $count. Exchanges tokens to use the highest denomination possible
	* @param int $spaceID element of generated_constants.SpaceIDs
	* @param String $power element of constants.Powers
	* @param int $count mumber of land units to remove (may be positive to add land units)
	* @param int $type element of if($power <> Powers::Ottoman, {UnitTypes::REGULAR, UnitTypes::MERC}, {UnitTypes::REGULAR, UnitTypes::CAV})
	*/
	public static function removeLandUnits(int $spaceId, String $power, int $count, int $type) : void{
		//TODO failed when 1 strg6, 1 strg4, 1 strg2 and 1 ship was in place. (removed 3)
		Map::addLandunits($spaceId, $power, -$count, $type); // not realy neccesary, but might want to change the notifications or something in the future.
	}

	/**
	 * TODO do not always add all leaders to formation.
	 * @param int $spaceID element of generated_constants.SpaceIDs
	 * @param int $intRegularCount number of regulars to add to formation
	 * @param int $intMercCount number of Mercenaries to add to formation
	 * @param String $power the power owning the leaders and units of that formation
	 * @return Formation a formation containing all leaders of $power in $spaceID and the correct number of regulars and Mercenaries
	 */
	public static function getFormation(int $spaceId, int $intRegularCount, int $intMercCount, $power="") : ?Formation{
		//returns an Formation from that space, containing all Leaders present.
		if($power == ""){
			$power = Map::getPoliticalControl($spaceId);
		}
		$landUnits = Map::getLandUnits($spaceId, $power);
		$leaders = Map::getLeader($spaceId, $power);

		if($leaders[2] < $intRegularCount + $intMercCount){
			//cant make Formation
			Notifications::message("cant create Formation: to many units.");
			return null;
		}
		
		$formation = array();
		foreach($leaders[0] as $leader){
			$formation[] = $leader;
		}

		//try to fill Land untis from already there, swap to lower denominations if neccesary.
		Notifications::message("getFormation from space ".$spaceId);
		foreach($landUnits as $Unit){
			$formation[] = $Unit;
			Notifications::message(Utils::varToString($Unit));
		}
		if(Count($formation) > 0){
			return new Formation($formation);
		}else{
			return null;
		}
	}

	public static function getMoveValidCost(Formation $formation, int $spaceIdTo, $power) : int{
		//return -1 if move is invalid.
		//TODO. realy big todo
		$spaceFrom = Game::get()->spaces[$formation->getSpaceId()];
		$spaceTo = Game::get()->spaces[$spaceIdTo];
		$cp = -1;

		/*
		All land units and army leaders being moved must start the action
		in the same space and it must be permissible to move them in a
		single formation

		No army leader or unit may participate in a Move action if it was
		part of a formation that lost a field battle earlier in the impulse.
		*/
		if(!$formation->bolMayMove()){
			return -1;
		}


		// The destination must be adjacent to the formation’s current space. (Land movement procedure step 2) (kind of wird that this is not listed in 13.1 Land movement restrictions?)
		if(in_array($spaceIdTo, $spaceFrom["connections"], true)){
			$cp = 1;
		}
		if(in_array($spaceIdTo, $spaceFrom["passes"], true)){
			$cp = 2;
		}
		//TODO check seazone
		if($cp < 0){
			return -1;
		}

		$powerControllingTargetSpace = Map::getPoliticalControl($spaceIdTo);
		// Formations may always move into a space controlled by their power or into an independent space. 
		if($powerControllingTargetSpace == $power || $powerControllingTargetSpace == Powers::OTHER){
			return $cp;
		}
		//A formation may only move into a space controlled by another power if either:
			//he active power is at war with the power controlling the destination space, or
			//the active power is allied with the power controlling the destination space.
			// is equivalent to: if not at war or not allied: may not move.
			// Am Im the only one who finds it wird to talk about the active power here, instead of the power owning the formation? even though they are always the same.
		if(Diplomacy::IsNeutral($power, $powerControllingTargetSpace)){
			return -1;
		}


		//formations may not move into a space containing land units from another power unless the space satisfies one of these conditions:
		$landUnitsIntargetSpace = Map::getLandUnits($spaceIdTo);
		if(count($landUnitsIntargetSpace) == 0){
			return $cp;
		}else{
			if(!Map::bolGetSpaceIsSieged($spaceIdTo)){
				//all units in the space are allies of the active power (and this is not a fortified space where one ally has another ally under siege),
				$bolAllAllied = true;
				foreach($landUnitsIntargetSpace as $landUnit){
					if(!Diplomacy::IsAllied($power, $landUnit[TokenAttributes::power])){
						$bolAllAllied = false;
					}
				}
				if($bolAllAllied){
					return $cp;
				}
				//all units in the space are enemies of the active power (and thisis not a fortified space where one enemy has another enemy under siege)
				$bolAllAllied = true;
				foreach($landUnitsIntargetSpace as $landUnit){
					if(!Diplomacy::IsAtWar($power, $landUnit[TokenAttributes::power])){
						$bolAllAllied = false;
					}
				}
				if($bolAllAllied){
					return $cp;
				}
			}
			/*
			This is a space controlled by an enemy power and all units in
			the space are either from that enemy power or allied to them.
			When resolving this movement, treat the units already in the
			space as “enemy units” for all purposes. Adjacent units from
			a power with units in the space are also considered as enemy
			units and may intercept into the space if desired.
			*/
			if(Diplomacy::IsAtWar($power, $powerControllingTargetSpace)){
				$bolAllEnemyOrAllied = true;
				foreach($landUnitsIntargetSpace as $landUnit){
					if($landUnit[TokenAttributes::power] != $powerControllingTargetSpace && !Diplomacy::IsAllied($landUnit[TokenAttributes::power], $powerControllingTargetSpace)){
						$bolAllEnemyOrAllied = false;
					}
				}
				if($bolAllEnemyOrAllied){
					//TODO special case: all units in that space are treated as enemy
					return $cp;
				}
			}
			/*
			this is a fortified space under siege where either: (a) all units
			inside the fortification are allied to the active power and all
			besieging units are enemies of the active power, or (b) all units
			inside the fortification are enemies of the active power and all
			besieging units are allied to the active power.
			*/
			//TODO we currently dont store witch units are inside the fortification and witch arent.
			// But I think that can be reconstructed from the alliances and who controlls that place.

			/*
			Independent regulars in an independent key (Section 22.6) never
			prevent the entry of a formation, though that formation might have
			to fight off troops from an enemy power before being able to siege
			the independent key.
			*/

			/*
			One or more army leaders may move without accompanying land
			units as long as they don’t enter a space controlled by an enemy
			power or containing enemy units. If an army leader is ever alone
			in an unfortified space when enemy land units enter due to enemy
			movement, retreat, or interception, that leader is captured. Place
			the captured leader on the enemy power card. He may be regained
			in the Diplomacy Phase of an upcoming turn (see Section 9).
			*/
		}
		return $cp;
	}

	public static function moveFormation(Formation $formation, int $spaceIdTo) : void{
		//$spaceIdFrom element of SpaceIDs
		//$spaceIdTo element of SpaceIDs
        //$formation Formation
		// this just moves the formation without any checks whatsoever.
		// please check with Map::getMoveValidCost($formation, $spaceidTo) > 0 that the move is valid.
		if($formation == null){
			return;
		}
		$ids = $formation->getTokenIds();
		$power = $formation->getPower();
		$from_location = $formation->getSpaceId();

		Tokens::movePreserveState($ids, "map_space_".$spaceIdTo);
		if(Map::bolGetSpaceIsFortified($spaceIdTo) && Map::getPoliticalControl($spaceIdTo) != $power){
			# set the mayMove to false
			# todo state may not be null?
			Tokens::setState($ids, mayMove:false);
		}
		Notifications::notif_moveFormation(Players::getFromPower($formation->power), $ids, $from_location, $spaceIdTo, Map::getSpaceName($from_location), Map::getSpaceName($spaceIdTo), $formation->unit_strength);
	}

	public static function moveLeader($spaceIdTo, $leaderId){
		$leader = Game::get()->tokens[$leaderId];
		$leaderDbId = $leader[TokenAttributes::db_id];
		//TODO adding leader from Prision or other map space doesnt work.
		$leaderToken = Tokens::get($leaderDbId);
		Notifications::message("leaderToken=".Utils::varToString($leaderToken));
		
		$bolMoveWasSuccess = Tokens::movePreserveState([$leaderDbId], "map_space_".$spaceIdTo);
		if($bolMoveWasSuccess){
			$prevSpaceId = $leaderToken[TokenAttributes::location_id];
			//TODO notification doesnt work.
			//Notifications::notif_moveFormation(Players::getFromPower($leader[TokenAttributes::power]), [$leader[TokenAttributes::db_id]], $prevSpaceId, $spaceIdTo, Map::getSpaceName($prevSpaceId), Map::getSpaceName($spaceIdTo), 0);
			Notifications::notif_moveLeader(Players::getFromPower($leader[TokenAttributes::power]), $leader[TokenAttributes::db_id], $leaderToken[TokenAttributes::name], $prevSpaceId, $spaceIdTo, ($prevSpaceId == null)?'prision of '.Locationtypes::prision_name[$leaderToken[TokenAttributes::location_type]]:Map::getSpaceName($prevSpaceId), Map::getSpaceName($spaceIdTo));
		}else{
			Notifications::message("Could not add Leader".$leader[TokenAttributes::name]." to space ".Map::getSpaceName($spaceIdTo));
		}
	}

    public static function addLeader(int $spaceId, $leaderId){
        // leader element of generated_constants::tokenIDs_LEADER
		$leader = Game::get()->tokens[$leaderId];
		Notifications::message("leader = ".Utils::varToString($leader));
		$tokens = Tokens::pickForLocation(1, ['supply', $leader[TokenAttributes::power], $leaderId], ['map', 'space', $spaceId]);
		// would be very surpried if $tokens was more than one.
		// but might be 0 if leader is not in supply.
		if(sizeof($tokens) == 0){
			Notifications::message("cant add leader ".$leader[TokenAttributes::name]." to space ".Map::getSpaceName($spaceId).": not in supply.");
			$leaderId = $leader[TokenAttributes::db_id];
			//TODO adding leader from Prision or other map space doesnt work.
			$leaderToken = Tokens::get($leaderId);
			Notifications::message("leaderToken=".Utils::varToString($leaderToken));
			
			$bolMoveWasSuccess = Tokens::movePreserveState([$leaderId], "map_space_".$spaceId);
			if($bolMoveWasSuccess){
				$prevSpaceId = $leaderToken[TokenAttributes::location_id];
				//TODO notification doesnt work.
				Notifications::notif_moveLeader(Players::getFromPower($leader[TokenAttributes::power]), $leaderToken[TokenAttributes::db_id], $leaderToken[TokenAttributes::name], $prevSpaceId, $spaceId, ($prevSpaceId == null)?'prision of '.Locationtypes::prision_name[$leaderToken[TokenAttributes::location_type]]:Map::getSpaceName($prevSpaceId), Map::getSpaceName($spaceId));
			}else{
				Notifications::message("Could not add Leader".$leader[TokenAttributes::name]." to space ".Map::getSpaceName($spaceId));
			}
		}else{
			// added from supply -> notif new leader.
			foreach($tokens as $token){
				Notifications::notif_addLeader($spaceId, $$leader[TokenAttributes::db_id], Map::getSpaceName($spaceId), $token, Players::getFromPower($token[TokenAttributes::power]));
			}
		}
		
	}

    public static function captureLeader($spaceId, $power){
        //move all leaders ont that space that are not from $power to prision of $power. (they just won a field battle, siege or just moved there)
		$ids = array();
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		foreach($inLocation as $token){
			//Notifications::message("token = ".Utils::varToString($token));
			if(in_array(tokenTypeIDs::LEADER, $token["types"]) && $power != $token["power"]){
				$ids[] = $token[TokenAttributes::id];
				Notifications::notif_moveLeader(Players::getFromPower($token[TokenAttributes::power]), $token[TokenAttributes::db_id], $token[TokenAttributes::name], $spaceId, Locationtypes::prision[$power], Map::getSpaceName($spaceId), "prison of ".$power);
			}
		}
		//sets locationId of token to NULL. (and location? to 'prision' and location_type to id of prision.)
		Tokens::move($ids, Locationtypes::prision[$power]);
		
	}

    public static function removeLeader($leaderId){
        //when the leader gets removed from play (because of card effect.)
		$leader = Game::get()->tokens[$leaderId];
		$fromSpace = $leader[TokenAttributes::location_id];
		Tokens::move([$leaderId], ['supply', $leader[TokenAttributes::power], $leaderId]);
		//TODO Notifications.
	}


	Public static function bolIsValidShipDestination($spaceOrSeazoneId){
		if(6000 <=$spaceOrSeazoneId && $spaceOrSeazoneId <= 6013){
			// seazone
			return True;
		}else if(3000 <= $spaceOrSeazoneId && $spaceOrSeazoneId <= 3133){
			//space
			$space = Spaces::getByID($spaceOrSeazoneId);
			return count($space["seazones"]) > 0;
		}else{
			Notifications::message("Invalid space or seazone ID".$spaceOrSeazoneId);
			return False;
		}
	}

	public static function getShips($spaceOrSeazoneId, $power){
		$res = array();
		$spaceName = "";
		if($spaceOrSeazoneId >= 6000){
			$inLocation = Tokens::getInLocation(Locationtypes::seazone."_".$spaceOrSeazoneId);
			$spaceName = Game::get()->seazones[$spaceOrSeazoneId]["name"];
		}else{
			$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceOrSeazoneId);
			$spaceName = Map::getSpaceName($spaceOrSeazoneId);
		}
		
		//TODO $inLocation is empty.
		$num = 0;
		Notifications::message("getNavalUnits.inLocation(".$spaceName.") = ".count($inLocation));
		foreach($inLocation as $token){
			Notifications::message("token = ".Utils::varToString($token));
			//TODO also returns naval units.

			if(in_array(tokenTypeIDs::NAVAL, $token["types"]) && in_array(tokenTypeIDs::UNITS, $token["types"])){
				if($power == "" || $token["power"] == $power){
					$res[] = $token;
					$num += 1;
				}
			}
		}
		Notifications::message("getNavalUnits.inLocation(".$spaceName.") = count(token) = ".count($res).", num =>".$num."");
		return $res;
	}

    public static function addShips($spaceId, $power, int $count){
		if(Map::bolIsValidShipDestination($spaceId)){
			$buy_id = strval(Game::get()->getPowerUnits()[$power][UnitTypes::SHIP]); // buy_id element of LandUnitTokens or NavalUnitTokens
		for($intI=0; $intI<$count; $intI++){
			$token = Tokens::pickOneForLocation(['supply', $power, $buy_id], Locationtypes::space."_".$spaceId, strval(TokenSides::FRONT));
			Notifications::notif_buyNavalUnit(Players::getFromPower($power), $token, Spaces::getByID($spaceId));
		}
		}else{
			Notifications::message("space/seazone ".$spaceId." is no valid place for ships.");
		}
	}

    public static function removeShips($seazoneId, $power, int $count){
		$ships = Map::getShips($seazoneId, $power);
		$buy_id = strval(Game::get()->getPowerUnits()[$power][UnitTypes::SHIP]); // buy_id element of LandUnitTokens or NavalUnitTokens
		$ship = $ships(0);
		Tokens::move([$ship["id"]], ['supply', $power, $buy_id]);
		Notifications::notif_destroyUnits(Players::getFromPower($power), $ship, Spaces::getByID($seazoneId));
	}

    public static function moveShips($seazoneIdFrom, $seazoneIdTo, $power, int $count){
		if(map::bolIsValidShipDestination($seazoneIdTo)){
			$ships = Map::getShips($seazoneIdFrom, $power);
			$ids = array();
			$seazoneFromName = "";
				if($seazoneIdFrom < 6000){
					$seazoneFromName = Map::getSpaceName($seazoneIdFrom);
				}else{
					$seazoneFromName = Map::getSeazoneName($seazoneIdFrom);
				}
				$seazoneToName = "";
				if($seazoneIdTo < 6000){
					$seazoneToName = Map::getSpaceName($seazoneIdTo);
				}else{
					$seazoneToName = Map::getSeazoneName($seazoneIdTo);
				}

			Notifications::message("count(ships)".count($ships).", count=".$count);
			if($count <= count($ships)){
				for($intI=0; $intI<$count; $intI++){
					$ids[] = $ships[$intI][TokenAttributes::id];
				}
				Notifications::message("ids=".Utils::varToString($ids));
				if($seazoneIdTo >= 6000){
					Tokens::movePreserveState($ids, "map_seazone_".$seazoneIdTo);
				}else{
					Tokens::movePreserveState($ids, "map_space_".$seazoneIdTo);
				}
				// TODO ships in seazones cant be displayed (because seazones dont realy exist?)
				Notifications::notif_moveNavalFormation(Players::getFromPower($power), $ids, $seazoneIdFrom, $seazoneIdTo, $seazoneFromName, $seazoneToName, $count);
			}else{
				Notifications::message("cant move ".$count." ships when only ".count($ships)." are present in ".$seazoneFromName);
			}
		}else{
			Notifications::message("space/seazone ".$seazoneIdTo." is no valid place for ships.");
		}
	}

    public static function addSeaLeader($SeazoneId, $tokenIDs_LEADER){

	}

    public static function captureSeaLeader($SeazoneId, $power){
        //move all leaders ont that space that are not from $power to prision of $power. (they just won a field battle, siege or just moved there)
        
	}

    public static function removeSeaLeader($SeazoneId, $tokenIDs_LEADER){
        //when the leader gets removed from play (because of card effect.)

	}

	public static function moveSeaLeader($SeazoneIdFrom, $SeazoneIdTo, $tokenIDs_LEADER){

	}
}
