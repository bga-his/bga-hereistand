<?php
declare(strict_types=1);
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
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
		$token_add = Tokens::GetControlMarker($spaceID); 
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
			if($token["type"] == tokenIDs::UNREST){
				return true;
			}
		}
        return false;
    }

	public static function setUnrest($spaceID, $isInRest){
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
					return;
				}
			}
		}
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

	public static function getLandUnits($spaceId, $power = "") : array{
		$res = array();
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		$num_reg = 0;
		$num_merc = 0;
		Notifications::message("getLandUnits.inLocation(".Map::getName($spaceId).") = ".count($inLocation));
		foreach($inLocation as $token){
			Notifications::message("token = ".Utils::varToString($token));
			//TODO also returns naval units.

			if(in_array(tokenTypeIDs::UNITS, $token["types"]) && in_array(tokenTypeIDs::MILITARY, $token["types"])){
				if($power == "" || $token["power"] == $power){
					$res[] = $token;
					if($token["flipped"] == ""){
						$num_reg += $token["strength"];
					}else{
						$num_merc += $token["strength"];
					}
				}
			}
		}
		Notifications::message("getLandUnits.inLocation(".Map::getName($spaceId).") = count(token) = ".count($res)."{reg =>".$num_reg.", merc=>".$num_merc.");");
		return $res;
	}

	public static function getUnitCount($spaceId, $power = "") : array{
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		$num_reg = 0;
		$num_merc = 0;
		Notifications::message("getLandUnits.inLocation(".Map::getName($spaceId).") = ".count($inLocation));
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
		Notifications::message("getLandUnits.inLocation(".Map::getName($spaceId).") = {reg =>".$num_reg.", merc=>".$num_merc."};");
		return [$num_reg, $num_merc];
	}

	public static function getLeader($spaceId, $power = "") : array{
		$res = array();
		$inLocation = Tokens::getInLocation(Locationtypes::space."_".$spaceId);
		$battleRating = 0;
		$commandRating = [4, 0]; // here it is set that you can move 4 units without leader (and in one other location). Ever heard about good code quality?
		Notifications::message("getLeader.inLocation(".Map::getName($spaceId).")");
		foreach($inLocation as $token){
			//Notifications::message("token = ".Utils::varToString($token));
			if(in_array(tokenTypeIDs::LEADER, $token["types"]) && ($power == "" || $power == $token["power"])){
				$res[] = $token;
				if($token["command_rating"] > $commandRating[0]){
					$commandRating[1] = $commandRating[0];
					$commandRating[0] = $token["command_rating"];
				}else{
					if($token["command_rating"] > $commandRating[1]){
						$commandRating[1] = $token["command_rating"];
					}
				}
				$battleRating = max($battleRating, $token["battle_rating"]);
			}
		}
		Notifications::message("getLeader.inLocation(".Map::getName($spaceId).") = count(token) = ".count($res)."{combat =>".$battleRating.", command=>".($commandRating[0]+$commandRating[1]).");");
		return [$res, $battleRating, $commandRating[0]+$commandRating[1]];
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

	public static function removeLandUnits($spaceId, $power, $count, $type){
		//TODO failed when 1 strg6, 1 strg4, 1 strg2 and 1 ship was in place. (removed 3)
		Map::addLandunits($spaceId, $power, -$count, $type); // not realy neccesary, but might want to change the notifications or something in the future.
	}

	public static function getFormation($spaceId, $intRegularCount, $intMercCount, $power=""){
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
		foreach($landUnits as $Unit){
			$formation[] = $Unit;
		}
		return $formation;
	}

	public static function isFormationValid($formation) : bool{
		//$formation array of LandUnit|Leader
		//formation is valid if: only land units and leaders, all in same space, all from same major power (plus minor power allies), strength of land units smaller or equal than max(4, admin rating of two leaders)
		if(count($formation) == 0){
			return true;
		}
		
		$power = $formation[0][TokenAttributes::power]; // element of Powers
		$location = $formation[0][TokenAttributes::location_id]; // element of SpaceIDs
		$locationType = $formation[0][TokenAttributes::location_type]; // element of SpaceIDs
		$strength = 0;
		$admin = [4, 0];
		foreach($formation as $munit){
			if($munit[TokenAttributes::power] != $power){
				//TODO minor power allied with major power
				return false;
			}
			if($munit[TokenAttributes::location_id] != $location || $munit[TokenAttributes::location_type] != $locationType){
				return false;
			}
			$types = $munit[TokenAttributes::types];
			if(in_array(tokenTypeIDs::MILITARY, $types, true) && in_array(tokenTypeIDs::UNITS, $types, true)){
				//$munit is military unit
				$strength += intval($munit[TokenAttributes::strength]);
			}elseif(in_array(tokenTypeIDs::MILITARY, $types, true) && in_array(tokenTypeIDs::LEADER, $types, true)){
				//$muint is leader
				if($munit[TokenAttributes::admin_rating] > $admin[0]){
					$admin[1] = $admin[0];
					$admin[0] = intval($munit[TokenAttributes::admin_rating]);
				}elseif($munit[TokenAttributes::admin_rating] > $admin[1]){
					$admin[1] = intval($munit[TokenAttributes::admin_rating]);
				}
			}else{
				//token is invalid.
				return false;
			}
		}
		return $admin[0] + $admin[1] > $strength;
	}

	public static function getMoveValidCost(int $spaceIdFrom, int $spaceIdTo, $power) : int{
		//return -1 if move is invalid.
		//TODO. realy big todo
		$spaceFrom = Game::get()->spaces[$spaceIdFrom];
		$spaceTo = Game::get()->spaces[$spaceIdTo];
		$cp = -1;

		//All land units and army leaders being moved must start the action
		//in the same space and it must be permissible to move them in a
		//single formation -> check with Map:.isFormationValid


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
		if(!Diplomacy::IsAtWar($power, $powerControllingTargetSpace) && !Diplomacy::IsAllied($power, $powerControllingTargetSpace)){
			return -1;
		}

		/*
		No army leader or unit may participate in a Move action if it was
		part of a formation that lost a field battle earlier in the impulse.
		*/
		//TODO it currently doesnt get stored if a formation lost a field battle in this turn.

		/*
		No army leader or unit may participate in a Move action if it
		occupies an enemy fortified space that their power placed under
		siege (Section 15) earlier in the impulse.
		*/
		//TODO it currently doesnt get stored if a formation put a space under siege in this turn.

		//ormations may not move into a space containing land units from another power unless the space satisfies one of these conditions:
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

	public static function moveFormation($formation, int $spaceIdTo){
		//$spaceIdFrom element of SpaceIDs
		//$spaceIdTo element of SpaceIDs
        //$formation list of LandUnit|Leader ?
		// this just moves the formation without any checks whatsoever.
		// please check formation valid and move valid if applicable.
		if($formation == null){
			return;
		}
		$ids = array();
		$strength = 0;
		$from_location = $formation[0][TokenAttributes::location_id];
		foreach($formation as $token){
			$ids[] = $token[TokenAttributes::id];
			$sides[$token[TokenAttributes::id]] = $token[TokenAttributes::flipped];
			if(in_array(tokenTypeIDs::UNITS, $token[TokenAttributes::types])){
				$strength += $token[TokenAttributes::strength];
			}
		}
		Tokens::movePreserveState($ids, "map_space_".$spaceIdTo);
		Notifications::notif_moveFormation(Players::getFromPower($formation[0]["power"]), $ids, $from_location, $spaceIdTo, Map::getName($from_location), Map::getName(($spaceIdTo)), $strength);
	}

    public static function addLeader(int $spaceId, $leaderId){
        // leader element of generated_constants::tokenIDs_LEADER
		$leader = Game::get()->tokens[$leaderId];
		$tokens = Tokens::pickForLocation(1, ['supply', $leader[TokenAttributes::power], $leaderId], ['map', 'space', $spaceId]);
		// would be very surpried if $tokens was more than one.
		// but might be 0 if leader is not in supply.
		if(sizeof($tokens) == 0){
			$leaderId = $leader[TokenAttributes::db_id];
			//TODO adding leader from Prision or other map space doesnt work.
			$leaderToken = Tokens::get($leaderId);
			Notifications::message("leaderToken=".Utils::varToString($leaderToken));
			
			$bolMoveWasSuccess = Tokens::movePreserveState([$leaderId], "map_space_".$spaceId);
			if(!$bolMoveWasSuccess){
				Notifications::message("Could not add Leader".$leader[TokenAttributes::name]." to space ".Map::getName($spaceId));
			}
			$prevSpaceId = $leaderToken[TokenAttributes::location_id];
			//TODO notification doesnt work.
			Notifications::notif_moveLeader(Players::getFromPower($leader[TokenAttributes::power]), $leaderToken, $leaderToken[TokenAttributes::name], $prevSpaceId, $spaceId, ($prevSpaceId == null)?'prision of '.Locationtypes::prision_name[$leaderToken[TokenAttributes::location_type]]:Map::getName($prevSpaceId), Map::getName($spaceId));
		}else{
			// added from supply -> notif new leader.
			foreach($tokens as $token){
				Notifications::notif_addLeader($spaceId, $leaderId, Map::getName($spaceId), $token, Players::getFromPower($token[TokenAttributes::power]));
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
				Notifications::notif_moveLeader(Players::getFromPower($token[TokenAttributes::power]), $token, $token[TokenAttributes::name], $spaceId, Locationtypes::prision[$power], Map::getName($spaceId), "prison of ".$power);
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
