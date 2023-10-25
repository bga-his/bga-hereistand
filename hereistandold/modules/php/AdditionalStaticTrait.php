<?php
namespace HIS;

trait AdditionalStaticTrait {
	function getPowerUnits() {
		return [
			OTTOMAN => [
				REGULAR => OTTOMAN_1UNIT,
				MERC => OTTOMAN_1UNIT,
				NAVAL => OTTOMAN_SQUADRON,
			],
			HAPSBURG => [
				REGULAR => HAPSBURG_1UNIT,
				MERC => HAPSBURG_1UNIT,
				NAVAL => HAPSBURG_SQUADRON,
			],
			ENGLAND => [
				REGULAR => ENGLAND_1UNIT,
				MERC => ENGLAND_1UNIT,
				NAVAL => ENGLISH_SQUADRON,
			],
			FRANCE => [
				REGULAR => FRANCE_1UNIT,
				MERC => FRANCE_1UNIT,
				NAVAL => FRENCH_SQUADRON,
			],
			PAPACY => [
				REGULAR => PAPACY_1UNIT,
				MERC => PAPACY_1UNIT,
				NAVAL => PAPACY_SQUADRON,
			],
			PROTESTANT => [
				REGULAR => PROTESTANT_1UNIT,
				MERC => PROTESTANT_1UNIT,
			],
		];
	}
}