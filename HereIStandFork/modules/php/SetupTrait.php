<?php
namespace HIS;

use TokenIDs;
use LocationIDs;
use CityIDs;
use ControllMarkerTokens;
use Powers;
use MilitaryLeadersToken;
use LandUnitTokens;
use NavalUnitTokens;
use SpaceControllTokens;

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
				cityIds::ISTANBUL => [
					MilitaryLeadersToken::SULEIMAN,
					MilitaryLeadersToken::IBRAHIM,
					LandUnitTokens::OTTOMAN_6UNIT,
					LandUnitTokens::OTTOMAN_1UNIT,
					SpaceControllTokens::OTTOMAN_KEY,
					NavalUnitTokens::OTTOMAN_SQUADRON,
					LandUnitTokens::OTTOMAN_1UNIT,
				],
				cityIds::EDIRNE => [
					LandUnitTokens::OTTOMAN_1UNIT,
					SpaceControllTokens::OTTOMAN_KEY,
				],
				cityIds::SALONIKA => [
					LandUnitTokens::OTTOMAN_1UNIT,
					SpaceControllTokens::OTTOMAN_KEY,
					NavalUnitTokens::OTTOMAN_SQUADRON,
				],
				cityIds::ATHENS => [
					LandUnitTokens::OTTOMAN_1UNIT,
					SpaceControllTokens::OTTOMAN_KEY,
					NavalUnitTokens::OTTOMAN_SQUADRON,
				],
			],
			Powers::HAPSBURG => [
				cityIds::VALLADOLID => [
					MilitaryLeadersToken::CHARLES_V,
					MilitaryLeadersToken::DUKE_ALVA,
					LandUnitTokens::HAPSBURG_4UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
				],
				cityIds::SEVILLE => [
					LandUnitTokens::HAPSBURG_1UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
					NavalUnitTokens::HAPSBURG_SQUADRON,
				],
				cityIds::BARCELONA => [
					LandUnitTokens::HAPSBURG_1UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
					NavalUnitTokens::HAPSBURG_SQUADRON,
				],
				cityIds::NAVARRE => [
					LandUnitTokens::HAPSBURG_1UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
				],
				cityIds::TUNIS => [
					LandUnitTokens::HAPSBURG_1UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
				],
				cityIds::NAPLES => [
					LandUnitTokens::HAPSBURG_2UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
					NavalUnitTokens::HAPSBURG_SQUADRON,
				],
				cityIds::BESANCON => [
					LandUnitTokens::HAPSBURG_1UNIT,
				],
				cityIds::BRUSSELS => [
					LandUnitTokens::HAPSBURG_1UNIT,
				],
				cityIds::VIENNA => [
					MilitaryLeadersToken::FERDINAND,
					LandUnitTokens::HAPSBURG_4UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
				],
				cityIds::ANTWERP => [
					LandUnitTokens::HAPSBURG_2UNIT,
					LandUnitTokens::HAPSBURG_1UNIT,
					SpaceControllTokens::HAPSBURG_KEY,
				],
				cityIds::WITTENBERG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::BRANDENBURG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::MAINZ => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::COLOGNE => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::TRIER => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::AUGSBURG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::STETTIN => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::LUBECK => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::MAGDEBURG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::HAMBURG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::BRUNSWICK => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::BREMEN => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::MUNSTER => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::KASSEL => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::ERFURT => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::LEIPZIG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::NUREMBERG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::WORMS => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::REGENSBURG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::STRASBURG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
				cityIds::SALZBURG => [
					SpaceControllTokens::HAPSBURG_HEX,
				],
			],
			Powers::PROTESTANT => [
			],
			Powers::ENGLAND => [
				cityIds::LONDON => [
					MilitaryLeadersToken::HENRY_VIII,
					MilitaryLeadersToken::BRANDON,
					LandUnitTokens::ENGLAND_1UNIT,
					LandUnitTokens::ENGLAND_2UNIT,
					SpaceControllTokens::ENGLAND_KEY,
					NavalUnitTokens::ENGLISH_SQUADRON,
				],
				cityIds::PORTSMOUTH => [
					NavalUnitTokens::ENGLISH_SQUADRON,
				],
				cityIds::CALAIS => [
					LandUnitTokens::ENGLAND_2UNIT,
					SpaceControllTokens::ENGLAND_KEY,
				],
				cityIds::YORK => [
					LandUnitTokens::ENGLAND_1UNIT,
					SpaceControllTokens::ENGLAND_KEY,
				],
				cityIds::BRISTOL => [
					LandUnitTokens::ENGLAND_1UNIT,
					SpaceControllTokens::ENGLAND_KEY,
				],
			],
			Powers::FRANCE => [
				cityIds::PARIS => [
					MilitaryLeadersToken::FRANCIS_I,
					MilitaryLeadersToken::MONTMORENCY,
					LandUnitTokens::FRANCE_4UNIT,
					SpaceControllTokens::FRANCE_KEY,
				],
				cityIds::ROUEN => [
					LandUnitTokens::FRANCE_1UNIT,
					NavalUnitTokens::FRENCH_SQUADRON,
					SpaceControllTokens::FRANCE_KEY,
				],
				cityIds::BORDEAUX => [
					LandUnitTokens::FRANCE_2UNIT,
					SpaceControllTokens::FRANCE_KEY,
				],
				cityIds::LYON => [
					LandUnitTokens::FRANCE_1UNIT,
					SpaceControllTokens::FRANCE_KEY,
				],
				cityIds::MARSEILLE => [
					LandUnitTokens::FRANCE_1UNIT,
					NavalUnitTokens::FRENCH_SQUADRON,
					SpaceControllTokens::FRANCE_KEY,
				],
				cityIds::TURIN => [
					SpaceControllTokens::FRANCE_HEX,
				],
				cityIds::MILAN => [
					LandUnitTokens::FRANCE_2UNIT,
					SpaceControllTokens::FRANCE_KEY,
				],
			],
			Powers::PAPACY => [
				cityIds::ROME => [
					LandUnitTokens::PAPACY_1UNIT,
					NavalUnitTokens::PAPACY_SQUADRON,
					SpaceControllTokens::PAPACY_KEY,
				],
				cityIds::RAVENNA => [
					LandUnitTokens::PAPACY_1UNIT,
					SpaceControllTokens::PAPACY_KEY,
				],
			],
			Powers::MINOR_VENICE => [
				cityIds::VENICE => [
					LandUnitTokens::VENICE_2UNIT,
					NavalUnitTokens::VENETIAN_SQUADRON,
					NavalUnitTokens::VENETIAN_SQUADRON,
					NavalUnitTokens::VENETIAN_SQUADRON,
				],
				cityIds::CORFU => [
					LandUnitTokens::VENICE_1UNIT,
				],
				cityIds::CANDIA => [
					LandUnitTokens::VENICE_1UNIT,
				],
			],
			Powers::MINOR_GENOA => [
				cityIds::GENOA => [
					MilitaryLeadersToken::ANDREA_DORIA,
					LandUnitTokens::GENOA_2UNIT,
					NavalUnitTokens::GENOESE_SQAUADRON,
				],
			],
			Powers::MINOR_HUNGARY => [
				cityIds::BELGRADE => [
					LandUnitTokens::HUNGARY_1UNIT,
				],
				cityIds::BUDA => [
					LandUnitTokens::HUNGARY_4UNIT,
					LandUnitTokens::HUNGARY_1UNIT,
				],
				cityIds::PRAGUE => [
					LandUnitTokens::HUNGARY_1UNIT,
				],
			],
			Powers::MINOR_SCOTLAND => [
				cityIds::EDINBURGH => [
					LandUnitTokens::SCOTLAND_2UNIT,
					LandUnitTokens::SCOTLAND_1UNIT,
					NavalUnitTokens::SCOTTISH_SQUADRON,
				],
			],
			Powers::INDEPENDENT => [
				cityIds::RHODES => [
					LandUnitTokens::KNIGHTS_1UNIT,
				],
				cityIds::METZ => [
					LandUnitTokens::INDEPENDENT_1UNIT,
				],
				cityIds::FLORENCE => [
					LandUnitTokens::INDEPENDENT_1UNIT,
				],
			],

		];

		return $setup_base;
	}
}
