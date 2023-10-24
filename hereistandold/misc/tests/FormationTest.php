<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Models\Formation;
use PHPUnit\Framework\TestCase;

final class FormationTest extends TestCase {
	private static $his;
	private static $tokens;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
		self::$tokens = TestingUtils::makeStartingTokens();
	}

	public function testExists() {
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInCity(FERDINAND, VIENNA);
		$tokens[] = TestingUtils::makeTokenInCity(HAPSBURG_4UNIT, VIENNA);
		$formation = new Formation($tokens);
		$this->assertInstanceOf(Formation::class, $formation);
	}

	public function testBasicValidity() {
		# a formation must contain units
		$formation = new Formation([]);
		$this->assertFalse($formation->isValid());

		# a valid formation
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInCity(FERDINAND, VIENNA);
		$tokens[] = TestingUtils::makeTokenInCity(HAPSBURG_4UNIT, VIENNA);
		$formation = new Formation($tokens);
		$this->assertTrue($formation->isValid());
	}

	public function testCityValidity() {
		# formations must be in cities
		$supply_token = TestingUtils::makeToken(HAPSBURG_4UNIT, 'supply_' . HAPSBURG . '_' . HAPSBURG_4UNIT, null);
		$formation = new Formation([$supply_token]);

		$this->assertFalse($formation->isValid());
		# all units in a formation must be in the same city
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInCity(FERDINAND, VIENNA);
		$tokens[] = TestingUtils::makeTokenInCity(HAPSBURG_4UNIT, VIENNA);
		$tokens[] = TestingUtils::makeTokenInCity(HAPSBURG_4UNIT, ROME);
		$formation = new Formation($tokens);
		$this->assertFalse($formation->isValid());
	}

	public function testPowerValidity() {
		# all units in formation must be from same major power
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInCity(FERDINAND, VIENNA);
		$tokens[] = TestingUtils::makeTokenInCity(PAPACY_4UNIT, VIENNA);
		$formation = new Formation($tokens);
		$this->assertFalse($formation->isValid());
	}

	public function testGetPower() {
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInCity(FERDINAND, VIENNA);
		$formation = new Formation($tokens);
		$this->assertEquals($formation->getPower(), HAPSBURG);
	}

}
