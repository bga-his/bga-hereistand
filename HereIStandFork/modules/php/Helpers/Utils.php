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

	function join_multidim($glue, $arr){
        //asssumes the number of dimensions in $arr is smaler or equal to the length of $delimeter
        if(count($glue) == 0){
            return "err: to few glue";
        }
        if(!@is_array($arr)){
            return "err: arr is no arr";
        }
        $res = "";
        foreach($arr as $i=>$val){
            if (@is_array($val)){
                $res = "{$res}{$i}=>(".self::join_multidim(array_slice($glue, 1), $val).")$glue[0]";
            }else{
                $res = "{$res}{$i}:{$val}{$glue[0]}";
            }
        }
        return $res;
    }
}
