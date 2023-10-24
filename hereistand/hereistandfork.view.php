<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * hereistandfork implementation : © CONTRIBUTORS
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * hereistandfork.view.php
 *
 */

require_once APP_BASE_PATH . 'view/common/game.view.php';

class view_hereistandfork_hereistandfork extends game_view {
	function getGameName() {
		return 'hereistandfork';
	}
	function build_page($viewArgs) {
		$this->page->begin_block("hereistandfork_hereistandfork", "city");
		foreach ($this->game->cities as $city_id => $city) {
			$this->page->insert_block("city", array(
				'X' => $city['x'],
				'Y' => $city['y'],
				'ID' => $city_id,
				'NAME' => $city['name'],
			));
		}
		$this->page->begin_block("hereistandfork_hereistandfork", "map_location");
		foreach ($this->game->board_locations as $location_id => $location) {
			if ($location['board'] == 'map') {
				$this->page->insert_block("map_location", array(
					'X' => $location['x'],
					'Y' => $location['y'],
					'ID' => $location_id,
				));
			}
		}
		$this->page->begin_block("hereistandfork_hereistandfork", "power_card_location");
		foreach ($this->game->board_locations as $location_id => $location) {
			if ($location['board'] == 'powercards') {
				$this->page->insert_block("power_card_location", array(
					'X' => $location['x'],
					'Y' => $location['y'],
					'ID' => $location_id,
				));
			}
		}
		$this->page->begin_block("hereistandfork_hereistandfork", "religious_struggle_location");
		foreach ($this->game->board_locations as $location_id => $location) {
			if ($location['board'] == 'religiousstruggle') {
				$this->page->insert_block("religious_struggle_location", array(
					'X' => $location['x'],
					'Y' => $location['y'],
					'ID' => $location_id,
				));
			}
		}
	}
}
