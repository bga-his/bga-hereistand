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
}
