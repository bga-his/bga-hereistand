<?php
use HIS\Exceptions\OttomanReligionException;
error_reporting(E_ALL ^ E_DEPRECATED);

use HIS\Models\Space;
use PHPUnit\Framework\TestCase;

final class SpaceTest extends TestCase {
	private static $his;
	private static $tokens;
	public static function setUpBeforeClass(): void{
		self::$his = new HereIStandMocker();
		self::$tokens = TestingUtils::makeStartingTokens();
	}

	public function testExists() {
		$space = new Space(SpaceIDs::ROME, self::$tokens);
		$this->assertInstanceOf(Space::class, $space);
	}

	public function testName() {
		$space = new Space(SpaceIDs::ROME, self::$tokens);
		$this->assertEquals($space->name(), 'Rome');
	}

	public function testSetupTokens() {
		$space = new Space(SpaceIDs::ROME, self::$tokens);
		$this->assertGreaterThan(1, Count($space->tokens));
	}

	public function testNeighbors() {
		$rome = new Space(SpaceIDs::ROME, self::$tokens);
		$siena = new Space(SpaceIDs::SIENA, self::$tokens);
		$paris = new Space(SpaceIDs::PARIS, self::$tokens);
		$this->assertTrue($rome->isNeighbor($siena));
		$this->assertFalse($rome->isNeighbor($paris));
		# passes are still neighbors
		$turin = new Space(SpaceIDs::TURIN, self::$tokens);
		$geneva = new Space(SpaceIDs::GENEVA, self::$tokens);
		$this->assertTrue($turin->isNeighbor($geneva));
	}

	public function testControl() {
		# test starting control
		$rome = new Space(SpaceIDs::ROME, self::$tokens);
		$paris = new Space(SpaceIDs::PARIS, self::$tokens);
		$this->assertEquals($rome->getControl(), Powers::PAPACY);
		$this->assertEquals($paris->getControl(), Powers::FRANCE);
		$siena = new Space(SpaceIDs::SIENA, self::$tokens);
		$this->assertEquals($siena->getControl(), Powers::INDEPENDENT);

		# test control change from control type tokens
		$worms = new Space(SpaceIDs::WORMS, self::$tokens);
		$this->assertEquals($worms->getControl(), Powers::HAPSBURG);
		$token = TestingUtils::makeTokenInSpace(TokenIDs::PAPACY_HEX, SpaceIDs::PAVIA);
		self::$tokens[] = $token;
		$pavia = new Space(SpaceIDs::PAVIA, self::$tokens);
		$this->assertEquals($pavia->getControl(), Powers::PAPACY);
	}

	public function testReligion() {
		# test starting religions
		$rome = new Space(SpaceIDs::ROME, self::$tokens);
		$this->assertEquals($rome->getReligion(), ReligionIDs::CATHOLIC);
		$nezh = new Space(SpaceIDs::NEZH, self::$tokens);
		$this->assertEquals($nezh->getReligion(), ReligionIDs::OTHER);

		# test changing religions based on tokens
		self::$tokens[] = TestingUtils::makeFlippedTokenInSpace(TokenIDs::PROTESTANT_HEX, SpaceIDs::TOULOUSE);
		$toulouse = new Space(SpaceIDs::TOULOUSE, self::$tokens);
		$this->assertEquals($toulouse->getReligion(), ReligionIDs::REFORMED);

		# protestant home spaces with no markers should be protestant
		$munster = new Space(SpaceIDs::MUNSTER, []);
		$this->assertEquals($munster->getReligion(), ReligionIDs::REFORMED);
	}

	public function testSetOttomanReligion() {
		$this->expectException(OttomanReligionException::class);
		$istanbul = new Space(SpaceIDs::ISTANBUL, self::$tokens);
		$istanbul->setReligion(ReligionIDs::REFORMED);
	}

}
