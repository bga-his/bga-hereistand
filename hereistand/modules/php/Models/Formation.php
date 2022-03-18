<?php
namespace HIS\Models;

/*
 * Formation: all utility functions concerning a formation
 */

class Formation {
	public $tokens = [];

	public function __construct($tokens) {
		$this->tokens = $tokens;
	}

	public function isValid() {
		# a formation must have units
		if (Count($this->tokens) == 0) {
			return false;
		}

		# all tokens must be in single city
		if ($this->tokens[0]['location_type'] != 'city') {
			return false;
		}
		$city_id = $this->tokens[0]['location_id'];
		foreach ($this->tokens as $token) {
			if ($token['location_id'] != $city_id) {
				return false;
			}
		}

		# all tokens must be from same major power
		$power = $this->tokens[0]['power'];
		foreach ($this->tokens as $token) {
			if ($token['power'] != $power) {
				return false;
			}
		}

		return true;
	}
}
