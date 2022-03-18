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

}
