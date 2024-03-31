<?php
declare(strict_types=1);
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use Powers;
use UnitTypes;
use tokenIDs_UNITS;
use TokenSides;

class Map extends \HIS\Helpers\Pieces {
    public static function getPoliticalControl($SpaceID){
        // SpaceIDs -> constants::Powers
        return Powers::OTTOMAN;
    }

    public static function setPoliticalControl($SpaceID, $power) : void{
        
    }

    public static function getReligiosControl($SpaceID){
        // SpaceIDs -> constants::ReligionIDs
    }

    public static function setReligiosControl($SpaceID, $power) : void{
        
    }

    public static function bolGetSpaceIsFortified($SpaceID) : bool{
        // SpaceID -> boolean
        //returns true for keys, fortresses, elektrorates or spaces containing the fortress marker.
        return false;
    }

    public static function bolGetSpaceIsInUnrest($SpaceID) : bool{
        return false;
    }

    public static function bolGetSpaceIsSieged($SpaceID) : bool{
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
