<?php
namespace HIS\Models;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use HIS\Managers\Diplomacy;
use HIS\Managers\Tokens;
use Locationtypes;
use Powers;
use ReturnTypeWillChange;
use tokenTypeIDs;
use TokenAttributes;
use HIS\Helpers\Collection;
/*
 * Formation: all utility functions concerning a formation
 */

class Formation {
	private $tokens = [];

	public array $landUnits;
	public array $leaders;

	public int $battle_rating;
	public int $admin_rating;
	public int $unit_strength;
	public string $power;

	public function __construct(array $tokens) {
		if(Count($tokens) > 0){
			$this->tokens = $tokens;
			$this->landUnits = [];
			$this->leaders = [];
			$this->unit_strength = 0;
			$this->battle_rating = 0;

			$types = [];
			$admin = [4, 0];
			$intTokenCommandRation = 0;
			Notifications::warn("new Formation(tokens=".Utils::varToString($tokens).")");
			foreach ($this->tokens as $token) {

				$types = $token[TokenAttributes::types];
				if(in_array(tokenTypeIDs::MILITARY, $types, true) && in_array(tokenTypeIDs::LEADER, $types, true)){
					$this->leaders[] = $token;
					$this->battle_rating = max($this->battle_rating, $token[TokenAttributes::battle_rating]);
					$intTokenCommandRation = intval($token[TokenAttributes::command_rating]);

					if($intTokenCommandRation > $admin[0]){
						$admin[1] = $admin[0];
						$admin[0] = $intTokenCommandRation;
					}elseif($intTokenCommandRation > $admin[1]){
						$admin[1] = $intTokenCommandRation;
					}

				}else if(in_array(tokenTypeIDs::MILITARY, $types, true) && in_array(tokenTypeIDs::UNITS, $types, true)){
					$this->landUnits[] = $token;
					$this->unit_strength += $token[TokenAttributes::strength];
				}else{
					throw new UserException("cant add token with type ".Utils::varToString($types)." to Formation.");
				}
			}
			Notifications::warn("new Formation: tokens = ".Utils::varToString($this->tokens));
			$this->admin_rating = $admin[0]+$admin[1];
			$this->power = Diplomacy::GetControllingPower($this->tokens[0][TokenAttributes::power]);
			Notifications::message("new Formation2(tokens=".Utils::varToString($this->tokens));
		}else{
			$this->MakeExceptionThatShowsStacktrace();
		}
	}

	public function isValid() : bool {
		# a formation must have units
		if (Count($this->tokens) == 0) {
			Notifications::warn("Formation is invalid: Count(tokens) = 0");
			return false;
		}

		# all tokens must be in single space
		$spaceId = $this->tokens[0][TokenAttributes::location_id];
		foreach ($this->tokens as $token) {
			if ($token[TokenAttributes::location_id] != $spaceId || $token[TokenAttributes::location_type] != 'space') { # TODO why are the tokens in location_type 'space' instead of 'map_space'?
				Notifications::warn("Formation is invalid: token ".$token[TokenAttributes::name]."should be in ".Locationtypes::space.".".$spaceId.", but is in ".$token[TokenAttributes::location_type].".".$token[TokenAttributes::location_id]);
				return false;
			}
		}

		# all tokens must be from same major power
		if(!Diplomacy::bolisMajorPower($this->power)){
			Notifications::warn("Formation is invalid: the power of this formation ".$this->power." is not a major powe.");
			return  false;
		}
		foreach ($this->tokens as $token) {
			if (Diplomacy::GetControllingPower($token[TokenAttributes::power]) != $this->power) {
				Notifications::warn("Formation is invalid: the power of this formation is ".$this->power.", but one pice is controlled by ".Diplomacy::GetControllingPower($token[TokenAttributes::power]));
				return false;
			}
		}

		# total unit strength is not greater than admin rating of the leaders.
		if($this->admin_rating < $this->unit_strength){
			Notifications::warn("Formation is invalid: admin rating ".$this->admin_rating." should be at greater or equal than unit strength ".$this->unit_strength);
			return false;
		}
		return true;
	}

	public function getPower() : ?String {
		if ($this->isValid()) {
			return $this->power;
		}
		return null;
	}
	public function getSpaceID() : ?int {
		if ($this->isValid()){
			return $this->tokens[0][TokenAttributes::location_id];
		}else{
			return null;
		}
	}

	public function getTokenIds() : array{
		$ids = [];
		foreach($this->tokens as $token){
			$ids[] = $token[TokenAttributes::id];
		}
		return $ids;
	}

	Public function bolMayMove() : bool {
		if ($this->isValid()){
			# no token has mayMove set to false.
			if($this->admin_rating < $this->unit_strength){
				return false;
			}
			foreach ($this->tokens as $token) {
				Notifications::message("token of formation: ".Utils::varToString($token));
				#if (!$token['mayMove']) {
				#	return false;
				#}
			}
			return true;
		}else{
			return false;
		}
	}

	public function ToString() : string {
		if($this->isValid()){
			$strValue = "";
			foreach($this->tokens as $token){
				$strValue .= strval($token[TokenAttributes::id]).",";
			}
			Notifications::message("Formation fromString: ".Utils::varToString($this->tokens));
			$strValue = rtrim($strValue, ",");
			Notifications::message("Formation to string is".$strValue);
			return $strValue;
		}else{
			return "";
		}
	}

	public static function FromString($strValue) : ?Formation {
		$tokenIDs = explode(",", $strValue);
		Notifications::message("Formation from string is".$strValue);
		Notifications::message("Formation fromString: ".Utils::varToString($tokenIDs));
		$tokens = Tokens::getMany($tokenIDs, false);
		if (count($tokens) != count($tokenIDs)){
			return null;
		}
		return new Formation($tokens->toArray());
	}
}
