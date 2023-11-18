<?php

use HIS\Core\Game;
use HIS\Managers\Tokens;

final class HereIStandMocker extends hereistand {

	function __construct() {
		include 'hereistand/material.inc.php';
		parent::__construct();
		$this->resources = array();
	}
}

final class TestingUtils {
	public static function makeToken($type, $location, $state) {
		return Tokens::cast([
			'id' => 0,
			'type' => $type,
			'location' => $location,
			'state' => $state,
		]);
	}

	public static function makeTokenInSpace($type, $space_id) {
		return self::makeToken($type, 'map_space_' . $space_id, null);
	}

	//TODO: There was a constant named "FLIPPED" here. Need to quote it to make this test work
	//Should figure out what this constant was
	public static function makeFlippedTokenInSpace($type, $space_id) {
		return self::makeToken($type, 'map_space_' . $space_id, TokenSides::BACK);
	}

	public static function makeStartingTokens() {
		$tokens = [];
		foreach (Game::get()->getSetup() as $power => $spaces) {
			foreach ($spaces as $space_name => $space) {
				foreach ($space as $unit) {
					$tokens[] = self::makeTokenInSpace($unit, $space_name);
				}
			}
		}
		return $tokens;
	}

	public static function makeQuickTokens($setup) {
		$tokens = [];
		foreach ($setup as $space_name => $space) {
			foreach ($space as $unit) {
				$tokens[] = self::makeTokenInSpace($unit, $space_name);
			}
		}
		return $tokens;
	}
}
