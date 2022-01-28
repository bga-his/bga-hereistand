<?php
namespace HIS;

trait SetupTrait {
	public function getSetup() {
		$setup_base = [
			FRANCE => [
				LYON => [
					FRANCE_1UNIT,
					FRANCE_KEY,
				],
			],
		];

		return $setup_base;
	}
}
