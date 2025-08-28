<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * hereistand implementation : © CONTRIBUTORS
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * hereistand.game.php
 *
 * This is the main file for your game logic.
 *
 * In this PHP file, you are going to defines the rules of the game.
 *
 */

$swdNamespaceAutoload = function ($class) {
	$classParts = explode('\\', $class);
	if ($classParts[0] == 'HIS') {
		array_shift($classParts);
		$file = dirname(__FILE__) . '/modules/php/' . implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
		if (file_exists($file)) {
			require_once $file;
		} else {
			var_dump('Cannot find file : ' . $file);
		}
	}
};
spl_autoload_register($swdNamespaceAutoload, true, true);

require_once APP_GAMEMODULE_PATH . 'module/table/table.game.php';

use Dom\Notation;
use HIS\Core\Actions;
use HIS\Core\Globals;
use HIS\Core\Notifications;
use HIS\Core\Preferences;
use HIS\Helpers\Utils;
use HIS\Managers\Cards;
use HIS\Managers\Players;
use HIS\Managers\Tokens;
use HIS\Managers\Map;
use HIS\Managers\Religion;
use HIS\tests\TestMap;

class hereistand extends Table {
	use HIS\DebugTrait;
	use HIS\States\NextPlayerTrait;
	use HIS\States\MovementTrait;
	use HIS\States\FieldBattleTrait;
	use HIS\States\InterceptionTrait;
	use HIS\States\AvoidBattleTrait;
	use HIS\States\WithdrawBattleTrait;
	use HIS\States\ArgsOnEnteringStateTrait;
	use HIS\States\ImpulseActionsTrait;
	use HIS\SetupTrait;
	use HIS\AdditionalStaticTrait;

	public static $instance = null;
	function __construct() {
		parent::__construct();
		self::$instance = $this;
		self::initGameStateLabels([
			'logging' => 10,
		]);
	}

	public static function get() {
		return self::$instance;
	}

	protected function getGameName() {
		return 'hereistand';
	}

	public function getStateName() {
		$state = $this->gamestate->state();
		return $state['name'];
	}

	public function getImpulsePlayer() {
		//TODO read from DB, as active player might be different from Impulse player during interrupts
		return $player = Players::getActive();
	}

