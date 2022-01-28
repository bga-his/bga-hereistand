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
 * states.inc.php
 *
 * hereistand game states description
 *
 */

$machinestates = [
	// The initial state. Please do not modify.
	ST_GAME_SETUP => [
		'name' => 'gameSetup',
		'description' => '',
		'type' => 'manager',
		'action' => 'stGameSetup',
		'transitions' => ['' => ST_PICK_CARD],
	],

	ST_PICK_CARD => [
		'name' => 'pickCard',
		'description' => clienttranslate('${actplayer} must play a card or pass'),
		'descriptionmyturn' => clienttranslate('${you} must play a card or pass'),
		'type' => 'activeplayer',
		'possibleactions' => ['actPlayCard', 'actPass'],
		'transitions' => ['playCP' => ST_IMPULSE_ACTIONS, 'pass' => ST_NEXT_PLAYER],
	],

	ST_IMPULSE_ACTIONS => [
		'name' => 'impulseActions',
		'description' => clienttranslate('${actplayer} must take actions'),
		'descriptionmyturn' => clienttranslate('${you} must take actions'),
		'type' => 'activeplayer',
		'possibleactions' => ['actMoveInClear', 'actPass'],
		'transitions' => ['pass' => ST_NEXT_PLAYER],
	],

	ST_NEXT_PLAYER => [
		'name' => 'nextPlayer',
		'description' => 'End a players impulse and move to next',
		'type' => 'manager',
		'action' => 'stNextPlayer',
		'transitions' => ['nextPlayer' => ST_PICK_CARD],
	],

	// Final state.
	// Please do not modify (and do not overload action/args methods).
	ST_END_GAME => [
		'name' => 'gameEnd',
		'description' => clienttranslate('End of game'),
		'type' => 'manager',
		'action' => 'stGameEnd',
		'args' => 'argGameEnd',
	],
];
