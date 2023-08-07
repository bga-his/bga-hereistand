<?php
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\Utils;
use HIS\Managers\Players;

class Diplomacy extends \HIS\Helpers\Pieces {

    public static function declareWar($powerDeclar, $powerRecive){
        //TODO set token, store at war somewhere
        Notifications::message(Players::getFromPower($powerDeclar)['name']." has declared war on ".Players::getFromPower($powerDeclar)['name']);
    }

    public static function declareAlience($powerDeclar, $powerRecive){
        //TODO set token, store alliences somewhere
        Notifications::message(Players::getFromPower($powerDeclar)['name']." has declared an Alience with ".Players::getFromPower($powerDeclar)['name']);
    }

    public static function IsAtWar($powerA, $powerB){
        if($powerA < $powerB){
            return Diplomacy::IsAtWar($powerB, $powerA);
        }
        return True;//TODO
    }

}
