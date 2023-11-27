<?php
namespace HIS\Helpers;

use HIS\Core\Notifications;
use TrackTokens;
use Powers;

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

	public static function varToString($var){
		return var_export($var, true);
	}

	public static function cmdStrToPower($strPower){
		if(strtolower($strPower) == 'otto'){
			return Powers::OTTOMAN;
		}
		if(strtolower($strPower) == 'haps'){
			return Powers::HAPSBURG;
		}
		if(strtolower($strPower) == 'england'){
			return Powers::ENGLAND;
		}
		if(strtolower($strPower) == "france"){
			return Powers::FRANCE;
		}
		if(strtolower($strPower) == 'papacy'){
			return Powers::PAPACY;
		}
		if(strtolower($strPower) == 'prot'){
			return Powers::PROTESTANT;
		}
		Notifications::message("unkown power: ".$strPower);
		return Powers::OTTOMAN;
	}
}
