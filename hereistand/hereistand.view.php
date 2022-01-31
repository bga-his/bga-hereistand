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
 * hereistand.view.php
 *
 */

require_once APP_BASE_PATH . 'view/common/game.view.php';

class view_hereistand_hereistand extends game_view {
	function getGameName() {
		return 'hereistand';
	}
	function build_page($viewArgs) {
		$this->page->begin_block("hereistand_hereistand", "city");
		foreach ($this->game->cities as $city_id => $city) {
			$this->page->insert_block("city", array(
				'X' => $city['x'],
				'Y' => $city['y'],
				'ID' => $city_id,
				'NAME' => $city['name'],
			));
		}
		$this->page->begin_block("hereistand_hereistand", "map_location");
		foreach ($this->game->board_locations as $location_id => $location) {
			if ($location['board'] == 'map') {
				$this->page->insert_block("map_location", array(
					'X' => $location['x'],
					'Y' => $location['y'],
					'ID' => $location_id,
				));
			}
		}
		$this->page->begin_block("hereistand_hereistand", "power_card_location");
		foreach ($this->game->board_locations as $location_id => $location) {
			if ($location['board'] == 'power_cards') {
				$this->page->insert_block("power_card_location", array(
					'X' => $location['x'],
					'Y' => $location['y'],
					'ID' => $location_id,
				));
			}
		}
		$this->page->begin_block("hereistand_hereistand", "religious_struggle_location");
		foreach ($this->game->board_locations as $location_id => $location) {
			if ($location['board'] == 'religious_struggle') {
				$this->page->insert_block("religious_struggle_location", array(
					'X' => $location['x'],
					'Y' => $location['y'],
					'ID' => $location_id,
				));
			}
		}
	}
}
