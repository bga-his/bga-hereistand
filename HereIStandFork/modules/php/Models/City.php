<?php
namespace HIS\Models;

use HIS\Core\Game;
use HIS\Managers\Tokens;
use Powers;
use ReligionIDs;
use mTokenTypes;
/*
 * City: all utility functions concerning a city
 */

class City {
	protected $attributes = [];
	public $tokens = [];
	public $id = null;

	public function __construct($city_id, $tokens) {
		$this->id = $city_id;
		$this->attributes = Game::get()->cities[$city_id];
		foreach ($tokens as $token) {
			if (Tokens::inCity($token, $city_id)) {
				$this->tokens[] = $token;
			}
		}
	}

	public function name() {
		return $this->attributes['name'];
	}

	public function isNeighbor($neighbor) {
		return in_array($neighbor->id, $this->attributes['connections']) || in_array($neighbor->id, $this->attributes['passes']);
	}

	public function getControl() {
		$control = $this->attributes['home_power'];
		foreach ($this->tokens as $token) {
			if (in_array(mTokenTypes::CONTROL, $token['types'])) {
				$control = $token['power'];
			}
		}
		return $control;
	}

	public function getReligion() {
		$religion = ReligionIDs::CATHOLIC;
		if ($this->attributes['home_power'] == Powers::OTTOMAN) {
			$religion = ReligionIDs::OTHER;
		}
		if ($this->attributes['home_power'] == Powers::PROTESTANT) {
			$religion = ReligionIDs::REFORMED;
			foreach ($this->tokens as $token) {
				if (in_array(ReligionIDs::CATHOLIC, $token['types'])) {
					$religion = ReligionIDs::CATHOLIC;
				}
			}
		}
		foreach ($this->tokens as $token) {
			if (in_array(ReligionIDs::REFORMED, $token['types'])) {
				$religion = ReligionIDs::REFORMED;
			}
		}
		return $religion;
	}
}
