<?php
namespace HIS;

trait SetupTrait {
	public function getSetup() {
		$setup_base = [
			HAPSBURG => [
				BESANCON => [
					HABSBURG_1UNIT,
				],
			],
			FRANCE => [
				LYON => [
					FRANCE_1UNIT,
					FRANCE_KEY,
				],
				TURIN => [
					FRANCE_HEX,
				],
			],
		];

		return $setup_base;
	}
}
