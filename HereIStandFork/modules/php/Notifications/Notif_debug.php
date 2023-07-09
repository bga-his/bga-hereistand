<?php
namespace HIS\Notifications;
use HIS\Core\Notifications;

class Notif_debug extends \HIS\Core\Notifications {
	public static function notif($msg) {
		self::notifyAll('message', $msg, array());
	}
}