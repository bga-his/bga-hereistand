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
		$this->page->begin_block("hereistand_hereistand", "space");
		foreach ($this->game->spaces as $space_id => $space) {
			$this->page->insert_block("space", array(
				'X' => $space['x'],
				'Y' => $space['y'],
				'ID' => $space_id,
				'NAME' => $space['name'],
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
			if ($location['board'] == 'powercards') {
				$this->page->insert_block("power_card_location", array(
					'X' => $location['x'],
					'Y' => $location['y'],
					'ID' => $location_id,
				));
			}
		}
		$this->page->begin_block("hereistand_hereistand", "religious_struggle_location");
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
