<?php
namespace HIS\Core;

use HIS\Helpers\UserException;
use HIS\Helpers\Utils;
use HIS\Helpers\QueryBuilder;
use HIS\Models\Formation;
use \HIS\Helpers\DB_Manager;
/*
 * Globals
 */
class Globals {
	protected static $initialized = false;
	protected static $initialized_str = false;

	protected static string $colImpulseID = "impulseId";
	protected static int $impulseId;//number that increments for each impulse, to "timestamp" stuff that only has effect for one impulse (formation may not move, debator comitted bonus)
	protected static string $colRemainingCP = "remainingCP";
	protected static int $intRemainingCP;//used to track how many CP the active player can spend in their impulse
	protected static string $colDestination = "destination";
	protected static int $destination;
	protected static string $colOrigin = "origin";
	protected static int $origin;
	protected static string $colUnitBuyType = "UnitBuyType";
	protected static int $unitBuyType;

	protected static string $colFormation = "formation";
	protected static ?Formation $formation; // the formation that shall be moved.

	protected static $table_int = 'global_variables';
	protected static $table_str = "global_strings";
	protected static $primary = 'name';

	private static function DB_int() : QueryBuilder {
		return DB_Manager::DB(Globals::$table_int, Globals::$primary);
	}
	private static function DB_str() : QueryBuilder {
		return DB_Manager::DB(Globals::$table_str, Globals::$primary);
	}
	/*
		   * Fetch all existings variables from DB
	*/
	public static function fetch() {
		Notifications::message("Globals.fetch: ".Utils::varToString(self::$initialized));
		if (!self::$initialized) {
			// Turn of LOG to avoid infinite loop (Globals::isLogging() calling itself for fetching)

			Notifications::message("Globals.fetch");
			foreach (
				Globals::DB_int()
				->select(['value', 'name'])
				->get(false) as $name => $variable
			) {
				$value = intval($variable['value']);
				switch($name){
					case Globals::$colImpulseID:
						Globals::$impulseId = $value;
						break;
					case Globals::$colRemainingCP:
						Globals::$intRemainingCP = $value;
						break;
					case Globals::$colDestination:
						Globals::$destination = $value;
						break;
					case Globals::$colOrigin:
						Globals::$origin = $value;
						break;
					case Globals::$colUnitBuyType:
						Globals::$unitBuyType = $value;
						break;
					default:
						throw new UserException("Unkown globals int variable name: ".$name);
				}

			}

			self::$initialized = true;
		}
	}

	public static function fetch_str() {
		Notifications::message("Globals.fetch: ".Utils::varToString(self::$initialized_str));
		if (!self::$initialized_str) {
			// Turn of LOG to avoid infinite loop (Globals::isLogging() calling itself for fetching)

			Notifications::message("Globals.fetch");
			foreach (
				Globals::DB_str()
				->select(['value', 'name'])
				->get(false) as $name => $variable
			) {
				$value = strval($variable['value']);
				switch($name){
					case Globals::$colFormation:
						Notifications::message("Globals::fetch_str: Formation=".$value);
						Globals::$formation = Formation::fromString($value);
						break;
					default:
						throw new UserException("Unkown globals str variable name: ".$name);
				}

			}

			self::$initialized_str = true;
		}
	}

	public static function intGetImpulseId() : int{
		self::fetch();
		return self::$impulseId;
	}
	public static function setImpulseId(int $impulse_id) : void{
		self::$impulseId = $impulse_id;
		Globals::DB_int()->update(['value' => Globals::$impulseId], Globals::$colImpulseID);
	}
	public static function incImpulseId(int $amount) : void{
		self::setImpulseId(self::intGetImpulseId() + $amount);
	}

	public static function intGetRemainingCP() : int{
		self::fetch();
		return self::$intRemainingCP;
	}
	public static function setRemainingCp(int $value) : void{
		self::$intRemainingCP = $value;
		Globals::DB_int()->update(['value' => Globals::$intRemainingCP], Globals::$colRemainingCP);
	}
	public static function incRemainingCP(int $value) : void{
		self::setRemainingCp(self::intGetRemainingCP() + $value);
	}

	public static function intGetDestination() : int{
		self::fetch();
		return self::$destination;
	}
	public static function setDestination(int $value) : void{
		self::$destination = $value;
		Globals::DB_int()->update(['value' => Globals::$destination], Globals::$colDestination);
	}

	public static function intGetOrigin() : int{
		self::fetch();
		return self::$origin;
	}
	public static function setOrigin(int $value) : void{
		self::$origin = $value;
		Globals::DB_int()->update(['value' => Globals::$origin], Globals::$colOrigin);
	}

	public static function intGetUnitBuyType() : int{
		self::fetch();
		return self::$unitBuyType;
	}
	public static function setUnitBuyType(int $value) : void{
		Globals::$unitBuyType = $value;
		Globals::DB_int()->update(['value' => Globals::$unitBuyType], Globals::$colUnitBuyType);
	}

	public static function setFormation(Formation $formation) : void{
		Globals::$formation = $formation;
		Notifications::message("Globals::setFormation: ".Utils::varToString($formation));
		Globals::DB_str()->update(['value' => Globals::$formation->ToString()], Globals::$colFormation);
		//TODO store in/get from DB
	}
	public static function getFormation() : ?Formation{
		self::fetch_str();
		return self::$formation;
	}
	/*
		   * Create and store a global variable declared in this file but not present in DB yet
		   *  (only happens when adding globals while a game is running)
	*/
	public static function create($name) {
		if (!\array_key_exists($name, self::$variables)) {
			return;
		}

		$default = [
			'int' => 0,
			'obj' => [],
			'bool' => false,
			'str' => '',
		];
		$val = $default[self::$variables[$name]];
		try {
			self::DB()->insert([
				'name' => $name,
				'value' => \json_encode($val),
			]);
		} finally {
			self::$data[$name] = $val;
		}
	}

	/*
		   * Setup new game
	*/
	public static function setupNewGame($players, $options) {
		//multipleInsert(['field1', 'field2'])->values([ [1, 'test'], [2, 'tester'], ....])
		Globals::DB_int()->multipleInsert(['name', 'value'])->values([
			[Globals::$colDestination, 0],
			[Globals::$colImpulseID, 0],
			[Globals::$colOrigin, 0],
			[Globals::$colRemainingCP, 0],
			[Globals::$colUnitBuyType, 0],
		]);
		Globals::DB_str()->multipleInsert(['name', 'value'])->values([
			[Globals::$colFormation, ""],
		]);
		self::$intRemainingCP = 0;
	}
}
