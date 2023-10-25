<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Managers\Tokens;
use PHPUnit\Framework\TestCase;

final class TokensTest extends TestCase {
	private static $his;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
	}

	public function testInCity() {
		$token = TestingUtils::makeTokenInCity(PAPACY_4UNIT, ROME);
		$this->assertTrue(Tokens::inCity($token, ROME));
		$this->assertFalse(Tokens::inCity($token, PARIS));
	}
}
