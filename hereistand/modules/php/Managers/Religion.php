<?php
declare(strict_types=1);
namespace HIS\Managers;

use HIS\Core\Game;
use Locationtypes;
use ReligionIDs;
use SeazoneAttributs;
use SpaceAttributs;
use TokenAttributes;
use tokenTypeIDs;
use Powers;
use tokenIDs_TURN_MARKER;
use tokenIDs_EVENT_REMINDER;
use GameStates;
use HIS\Core\Notifications;
use HIS\Helpers\Utils;
use TokenSides;

class Religion{

    private static function GetDebator(int $debatorId) : object{
        return Game::get()->tokens[$debatorId];
    }

    /*
    * get weather $spaceId contains a reformer. I dont think its ever relevant wich reformer is in a certain space.
    */
    private static function bolIsReformerPresent(int $spaceId) : bool{
        $tokens = Tokens::getInLocation(Locationtypes::mapLocations."_".$spaceId);
        foreach($tokens as $token){
            if(in_array(tokenTypeIDs::REFORMER, $token[TokenAttributes::types], true)){
                return true;
            }
        }
        return false;
    }

    private static function bolIsReformedUnitPresent(int $spaceId) : bool{
        if(count(Map::getLandUnits($spaceId, Powers::PROTESTANT)) > 0){
            return true;
        }
        //TODO English regulars and mercenaries if either Edward VI or Elizabeth I rules England.
        //Exception: While Scotland is allied with England, Scottish units are treated the same as English ones.
        return false;
    }
    private static function bolIsCatolicunitPresent(int $spaceId) : bool{
        if(count(Map::getLandUnits($spaceId, Powers::PAPACY)) > 0){
            return true;
        }
        if(count(Map::getLandUnits($spaceId, Powers::HAPSBURG)) > 0){
            return true;
        }
        if(count(Map::getLandUnits($spaceId, Powers::FRANCE)) > 0){
            return true;
        }
        //TODO only if MaryI rules england
        //if(count(Map::getLandUnits($spaceId, Powers::ENGLAND)) > 0){
        //    return true;
        //}
        if(count(Map::getLandUnits($spaceId, Powers::MINOR_GENOA)) > 0){
            return true;
        }
        if(count(Map::getLandUnits($spaceId, Powers::MINOR_HUNGARY)) > 0){
            return true;
        }
        if(Diplomacy::IsAllied(Powers::ENGLAND, Powers::MINOR_SCOTLAND)){
            //Exception: While Scotland is allied with England, Scottish units are treated the same as English ones.
        }else{
            if(count(Map::getLandUnits($spaceId, Powers::MINOR_SCOTLAND)) > 0){
                return true;
            }
        }
        
        if(count(Map::getLandUnits($spaceId, Powers::MINOR_VENICE)) > 0){
            return true;
        }
        if(count(Map::getLandUnits($spaceId, Powers::INDEPENDENT)) > 0){
            return true;
        }
        if(count(Map::getLandUnits($spaceId, Powers::OTHER)) > 0){
            return true;
        }
        return false;
    }
    /*
    * get weather the card printing press was played erlier this turn. TODO untested.
    */
    public static function bolIsPrintingPressActive() : bool{
        //TurnMarker.token_location == PrintingPressActiveMarker.token_location
        $turnTrackToken = Tokens::getTokenById(Tokens::getDBId(tokenIDs_TURN_MARKER::TURN));
        $ppActiveToken = Tokens::getTokenById(Tokens::getDBId(tokenIDs_EVENT_REMINDER::PRINTING_PRESS));

        return $turnTrackToken[TokenAttributes::location_type] == $ppActiveToken[TokenAttributes::location_type] && $turnTrackToken[TokenAttributes::location_id] == $ppActiveToken[TokenAttributes::location_id];
    }
    private static function bolIs95ThesisActive() : bool{
        // is special game state, check that
        //TODO there is currently no way to get into the gamestate ST_EVT_95Thesis. TODO untested.
        if(game::get()->getStateName() == GameStates::ST_EVT_95Thesis){
            return true;
        }
        return false;
    }
    /*
    * make printing press bonus be active for the rest of this turn.
    */
    public static function SetPrintingPressActive(){
        $turnTrackToken = Tokens::getTokenById(Tokens::getDBId(tokenIDs_TURN_MARKER::TURN));
        $strPPDbId = Tokens::getDBId(tokenIDs_EVENT_REMINDER::PRINTING_PRESS);
        $strLocationTurnTrack = $turnTrackToken[TokenAttributes::location_type]."_".$turnTrackToken[TokenAttributes::location_id];

        Tokens::move([$strPPDbId], "map_".$strLocationTurnTrack);
        Notifications::notif_SetPrintingPressActive(Tokens::getTokenById($strPPDbId), Players::getFromPower(Powers::PROTESTANT)->getId(), $strLocationTurnTrack);
    }

