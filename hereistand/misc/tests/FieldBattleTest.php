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
		$tokens[] = TestingUtils::makeTokenInSpace(tokenIDs::ENGLAND_4UNIT, SpaceIDs::VIENNA);
		$tokens[] = TestingUtils::makeTokenInSpace(tokenIDs::HAPSBURG_4UNIT, SpaceIDs::VIENNA);

		$powers = FieldBattle::findOpposingPowers(SpaceIDs::VIENNA, $tokens, Powers::ENGLAND);
		$this->assertEquals(count($powers), 2);
		$this->assertArrayHasKey(Powers::HAPSBURG, $powers);
		$this->assertArrayHasKey(Powers::ENGLAND, $powers);
	}

	public function testFindOpposingPowersNone() {
		# two opposing powers
		$tokens = [];
		$tokens[] = TestingUtils::makeTokenInSpace(tokenIDs::HAPSBURG_4UNIT, SpaceIDs::VIENNA);
		$tokens[] = TestingUtils::makeTokenInSpace(tokenIDs::HAPSBURG_4UNIT, SpaceIDs::VIENNA);

		$powers = FieldBattle::findOpposingPowers(SpaceIDs::VIENNA, $tokens, Powers::ENGLAND);
		$this->assertEquals(count($powers), 1);
		$this->assertArrayHasKey(Powers::HAPSBURG, $powers);
	}

}
