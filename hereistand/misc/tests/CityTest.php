<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Models\City;
use HIS\Testing\TestingUtils;
use PHPUnit\Framework\TestCase;

final class CityTest extends TestCase {
	private static $his;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
	}

	public function testExists() {
		$tokens = TestingUtils::makeStartingTokens();
		$city = new City(ROME, $tokens);
		$this->assertInstanceOf(City::class, $city);
	}

}
