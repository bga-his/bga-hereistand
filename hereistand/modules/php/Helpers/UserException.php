<?php
namespace HIS\Helpers;
use HIS\Core\Game;

class UserException extends \BgaUserException {
	public function __construct($str) {
		//parent::__construct(Game::get()::translate($str)); // throws a error that some method cant be called from static context.
		parent::__construct($str);
	}
}
?>
