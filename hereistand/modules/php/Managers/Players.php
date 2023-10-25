<?php
namespace HIS\Managers;
use HIS\Core\Game;
use HIS\Core\Notifications;
use powers;
use Locationtypes;

/*
 * Players manager : allows to easily access players ...
 *  a player is an instance of Player class
 */
class Players extends \HIS\Helpers\DB_Manager {
	const cardDraws = [
		Powers::OTTOMAN => [0=>15, 1=>6, 2=>6, 3=>5, 4=>5, 5=>4, 6=>4, 7=>3, 8=>3, 9=>2, 10=>2, 11=>0],
		Powers::HAPSBURG => [0=>15, 1=>7, 2=>7, 3=>6, 4=>6, 5=>5, 6=>5, 7=>4, 8=>4, 9=>3, 10=>3, 11=>2, 12=>2, 13=>1, 14=>0],
		Powers::ENGLAND => [0=>15, 1=>4, 2=>4, 3=>3, 4=>3, 5=>2, 6=>2, 7=>1, 8=>1, 9=>0],
		Powers::FRANCE => [0=>15, 1=>5, 2=>4, 3=>4, 4=>3, 5=>3, 6=>2, 7=>2, 8=>1, 9=>1, 10=>1, 11=>0],
		Powers::PAPACY => [0=>15, 1=>4, 2=>4, 3=>4, 4=>3, 5=>3, 6=>2, 7=>0]
	];//[power][SquareControllMarkers on player board] = cards drawn in winter
	const vpFromKeys = [
		Powers::OTTOMAN => [0=>99, 1=>20, 2=>18, 3=>16, 4=>14, 5=>12, 6=>10, 7=>8, 8=>6, 9=>4, 10=>2, 11=>0],
		Powers::HAPSBURG => [0=>99, 1=>14, 2=>13, 3=>12, 4=>11, 5=>10, 6=>9, 7=>8, 8=>7, 9=>6, 10=>5, 11=>4, 12=>3, 13=>2, 14=>0],
		Powers::ENGLAND => [0=>99, 1=>17, 2=>15, 3=>13, 4=>11, 5=>9, 6=>7, 7=>5, 8=>3, 9=>0],
		Powers::FRANCE => [0=>99, 1=>20, 2=>18, 3=>16, 4=>14, 5=>12, 6=>10, 7=>8, 8=>6, 9=>4, 10=>2, 11=>0],
		Powers::PAPACY => [0=>99, 1=>12, 2=>10, 3=>8, 4=>6, 5=>4, 6=>2, 7=>0]
	];//[power][SquareControllMarkers on player board] = VP from keys

	protected static $table = 'player';
	protected static $primary = 'player_id';
	protected static function cast($row) {
		return new \HIS\Models\Player($row);
	}

	public function setupNewGame($players, $options) {
		// Create players
		$gameInfos = Game::get()->getGameinfos();
		$colors = $gameInfos['player_colors'];
		$query = self::DB()->multipleInsert([
			'player_id',
			'player_color',
			'player_canal',
			'player_name',
			'player_avatar',
			'player_score',
			'player_power',
		]);

		$values = [];
		$i = 0;
		$powers = [
			Powers::OTTOMAN,
			Powers::HAPSBURG,
			Powers::ENGLAND,
			Powers::FRANCE,
			Powers::PAPACY,
			Powers::PROTESTANT,
		];
		foreach ($players as $pId => $player) {
			$color = array_shift($colors);
			$values[] = [$pId, $color, $player['player_canal'], $player['player_name'], $player['player_avatar'], 0, $powers[$i]];
			$i++;
		}
		$query->values($values);

		Game::get()->reattributeColorsBasedOnPreferences($players, $gameInfos['player_colors']);
		Game::get()->reloadPlayersBasicInfos();
	}

	public function getActiveId() : int {
		return (int) Game::get()->getActivePlayerId();
	}

	public function getCurrentId() {
		return Game::get()->getCurrentPId();
	}

	public function isActive() {
		return Game::get()->gamestate->isPlayerActive(self::getCurrentId());
	}

	public function getAll() {
		$players = self::DB()->get(false);
		return $players;
	}

	public function getFromPower($power) {
		//powe: elemt of Powers
		return self::DB()
			->where('player_power', $power)
			->getSingle();
	}

	/*
		   * get : returns the Player object for the given player ID
	*/
	public function get($pId = null) {
		$pId = $pId ?: self::getActiveId();
		return self::DB()
			->where($pId)
			->getSingle();
	}

	public function getMany($pIds) {
		$players = self::DB()
			->whereIn($pIds)
			->get();
		return $players;
	}

	public function getActive() {
		return self::get();
	}

	public function getCurrent() {
		return self::get(self::getCurrentId());
	}

	public function getNextId($player) {
		$pId = is_int($player) ? $player : $player->getId();

		$table = Game::get()->getNextPlayerTable();
		return (int) $table[$pId];
	}

	public function getPrevId($player) {
		$pId = is_int($player) ? $player : $player->getId();

		$table = Game::get()->getPrevPlayerTable();
		$pId = (int) $table[$pId];

		return $pId;
	}

	/*
		   * Return the number of players
	*/
	public function count() {
		return self::DB()->count();
	}

	/*
		   * getUiData : get all ui data of all players
	*/
	public function getUiData($pId) {
		return self::getAll()->map(function ($player) use ($pId) {
			return $player->jsonSerialize($pId);
		});
	}

	/**
	 * This activate next player
	 */
	public function activeNext() {
		$pId = self::getActiveId();
		$nextPlayer = self::getNextId((int) $pId);

		Game::get()->gamestate->changeActivePlayer($nextPlayer);
		return $nextPlayer;
	}

	/**
	 * This allow to change active player
	 */
	public function changeActive($pId) {
		Game::get()->gamestate->changeActivePlayer($pId);
	}
	public static function setActivePlayer($power){
		$pId = Players::getFromPower($power)->getId();
		Game::get()->gamestate->changeActivePlayer($pId);
	}

	public static function getCardDraw($power){
		//power element of Powers
		if($power==Powers::PROTESTANT){
			//if numElectrorates >= 4{retrun 5}
			return 4;
		}
		$leader = 0; //TODO where is stored what leader each power has? at least in the position of the mandatoryevents.
		if($power == Powers::FRANCE or $power == Powers::ENGLAND){
			$leader = 1;
		}

		$numSquareControllMarkes = 0;//count(Tokens::getInLocation($power)); //TODO returns 0 at setup.
		foreach (HomeCard_key_locations[$power] as $keyLocations) {
			$numSquareControllMarkes += count(Tokens::getInLocation(Locationtypes::powercards."_".$keyLocations));
		}
		Notifications::message("Power ".$power." has ".$numSquareControllMarkes."  Keys on playerboard.");
		return Players::cardDraws[$power][$numSquareControllMarkes] + $leader;
	}
}
