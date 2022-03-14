<?php

use HIS\Core\Game;
use HIS\Managers\Tokens;

final class TestingUtils {
	public static function makeToken($type, $location) {
		return Tokens::cast([
			'id' => 0,
			'type' => $type,
			'location' => $location,
			'state' => null,
		]);
	}

	public static function makeTokenInCity($type, $city_id) {
		return self::makeToken($type, 'map_city_' . $city_id);
	}

	public static function makeStartingTokens() {
		$tokens = [];
		foreach (Game::get()->getSetup() as $power => $cities) {
			foreach ($cities as $city_name => $city) {
				foreach ($city as $unit) {
					$tokens[] = self::makeTokenInCity($unit, $city_name);
				}
			}
		}
		return $tokens;
	}

	public function makeQuickTokens($setup) {
		$tokens = [];
		foreach ($setup as $city_name => $city) {
			foreach ($city as $unit) {
				$tokens[] = self::makeTokenInCity($unit, $city_name);
			}
		}
		return $tokens;
	}
}
