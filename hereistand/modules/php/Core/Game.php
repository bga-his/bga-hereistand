<?php
namespace HIS\Core;
use hereistand;

/*
 * Game: a wrapper over table object to allow more generic modules
 */
class Game {
	public static function get() {
		//Game::get()->cities = {cityID:City for all citiys in game}
		return hereistand::get();
	}
}
