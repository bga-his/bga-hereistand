<?php
namespace HIS\Managers;

use HIS\Core\Notifications;
use HIS\Helpers\Pieces;
use HIS\Managers\Players;
use Powers;
use Locationtypes;
use TokenAttributes;
use tokenIDs_DIPLOMACY;

class Diplomacy extends \HIS\Helpers\Pieces {

    const arrstr_minor_powers = [Powers::MINOR_GENOA, Powers::MINOR_HUNGARY, Powers::MINOR_SCOTLAND, Powers::MINOR_VENICE];
    const arrstr_major_powers = [Powers::OTTOMAN, Powers::HAPSBURG, Powers::ENGLAND, Powers::FRANCE, Powers::PAPACY, Powers::PROTESTANT];

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

    public static function removeAlience(String $powerA, String $powerB) : void{
        Diplomacy::removeStatus($powerA, $powerB, tokenIDs_DIPLOMACY::ALLIED);
    }

    public static function removeWar(String $powerA, String $powerB) : void{
        Diplomacy::removeStatus($powerA, $powerB, tokenIDs_DIPLOMACY::AT_WAR);
    }

    private static function removeStatus(String $powerA, String $powerB, $tokenId) : void{
        $pieces = Pieces::getInLocation(DiploLocationsArray[$powerA][$powerB]);
        $ids = [];
        if($pieces){
            foreach($pieces as $piece){
                if($piece[TokenAttributes::id] == $tokenId){
                    $ids[] = $piece[TokenAttributes::db_id];
                }
            }
            Pieces::move($ids, Locationtypes::supply[Powers::OTHER]);
        }
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
        return !Diplomacy::IsAtWar($powerA, $powerB) && !Diplomacy::IsAllied($powerA, $powerB);
    }

    /*
    $power = element of powers
    returns: the power controlling the pieces of $power. 
    if $power is a major power: thats $power itself.
    if $power is a minor power: thats the major-power ally of that minor power, or nobody.
    */
    public static function GetControllingPower(String $power) : String{
        if(Diplomacy::bolIsMinorPower($power)){
            foreach(Diplomacy::arrstr_major_powers as $major_power){
                if(Diplomacy::IsAllied($power, $major_power)){
                    return $major_power;
                }
            }
            return Powers::OTHER;
        }else{
            
            return $power;
        }
    }

    public static function bolIsMinorPower(String $power) : bool{
        return in_array($power, Diplomacy::arrstr_minor_powers, true);
    }

    public static function bolisMajorPower(String $power) : bool{
        return in_array($power, Diplomacy::arrstr_major_powers, true);
    }


}