	//CTRL+SHIPF+P
	public function debug_getpol(int $spaceID){
		$power = Map::getPoliticalControl($spaceID);
		Notifications::message("political control of city ".$spaceID." = ".$power);
	}
	public function debug_getrel(int $spaceID){
		$religionID = Map::getReligiosControl($spaceID);
		Notifications::message("religius control of city ".$spaceID." = ".($religionID==ReligionIDs::CATHOLIC?"CATHOLIC":($religionID==ReligionIDs::REFORMED?"REFORMED":"other")));
	}
	public function debug_IsFort(int $spaceID){
		$bolIsFortifieded = Map::bolGetSpaceIsFortified($spaceID);
		Notifications::message("The space ".Map::getSpaceName($spaceID)." is Fortified = ".($bolIsFortifieded?"true":"false"));
	}
	public function debug_IsUnrest(int $spaceID){
		$bolIsUnrest = Map::bolGetSpaceIsInUnrest($spaceID);
		Notifications::message("The space ".Map::getSpaceName($spaceID)." is in Unrest = ".($bolIsUnrest?"true":"false"));
	}
	public function debug_IsSieged(int $spaceID){
		$bolIsFortifieded = Map::bolGetSpaceIsSieged($spaceID);
		Notifications::message("The space ".Map::getSpaceName($spaceID)." is Sieged = ".($bolIsFortifieded?"true":"false"));
	}
	public function debug_Supply(string $strPower){
		$power = Utils::cmdStrToPower($strPower);
		$tokens = Map::getLandUnitsInSupply($power);
		Notifications::message("Land units in supply of ".$power.": ".Utils::varToString($tokens));
	}
	public function debug_MayAddLandUnits(string $strPower,int $spaceID, bool $mercs){
		$power = Utils::cmdStrToPower($strPower);
		$type = $mercs?UnitTypes::MERC:UnitTypes::REGULAR;
		Notifications::message("may add land ".Utils::varToString(Map::arrintMaxAddableLandUnits($spaceID, $power, $type))." land units");
	}
	public function debug_GetFormation(int $spaceID){
		$unit_count = Map::getUnitCount($spaceID);
		$formation = Map::getFormation($spaceID, $unit_count[0], $unit_count[1]);
		Notifications::message("formation in ".Map::getSpaceName($spaceID).": ".Utils::varToString($formation));
	}
	public function debug_GetTokens(int $spaceID){
		$power = Map::getPoliticalControl($spaceID);
		$landUnits = Map::getLandUnits($spaceID, $power);
		$leaders = Map::getLeader($spaceID, $power);
		Notifications::message("Land units in ".Map::getSpaceName($spaceID).": ".Utils::varToString($landUnits));
		Notifications::message("Leaders in ".Map::getSpaceName($spaceID).": ".Utils::varToString($leaders));
	}
	public function debug_SetPol(string $strPower, int $spaceID){
		Map::setPoliticalControl($spaceID, Utils::cmdStrToPower($strPower));
		Notifications::message("set political control of city ".$spaceID." to ".$strPower);
	}
	public function debug_SetRel(int $spaceID, int $religion){
		Map::setReligiosControl($spaceID, $religion);
		Notifications::message("set religius control of city ".$spaceID." to ".$religion);
	}
	public function debug_AddLandUnits(int $spaceID, int $count, bool $merc){
		$type = $merc==="merc"?UnitTypes::MERC:UnitTypes::REGULAR;
		$power = Map::getPoliticalControl($spaceID);
		
		Map::addLandunits($spaceID, $power, $count, $type);
		Notifications::message("Added ".$count." ".$type."'s of ".$power." to space ".Map::getSpaceName($spaceID));
	}
	public function debug_DelLandUnits(int $spaceID, int $count, bool $merc){
		$type = $merc==="merc"?UnitTypes::MERC:UnitTypes::REGULAR;
		$power = Map::getPoliticalControl($spaceID);

		Map::removeLandUnits($spaceID, $power, $count, $type);
		Notifications::message("Removed ".$count." ".$type."'s of ".$power." to space ".Map::getSpaceName($spaceID));
	}
	public function debug_SetUnrest(int $spaceID, bool $IsUnrest){
		Map::setUnrest($spaceID, $IsUnrest);
		Notifications::message("add Unrest to space ".Map::getSpaceName($spaceID));
	}
	public function debug_setMove(int $spaceID, int $spaceIDTo, string $strPower){
		$unit_count = Map::getUnitCount($spaceID);
		$formation = Map::getFormation($spaceID, $unit_count[0], $unit_count[1]);
		if($formation){
			if($formation->isValid()){
				Map::moveFormation($formation, $spaceIDTo);
			}else{
				Notifications::message("invalid formation: ".Utils::varToString($formation));
			}

		}else{
			Notifications::message("no formation found on space ".Map::getSpaceName($spaceID));
		}
	}
	public function debug_AddLeader(int $spaceID, int $leaderId){
		Map::addLeader($spaceID, $leaderId);
		Notifications::message("add Leader ".$leaderId." to place ".Map::getSpaceName($spaceID));
	}
	public function debug_MoveLeader(int $spaceID, int $leaderId){
		Map::moveLeader($spaceID, $leaderId);
		Notifications::message("move Leader ".$leaderId." to place ".Map::getSpaceName($spaceID));
	}
	public function debug_captureLeader(int $spaceID, string $strPowerFrom, string $strPowerBy){
		# TODO update does not work, addLeader on captured leader does not work, captured leaders are not displayed in the prision.
		$powerFrom = Utils::cmdStrToPower($strPowerFrom);
		$powerBy = Utils::cmdStrToPower($strPowerBy);
		Notifications::message("capture Leader(s) of ".$powerFrom." on ".Map::getSpaceName($spaceID)." by ".$powerBy);
		Map::captureLeader($spaceID, $powerFrom, $powerBy);
	}
	public function debug_addShips(int $spaceID, string $strPower, int $count){
		$power = Utils::cmdStrToPower($strPower);
		Map::addShips($spaceID, $power, $count);
	}
	public function debug_moveNavalUnits(int $spaceIDFrom, int $spaceIDTo, string $strPower, int $count){
		$power = Utils::cmdStrToPower($strPower);
		Map::moveShips($spaceIDFrom, $spaceIDTo, $power, $count);
	}
	public function debug_DelNavalUnits(int $spaceID, string $strPower, int $count){
		$power = Utils::cmdStrToPower($strPower);
		Map::removeShips($spaceID, $power, $count);
	}
	public function debug_AddNavalLeader(int $spaceID, int $navalLeaderID){
		Notifications::message("add naval leader ");
		Map::addNavalLeader($spaceID, $navalLeaderID);
	}
	public function debug_MoveNavalLeader(int $navalLeaderID, int $spaceIDTo){
		Map::moveNavalLeader($navalLeaderID, $spaceIDTo);
		Notifications::message("move naval leader ");
	}
	public function debug_CaptureNavalLeader(int $spaceID, string $strPowerFrom, string $strPowerBy){
		$powerFrom = Utils::cmdStrToPower($strPowerFrom);
		$powerBy = Utils::cmdStrToPower($strPowerBy);
		Notifications::message("capture naval Leader(s) of ".$powerFrom." on ".Map::getSpaceName($spaceID)." by ".$powerBy);
		Map::captureNavalLeader($spaceID, $powerFrom, $powerBy);
	}
	public function debug_DelNavalLeader(int $navalLeaderID){
		Map::removeNavalLeader($navalLeaderID);
	}
	public function debug_IsPrintingPressActive(){
		$bolRes = Religion::bolIsPrintingPressActive();
		Notifications::message("Printing Press is active: ".Utils::varToString($bolRes));
	}
	public function debug_IsValidRefTarget(int $spaceID){
		Notifications::message("Space ".Map::getSpaceName($spaceID)." Is valid target for reformationa attempt: ".Utils::varToString(Religion::bolIsValidTargetForReformationAttempt($spaceID)));
	}
	public function debug_IsValidCounterRefTarget(int $spaceID){
		Notifications::message("Space ".Map::getSpaceName($spaceID)." Is valid target for counter reformationa attempt: ".Utils::varToString(Religion::bolIsValidTargetForCounterRefAttempt($spaceID)));
	}
	public function debug_RefDice(int $spaceID){
		Notifications::message("Space ".Map::getSpaceName($spaceID)." would get ".Religion::intGetNumberOfReformationAttemptAttackDice($spaceID)." dice in a reformation attempt.");
	}
	public function debug_SetPrintingPressActive(){
		Religion::SetPrintingPressActive();
		Notifications::message("Set printing press to active.");
	}
	public function debug_Test(){
		TestMap::testPolAndRel(SpaceIDs::WITTENBERG, Powers::HAPSBURG, ReligionIDs::CATHOLIC);
				Map::setPoliticalControl(SpaceIDs::WITTENBERG, Powers::FRANCE);
				TestMap::testPolAndRel(SpaceIDs::WITTENBERG, Powers::FRANCE, ReligionIDs::CATHOLIC);
				Map::setPoliticalControl(SpaceIDs::WITTENBERG, Powers::PROTESTANT);
				TestMap::testPolAndRel(SpaceIDs::WITTENBERG, Powers::PROTESTANT, ReligionIDs::CATHOLIC);
				Map::setReligiosControl(SpaceIDs::WITTENBERG, ReligionIDs::REFORMED);
				TestMap::testPolAndRel(SpaceIDs::WITTENBERG, Powers::PROTESTANT, ReligionIDs::REFORMED);

				// TODO test on key (including test that powercards are correct)
				// test unit/ship building, movement and destruction.
				// TODO test cav for otto
				// TODO test leaders

				// Formation movement
				TestMap::testFormation(SpaceIDs::PARIS, 4, 0);
				Map::addLandunits(SpaceIds::PARIS, Powers::FRANCE, 3, UnitTypes::REGULAR);
				TestMap::testFormation(SpaceIDs::PARIS, 7, 0); //3 tokens (4+2+1)
				Map::addLandunits(SpaceIds::PARIS, Powers::FRANCE, 1, UnitTypes::REGULAR);
				TestMap::testFormation(SpaceIDs::PARIS, 8, 0); // 2 tokens (6+2)
	}

