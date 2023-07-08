<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * hereistandfork implementation : ©  CONTRIBUTORS
 *
 * This code has been produced on the BGA studio platform for use on https://boardgamearena.com.
 * See http://en.doc.boardgamearena.com/Studio for more information.
 * -----
 *
 * hereistandfork.action.php
 *
 * hereistandfork main action entry point
 *
 */

class action_hereistandfork extends APP_GameAction {
	// Constructor: please do not modify
	public function __default() {
		if (self::isArg('notifwindow')) {
			$this->view = 'common_notifwindow';
			$this->viewArgs['table'] = self::getArg('table', AT_posint, true);
		} else {
			$this->view = 'hereistandfork_hereistandfork';
			self::trace('Complete reinitialization of board game');
		}
	}

	public function getIDArray($ids_raw) {
		$ids_raw = trim($ids_raw);

		if ($ids_raw == '') {
			$ids = array();
		} else {
			$ids = explode(' ', $ids_raw);
		}
		return $ids;
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

	public function actUndo() {
		self::setAjaxMode();
		$this->game->actUndo();
		self::ajaxResponse();
	}

	public function actPlayCard() {
		self::setAjaxMode();
		$cardId = self::getArg('cardId', AT_posint, true);
		$asEvent = self::getArg('asEvent', AT_bool, false);
		$this->game->actPlayCard($cardId, $asEvent);
		self::ajaxResponse();
	}

	public function actMove() {
		self::setAjaxMode();
		$this->game->actMove();
		self::ajaxResponse();
	}

	public function actWithdraw() {
		self::setAjaxMode();
		$this->game->actWithdraw();
		self::ajaxResponse();
	}

	public function actDeclareFormation() {
		self::setAjaxMode();
		$token_ids_raw = self::getArg('token_ids', AT_alphanum, true);
		$token_ids = self::getIDArray($token_ids_raw);
		$this->game->actDeclareFormation($token_ids);
		self::ajaxResponse();
	}

	public function actDeclareDestination() {
		self::setAjaxMode();
		$destination_id = self::getArg('destination_id', AT_posint, true);
		$this->game->actDeclareDestination($destination_id);
		self::ajaxResponse();
	}

	public function actDeclareIntercept() {
		self::setAjaxMode();
		$token_ids_raw = self::getArg('token_ids', AT_alphanum, true);
		$token_ids = self::getIDArray($token_ids_raw);
		$this->game->actDeclareIntercept($token_ids);
		self::ajaxResponse();
	}

	public function actDeclareAvoid() {
		self::setAjaxMode();
		$token_ids_raw = self::getArg('token_ids', AT_alphanum, true);
		$token_ids = self::getIDArray($token_ids_raw);
		$this->game->actDeclareAvoid($token_ids);
		self::ajaxResponse();
	}

	public function actDeclareCasualties() {
		self::setAjaxMode();
		$token_ids_raw = self::getArg('token_ids', AT_alphanum, true);
		$token_ids = self::getIDArray($token_ids_raw);
		$this->game->actDeclareCasualties($token_ids);
		self::ajaxResponse();
	}

	public function actBuyUnit() {
		self::setAjaxMode();
		$unit_type = self::getArg('unit_type', AT_posint, true);
		$this->game->actBuyUnit($unit_type);
		self::ajaxResponse();
	}

	public function actPickCity() {
		self::setAjaxMode();
		$city_id = self::getArg('city_id', AT_posint, true);
		$this->game->actPickCity($city_id);
		self::ajaxResponse();
	}

}
