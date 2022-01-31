<?php
namespace HIS;

trait SetupTrait {
	public function getTokenSetup() {
		return [
			[VP_OTTOMAN, VICTORY_TRACK_8],
			[PIRACY_VP, PIRACY_0],
			[VP_HAPSBURG, VICTORY_TRACK_9],
			[VP_ENGLAND, VICTORY_TRACK_9],
			[VP_FRANCE, VICTORY_TRACK_12],
			[VP_PAPACY, VICTORY_TRACK_19],
			[VP_PROTESTANT, VICTORY_TRACK_0],
			[AT_WAR, DIPLO_HAP_FRA],
			[AT_WAR, DIPLO_FRA_PAP],
			[AT_WAR, DIPLO_OTT_HUN],
			[ENGLISH_PROT_COUNTER, PROTESTANT_SPACES_0],
			[PROTESTANT_SPACES, PROTESTANT_SPACES_0],
			[PROTESTANT_2UNIT, ELECTORATE_DISPLAY_WIT],
			[PROTESTANT_2UNIT, ELECTORATE_DISPLAY_AUG],
			[PROTESTANT_1UNIT, ELECTORATE_DISPLAY_COL],
			[PROTESTANT_1UNIT, ELECTORATE_DISPLAY_TRI],
			[PROTESTANT_1UNIT, ELECTORATE_DISPLAY_MAI],
			[PROTESTANT_1UNIT, ELECTORATE_DISPLAY_BRA],
			[LUTHER, DEBATER_GER_1],
			[MELANCHTHON, DEBATER_GER_2],
			[BUCER, DEBATER_GER_3],
			[CARLSTADT, DEBATER_GER_4],
		];
	}

