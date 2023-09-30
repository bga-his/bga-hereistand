<?php
namespace HIS;
use Powers;
use UnitTypes;
use NavalUnitTokens;
use LandUnitTokens;

trait AdditionalStaticTrait {
	function getPowerUnits() {
		return [
			Powers::OTTOMAN => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::OTTOMAN_1UNIT, 2 => LandUnitTokens::OTTOMAN_2UNIT, 4 => LandUnitTokens::OTTOMAN_4UNIT, 6 => LandUnitTokens::OTTOMAN_6UNIT],
				UnitTypes::MERC => [1 => LandUnitTokens::OTTOMAN_1UNIT, 2 => LandUnitTokens::OTTOMAN_2UNIT, 4 => LandUnitTokens::OTTOMAN_4UNIT, 6 => LandUnitTokens::OTTOMAN_6UNIT],
				UnitTypes::SHIP => NavalUnitTokens::OTTOMAN_SQUADRON,
			],
			Powers::HAPSBURG => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::HAPSBURG_1UNIT, 2 => LandUnitTokens::HAPSBURG_2UNIT, 4 => LandUnitTokens::HAPSBURG_4UNIT, 6 => LandUnitTokens::HAPSBURG_6UNIT],
				UnitTypes::MERC => [1 => LandUnitTokens::HAPSBURG_1UNIT, 2 => LandUnitTokens::HAPSBURG_2UNIT, 4 => LandUnitTokens::HAPSBURG_4UNIT, 6 => LandUnitTokens::HAPSBURG_6UNIT],
				UnitTypes::SHIP => NavalUnitTokens::HAPSBURG_SQUADRON,
			],
			Powers::ENGLAND => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::ENGLAND_1UNIT, 2 => LandUnitTokens::ENGLAND_2UNIT, 4 => LandUnitTokens::ENGLAND_4UNIT, 6 => LandUnitTokens::ENGLAND_6UNIT],
				UnitTypes::MERC => [1 => LandUnitTokens::ENGLAND_1UNIT, 2 => LandUnitTokens::ENGLAND_2UNIT, 4 => LandUnitTokens::ENGLAND_4UNIT, 6 => LandUnitTokens::ENGLAND_6UNIT],
				UnitTypes::SHIP => NavalUnitTokens::ENGLISH_SQUADRON,
			],
			Powers::FRANCE => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::FRANCE_1UNIT, 2 => LandUnitTokens::FRANCE_2UNIT, 4 => LandUnitTokens::FRANCE_4UNIT, 6 => LandUnitTokens::FRANCE_6UNIT],
				UnitTypes::MERC => [1 => LandUnitTokens::FRANCE_1UNIT, 2 => LandUnitTokens::FRANCE_2UNIT, 4 => LandUnitTokens::FRANCE_4UNIT, 6 => LandUnitTokens::FRANCE_6UNIT],
				UnitTypes::SHIP => NavalUnitTokens::FRENCH_SQUADRON,
			],
			Powers::PAPACY => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::PAPACY_1UNIT, 2 => LandUnitTokens::PAPACY_2UNIT, 4 => LandUnitTokens::PAPACY_4UNIT],
				UnitTypes::MERC => [1 => LandUnitTokens::PAPACY_1UNIT, 2 => LandUnitTokens::PAPACY_2UNIT, 4 => LandUnitTokens::PAPACY_4UNIT],
				UnitTypes::SHIP => NavalUnitTokens::PAPACY_SQUADRON,
			],
			Powers::PROTESTANT => [
				UnitTypes::REGULAR => [1 =>LandUnitTokens::PROTESTANT_1UNIT, 2 => LandUnitTokens::PROTESTANT_2UNIT, 4 => LandUnitTokens::PROTESTANT_4UNIT],
				UnitTypes::MERC => [1 =>LandUnitTokens::PROTESTANT_1UNIT, 2 => LandUnitTokens::PROTESTANT_2UNIT, 4 => LandUnitTokens::PROTESTANT_4UNIT],
			],
			Powers::MINOR_SCOTLAND => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::SCOTLAND_1UNIT],
				UnitTypes::SHIP => NavalUnitTokens::SCOTTISH_SQUADRON,
			],
			Powers::MINOR_GENOA => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::GENOA_1UNIT],
				UnitTypes::SHIP => NavalUnitTokens::GENOESE_SQAUADRON,
			],
			Powers::MINOR_VENICE => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::VENICE_1UNIT],
				UnitTypes::SHIP => NavalUnitTokens::VENETIAN_SQUADRON
			],
			Powers::MINOR_HUNGARY => [
				UnitTypes::REGULAR => [1 => LandUnitTokens::HUNGARY_1UNIT, 4 => LandUnitTokens::HUNGARY_4UNIT],//placing tokens of denomination 2 will get wired
			]
		];
	}
}