<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Models\City;
use PHPUnit\Framework\TestCase;

final class CityTest extends TestCase {
	private static $his;
	private static $tokens;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
		self::$tokens = TestingUtils::makeStartingTokens();
	}

	public function testExists() {
		$city = new City(ROME, self::$tokens);
		$this->assertInstanceOf(City::class, $city);
	}

	public function testName() {
		$city = new City(ROME, self::$tokens);
		$this->assertEquals($city->name(), 'Rome');
	}

	public function testSetupTokens() {
		$city = new City(ROME, self::$tokens);
		$this->assertGreaterThan(1, Count($city->tokens));
	}

	public function testNeighbors() {
		$rome = new City(ROME, self::$tokens);
		$siena = new City(SIENA, self::$tokens);
		$paris = new City(PARIS, self::$tokens);
		$this->assertTrue($rome->isNeighbor($siena));
		$this->assertFalse($rome->isNeighbor($paris));
		# passes are still neighbors
		$turin = new City(TURIN, self::$tokens);
		$geneva = new City(GENEVA, self::$tokens);
		$this->assertTrue($turin->isNeighbor($geneva));
	}

	public function testControl() {
		# test starting control
		$rome = new City(ROME, self::$tokens);
		$paris = new City(PARIS, self::$tokens);
		$this->assertEquals($rome->getControl(), PAPACY);
		$this->assertEquals($paris->getControl(), FRANCE);
		$siena = new City(SIENA, self::$tokens);
		$this->assertEquals($siena->getControl(), INDEPENDENT);

		# test control change from control type tokens
		$worms = new City(WORMS, self::$tokens);
		$this->assertEquals($worms->getControl(), HAPSBURG);
		$token = TestingUtils::makeTokenInCity(PAPACY_HEX, PAVIA);
		self::$tokens[] = $token;
		$pavia = new City(PAVIA, self::$tokens);
		$this->assertEquals($pavia->getControl(), PAPACY);
	}

	public function testReligion() {
		# test starting religions
		$rome = new City(ROME, self::$tokens);
		$this->assertEquals($rome->getReligion(), CATHOLIC);
		$nezh = new City(NEZH, self::$tokens);
		$this->assertEquals($nezh->getReligion(), OTHER);

		# test changing religions based on tokens
		self::$tokens[] = TestingUtils::makeFlippedTokenInCity(PROTESTANT_HEX, TOULOUSE);
		$toulouse = new City(TOULOUSE, self::$tokens);
		$this->assertEquals($toulouse->getReligion(), REFORMED);

		# protestant home cities with no markers should be protestant
		$munster = new City(MUNSTER, []);
		$this->assertEquals($munster->getReligion(), REFORMED);
	}

}
