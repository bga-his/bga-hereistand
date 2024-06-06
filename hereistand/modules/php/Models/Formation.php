<?php
namespace HIS\Models;

use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use tokenTypeIDs;
use TokenAttributes;

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

	public function __construct($tokens) {
		$this->tokens = $tokens;
		$this->landUnits = [];
		$this->leaders = [];
		$this->admin_rating = 4;
		$this->unit_strength = 0;

		$types = [];
		$admin = [4, 0];

		foreach ($this->tokens as $token) {
			$types = $token[TokenAttributes::types];
			if(in_array(tokenTypeIDs::MILITARY, $types, true) && in_array(tokenTypeIDs::LEADER, $types, true)){
				$this->leaders[] = $token;
				$this->battle_rating = max($this->battle_rating, $token[TokenAttributes::battle_rating]);
				
				if($tokens[TokenAttributes::admin_rating] > $admin[0]){
					$admin[1] = $admin[0];
					$admin[0] = intval($tokens[TokenAttributes::admin_rating]);
				}elseif($tokens[TokenAttributes::admin_rating] > $admin[1]){
					$admin[1] = intval($tokens[TokenAttributes::admin_rating]);
				}

			}else if(in_array(tokenTypeIDs::MILITARY, $types, true) && in_array(tokenTypeIDs::UNITS, $types, true)){
				$this->landUnits[] = $token;
			}else{
				throw new UserException("cant add token with type ".Utils::varToString($types)." to Formation.");
			}
		}
		$this->admin_rating = $admin[0]+$admin[1];
	}

	public function isValid() {
		# a formation must have units
		if (Count($this->tokens) == 0) {
			return false;
		}

		# all tokens must be in single space
		if ($this->tokens[0]['location_type'] != 'space') {
			return false;
		}
		$space_id = $this->tokens[0]['location_id'];
		foreach ($this->tokens as $token) {
			if ($token['location_id'] != $space_id) {
				return false;
			}
		}

		# all tokens must be from same major power
		#TODO minor power allied with major power may be part of their major power allies stack
		$power = $this->tokens[0]['power'];
		foreach ($this->tokens as $token) {
			if ($token['power'] != $power) {
				return false;
			}
		}

		# total unit strength is not greater than admin rating of the leaders.
		if($this->admin_rating < $this->unit_strength){
			return false;
		}
		return true;
	}

	public function getPower() {
		if ($this->isValid()) {
			return $this->tokens[0]['power'];
		}
		return null;
	}
}