	/*
		   * setupNewGame:
	*/
	protected function setupNewGame($players, $options = []) {
		Globals::setupNewGame($players, $options);
		Preferences::setupNewGame($players, $options);
		Players::setupNewGame($players, $options);
		Tokens::setupNewGame($players, $options);
		Cards::setupNewGame($players, $options);

		$this->activeNextPlayer();

		//$this->initTables();
	}

	function initTables() {
		$options = [];
		try {
			$players = $this->loadPlayersBasicInfos();
			// ... code the function
			Globals::setupNewGame($players, $options);
			Preferences::setupNewGame($players, $options);
			Players::setupNewGame($players, $options);
			Tokens::setupNewGame($players, $options);
			Cards::setupNewGame($players, $options);
		} catch (Exception $e) {
			// logging does not actually work in game init :(
			// but if you calling from php chat it will work
			self::dump("======EXCEPTION======", $e);
			self::error("Fatal error while creating game");
			var_dump($e);
		}
	}

	/*
		   * getAllDatas:
	*/
	public function getAllDatas() {
		$pId = self::getCurrentPId();
		return [
			'prefs' => Preferences::getUiData($pId),
			'players' => Players::getUiData($pId),
			'tokens' => Tokens::getAll(),
			'hand' => Cards::getOfPlayer($pId),
		];
	}

