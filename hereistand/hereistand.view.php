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
		foreach ($this->game->cities as $city_name => $city) {
			$this->page->insert_block("city", array(
				'X' => $city['x'],
				'Y' => $city['y'],
				'NAME' => $city_name,
			));
		}
		$this->page->begin_block("hereistand_hereistand", "location");
		foreach ($this->game->board_locations as $location_id => $location) {
			$this->page->insert_block("location", array(
				'X' => $location['x'],
				'Y' => $location['y'],
				'ID' => $location_id,
			));
		}
	}
}