    /*
    * get weather map_space_.$spaceId may be the target for a reformation attempt.
    */
    public static function bolIsValidTargetForReformationAttempt(int $spaceId) : bool{
        // has adjacend (pass or normal) protestant spaces, or has a port to a seazone that also has a protestant port adjacend, or contains a reformer.
        $space = Game::get()->spaces[$spaceId];
        if(Map::getReligiosControl($spaceId) != ReligionIDs::CATHOLIC){
            return false;
        }
        foreach($space[SpaceAttributs::connections] as $intAdjSpaceId){
            If(Map::getReligiosControl($intAdjSpaceId) == ReligionIDs::REFORMED){
                return true;
            }
        }
        foreach($space[SpaceAttributs::passes] as $intAdjSpaceId){
            If(Map::getReligiosControl($intAdjSpaceId) == ReligionIDs::REFORMED){
                return true;
            }
        }
        if(Religion::bolIsReformerPresent($spaceId)){
            return true;
        }
        foreach($space[SpaceAttributs::seazones] as $seazoneId){
            foreach(Game::get()->seazones[$seazoneId][SeazoneAttributs::harbours] as $spaceId){
                If(Map::getReligiosControl($intAdjSpaceId) == ReligionIDs::REFORMED){
                    return true;
                }
            }
        }
        return false;
    }
    public static function bolIsValidTargetForCounterRefAttempt(int $spaceId) : bool{
        return false;
    }

    public static function intGetNumberOfReformationAttemptAttackDice(int $spaceId) : int{
        $intNumDice = 0;
        $space = Game::get()->spaces[$spaceId];
        if(Religion::bolIsReformerPresent($spaceId)){
            $intNumDice += 2;
        }
        if(Religion::bolIsReformedUnitPresent($spaceId)){
            $intNumDice += 2;
        }
        If(Religion::bolIsPrintingPressActive()){
            $intNumDice += 1;
        }
        If(Religion::bolIs95ThesisActive()){
            $intNumDice += 1;
        }
        // TODO get commited debators bonus dice.
        foreach($space[SpaceAttributs::connections] as $intAdjSpaceId){
            if(!Map::bolGetSpaceIsInUnrest($intAdjSpaceId)){
                If(Map::getReligiosControl($intAdjSpaceId) == ReligionIDs::REFORMED){
                    $intNumDice += 1;
                }
                If(Religion::bolIsReformerPresent($intAdjSpaceId)){
                    $intNumDice += 1;
                }
                If(Religion::bolIsReformedUnitPresent($intAdjSpaceId)){
                    $intNumDice += 1;
                }
            }
        }

        return max(1, $intNumDice);
    }


    public static function intGetNumberOfCounterRefAttemptAttackDice(int $spaceId) : int{
        return 1;
    }

    public static function bolIsCommited(int $debatorId) : bool{
        return Tokens::getTokenById(Tokens::getDBId($debatorId))[TokenAttributes::flipped] != '';
    }
    public static function SetIsCommited(int $debatorId, bool $isCommitted) : void{
        Tokens::setState(Tokens::getDBId($debatorId), $isCommitted?TokenSides::BACK:TokenSides::FRONT); // TODO set to flip
    }

    /*
    * get how many dice the debator has when in a debate.
    */
    public static function getDebatorDice(int $debatorId, bool $IsAttacker) : int{
        return 1;
    }

    /*
    * move a debator from the turn track or supply to its correct box on the religius struggle board, and flip it to its uncommited side.
    */
    public static function addDebator(int $debatorId) : void{

    }

    /*
    * Debator $debatorId lost a debate way to hard.
    */
    public static function burnDebator(int $debatorId) : void{

    }
    /*
    * move the debator to the next turn on the turn track.
    */
    public static function excomunicateDebator(int $debatorId) : void{

    }

    /*
    * add the reformer to its map_space_
    */
    public static function addReformer(int $reformerId) : void{

    }
    
    /*
    * move the reformer to the next turn on the turn track.
    */
    public static function removeReformer(int $reformerId) : void{

    }


}
