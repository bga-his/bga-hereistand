<?php
namespace HIS\Models;

use HIS\Core\Game;
use HIS\Managers\Tokens;

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
		return in_array($neighbor->id, $this->attributes['connections']);
	}

	public function getControl() {
		$control = $this->attributes['home_power'];
		foreach ($this->tokens as $token) {
			if (in_array(CONTROL, $token['types'])) {
				$control = $token['power'];
			}
		}
		return $control;
	}

	public function getReligion() {
		$religion = CATHOLIC;
		if ($this->attributes['home_power'] == OTTOMAN) {
			$religion = OTHER;
		}
		if ($this->attributes['home_power'] == PROTESTANT) {
			$religion = REFORMED;
			foreach ($this->tokens as $token) {
				if (in_array(CATHOLIC, $token['types'])) {
					$religion = CATHOLIC;
				}
			}
		}
		foreach ($this->tokens as $token) {
			if (in_array(REFORMED, $token['types'])) {
				$religion = REFORMED;
			}
		}
		return $religion;
	}
}
