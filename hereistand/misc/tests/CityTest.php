<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Models\City;
use PHPUnit\Framework\TestCase;

final class CityTest extends TestCase {
	private static $his;
	private static $tokens;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
		self::$tokens = TestingUtils::makeStartingTokens();
	}

	public function testExists() {
		$city = new City(ROME, self::$tokens);
		$this->assertInstanceOf(City::class, $city);
	}

	public function testName() {
		$city = new City(ROME, self::$tokens);
		$this->assertEquals($city->name(), 'Rome');
	}

	public function testSetupTokens() {
		$city = new City(ROME, self::$tokens);
		$this->assertGreaterThan(1, Count($city->tokens));
	}

	public function testNeighbors() {
		$rome = new City(ROME, self::$tokens);
		$siena = new City(SIENA, self::$tokens);
		$paris = new City(PARIS, self::$tokens);
		$this->assertTrue($rome->isNeighbor($siena));
		$this->assertFalse($rome->isNeighbor($paris));
	}

}
