<?php
error_reporting(E_ALL ^ E_DEPRECATED);
define("APP_GAMEMODULE_PATH", "./hereistand/misc/"); // include path to mocks, this defined "Table" and other classes

use HIS\Testing\TestingUtils;
use PHPUnit\Framework\TestCase;

class HereIStandMocker extends hereistand {

	function __construct() {
		include 'hereistand/material.inc.php';
		parent::__construct();
		$this->resources = array();
	}
}

final class HereIStandTest extends TestCase {
	private static $his;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
	}

	public function testExists() {
		$this->assertInstanceOf(HereIStandMocker::class, self::$his);
	}

	public function testMakeToken() {
		$token = TestingUtils::makeTokenInCity(PAPACY_4UNIT, ROME);
		$this->assertEquals($token['strength'], 4);
	}

	public function testStartingTokens() {
		$tokens = TestingUtils::makeStartingTokens();
		$this->assertGreaterThan(50, Count($tokens));
	}

	public function testQuickTokens() {
		$setup = [
			ROME => [
				PAPACY_4UNIT,
				PAPACY_1UNIT,
			],
			SIENA => [
				HAPSBURG_4UNIT,
				CHARLES_V,
			],
		];
		$tokens = TestingUtils::makeQuickTokens($setup);
		$this->assertEquals(Count($tokens), 4);
	}
}