	public function getSetup() {
		$setup_base = [
			OTTOMAN => [
				ISTANBUL => [
					SULEIMAN,
					IBRAHIM,
					OTTOMAN_6UNIT,
					OTTOMAN_1UNIT,
					OTTOMAN_KEY,
					OTTOMAN_SQUADRON,
					OTTOMAN_1UNIT,
				],
				EDIRNE => [
					OTTOMAN_1UNIT,
					OTTOMAN_KEY,
				],
				SALONIKA => [
					OTTOMAN_1UNIT,
					OTTOMAN_KEY,
					OTTOMAN_SQUADRON,
				],
				ATHENS => [
					OTTOMAN_1UNIT,
					OTTOMAN_KEY,
					OTTOMAN_SQUADRON,
				],
			],
			HAPSBURG => [
				VALLADOLID => [
					CHARLES_V,
					DUKE_ALVA,
					HAPSBURG_4UNIT,
					HAPSBURG_KEY,
				],
				SEVILLE => [
					HAPSBURG_1UNIT,
					HAPSBURG_KEY,
					HAPSBURG_SQUADRON,
				],
				BARCELONA => [
					HAPSBURG_1UNIT,
					HAPSBURG_KEY,
					HAPSBURG_SQUADRON,
				],
				NAVARRE => [
					HAPSBURG_1UNIT,
					HAPSBURG_KEY,
				],
				TUNIS => [
					HAPSBURG_1UNIT,
					HAPSBURG_KEY,
				],
				NAPLES => [
					HAPSBURG_2UNIT,
					HAPSBURG_KEY,
					HAPSBURG_SQUADRON,
				],
				BESANCON => [
					HAPSBURG_1UNIT,
				],
				BRUSSELS => [
					HAPSBURG_1UNIT,
				],
				VIENNA => [
					FERDINAND,
					HAPSBURG_4UNIT,
					HAPSBURG_KEY,
				],
				ANTWERP => [
					HAPSBURG_2UNIT,
					HAPSBURG_1UNIT,
					HAPSBURG_KEY,
				],
				WITTENBERG => [
					HAPSBURG_HEX,
				],
				BRANDENBURG => [
					HAPSBURG_HEX,
				],
				MAINZ => [
					HAPSBURG_HEX,
				],
				COLOGNE => [
					HAPSBURG_HEX,
				],
				TRIER => [
					HAPSBURG_HEX,
				],
				AUGSBURG => [
					HAPSBURG_HEX,
				],
				STETTIN => [
					HAPSBURG_HEX,
				],
				LUBECK => [
					HAPSBURG_HEX,
				],
				MAGDEBURG => [
					HAPSBURG_HEX,
				],
				HAMBURG => [
					HAPSBURG_HEX,
				],
				BRUNSWICK => [
					HAPSBURG_HEX,
				],
				BREMEN => [
					HAPSBURG_HEX,
				],
				MUNSTER => [
					HAPSBURG_HEX,
				],
				KASSEL => [
					HAPSBURG_HEX,
				],
				ERFURT => [
					HAPSBURG_HEX,
				],
				LEIPZIG => [
					HAPSBURG_HEX,
				],
				NUREMBERG => [
					HAPSBURG_HEX,
				],
				WORMS => [
					HAPSBURG_HEX,
				],
				REGENSBURG => [
					HAPSBURG_HEX,
				],
				STRASBURG => [
					HAPSBURG_HEX,
				],
				SALZBURG => [
					HAPSBURG_HEX,
				],
			],
			PROTESTANT => [
			],
			ENGLAND => [
				LONDON => [
					HENRY_VIII,
					BRANDON,
					ENGLAND_1UNIT,
					ENGLAND_2UNIT,
					ENGLAND_KEY,
					ENGLISH_SQUADRON,
				],
				PORTSMOUTH => [
					ENGLISH_SQUADRON,
				],
				CALAIS => [
					ENGLAND_2UNIT,
					ENGLAND_KEY,
				],
				YORK => [
					ENGLAND_1UNIT,
					ENGLAND_KEY,
				],
				BRISTOL => [
					ENGLAND_1UNIT,
					ENGLAND_KEY,
				],
			],
			FRANCE => [
				PARIS => [
					FRANCIS_I,
					MONTMORENCY,
					FRANCE_4UNIT,
					FRANCE_KEY,
				],
				ROUEN => [
					FRANCE_1UNIT,
					FRENCH_SQUADRON,
					FRANCE_KEY,
				],
				BORDEAUX => [
					FRANCE_2UNIT,
					FRANCE_KEY,
				],
				LYON => [
					FRANCE_1UNIT,
					FRANCE_KEY,
				],
				MARSEILLE => [
					FRANCE_1UNIT,
					FRENCH_SQUADRON,
					FRANCE_KEY,
				],
				TURIN => [
					FRANCE_HEX,
				],
				MILAN => [
					FRANCE_2UNIT,
					FRANCE_KEY,
				],
			],
			PAPACY => [
				ROME => [
					PAPACY_1UNIT,
					PAPACY_SQUADRON,
					PAPACY_KEY,
				],
				RAVENNA => [
					PAPACY_1UNIT,
					PAPACY_KEY,
				],
			],
			MINOR_VENICE => [
				VENICE => [
					VENICE_2UNIT,
					VENETIAN_SQUADRON,
					VENETIAN_SQUADRON,
					VENETIAN_SQUADRON,
				],
				CORFU => [
					VENICE_1UNIT,
				],
				CANDIA => [
					VENICE_1UNIT,
				],
			],
			MINOR_GENOA => [
				GENOA => [
					ANDREA_DORIA,
					GENOA_2UNIT,
					GENOESE_SQAUADRON,
				],
			],
			MINOR_HUNGARY => [
				BELGRADE => [
					HUNGARY_1UNIT,
				],
				BUDA => [
					HUNGARY_4UNIT,
					HUNGARY_1UNIT,
				],
				PRAGUE => [
					HUNGARY_1UNIT,
				],
			],
			MINOR_SCOTLAND => [
				EDINBURGH => [
					SCOTLAND_2UNIT,
					SCOTLAND_1UNIT,
					SCOTTISH_SQUADRON,
				],
			],
			INDEPENDENT => [
				RHODES => [
					KNIGHTS_1UNIT,
				],
				METZ => [
					INDEPENDENT_1UNIT,
				],
				FLORENCE => [
					INDEPENDENT_1UNIT,
				],
			],

		];

		return $setup_base;
	}
}
