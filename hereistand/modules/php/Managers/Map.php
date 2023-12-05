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
use SpaceTest;
use SpaceTypes;
use tokenTypeIDs;
use tokenIDs_CONTROL;

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
		Notifications::message("control token on space ".Map::getName($spaceID)." = ".Utils::varToString($token));
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
        $token = Tokens::GetControlMarker($spaceID);
		if($token == null){
			$flipped = False; // $flipped <=> new token has to be flipped.
		}else{
			$flipped = $token["flipped"] != "";
		}
		Notifications::message("token = ".Utils::varToString($token));
		if($flipped){
			Notifications::message("flipped = True");	
		}else{
			Notifications::message("flipped = False");
		}

		Map::removeControlToken($spaceID);
		if(Map::getHomePower($spaceID) != $power || $flipped || Map::bolIsKey($spaceID)){
			Map::addControlToken($spaceID, $power);
			$token = Tokens::GetControlMarker($spaceID);
			Notifications::message("Map::setPoliticalControl: added Control Marker ".Utils::varToString($token));
			if($flipped){
				Tokens::setState($token['id'], TokenSides::BACK);
			}else{
				Tokens::setState($token['id'], TokenSides::FRONT);
			}
		}
		//if $spaceID["type"] = captial or key and no square control marker present: add.
		//TODO remove control token if unnecessary
    }

    public static function getReligiosControl($spaceID){
        // SpaceIDs -> constants::ReligionIDs
		if(map::bolGetSpaceIsInUnrest($spaceID) || Map::getHomePower($spaceID) == Powers::OTTOMAN){
			return ReligionIDs::OTHER;
		}

		$token = Tokens::GetControlMarker($spaceID);
		Notifications::message("control token on space ".Map::getName($spaceID)." = ".Utils::varToString($token));
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
		$token = Tokens::GetControlMarker($spaceID);
		if($power == Powers::PROTESTANT && $homePower == Powers::PROTESTANT){
			if($religion == ReligionIDs::REFORMED && $token != null){
				Map::removeControlToken($spaceID);
			}
			if($religion == ReligionIDs::CATHOLIC){
				if($token == null){
					Map::addControlToken($spaceID, Powers::PROTESTANT);
					$token = Tokens::GetControlMarker($spaceID);
				}
				if($religion == ReligionIDs::REFORMED){
					Tokens::setState($token['id'], TokenSides::BACK);
				}else{
					Tokens::setState($token['id'], TokenSides::FRONT);
				}
			}
		}else{
			//no protestand home space involved.
			if($religion == ReligionIDs::REFORMED){
				if($token == null){
					Map::addControlToken($spaceID, $homePower);
					$token = Tokens::GetControlMarker($spaceID);
				}
				Tokens::setState($token['id'], TokenSides::BACK);
			}else{
				if($token != null){
					if($power == $homePower){
						Map::removeControlToken($spaceID);
					}else{
						Tokens::setState($token['id'], TokenSides::FRONT);
					}
				}
			}
		}
		Notifications::notif_setReligion(Map::getName($spaceID), $religion);
    }

    public static function bolGetSpaceIsFortified($spaceID) : bool{
        // SpaceID -> boolean
        //returns true for keys, fortresses, elektrorates or spaces containing the fortress marker.
        return false;
    }

    public static function bolGetSpaceIsInUnrest($spaceID) : bool{
        return false;
    }

    public static function bolGetSpaceIsSieged($spaceID) : bool{
        return false;
    }

    public static function addLandunits($spaceId, $power, int $count, $type) : void{
		//Add Landunits from supply to location
		//$spaceId As ?NumericString?
		//$power As String From constans::Powers
		//$count As int, total strength of land units to add
		//$type As int from constants::UnitTypes

		$buy_id = strval(Game::get()->getPowerUnits()[$power][UnitTypes::REGULAR][$count]); // buy_id element of LandUnitTokens or NavalUnitTokens
		if($type == UnitTypes::REGULAR){//if major power.
			$side = strval(TokenSides::FRONT);
		}elseif($type == UnitTypes::MERC ||  $type == UnitTypes::CAV){
			$side = strval(TokenSides::BACK);
		}else{
			throw new UserException("invalid unit type in Map::addLandUnits: ".Utils::varToString($type));
		}
		//if minor power: select front/back to match the requested count, throw error if type != REGULAR
		//$already_there = number of units with type=$type on $spaceId
		//calculate "optimal" counter mix to represent $count + $already_there
		//place these counters and remove the units already there.
		$token = Tokens::pickOneForLocation(['supply', $power, $buy_id], ['board', 'space', $spaceId], $side);
		if ($token == null) {
			throw new UserException("You are out of buy_id=" . Utils::varToString($buy_id) . " tokens.");
		}

		//Notification
		
		//Notifications::message("Space of id".$spaceId." = ".Utils::varToString(Spaces::getByID($spaceId)));
		Notifications::notif_buyUnit(Players::getFromPower($power), $token, $type, Spaces::getByID($spaceId));
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
