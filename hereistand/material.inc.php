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
	'lyon' => [
		'name' => 'Lyon',
		'x' => 2430,
		'y' => 1567,
	],
];

$this->tokens = [
	SCM => [
		'style' => 'France_key',
	],

];

$this->setup_base = [
	'france' => [
		'lyon' => [
			'1 regular',
			'SCM',
		],
	],
];