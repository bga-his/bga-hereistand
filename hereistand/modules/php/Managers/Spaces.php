<?php
namespace HIS\Managers;
use HIS\Core\Game;
use HIS\Managers\Tokens;
use HIS\Models\Space;
use SpaceIDs;

/*
 * Spaces: all utility functions concerning spaces
 */

class Spaces {
	public static function getAll() {
		$spaces = [];
		$tokens = Tokens::getAll();
		foreach (Game::get()->spaces as $space_id => $space) {
			$spaces[] = new Space($space, $tokens);
		}
	}

	public static function getByID($spaceId) {
		return Game::get()->spaces[$spaceId];
		// //space of id3109 = HIS\Models\Space::__set_state(array( 'attributes' => NULL, 'tokens' => array ( ), 'id' => array ( 'x' => 4188, 'y' => 1777, 'name' => 'Nezh', 'home_power' => 'ottoman', 'language' => 'other', 'connections' => array ( 0 => 3114, 1 => 3105, ), 'id' => 3109, 'passes' => array ( 0 => 3101, ), ), ))
		//$spaces = [];
		//$tokens = Tokens::getAll();
		//foreach (Game::get()->spaces as $space_id => $space) {
		//	if($space_id == $spaceId){
		//		return new Space($space, $tokens);
		//	}
		//}
	}

	public static function getByName($name){
		$spaces = [];
		$tokens = Tokens::getAll();
		foreach (Game::get()->spaces as $space_id => $space) {
			if($space->attributes['name'] = $name){
				return new Space($space, $tokens);
			}
		}
	}

	public static function getHomeSpaces($power){
		$spaces = Game::get()->spaces;//This works (Game::get() is a reference to the game object), but VScode underlines it as wrong.
		$home_spaces = [];
		foreach ($spaces as $space_id => $space) {
			
			if ($space['home_power'] == $power) {
				$home_spaces[] = $space_id;
			}
		}
		return $home_spaces;
	}

	//string -> power
	public static function getControllPowerByName($name){
		return Spaces::getByName($name)->getControl();
	}

	public static function getControllPowerById($space_id){
		return Spaces::getByID($space_id)->getControl();
	}
}
