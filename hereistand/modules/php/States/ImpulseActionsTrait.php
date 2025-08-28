<?php
namespace HIS\States;

use HIS\Core\Globals;

trait ImpulseActionsTrait {
	function argImpulseActions() {
		$cp = Globals::intGetRemainingCP();
		return [
			'remainingCP' => $cp,
		];
	}
}
