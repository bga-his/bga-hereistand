<?php
error_reporting(E_ALL ^ E_DEPRECATED);
define("APP_GAMEMODULE_PATH", "./hereistand/misc/"); // include path to mocks, this defined "Table" and other classes

use PHPUnit\Framework\TestCase;

final class HereIStandTest extends TestCase {
	private static $his;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
	}

	public function testExists() {
		$this->assertInstanceOf(HereIStandMocker::class, self::$his);
	}

	public function testMakeToken() {
		$token = TestingUtils::makeTokenInSpace(tokenIDs::PAPACY_4UNIT, SpaceIDs::ROME);
		$this->assertEquals($token['strength'], 4);
	}

	public function testStartingTokens() {
		$tokens = TestingUtils::makeStartingTokens();
		$this->assertGreaterThan(50, Count($tokens));
	}

	public function testQuickTokens() {
		$setup = [
			SpaceIDs::ROME => [
				tokenIDs::PAPACY_4UNIT,
				tokenIDs::PAPACY_1UNIT,
			],
			SpaceIDs::SIENA => [
				tokenIDs::HAPSBURG_4UNIT,
				tokenIDs::CHARLES_V,
			],
		];
		$tokens = TestingUtils::makeQuickTokens($setup);
		$this->assertEquals(Count($tokens), 4);
	}
}
