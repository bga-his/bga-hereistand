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
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::FERDINAND, SpaceIDs::VIENNA);
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::HAPSBURG_4UNIT, SpaceIDs::VIENNA);
		$formation = new Formation($tokens);
		$this->assertInstanceOf(Formation::class, $formation);
	}

	public function testBasicValidity() {
		# a formation must contain units
		$formation = new Formation([]);
		$this->assertFalse($formation->isValid());

		# a valid formation
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::FERDINAND, SpaceIDs::VIENNA);
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::HAPSBURG_4UNIT, SpaceIDs::VIENNA);
		$formation = new Formation($tokens);
		$this->assertTrue($formation->isValid());
	}

	public function testSpaceValidity() {
		# formations must be in spaces
		$supply_token = TestingUtils::makeToken(TokenIDs::HAPSBURG_4UNIT, 'supply_' . Powers::HAPSBURG . '_' . TokenIDs::HAPSBURG_4UNIT, null);
		$formation = new Formation([$supply_token]);

		$this->assertFalse($formation->isValid());
		# all units in a formation must be in the same space
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::FERDINAND, SpaceIDs::VIENNA);
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::HAPSBURG_4UNIT, SpaceIDs::VIENNA);
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::HAPSBURG_4UNIT, SpaceIDs::ROME);
		$formation = new Formation($tokens);
		$this->assertFalse($formation->isValid());
	}

	public function testPowerValidity() {
		# all units in formation must be from same major power
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::FERDINAND, SpaceIDs::VIENNA);
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::PAPACY_4UNIT, SpaceIDs::VIENNA);
		$formation = new Formation($tokens);
		$this->assertFalse($formation->isValid());
	}

	public function testGetPower() {
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInSpace(TokenIDs::FERDINAND, SpaceIDs::VIENNA);
		$formation = new Formation($tokens);
		$this->assertEquals($formation->getPower(), Powers::HAPSBURG);
	}

}