	/*
		   * getGameProgression:
	*/
	function getGameProgression() {
		return 50; // TODO
	}

	function actChangePreference($pref, $value) {
		Preferences::set($this->getCurrentPId(), $pref, $value);
	}

	function actPass() {
		Actions::pass();
	}

	function actUndo() {
		Actions::undo();
	}

	function actPlayCard($cardId, $asEvent) {
		Actions::play($cardId, $asEvent);
	}

	function actMove() {
		Actions::move();
	}

	function actWithdraw() {
		Actions::withdraw();
	}

	function actDeclareDestination($destination_id) {
		Actions::declareDestination($destination_id);
	}

	function actDeclareFormation($token_ids) {
		Actions::declareFormation($token_ids);
	}

	function actDeclareIntercept($token_ids) {
		Actions::declareIntercept($token_ids);
	}

	function actDeclareAvoid($token_ids) {
		Actions::declareAvoid($token_ids);
	}

	function actDeclareCasualties($token_ids) {
		Actions::declareCasualties($token_ids);
	}

	function actPickSpace($space_id) {
		Actions::pickSpace($space_id, self::getStateName());
	}

	function actBuyUnit($unit_type) {
		Actions::buyUnit($unit_type);
	}

	/////////////////////////////////////////////////////////////
	// Exposing protected methods, please use at your own risk //
	/////////////////////////////////////////////////////////////

	// Exposing protected method getCurrentPlayerId
	public static function getCurrentPId() {
		return Players::getActiveId();
	}

	// Exposing protected method translation
	public static function translate($text) {
		return self::_($text);
	}

	////////////////////////////////////
	////////////   Zombie   ////////////
	////////////////////////////////////
	/*
	   * zombieTurn:
	   *   This method is called each time it is the turn of a player who has quit the game (= "zombie" player).
	   *   You can do whatever you want in order to make sure the turn of this player ends appropriately
*/
	public function zombieTurn($state, $activePlayer) {
		$statename = $state['name'];

		if ($state['type'] === 'activeplayer') {
			switch ($statename) {
			default:
				$this->gamestate->nextState('zombiePass');
				break;
			}

			return;
		}

		if ($state['type'] === 'multipleactiveplayer') {
			// Make sure player is in a non blocking status for role turn
			$this->gamestate->setPlayerNonMultiactive($this->getActivePlayerId(), '');

			return;
		}

		throw new feException('Zombie mode not supported at this game state: ' . $statename);
	}

	/////////////////////////////////////
	//////////   DB upgrade   ///////////
	/////////////////////////////////////
	// You don't have to care about this until your game has been published on BGA.
	// Once your game is on BGA, this method is called everytime the system detects a game running with your old Database scheme.
	// In this case, if you change your Database scheme, you just have to apply the needed changes in order to
	//   update the game database and allow the game to continue to run with your new version.
	/////////////////////////////////////
	/*
	   * upgradeTableDb
	   *  - int $from_version : current version of this game database, in numerical form.
	   *      For example, if the game was running with a release of your game named "140430-1345", $from_version is equal to 1404301345
*/
	public function upgradeTableDb($from_version) {
	}
}
