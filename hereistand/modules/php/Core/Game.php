<?php
namespace HIS\Core;
use hereistand;
use HIS\Models\Space;

/*
 * Game: a wrapper over table object to allow more generic modules
 */
class Game {
	public static function get() {
		//Game::get()->spaces = {spaceID:Space for all spaces in game}
		return hereistand::get();
	}
}
