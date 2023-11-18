<?php
namespace HIS;

use TokenIDs;
use LocationIDs;
use SpaceIDs;
use Powers;
use tokenIDs_LEADER;
use tokenIDs_UNITS;
use tokenIDs_NAVAL;
use tokenIDs_CONTROL;

trait SetupTrait {
	public function getTokenSetup() {
		return [
			[TokenIDs::VP_OTTOMAN, LocationIDS::VICTORY_TRACK_8],
			[TokenIDs::PIRACY_VP, LocationIDs::PIRACY_0],
			[TokenIDs::VP_HAPSBURG, LocationIDs::VICTORY_TRACK_9],
			[TokenIDs::VP_ENGLAND, LocationIDs::VICTORY_TRACK_9],
			[TokenIDs::VP_FRANCE, LocationIDs::VICTORY_TRACK_12],
			[TokenIDs::VP_PAPACY, LocationIDs::VICTORY_TRACK_19],
			[TokenIDs::VP_PROTESTANT, LocationIDs::VICTORY_TRACK_0],
			[TokenIDs::AT_WAR, LocationIDs::DIPLO_HAP_FRA],
			[TokenIDs::AT_WAR, LocationIDs::DIPLO_FRA_PAP],
			[TokenIDs::AT_WAR, LocationIDs::DIPLO_OTT_HUN],
			[TokenIDs::ENGLISH_PROT_COUNTER, LocationIDs::PROTESTANT_SPACES_0],
			[TokenIDs::PROTESTANT_SPACES, LocationIDs::PROTESTANT_SPACES_0],
			[TokenIDs::PROTESTANT_2UNIT, LocationIDs::ELECTORATE_DISPLAY_WIT],
			[TokenIDs::PROTESTANT_2UNIT, LocationIDs::ELECTORATE_DISPLAY_AUG],
			[TokenIDs::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_COL],
			[TokenIDs::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_TRI],
			[TokenIDs::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_MAI],
			[TokenIDs::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_BRA],
			[TokenIDs::BUCER, LocationIDs::DEBATER_GER_1],
			[TokenIDs::LUTHER, LocationIDs::DEBATER_GER_3],
			[TokenIDs::MELANCHTHON, LocationIDs::DEBATER_GER_2],
			[TokenIDs::CARLSTADT, LocationIDs::DEBATER_GER_4],
			[TokenIDs::ECK, LocationIDs::DEBATER_POPE_1],
			[TokenIDs::CAMPEGGIO, LocationIDs::DEBATER_POPE_2],
			[TokenIDs::ALEANDER, LocationIDs::DEBATER_POPE_3],
			[TokenIDs::TETZEL, LocationIDs::DEBATER_POPE_4],
			[TokenIDs::CAJETAN, LocationIDs::DEBATER_POPE_5],
			[TokenIDs::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_11],
			[TokenIDs::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_10],
			[TokenIDs::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_9],
			[TokenIDs::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_8],
			[TokenIDs::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_7],
			[TokenIDs::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_6],
			[TokenIDs::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_5],
			[TokenIDs::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_14],
			[TokenIDs::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_13],
			[TokenIDs::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_12],
			[TokenIDs::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_11],
			[TokenIDs::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_10],
			[TokenIDs::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_9],
			[TokenIDs::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_9],
			[TokenIDs::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_8],
			[TokenIDs::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_7],
			[TokenIDs::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_6],
			[TokenIDs::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_5],
			[TokenIDs::HENRY_MARITAL_STATUS, LocationIDs::MARITAL_STATUS_1],
			[TokenIDs::FRANCE_KEY, LocationIDs::FRANCE_KEY_11],
			[TokenIDs::FRANCE_KEY, LocationIDs::FRANCE_KEY_10],
			[TokenIDs::FRANCE_KEY, LocationIDs::FRANCE_KEY_9],
			[TokenIDs::FRANCE_KEY, LocationIDs::FRANCE_KEY_8],
			[TokenIDs::FRANCE_KEY, LocationIDs::FRANCE_KEY_7],
			[TokenIDs::CHATEAUX_VP, LocationIDs::CHATEAUX_0],
			[TokenIDs::PAPACY_KEY, LocationIDs::PAPACY_KEY_7],
			[TokenIDs::PAPACY_KEY, LocationIDs::PAPACY_KEY_6],
			[TokenIDs::PAPACY_KEY, LocationIDs::PAPACY_KEY_5],
			[TokenIDs::PAPACY_KEY, LocationIDs::PAPACY_KEY_4],
			[TokenIDs::PAPACY_KEY, LocationIDs::PAPACY_KEY_3],
			[TokenIDs::ST_PETERS_VP, LocationIDs::SAINT_PETERS_VP_0],
			[TokenIDs::ST_PETERS_CP, LocationIDs::SAINT_PETERS_CP_0],
			[TokenIDs::NEW_TESTAMENT_ENGLISH, LocationIDs::NT_TRANSLATION_0],
			[TokenIDs::BIBLE_ENGLISH, LocationIDs::BIBLE_TRANSLATION_0],
			[TokenIDs::NEW_TESTAMENT_FRENCH, LocationIDs::NT_TRANSLATION_0],
			[TokenIDs::BIBLE_FRENCH, LocationIDs::BIBLE_TRANSLATION_0],
			[TokenIDs::NEW_TESTAMENT_GERMAN, LocationIDs::NT_TRANSLATION_0],
			[TokenIDs::BIBLE_GERMAN, LocationIDs::BIBLE_TRANSLATION_0],
			[TokenIDs::TURN, LocationIDs::TURN_TRACK_1],
			[TokenIDs::ST_LAWRENCE_RIVER_1VP, LocationIDs::ST_LAWRENCE_RIVER],
			[TokenIDs::GREAT_LAKES_1VP, LocationIDs::GREAT_LAKES],
			[TokenIDs::MISSISSIPPI_RIVER_1VP, LocationIDs::MISSISSIPI_RIVER],
			[TokenIDs::AZTECS_2VP, LocationIDs::AZTEC],
			[TokenIDs::MAYA_1VP, LocationIDs::MAYA],
			[TokenIDs::AMAZON_RIVER_2VP, LocationIDs::AMAZON_RIVER],
			[TokenIDs::INCA_2VP, LocationIDs::INCA],
			[TokenIDs::CIRCUMNAVIGATION_3VP, LocationIDs::CIRCUMNAVIGATION],
			[TokenIDs::PACIFIC_STRAIT_1VP, LocationIDs::PACIFIC_STRAIT],
			[TokenIDs::HAPSBURG_CONQUEST, LocationIDs::CROSSING_ATLANTIC_1],
			[TokenIDs::HAPSBURG_EXPLORATION, LocationIDs::CROSSING_ATLANTIC_2],
		];
	}

