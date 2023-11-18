<?php
namespace HIS\Models;

use HIS\Core\Game;
use HIS\Managers\Tokens;
use Powers;
use ReligionIDs;
use tokenTypeIDs;

/*
 * Space: all utility functions concerning a space
 */

class Space {
	protected $attributes = [];
	public $tokens = [];
	public $id = null;

	public function __construct($space_id, $tokens) {
		$this->id = $space_id;
		$this->attributes = Game::get()->spaces[$space_id];
		foreach ($tokens as $token) {
			if (Tokens::inSpace($token, $space_id)) {
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
			if (in_array(tokenTypeIDs::CONTROL, $token['types'])) {
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
