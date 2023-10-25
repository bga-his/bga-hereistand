<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Models\FieldBattle;
use PHPUnit\Framework\TestCase;

final class FieldBattleTest extends TestCase {
	private static $his;
	private static $tokens;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
		self::$tokens = TestingUtils::makeStartingTokens();
	}

	public function testExists() {
		$battle = new FieldBattle();
		$this->assertInstanceOf(FieldBattle::class, $battle);
	}

	public function testFindOpposingPowers() {
		# two opposing powers
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInCity(ENGLAND_4UNIT, VIENNA);
		$tokens[] = TestingUtils::makeTokenInCity(HAPSBURG_4UNIT, VIENNA);

		$powers = FieldBattle::findOpposingPowers(VIENNA, $tokens, ENGLAND);
		$this->assertEquals(count($powers), 2);
		$this->assertArrayHasKey(HAPSBURG, $powers);
		$this->assertArrayHasKey(ENGLAND, $powers);
	}

	public function testFindOpposingPowersNone() {
		# two opposing powers
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInCity(HAPSBURG_4UNIT, VIENNA);
		$tokens[] = TestingUtils::makeTokenInCity(HAPSBURG_4UNIT, VIENNA);

		$powers = FieldBattle::findOpposingPowers(VIENNA, $tokens, ENGLAND);
		$this->assertEquals(count($powers), 1);
		$this->assertArrayHasKey(HAPSBURG, $powers);
	}

}
