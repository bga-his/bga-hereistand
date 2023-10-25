<?php
namespace HIS\Managers;

use HIS\Core\Notifications;
use HIS\Helpers\Pieces;
use HIS\Managers\Players;
use tokenIDs_DIPLOMACY;

class Diplomacy extends \HIS\Helpers\Pieces {

    public static function declareWar(String $powerDeclar, String $powerRecive) : void{
        //$powerDeclar: element of powers
        //$powerRecive: element of powers
        //TODO set token, store at war somewhere
        Pieces::move(tokenIDs_DIPLOMACY::AT_WAR, DiploLocationsArray[$powerDeclar][$powerRecive]);
        Notifications::message(Players::getFromPower($powerDeclar)['name']." has declared war on ".Players::getFromPower($powerDeclar)['name']);
    }

    public static function declareAlience(String $powerDeclar, String $powerRecive) : void{
        //$powerDeclar: element of powers
        //$powerRecive: element of powers
        //TODO set token, store alliences somewhere
        Pieces::move(tokenIDs_DIPLOMACY::ALLIED, DiploLocationsArray[$powerDeclar][$powerRecive]);
        Notifications::message(Players::getFromPower($powerDeclar)['name']." has declared an Alience with ".Players::getFromPower($powerDeclar)['name']);
    }

    public static function IsAtWar(String $powerA, String $powerB) : bool{
        //$powerA: element of powers
        //$powerB: element of powers
        return Pieces::get(tokenIDs_DIPLOMACY::AT_WAR, DiploLocationsArray[$powerA][$powerB]) != null;
    }

    public static function IsAllied(String $powerA, String $powerB) : bool{
        //$powerA: element of powers
        //$powerB: element of powers
        return Pieces::get(tokenIDs_DIPLOMACY::ALLIED, DiploLocationsArray[$powerA][$powerB]) != null;
    }

    public static function IsNeutral(String $powerA, String $powerB) : bool{
        //$powerA: element of powers
        //$powerB: element of powers
        return ! Diplomacy::IsAtWar($powerA, $powerB) && !Diplomacy::IsAllied($powerA, $powerB);
    }

}
