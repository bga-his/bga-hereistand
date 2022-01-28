<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * hereistand implementation : ©  CONTRIBUTORS
 *
 * This code has been produced on the BGA studio platform for use on https://boardgamearena.com.
 * See http://en.doc.boardgamearena.com/Studio for more information.
 * -----
 *
 * hereistand.action.php
 *
 * hereistand main action entry point
 *
 */

class action_hereistand extends APP_GameAction {
	// Constructor: please do not modify
	public function __default() {
		if (self::isArg('notifwindow')) {
			$this->view = 'common_notifwindow';
			$this->viewArgs['table'] = self::getArg('table', AT_posint, true);
		} else {
			$this->view = 'hereistand_hereistand';
			self::trace('Complete reinitialization of board game');
		}
	}

	public function actChangePref() {
		self::setAjaxMode();
		$pref = self::getArg('pref', AT_posint, false);
		$value = self::getArg('value', AT_posint, false);
		$this->game->actChangePreference($pref, $value);
		self::ajaxResponse();
	}

	public function actPass() {
		self::setAjaxMode();
		$this->game->actPass();
		self::ajaxResponse();
	}

	public function actPlayCard() {
		self::setAjaxMode();
		$cardId = self::getArg('cardId', AT_posint, false);
		$asEvent = self::getArg('asEvent', AT_bool, false);
		$this->game->actPlayCard($cardId, $asEvent);
		self::ajaxResponse();
	}
}
