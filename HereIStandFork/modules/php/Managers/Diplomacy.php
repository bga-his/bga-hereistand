<?php
namespace HIS\Managers;

use HIS\Core\Game;
use HIS\Core\Notifications;
use HIS\Helpers\Pieces;
use HIS\Helpers\Utils;
use HIS\Managers\Players;
use powers;
use DiploTokens;
use DiploLocations;

class Diplomacy extends \HIS\Helpers\Pieces {

    public static function declareWar(String $powerDeclar, String $powerRecive) : void{
        //$powerDeclar: element of powers
        //$powerRecive: element of powers
        //TODO set token, store at war somewhere
        Pieces::move(DiploTokens::AT_WAR, DiploLocationsArray[$powerDeclar][$powerRecive]);
        Notifications::message(Players::getFromPower($powerDeclar)['name']." has declared war on ".Players::getFromPower($powerDeclar)['name']);
    }

    public static function declareAlience(String $powerDeclar, String $powerRecive) : void{
        //$powerDeclar: element of powers
        //$powerRecive: element of powers
        //TODO set token, store alliences somewhere
        Pieces::move(DiploTokens::ALLIED, DiploLocationsArray[$powerDeclar][$powerRecive]);
        Notifications::message(Players::getFromPower($powerDeclar)['name']." has declared an Alience with ".Players::getFromPower($powerDeclar)['name']);
    }

    public static function IsAtWar(String $powerA, String $powerB) : bool{
        //$powerA: element of powers
        //$powerB: element of powers
        return Pieces::get(DiploTOkens::AT_WAR, DiploLocationsArray[$powerA][$powerB]) != null;
    }

}
