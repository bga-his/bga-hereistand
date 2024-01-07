<?php
declare(strict_types=1);
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use Powers;
use ReligionIDs;
use UnitTypes;
use TokenSides;
use Locationtypes;
use SpaceTypes;
use tokenTypeIDs;

class Map extends \HIS\Helpers\Pieces {
	public static function getHomePower($spaceID){
		//generated_constants::spaceIDs -> constants::Powers
		return Game::get()->spaces[$spaceID]["home_power"];
	}
	public static function getName($spaceID){
		return Game::get()->spaces[$spaceID]["name"];
	}
	public static function bolIsKey($spaceID){
		return Game::get()->spaces[$spaceID]["type"] == SpaceTypes::SPACE_CAPITAL || Game::get()->spaces[$spaceID]["type"] == SpaceTypes::SPACE_KEY;
	}
	public static function strReligionIdToName($relID){
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

	public static function getSCMPowerCardLocation($power, bool $firstOccupied){
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

	public static function addControlToken($spaceID, $power){
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

	public static function removeControlToken($spaceID){
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

    public static function getPoliticalControl($spaceID){
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
	public static function setPoliticalControl($spaceID, $power){
		Notifications::message("Map::setPoliticalControl(".Map::getName($spaceID).", ".$power.");");
        $token_original = Tokens::GetControlMarker($spaceID);
		if($token_original == null){
			$flipped = Map::getHomePower($spaceID) == Powers::PROTESTANT; // $flipped <=> new token has to be flipped.
		}else{
			$flipped = $token_original["flipped"] != "";
		}
		Notifications::message("flipped = ".$flipped);

		Map::removeControlToken($spaceID);
		if(Map::getHomePower($spaceID) != $power || $flipped || Map::bolIsKey($spaceID)){
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
			Notifications::notif_setPoliticalControl($spaceID, Map::getName($spaceID), $power, $token_original, $token_add, Map::getSCMPowerCardLocation($token_original["power"], true));
		}else{
			Notifications::notif_setPoliticalControl($spaceID, Map::getName($spaceID), $power, $token_original, $token_add, null);
		}
    }

    public static function getReligiosControl($spaceID){
        // SpaceIDs -> constants::ReligionIDs
		if(map::bolGetSpaceIsInUnrest($spaceID) || Map::getHomePower($spaceID) == Powers::OTTOMAN){
			return ReligionIDs::OTHER;
		}

		$token = Tokens::GetControlMarker($spaceID);
		//Notifications::message("control token on space ".Map::getName($spaceID)." = ".Utils::varToString($token));
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

    public static function setReligiosControl($spaceID, $religion) : void{
		$power = Map::getPoliticalControl($spaceID);
		$homePower = Map::getHomePower($spaceID);
		$token_original = Tokens::GetControlMarker($spaceID);
		Notifications::message("Map::setReligiosControl(".Map::getName($spaceID).", ".Map::strReligionIdToName($religion).");");
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
		$token_add =Tokens::GetControlMarker($spaceID); 
		Notifications::notif_setReligion(Map::getName($spaceID), $spaceID, Map::strReligionIdToName($religion), $token_original, $token_add);
    }

    public static function bolGetSpaceIsFortified($spaceID) : bool{
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

    public static function bolGetSpaceIsInUnrest($spaceID) : bool{
		$tokens = Tokens::getInLocation(Locationtypes::space."_".$spaceID);
		foreach($tokens as $token){
			if($token["type"] == tokenTypeIDs::UNREST_MARKER){
				return true;
			}
		}
        return false;
    }

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

	public static function getLandUnits($spaceId) : array{
		$res = array();
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		$num_reg = 0;
		$num_merc = 0;
		Notifications::message("getLandUnits.inLocation(".Map::getName($spaceId).") = ".count($inLocation));
		foreach($inLocation as $token){
			//Notifications::message("token = ".Utils::varToString($token));
			if(in_array(tokenTypeIDs::UNITS, $token["types"])){
				$res[] = $token;
				if($token["flipped"] == ""){
					$num_reg += $token["strength"];
				}else{
					$num_merc += $token["strength"];
				}
			}
		}
		Notifications::message("getLandUnits.inLocation(".Map::getName($spaceId).") = count(token) = ".count($res)."{reg =>".$num_reg.", merc=>".$num_merc.");");
		return $res;
	}

    public static function addLandunits($spaceId, $power, int $count, $type) : void{
		//Add Landunits from supply to location
		//$spaceId As ?NumericString?
		//$power As String From constans::Powers
		//$count As int, total strength of land units to add
		//$type As int from constants::UnitTypes
		Notifications::message("call Map::addLandUnits(".Map::getName($spaceId).", ".$power.", ".$count.", ".$type==UnitTypes::REGULAR?"regular":"merc");
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
			Notifications::message("LandUnit = ".Utils::varToString($landUnit));
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
					//TODO try to use units of lower denomination instead.
					if($denomination == 6){ //TODO does not work. e.g. already_there[4] = 1, $count = 2, and the 6-token already on board: 
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

	public static function removeLandUnits($spaceId, $power, $count, $type){

	}

	public static function moveFormation($spaceIdFrom, $spaceIdTo, $formation){
        //TODO what datatype is $formation?
	}

    public static function addLeader($spaceId, $leader){
        // leader element of generated_constants::tokenIDs_LEADER

	}

    public static function captureLeader($spaceId, $power){
        //move all leaders ont that space that are not from $power to prision of $power. (they just won a field battle, siege or just moved there)

	}

    public static function removeLeader($spaceId, $leader){
        //when the leader gets removed from play (because of card effect.)

	}

	public static function moveLeader($spaceIdFrom, $spaceIdTo, $leader){

	}

    public static function addShips($seazoneId, $power, int $count){

	}

    public static function removeShips($seazoneId, $power, int $count){

	}

    public static function moveShips($seazoneIdFrom, $seazoneIdTo, $power, int $count){

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
