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
		'power' => FRANCE,
		'db_id' => "france_scm_{INDEX}",
	],
	FRANCE_REGULAR_1 => [
		'style' => 'military unit French_regular_1',
		'power' => FRANCE,
		'db_id' => "france_regular_1_{INDEX}",
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
		'class_name' => 'HolyRomanEmperor',
		'name' => clienttranslate('Holy Roman Emperor'),
		'type' => HOME_CARD,
		'power' => HAPSBURG,
	],
	CARD_SIX_WIVES_OF_HENRY_VIII => [
		'cp' => 5,
		'class_name' => 'SixWives',
		'name' => clienttranslate('Six Wives of Henry VIII'),
		'type' => HOME_CARD,
		'power' => ENGLAND,
	],
	CARD_PATRON_OF_THE_ARTS => [
		'cp' => 5,
		'class_name' => 'PatronArts',
		'name' => clienttranslate('Patron of the Arts'),
		'type' => HOME_CARD,
		'power' => FRANCE,
	],
	CARD_PAPAL_BULL => [
		'cp' => 4,
		'class_name' => 'PapalBull',
		'name' => clienttranslate('Papal Bull'),
		'type' => HOME_CARD,
		'power' => PAPAL,
	],
	CARD_LEIPZIG_DEBATE => [
		'cp' => 3,
		'class_name' => 'LeipzigDebate',
		'name' => clienttranslate('LeipzigDebate'),
		'type' => HOME_CARD,
		'power' => PAPAL,
	],
	CARD_HERE_I_STAND => [
		'cp' => 5,
		'class_name' => 'HereIStand',
		'name' => clienttranslate('Here I Stand'),
		'type' => HOME_CARD,
		'power' => PROTESTANT,
	],
];