	public function getSetup() {
		$setup_base = [
			Powers::OTTOMAN => [
				SpaceIDs::ISTANBUL => [
					tokenIDs_LEADER::SULEIMAN,
					tokenIDs_LEADER::IBRAHIM,
					tokenIDs_UNITS::OTTOMAN_6UNIT,
					tokenIDs_UNITS::OTTOMAN_1UNIT,
					tokenIDs_CONTROL::OTTOMAN_KEY,
					tokenIDs_NAVAL::OTTOMAN_SQUADRON,
					tokenIDs_UNITS::OTTOMAN_1UNIT,
				],
				SpaceIDs::EDIRNE => [
					tokenIDs_UNITS::OTTOMAN_1UNIT,
					tokenIDs_CONTROL::OTTOMAN_KEY,
				],
				SpaceIDs::SALONIKA => [
					tokenIDs_UNITS::OTTOMAN_1UNIT,
					tokenIDs_CONTROL::OTTOMAN_KEY,
					tokenIDs_NAVAL::OTTOMAN_SQUADRON,
				],
				SpaceIDs::ATHENS => [
					tokenIDs_UNITS::OTTOMAN_1UNIT,
					tokenIDs_CONTROL::OTTOMAN_KEY,
					tokenIDs_NAVAL::OTTOMAN_SQUADRON,
				],
			],
			Powers::HAPSBURG => [
				SpaceIDs::VALLADOLID => [
					tokenIDs_LEADER::CHARLES_V,
					tokenIDs_LEADER::DUKE_ALVA,
					tokenIDs_UNITS::HAPSBURG_4UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
				],
				SpaceIDs::SEVILLE => [
					tokenIDs_UNITS::HAPSBURG_1UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
					tokenIDs_NAVAL::HAPSBURG_SQUADRON,
				],
				SpaceIDs::BARCELONA => [
					tokenIDs_UNITS::HAPSBURG_1UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
					tokenIDs_NAVAL::HAPSBURG_SQUADRON,
				],
				SpaceIDs::NAVARRE => [
					tokenIDs_UNITS::HAPSBURG_1UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
				],
				SpaceIDs::TUNIS => [
					tokenIDs_UNITS::HAPSBURG_1UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
				],
				SpaceIDs::NAPLES => [
					tokenIDs_UNITS::HAPSBURG_2UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
					tokenIDs_NAVAL::HAPSBURG_SQUADRON,
				],
				SpaceIDs::BESANCON => [
					tokenIDs_UNITS::HAPSBURG_1UNIT,
				],
				SpaceIDs::BRUSSELS => [
					tokenIDs_UNITS::HAPSBURG_1UNIT,
				],
				SpaceIDs::VIENNA => [
					tokenIDs_LEADER::FERDINAND,
					tokenIDs_UNITS::HAPSBURG_4UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
				],
				SpaceIDs::ANTWERP => [
					tokenIDs_UNITS::HAPSBURG_2UNIT,
					tokenIDs_UNITS::HAPSBURG_1UNIT,
					tokenIDs_CONTROL::HAPSBURG_KEY,
				],
				SpaceIDs::WITTENBERG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::BRANDENBURG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::MAINZ => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::COLOGNE => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::TRIER => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::AUGSBURG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::STETTIN => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::LUBECK => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::MAGDEBURG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::HAMBURG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::BRUNSWICK => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::BREMEN => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::MUNSTER => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::KASSEL => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::ERFURT => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::LEIPZIG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::NUREMBERG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::WORMS => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::REGENSBURG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::STRASBURG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
				SpaceIDs::SALZBURG => [
					tokenIDs_CONTROL::HAPSBURG_HEX,
				],
			],
			Powers::PROTESTANT => [
			],
			Powers::ENGLAND => [
				SpaceIDs::LONDON => [
					tokenIDs_LEADER::HENRY_VIII,
					tokenIDs_LEADER::BRANDON,
					tokenIDs_UNITS::ENGLAND_1UNIT,
					tokenIDs_UNITS::ENGLAND_2UNIT,
					tokenIDs_CONTROL::ENGLAND_KEY,
					tokenIDs_NAVAL::ENGLISH_SQUADRON,
				],
				SpaceIDs::PORTSMOUTH => [
					tokenIDs_NAVAL::ENGLISH_SQUADRON,
				],
				SpaceIDs::CALAIS => [
					tokenIDs_UNITS::ENGLAND_2UNIT,
					tokenIDs_CONTROL::ENGLAND_KEY,
				],
				SpaceIDs::YORK => [
					tokenIDs_UNITS::ENGLAND_1UNIT,
					tokenIDs_CONTROL::ENGLAND_KEY,
				],
				SpaceIDs::BRISTOL => [
					tokenIDs_UNITS::ENGLAND_1UNIT,
					tokenIDs_CONTROL::ENGLAND_KEY,
				],
			],
			Powers::FRANCE => [
				SpaceIDs::PARIS => [
					tokenIDs_LEADER::FRANCIS_I,
					tokenIDs_LEADER::MONTMORENCY,
					tokenIDs_UNITS::FRANCE_4UNIT,
					tokenIDs_CONTROL::FRANCE_KEY,
				],
				SpaceIDs::ROUEN => [
					tokenIDs_UNITS::FRANCE_1UNIT,
					tokenIDs_NAVAL::FRENCH_SQUADRON,
					tokenIDs_CONTROL::FRANCE_KEY,
				],
				SpaceIDs::BORDEAUX => [
					tokenIDs_UNITS::FRANCE_2UNIT,
					tokenIDs_CONTROL::FRANCE_KEY,
				],
				SpaceIDs::LYON => [
					tokenIDs_UNITS::FRANCE_1UNIT,
					tokenIDs_CONTROL::FRANCE_KEY,
				],
				SpaceIDs::MARSEILLE => [
					tokenIDs_UNITS::FRANCE_1UNIT,
					tokenIDs_NAVAL::FRENCH_SQUADRON,
					tokenIDs_CONTROL::FRANCE_KEY,
				],
				SpaceIDs::TURIN => [
					tokenIDs_CONTROL::FRANCE_HEX,
				],
				SpaceIDs::MILAN => [
					tokenIDs_UNITS::FRANCE_2UNIT,
					tokenIDs_CONTROL::FRANCE_KEY,
				],
			],
			Powers::PAPACY => [
				SpaceIDs::ROME => [
					tokenIDs_UNITS::PAPACY_1UNIT,
					tokenIDs_NAVAL::PAPACY_SQUADRON,
					tokenIDs_CONTROL::PAPACY_KEY,
				],
				SpaceIDs::RAVENNA => [
					tokenIDs_UNITS::PAPACY_1UNIT,
					tokenIDs_CONTROL::PAPACY_KEY,
				],
			],
			Powers::MINOR_VENICE => [
				SpaceIDs::VENICE => [
					tokenIDs_UNITS::VENICE_1UNIT,
					tokenIDs_UNITS::VENICE_1UNIT,
					tokenIDs_NAVAL::VENETIAN_SQUADRON,
					tokenIDs_NAVAL::VENETIAN_SQUADRON,
					tokenIDs_NAVAL::VENETIAN_SQUADRON,
				],
				SpaceIDs::CORFU => [
					tokenIDs_UNITS::VENICE_1UNIT,
				],
				SpaceIDs::CANDIA => [
					tokenIDs_UNITS::VENICE_1UNIT,
				],
			],
			Powers::MINOR_GENOA => [
				SpaceIDs::GENOA => [
					tokenIDs_LEADER::ANDREA_DORIA,
					tokenIDs_UNITS::GENOA_1UNIT,
					tokenIDs_UNITS::GENOA_1UNIT,
					tokenIDs_NAVAL::GENOESE_SQAUADRON,
				],
			],
			Powers::MINOR_HUNGARY => [
				SpaceIDs::BELGRADE => [
					tokenIDs_UNITS::HUNGARY_1UNIT,
				],
				SpaceIDs::BUDA => [
					tokenIDs_UNITS::HUNGARY_4UNIT,
					tokenIDs_UNITS::HUNGARY_1UNIT,
				],
				SpaceIDs::PRAGUE => [
					tokenIDs_UNITS::HUNGARY_1UNIT,
				],
			],
			Powers::MINOR_SCOTLAND => [
				SpaceIDs::EDINBURGH => [
					tokenIDs_UNITS::SCOTLAND_1UNIT,
					tokenIDs_UNITS::SCOTLAND_1UNIT,
					tokenIDs_UNITS::SCOTLAND_1UNIT,
					tokenIDs_NAVAL::SCOTTISH_SQUADRON,
				],
			],
			Powers::INDEPENDENT => [
				SpaceIDs::RHODES => [
					tokenIDs_UNITS::KNIGHTS_1UNIT,
				],
				SpaceIDs::METZ => [
					tokenIDs_UNITS::INDEPENDENT_1UNIT,
				],
				SpaceIDs::FLORENCE => [
					tokenIDs_UNITS::INDEPENDENT_1UNIT,
				],
			],

		];

		return $setup_base;
	}
}
