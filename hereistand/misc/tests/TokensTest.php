<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Managers\Tokens;
use PHPUnit\Framework\TestCase;

final class TokensTest extends TestCase {
	private static $his;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
	}

	public function testInSpace() {
		$token = TestingUtils::makeTokenInSpace(TokenIDs::PAPACY_4UNIT, spaceIDs::ROME);
		$this->assertTrue(Tokens::inSpace($token, spaceIDs::ROME));
		$this->assertFalse(Tokens::inSpace($token, spaceIDs::PARIS));
	}
}
