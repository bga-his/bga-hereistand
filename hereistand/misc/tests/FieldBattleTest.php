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

}
