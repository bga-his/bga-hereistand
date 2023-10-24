<?php
namespace HIS\Core;
use hereistand;

/*
 * Game: a wrapper over table object to allow more generic modules
 */
class Game {
	public static function get() {
		return hereistand::get();
	}
}
