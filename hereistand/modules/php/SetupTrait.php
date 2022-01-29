<?php
namespace HIS;

trait SetupTrait {
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
			],
			PROTESTANT => [
				WITTENBERG => [
					PROTESTANT_HEX,
				],
				BRANDENBURG => [
					PROTESTANT_HEX,
				],
				MAINZ => [
					PROTESTANT_HEX,
				],
				COLOGNE => [
					PROTESTANT_HEX,
				],
				TRIER => [
					PROTESTANT_HEX,
				],
				AUGSBURG => [
					PROTESTANT_HEX,
				],
				STETTIN => [
					PROTESTANT_HEX,
				],
				LUBECK => [
					PROTESTANT_HEX,
				],
				MAGDEBURG => [
					PROTESTANT_HEX,
				],
				HAMBURG => [
					PROTESTANT_HEX,
				],
				BRUNSWICK => [
					PROTESTANT_HEX,
				],
				BREMEN => [
					PROTESTANT_HEX,
				],
				MUNSTER => [
					PROTESTANT_HEX,
				],
				KASSEL => [
					PROTESTANT_HEX,
				],
				ERFURT => [
					PROTESTANT_HEX,
				],
				LEIPZIG => [
					PROTESTANT_HEX,
				],
				NUREMBERG => [
					PROTESTANT_HEX,
				],
				WORMS => [
					PROTESTANT_HEX,
				],
				REGENSBURG => [
					PROTESTANT_HEX,
				],
				STRASBURG => [
					PROTESTANT_HEX,
				],
				SALZBURG => [
					PROTESTANT_HEX,
				],
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
				STIRLING => [
					FORTRESS,
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
