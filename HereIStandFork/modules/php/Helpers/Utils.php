<?php
namespace HIS\Helpers;

use function PHPSTORM_META\type;

abstract class Utils extends \APP_DbObject {
	public static function filter(&$data, $filter) {
		$data = array_values(array_filter($data, $filter));
	}

	public static function die($args = null) {
		if (is_null($args)) {
			throw new \BgaVisibleSystemException(implode('<br>', self::$logmsg));
		}
		throw new \BgaVisibleSystemException(json_encode($args));
	}

	public static function diff(&$data, $arr) {
		$data = array_values(array_diff($data, $arr));
	}

	public static function shuffle_assoc(&$array) {
		$keys = array_keys($array);
		shuffle($keys);

		foreach ($keys as $key) {
			$new[$key] = $array[$key];
		}

		$array = $new;
		return true;
	}

	public static function rollDice($num) {
		$dice = [];
		for ($i = 0; $i < $num; $i++) {
			$dice[] = bga_rand(1, 6);
		}
		return $dice;
	}

	public static function countHits($dice, $threshold) {
		$hits = 0;
		foreach ($dice as $die) {
			if ($die >= $threshold) {
				$hits += 1;
			}
		}
		return $hits;
	}

	public static function arrayToString($arr){
		$strR = "";
		if(is_array($arr)){
			foreach($arr as $objElem){
				$strR .= Utils::arrayToString($objElem);
			}
		}else{
			$strR .= "{$arr}";
		}
		return $strR;
	}
}
