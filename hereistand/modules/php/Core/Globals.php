<?php
namespace HIS\Core;

use HIS\Helpers\UserException;
use HIS\Helpers\Utils;

/*
 * Globals
 */
class Globals extends \HIS\Helpers\DB_Manager {
	protected static $initialized = false;

	protected static int $impulseId;//number that increments for each impulse, to "timestamp" stuff that only has effect for one impulse (formation may not move, debator comitted bonus)
	protected static int $remainingCP;//used to track how many CP the active player can spend in their impulse
	protected static int $destination;
	protected static object $formation;
	protected static object $interceptFormation;
	protected static int $origin;
	protected static int $unitByType;
	protected static int $unitBuyType;
	protected static object $fieldBattle;
	protected static object $retreats;


	protected static $table = 'global_variables';
	protected static $primary = 'name';

	/*
		   * Fetch all existings variables from DB
	*/
	public static function fetch() {
		if (!self::$initialized) {
			// Turn of LOG to avoid infinite loop (Globals::isLogging() calling itself for fetching)
			$tmp = self::$log;
			self::$log = false;

			foreach (
				self::DB()
				->select(['value', 'name'])
				->get(false) as $name => $variable
			) {
				switch($name){
					case "impulseId":
						self::$impulseId = $variable;
						break;
					case "remainingCP":
						self::$remainingCP = $variable;
						break;
					case "destination":
						self::$destination = $variable;
						break;
					case "formation":
						self::$formation = $variable;
						break;
					case "interceptFormation":
						self::$interceptFormation = $variable;
						break;
					case "origin":
						self::$origin = $variable;
						break;
					case "unitBuyType":
						self::$unitBuyType = $variable;
						break;
					case "fieldBattle":
						self::$fieldBattle = $variable;
						break;
					case "retreats":
						self::$retreats = $variable;
						break;
					default:
						throw new UserException("Unkown globals variable name: ".$name);
				}

			}

			self::$initialized = true;
			self::$log = $tmp;
		}
	}

	public static function intGetImpulseId() : int{
		self::fetch();
		return self::$impulseId;
	}
	public static function setImpulseId(int $impulse_id) : void{
		self::$impulseId = $impulse_id;
		self::DB()->update(['value' => \addslashes(\json_encode($impulse_id))], "impulseId");
	}

	public static function intGetRemainingCp() : int{
		self::fetch();
		return self::$remainingCP;
	}
	public static function setRemainingCp(int $value) : void{
		self::$remainingCP = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "remainingCP");
	}

	public static function intGetDestination() : int{
		self::fetch();
		return self::$destination;
	}
	public static function setDestination(int $value) : void{
		self::$destination = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "destination");
	}

	public static function intGetFormation() : object{
		self::fetch();
		return self::$formation;
	}
	public static function setFormation(object $value) : void{
		self::$formation = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "formation");
	}

	public static function intGetInterceptFormation() : object{
		self::fetch();
		return self::$interceptFormation;
	}
	public static function setInterceptFormation(object $value) : void{
		self::$interceptFormation = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "interceptFormation");
	}

	public static function intGetOrigin() : int{
		self::fetch();
		return self::$origin;
	}
	public static function setOrigin(int $value) : void{
		self::$origin = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "origin");
	}

	public static function intGetUnitBuyType() : int{
		self::fetch();
		return self::$unitBuyType;
	}
	public static function setUnitBuyType(int $value) : void{
		self::$unitBuyType = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "unitBuyType");
	}

	public static function intGetFieldBattle() : object{
		self::fetch();
		return self::$fieldBattle;
	}
	public static function setFieldBattle(object $value) : void{
		self::$fieldBattle = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "fieldBattle");
	}

	public static function intGetRetreats() : object{
		self::fetch();
		return self::$retreats;
	}
	public static function setRetreats(object $value) : void{
		self::$retreats = $value;
		self::DB()->update(['value' => \addslashes(\json_encode($value))], "retreats");
	}

	/*
		   * Magic method that intercept not defined static method and do the appropriate stuff
	*/
	public static function __callStatic($method, $args) {
		throw new UserException("Do NOT call Globals::__callStatic: method".$method." args".Utils::varToString($args));
		if (!self::$initialized) {
			self::fetch();
		}

		if (preg_match('/^([gs]et|inc|is)([A-Z])(.*)$/', $method, $match)) {
			// Sanity check : does the name correspond to a declared variable ?
			$name = strtolower($match[2]) . $match[3];
			if (!\array_key_exists($name, self::$variables)) {
				throw new \InvalidArgumentException("Property {$name} doesn't exist");
			}

			// Create in DB if don't exist yet
			if (!\array_key_exists($name, self::$data)) {
				self::create($name);
			}

			if ($match[1] == 'get') {
				// Basic getters
				return self::$data[$name];
			} elseif ($match[1] == 'is') {
				// Boolean getter
				if (self::$variables[$name] != 'bool') {
					throw new \InvalidArgumentException("Property {$name} is not of type bool");
				}
				return (bool) self::$data[$name];
			} elseif ($match[1] == 'set') {
				// Setters in DB and update cache
				$value = $args[0];
				if (self::$variables[$name] == 'int') {
					$value = (int) $value;
				}
				if (self::$variables[$name] == 'bool') {
					$value = (bool) $value;
				}

				self::$data[$name] = $value;
				self::DB()->update(['value' => \addslashes(\json_encode($value))], $name);
				return $value;
			} elseif ($match[1] == 'inc') {
				if (self::$variables[$name] != 'int') {
					throw new \InvalidArgumentException("Trying to increase {$name} which is not an int");
				}

				$getter = 'get' . $match[2] . $match[3];
				$setter = 'set' . $match[2] . $match[3];
				return self::$setter(self::$getter() + (empty($args) ? 1 : $args[0]));
			}
		} else {
			throw new \feException('unknown method ' . $method);
			return null;
		}
		// return undefined;
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
	}
}
