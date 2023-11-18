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
			[TokenIds::VP_OTTOMAN, LocationIDS::VICTORY_TRACK_8],
			[TokenIds::PIRACY_VP, LocationIDs::PIRACY_0],
			[TokenIds::VP_HAPSBURG, LocationIDs::VICTORY_TRACK_9],
			[TokenIds::VP_ENGLAND, LocationIDs::VICTORY_TRACK_9],
			[TokenIds::VP_FRANCE, LocationIDs::VICTORY_TRACK_12],
			[TokenIds::VP_PAPACY, LocationIDs::VICTORY_TRACK_19],
			[TokenIds::VP_PROTESTANT, LocationIDs::VICTORY_TRACK_0],
			[TokenIds::AT_WAR, LocationIDs::DIPLO_HAP_FRA],
			[TokenIds::AT_WAR, LocationIDs::DIPLO_FRA_PAP],
			[TokenIds::AT_WAR, LocationIDs::DIPLO_OTT_HUN],
			[TokenIds::ENGLISH_PROT_COUNTER, LocationIDs::PROTESTANT_SPACES_0],
			[TokenIds::PROTESTANT_SPACES, LocationIDs::PROTESTANT_SPACES_0],
			[TokenIds::PROTESTANT_2UNIT, LocationIDs::ELECTORATE_DISPLAY_WIT],
			[TokenIds::PROTESTANT_2UNIT, LocationIDs::ELECTORATE_DISPLAY_AUG],
			[TokenIds::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_COL],
			[TokenIds::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_TRI],
			[TokenIds::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_MAI],
			[TokenIds::PROTESTANT_1UNIT, LocationIDs::ELECTORATE_DISPLAY_BRA],
			[TokenIds::BUCER, LocationIDs::DEBATER_GER_1],
			[TokenIds::LUTHER, LocationIDs::DEBATER_GER_3],
			[TokenIds::MELANCHTHON, LocationIDs::DEBATER_GER_2],
			[TokenIds::CARLSTADT, LocationIDs::DEBATER_GER_4],
			[TokenIds::ECK, LocationIDs::DEBATER_POPE_1],
			[TokenIds::CAMPEGGIO, LocationIDs::DEBATER_POPE_2],
			[TokenIds::ALEANDER, LocationIDs::DEBATER_POPE_3],
			[TokenIds::TETZEL, LocationIDs::DEBATER_POPE_4],
			[TokenIds::CAJETAN, LocationIDs::DEBATER_POPE_5],
			[TokenIds::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_11],
			[TokenIds::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_10],
			[TokenIds::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_9],
			[TokenIds::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_8],
			[TokenIds::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_7],
			[TokenIds::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_6],
			[TokenIds::OTTOMAN_KEY, LocationIDs::OTTOMAN_KEY_5],
			[TokenIds::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_14],
			[TokenIds::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_13],
			[TokenIds::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_12],
			[TokenIds::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_11],
			[TokenIds::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_10],
			[TokenIds::HAPSBURG_KEY, LocationIDs::HAPSBURG_KEY_9],
			[TokenIds::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_9],
			[TokenIds::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_8],
			[TokenIds::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_7],
			[TokenIds::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_6],
			[TokenIds::ENGLAND_KEY, LocationIDs::ENGLAND_KEY_5],
			[TokenIds::HENRY_MARITAL_STATUS, LocationIDs::MARITAL_STATUS_1],
			[TokenIds::FRANCE_KEY, LocationIDs::FRANCE_KEY_11],
			[TokenIds::FRANCE_KEY, LocationIDs::FRANCE_KEY_10],
			[TokenIds::FRANCE_KEY, LocationIDs::FRANCE_KEY_9],
			[TokenIds::FRANCE_KEY, LocationIDs::FRANCE_KEY_8],
			[TokenIds::FRANCE_KEY, LocationIDs::FRANCE_KEY_7],
			[TokenIds::CHATEAUX_VP, LocationIDs::CHATEAUX_0],
			[TokenIds::PAPACY_KEY, LocationIDs::PAPACY_KEY_7],
			[TokenIds::PAPACY_KEY, LocationIDs::PAPACY_KEY_6],
			[TokenIds::PAPACY_KEY, LocationIDs::PAPACY_KEY_5],
			[TokenIds::PAPACY_KEY, LocationIDs::PAPACY_KEY_4],
			[TokenIds::PAPACY_KEY, LocationIDs::PAPACY_KEY_3],
			[TokenIds::ST_PETERS_VP, LocationIDs::SAINT_PETERS_VP_0],
			[TokenIds::ST_PETERS_CP, LocationIDs::SAINT_PETERS_CP_0],
			[TokenIds::NEW_TESTAMENT_ENGLISH, LocationIDs::NT_TRANSLATION_0],
			[TokenIds::BIBLE_ENGLISH, LocationIDs::BIBLE_TRANSLATION_0],
			[TokenIds::NEW_TESTAMENT_FRENCH, LocationIDs::NT_TRANSLATION_0],
			[TokenIds::BIBLE_FRENCH, LocationIDs::BIBLE_TRANSLATION_0],
			[TokenIds::NEW_TESTAMENT_GERMAN, LocationIDs::NT_TRANSLATION_0],
			[TokenIds::BIBLE_GERMAN, LocationIDs::BIBLE_TRANSLATION_0],
			[TokenIds::TURN, LocationIDs::TURN_TRACK_1],
			[TokenIds::ST_LAWRENCE_RIVER_1VP, LocationIDs::ST_LAWRENCE_RIVER],
			[TokenIds::GREAT_LAKES_1VP, LocationIDs::GREAT_LAKES],
			[TokenIds::MISSISSIPPI_RIVER_1VP, LocationIDs::MISSISSIPI_RIVER],
			[TokenIds::AZTECS_2VP, LocationIDs::AZTEC],
			[TokenIds::MAYA_1VP, LocationIDs::MAYA],
			[TokenIds::AMAZON_RIVER_2VP, LocationIDs::AMAZON_RIVER],
			[TokenIds::INCA_2VP, LocationIDs::INCA],
			[TokenIds::CIRCUMNAVIGATION_3VP, LocationIDs::CIRCUMNAVIGATION],
			[TokenIds::PACIFIC_STRAIT_1VP, LocationIDs::PACIFIC_STRAIT],
			[TokenIds::HAPSBURG_CONQUEST, LocationIDs::CROSSING_ATLANTIC_1],
			[TokenIds::HAPSBURG_EXPLORATION, LocationIDs::CROSSING_ATLANTIC_2],
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
