<?php
namespace HIS\Testing;

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

	public static function makeStartingTokens() {
		$tokens = [];
		foreach (Game::get()->getSetup() as $power => $cities) {
			foreach ($cities as $city_name => $city) {
				foreach ($city as $unit) {
					$tokens[] = self::makeToken($unit, 'map_city_' . $city_name);
				}
			}
		}
		return $tokens;
	}
}
