<?php
namespace HIS\Models;

/*
 * Formation: all utility functions concerning a formation
 */

class Formation {
	public $tokens = [];

	public function __construct($tokens) {
		$this->tokens = $tokens;
	}
}
