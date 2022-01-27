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
 * material.inc.php
 *
 * hereistand game material description
 *
 * Here, you can describe the material of your game with PHP variables.
 *
 * This file is loaded in your game logic class constructor, ie these variables
 * are available everywhere in your game logic code.
 *
 */

require_once 'modules/php/constants.inc.php';

$this->cities = [
	LYON => [
		'name' => clienttranslate('Lyon'),
		'x' => 2430,
		'y' => 1567,
	],
];

$this->tokens = [
	FRANCE_SCM => [
		'style' => 'control France_key',
	],
	FRANCE_REGULAR_1 => [
		'style' => 'military unit French_regular_1',
	],

];

$this->starting_token_counts = [
	FRANCE_SCM => 5,
	FRANCE_REGULAR_1 => 5,
];

$this->setup_base = [
	FRANCE => [
		LYON => [
			FRANCE_REGULAR_1,
			FRANCE_SCM,
		],
	],
];

$this->cards = [
	CARD_JANISSARIES => [
		'cp' => 5,
		'class_name' => 'Janissaries',
		'name' => clienttranslate('Janissaries'),
		'type' => HOME_CARD,
		'power' => OTTOMAN,
	],
	CARD_HOLY_ROMAN_EMPEROR => [
		'cp' => 5,
		'class_name' => 'Holy Roman Emperor',
		'name' => clienttranslate('Holy Roman Emperor'),
		'type' => HOME_CARD,
		'power' => HAPSBURG,
	],

];