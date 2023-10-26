<?php

require_once 'generated_constants.inc.php';

abstract class GameStates{
    const ST_GAME_SETUP = 1;
    const ST_PICK_CARD = 2;
    const ST_IMPULSE_ACTIONS = 3;
    const ST_DECLARE_FORMATION = 4;
    const ST_DECLARE_DESTINATION = 5;
    const ST_FIND_MOVEMENT_RESPONSES = 6;
    const ST_FIND_INTERCEPTIONS = 7;
    const ST_INTERCEPT_INTENT = 8;
    const ST_ROLL_INTERCEPTION = 9;
    const ST_MOVE_FORMATION = 10;
    const ST_FIND_AVOID = 11;
    const ST_AVOID_INTENT = 12;
    const ST_DECLARE_AVOID_DESTINATION = 13;
    const ST_ROLL_AVOID = 14;
    const ST_FIND_WITHDRAW = 15;
    const ST_WITHDRAW_INTENT = 16;
    const ST_FIND_BATTLE = 17;
    const ST_FIELD_BATTLE = 18;
    const ST_FIND_FIELD_BATTLE_RESPONSES = 19;
    const ST_FIELD_BATTLE_DICE = 20;
    const ST_FIELD_BATTLE_CARD = 21;
    const ST_PLAY_FIELD_BATTLE_CARD = 22;
    const ST_ROLL_FIELD_BATTLE_DICE = 23;
    const ST_PLAY_JANISSARIES = 24;
    const ST_DECLARE_FIELD_BATTLE_WINNER = 25;
    const ST_FIELD_BATTLE_CASUALTIES = 26;
    const ST_TAKE_FIELD_BATTLE_CASUALTIES = 27;
    const ST_FIELD_BATTLE_CAPTURE_LEADERS = 28;
    const ST_FIELD_BATTLE_RETREATS = 29;
    const ST_DECLARE_RETREAT_DESTINATION = 30;
    const ST_FIND_SIEGE = 31;
    const ST_CONCLUDE_FIELD_BATTLE = 32;
    const ST_MOVEMENT_RESPONSE = 33;
    const ST_FIELD_BATTLE_RESPONSE = 34;
    const ST_NEXT_PLAYER = 35;
    const ST_BUY_UNIT = 36;
    const ST_CP_REFORMATION_ATTEMPS = 37;
    const ST_DISCARD = 38;
    const ST_END_GAME = 99;
    const ST_EVT_Janissaries = 101;
    const ST_EVT_HOLYROMAN = 102;
    const ST_EVT_SIXWIVESOFHENRY = 103;
    const ST_EVT_SixWIVES_FRANCE_INTERVENTION = 104;
    const ST_EVT_PATRONOFARTS = 105;
    const ST_EVT_PAPAL_BULL = 106;

}


/*
 * Powers constants
 */
abstract class Powers{
    const FRANCE = 'france';
    const HAPSBURG = 'hapsburg';
    const OTTOMAN = 'ottoman';
    const ENGLAND = 'england';
    const PAPACY = 'papacy';
    const PROTESTANT = 'protestant';
    const MINOR_VENICE = 'venice';
    const MINOR_SCOTLAND = 'scotland';
    const MINOR_HUNGARY = 'hungary';
    const MINOR_GENOA = 'genoa';
    const INDEPENDENT = 'independent';
    const OTHER = 'other';
}

/*
 * Language constants
 */
abstract class LanguageZones{
    const SPANISH = 0;
    const ENGLISH = 1;
    const FRENCH = 2;
    const GERMAN = 3;
    const ITALIAN = 4;
    const OTHER = 5;
}
/*
 * Token state constants
 */
abstract class TokenSides{
    const FRONT = 0; // regular unit, uncommited debator, ...
    const BACK = 1;
 }

 abstract class TokenAttributes{
    const name = "name";
    const power = "power"; //Element of Powers
    const style = "style";
    const db_id = "db_id";
    const types = "types";
    const back = "BACK";
    const strength = "strength"; // only military unit
    const battle_rating = "battle_rating"; // only leader
    const command_rating = "command_rating"; // only leader
    const piracy_rating = "piracy_rating"; // only naval leader
    const debate_value = "debate_value"; //only debator
    const explorer_value = "explorer_value"; // only exporer or conquistador
    const admin_rating = "admin_rating"; //only ruler
    const card_bonus = "card_bonus"; // only ruler
 }

 abstract class Locationtypes{
    const city = "map_city";
    const powercards = "powercards_location";
    const supply = [Powers::OTTOMAN => "supply_ottoman", Powers::HAPSBURG => "supply_hapsburg", Powers::ENGLAND => "supply_england", Powers::FRANCE => "supply_france", Powers::PAPACY => "supply_papacy", Powers::PROTESTANT => "supply_protestant", Powers::OTHER => "supply_other"];
    //TODO maybe there exists more?
 }

abstract class ReligionIDs{
    const CATHOLIC = 2002;
    const REFORMED = 2003;
    const OTHER = 5;
}

/*
 * Token Type constants
 */
abstract class UnitTypes{
    const REGULAR = 0;
    const MERC = 1;
    const SHIP = 2;
    const CAV = 3;
}

/*
 * Land and Naval Token constants
 */
abstract class LandUnitTokens{
    const OTTOMAN_1UNIT = tokenIDs::OTTOMAN_1UNIT;
    const OTTOMAN_2UNIT = tokenIDs::OTTOMAN_2UNIT;
    const OTTOMAN_4UNIT = tokenIDs::OTTOMAN_4UNIT;
    const OTTOMAN_6UNIT = tokenIDs::OTTOMAN_6UNIT;
    const HAPSBURG_1UNIT = tokenIDs::HAPSBURG_1UNIT;
    const HAPSBURG_2UNIT = tokenIDs::HAPSBURG_2UNIT;
    const HAPSBURG_4UNIT = tokenIDs::HAPSBURG_4UNIT;
    const HAPSBURG_6UNIT = tokenIDs::HAPSBURG_6UNIT;
    const ENGLAND_1UNIT = tokenIDs::ENGLAND_1UNIT;
    const ENGLAND_2UNIT = tokenIDs::ENGLAND_2UNIT;
    const ENGLAND_4UNIT = tokenIDs::ENGLAND_4UNIT;
    const ENGLAND_6UNIT = tokenIDs::ENGLAND_6UNIT;
    const FRANCE_1UNIT = tokenIDs::FRANCE_1UNIT;
    const FRANCE_2UNIT = tokenIDs::FRANCE_2UNIT;
    const FRANCE_4UNIT = tokenIDs::FRANCE_4UNIT;
    const FRANCE_6UNIT = tokenIDs::FRANCE_6UNIT;
    const PAPACY_1UNIT = tokenIDs::PAPACY_1UNIT;
    const PAPACY_2UNIT = tokenIDs::PAPACY_2UNIT;
    const PAPACY_4UNIT = tokenIDs::PAPACY_4UNIT;
    const PROTESTANT_1UNIT = tokenIDs::PROTESTANT_1UNIT;
    const PROTESTANT_2UNIT = tokenIDs::PROTESTANT_2UNIT;
    const PROTESTANT_4UNIT = tokenIDs::PROTESTANT_4UNIT;
    const SCOTLAND_1UNIT = tokenIDs::SCOTLAND_1UNIT;
    const SCOTLAND_2UNIT = tokenIDs::SCOTLAND_2UNIT;
    const HUNGARY_1UNIT = tokenIDs::HUNGARY_1UNIT;
    const HUNGARY_4UNIT = tokenIDs::HUNGARY_4UNIT;
    const VENICE_1UNIT = tokenIDs::VENICE_1UNIT;
    const VENICE_2UNIT = tokenIDs::VENICE_2UNIT;
    const GENOA_1UNIT = tokenIDs::GENOA_1UNIT;
    const GENOA_2UNIT = tokenIDs::GENEROA_2UNIT;
}

abstract class NavalUnitTokens {
    const ENGLISH_SQUADRON = tokenIDs::ENGLISH_SQUADRON;
    const FRENCH_SQUADRON = tokenIDs::FRENCH_SQUADRON;
    const HAPSBURG_SQUADRON = tokenIDs::HAPSBURG_SQUADRON;
    const PAPACY_SQUADRON = tokenIDs::PAPACY_SQUADRON;
    const OTTOMAN_SQUADRON = tokenIDs::OTTOMAN_SQUADRON;
    const SCOTTISH_SQUADRON = tokenIDs::SCOTTISH_SQUADRON;
    const GENOESE_SQAUADRON = tokenIDs::GENOESE_SQAUADRON;
    const VENETIAN_SQUADRON = tokenIDs::VENETIAN_SQUADRON;
}
/*
 * Battle constants unused?
 */
const ATTACKER = 'attacker';
const DEFENDER = 'defender';

/*
 * Card type constants
 */
abstract class CardTypes{
    const HOME_CARD = 0;
    const MANDATORY_CARD = 1;
    const COMBAT_CARD = 2;
    const RESPONSE_CARD = 3;
    const EVENT_CARD = 4;
    const DIPLOMACY_CARD = 5;
}


/*
 * tracks
 * def strTrack(strName, intMax):
 *  return f"const {strName}_TRACK = [" + ", ".join([str(i) + " => locationIDs::" + strName+"_"+str(i) for i in range(0, intMax+1)]) + "];"
 */
const TURN_TRACK_TOKENS = [tokenIDs_TURN_MARKER::TURN];
const TURN_TRACK = [1 => locationIDs::TURN_TRACK_1, 2 => locationIDs::TURN_TRACK_2, 3 => locationIDs::TURN_TRACK_3, 4 => locationIDs::TURN_TRACK_4, 5 => locationIDs::TURN_TRACK_5, 
    6 => locationIDs::TURN_TRACK_6, 7 => locationIDs::TURN_TRACK_7, 8 => locationIDs::TURN_TRACK_8, 9 => locationIDs::TURN_TRACK_9];

const VICTORY_TRACK_TOKENS = [tokenIDs_VP_MARKER::VP_OTTOMAN, tokenIDs_VP_MARKER::VP_HAPSBURG, tokenIDs_VP_MARKER::VP_ENGLAND, tokenIDs_VP_MARKER::VP_FRANCE, tokenIDs_VP_MARKER::VP_PAPACY, tokenIDs_VP_MARKER::VP_PROTESTANT];
const VICTORY_TRACK = [
    0 => locationIDs::VICTORY_TRACK_0, 1 => locationIDs::VICTORY_TRACK_1, 2 => locationIDs::VICTORY_TRACK_2, 3 => locationIDs::VICTORY_TRACK_3, 4 => locationIDs::VICTORY_TRACK_4, 
    5 => locationIDs::VICTORY_TRACK_5, 6 => locationIDs::VICTORY_TRACK_6, 7 => locationIDs::VICTORY_TRACK_7, 8 => locationIDs::VICTORY_TRACK_8, 9 => locationIDs::VICTORY_TRACK_9, 
    10 => locationIDs::VICTORY_TRACK_10, 11 => locationIDs::VICTORY_TRACK_11, 12 => locationIDs::VICTORY_TRACK_12, 13 => locationIDs::VICTORY_TRACK_13, 14 => locationIDs::VICTORY_TRACK_14, 
    15 => locationIDs::VICTORY_TRACK_15, 16 => locationIDs::VICTORY_TRACK_16, 17 => locationIDs::VICTORY_TRACK_17, 18 => locationIDs::VICTORY_TRACK_18, 19 => locationIDs::VICTORY_TRACK_19, 
    20 => locationIDs::VICTORY_TRACK_20, 21 => locationIDs::VICTORY_TRACK_21, 22 => locationIDs::VICTORY_TRACK_22, 23 => locationIDs::VICTORY_TRACK_23, 24 => locationIDs::VICTORY_TRACK_24, 
    25 => locationIDs::VICTORY_TRACK_25, 26 => locationIDs::VICTORY_TRACK_26, 27 => locationIDs::VICTORY_TRACK_27, 28 => locationIDs::VICTORY_TRACK_28, 29 => locationIDs::VICTORY_TRACK_29];

const PIRACY_TRACK_TOKENS = [tokenIDs_VP_MARKER::PIRACY_VP];
const PIRACY_TRACK = [
    0 => locationIDs::PIRACY_0, 1 => locationIDs::PIRACY_1, 2 => locationIDs::PIRACY_2, 3 => locationIDs::PIRACY_3, 4 => locationIDs::PIRACY_4, 
    5 => locationIDs::PIRACY_5, 6 => locationIDs::PIRACY_6, 7 => locationIDs::PIRACY_7, 8 => locationIDs::PIRACY_8, 9 => locationIDs::PIRACY_9, 
    10 => locationIDs::PIRACY_10];

const CHATEAUX_TRACK_TOKENS = [tokenIDs_VP_MARKER::CHATEAUX_VP];
const CHATEAUX_TRACK = [
    0 => locationIDs::CHATEAUX_0, 1 => locationIDs::CHATEAUX_1, 2 => locationIDs::CHATEAUX_2, 3 => locationIDs::CHATEAUX_3, 4 => locationIDs::CHATEAUX_4, 
    5 => locationIDs::CHATEAUX_5, 6 => locationIDs::CHATEAUX_6];

const MARTIAL_STATUS_TRACK_TOKENS = [tokenIDs_STATUS::HENRY_MARITAL_STATUS];
const MARITAL_STATUS_TRACK = [
    1 => locationIDs::MARITAL_STATUS_1, 2 => locationIDs::MARITAL_STATUS_2, 3 => locationIDs::MARITAL_STATUS_3, 4 => locationIDs::MARITAL_STATUS_4, 
    5 => locationIDs::MARITAL_STATUS_5, 6 => locationIDs::MARITAL_STATUS_6, 7 => locationIDs::MARITAL_STATUS_7];

const PROTESTANT_SPACES_TRACK_TOKENS = [tokenIDs_RELIGIOUS::ENGLISH_PROT_COUNTER, tokenIDs_RELIGIOUS::PROTESTANT_SPACES];
const PROTESTANT_SPACES_TRACK = [
    0 => locationIDs::PROTESTANT_SPACES_0, 1 => locationIDs::PROTESTANT_SPACES_1, 2 => locationIDs::PROTESTANT_SPACES_2, 3 => locationIDs::PROTESTANT_SPACES_3, 4 => locationIDs::PROTESTANT_SPACES_4, 
    5 => locationIDs::PROTESTANT_SPACES_5, 6 => locationIDs::PROTESTANT_SPACES_6, 7 => locationIDs::PROTESTANT_SPACES_7, 8 => locationIDs::PROTESTANT_SPACES_8, 9 => locationIDs::PROTESTANT_SPACES_9, 
    10 => locationIDs::PROTESTANT_SPACES_10, 11 => locationIDs::PROTESTANT_SPACES_11, 12 => locationIDs::PROTESTANT_SPACES_12, 13 => locationIDs::PROTESTANT_SPACES_13, 14 => locationIDs::PROTESTANT_SPACES_14, 
    15 => locationIDs::PROTESTANT_SPACES_15, 16 => locationIDs::PROTESTANT_SPACES_16, 17 => locationIDs::PROTESTANT_SPACES_17, 18 => locationIDs::PROTESTANT_SPACES_18, 19 => locationIDs::PROTESTANT_SPACES_19, 
    20 => locationIDs::PROTESTANT_SPACES_20, 21 => locationIDs::PROTESTANT_SPACES_21, 22 => locationIDs::PROTESTANT_SPACES_22, 23 => locationIDs::PROTESTANT_SPACES_23, 24 => locationIDs::PROTESTANT_SPACES_24, 
    25 => locationIDs::PROTESTANT_SPACES_25, 26 => locationIDs::PROTESTANT_SPACES_26, 27 => locationIDs::PROTESTANT_SPACES_27, 28 => locationIDs::PROTESTANT_SPACES_28, 29 => locationIDs::PROTESTANT_SPACES_29, 
    30 => locationIDs::PROTESTANT_SPACES_30, 31 => locationIDs::PROTESTANT_SPACES_31, 32 => locationIDs::PROTESTANT_SPACES_32, 33 => locationIDs::PROTESTANT_SPACES_33, 34 => locationIDs::PROTESTANT_SPACES_34, 
    35 => locationIDs::PROTESTANT_SPACES_35, 36 => locationIDs::PROTESTANT_SPACES_36, 37 => locationIDs::PROTESTANT_SPACES_37, 38 => locationIDs::PROTESTANT_SPACES_38, 39 => locationIDs::PROTESTANT_SPACES_39, 
    40 => locationIDs::PROTESTANT_SPACES_40, 41 => locationIDs::PROTESTANT_SPACES_41, 42 => locationIDs::PROTESTANT_SPACES_42, 43 => locationIDs::PROTESTANT_SPACES_43, 44 => locationIDs::PROTESTANT_SPACES_44, 
    45 => locationIDs::PROTESTANT_SPACES_45, 46 => locationIDs::PROTESTANT_SPACES_46, 47 => locationIDs::PROTESTANT_SPACES_47, 48 => locationIDs::PROTESTANT_SPACES_48, 49 => locationIDs::PROTESTANT_SPACES_49, 
    50 => locationIDs::PROTESTANT_SPACES_50];

const SAINT_PETERS_CP_TRACK_TOKENS = [tokenIDs_SAINT_PETERS::ST_PETERS_CP];
const SAINT_PETERS_CP_TRACK = [
    0 => locationIDs::SAINT_PETERS_CP_0, 1 => locationIDs::SAINT_PETERS_CP_1, 2 => locationIDs::SAINT_PETERS_CP_2, 3 => locationIDs::SAINT_PETERS_CP_3, 4 => locationIDs::SAINT_PETERS_CP_4, 
    5 => locationIDs::SAINT_PETERS_CP_5];

const SAINT_PETERS_VP_TRACK_TOKENS = [tokenIDs_SAINT_PETERS::ST_PETERS_VP];
const SAINT_PETERS_VP_TRACK = [
    0 => locationIDs::SAINT_PETERS_VP_0, 1 => locationIDs::SAINT_PETERS_VP_1, 2 => locationIDs::SAINT_PETERS_VP_2, 3 => locationIDs::SAINT_PETERS_VP_3, 4 => locationIDs::SAINT_PETERS_VP_4, 
    5 => locationIDs::SAINT_PETERS_VP_5];

const NT_TRANSLATION_TRACK_TOKENS = [tokenIDs_TRANSLATION::NEW_TESTAMENT_ENGLISH, tokenIDs_TRANSLATION::NEW_TESTAMENT_FRENCH, tokenIDs_TRANSLATION::NEW_TESTAMENT_GERMAN];
const NT_TRANSLATION_TRACK = [
    0 => locationIDs::NT_TRANSLATION_0, 1 => locationIDs::NT_TRANSLATION_1, 2 => locationIDs::NT_TRANSLATION_2, 3 => locationIDs::NT_TRANSLATION_3, 4 => locationIDs::NT_TRANSLATION_4, 
    5 => locationIDs::NT_TRANSLATION_5, 6 => locationIDs::NT_TRANSLATION_6];

const BIBLE_TRANSLATION_TRACK_TOKENS = [tokenIDs_TRANSLATION::BIBLE_ENGLISH, tokenIDs_TRANSLATION::BIBLE_FRENCH, tokenIDs_TRANSLATION::BIBLE_GERMAN];
const BIBLE_TRANSLATION_TRACK = [
    0 => locationIDs::BIBLE_TRANSLATION_0, 1 => locationIDs::BIBLE_TRANSLATION_1, 2 => locationIDs::BIBLE_TRANSLATION_2, 3 => locationIDs::BIBLE_TRANSLATION_3, 4 => locationIDs::BIBLE_TRANSLATION_4, 
    5 => locationIDs::BIBLE_TRANSLATION_5, 6 => locationIDs::BIBLE_TRANSLATION_6, 7 => locationIDs::BIBLE_TRANSLATION_7, 8 => locationIDs::BIBLE_TRANSLATION_8, 9 => locationIDs::BIBLE_TRANSLATION_9, 
    10 => locationIDs::BIBLE_TRANSLATION_10];

const DiploLocationsArray = [
    Powers::OTTOMAN    => [Powers::HAPSBURG => locationIDs::DIPLO_OTT_HAP, Powers::ENGLAND => locationIDs::DIPLO_OTT_ENG, Powers::FRANCE => locationIDs::DIPLO_OTT_FRA, Powers::PAPACY => locationIDs::DIPLO_OTT_PAP, Powers::PROTESTANT => locationIDs::DIPLO_OTT_PRO, Powers::MINOR_GENOA => locationIDs::DIPLO_OTT_GEN, Powers::MINOR_HUNGARY => locationIDs::DIPLO_OTT_HUN, Powers::MINOR_VENICE => locationIDs::DIPLO_OTT_VEN], 
    Powers::HAPSBURG   => [Powers::OTTOMAN => locationIDs::DIPLO_OTT_HAP, Powers::ENGLAND => locationIDs::DIPLO_HAP_ENG, Powers::FRANCE => locationIDs::DIPLO_HAP_FRA, Powers::PAPACY => locationIDs::DIPLO_HAP_PAP, Powers::PROTESTANT => locationIDs::DIPLO_HAP_PRO, Powers::MINOR_GENOA => locationIDs::DIPLO_HAP_GEN, Powers::MINOR_HUNGARY => locationIDs::DIPLO_HAP_HUN, Powers::MINOR_SCOTLAND => locationIDs::DIPLO_HAP_SCO, Powers::MINOR_VENICE => locationIDs::DIPLO_HAP_VEN], 
    Powers::ENGLAND    => [Powers::OTTOMAN => locationIDs::DIPLO_OTT_ENG, Powers::HAPSBURG => locationIDs::DIPLO_HAP_ENG, Powers::FRANCE => locationIDs::DIPLO_ENG_FRA, Powers::PAPACY => locationIDs::DIPLO_ENG_PAP, Powers::PROTESTANT => locationIDs::DIPLO_ENG_PRO, Powers::MINOR_GENOA => locationIDs::DIPLO_ENG_GEN, Powers::MINOR_SCOTLAND => locationIDs::DIPLO_ENG_SCO], 
    Powers::FRANCE     => [Powers::OTTOMAN => locationIDs::DIPLO_OTT_FRA, Powers::HAPSBURG => locationIDs::DIPLO_HAP_FRA, Powers::ENGLAND => locationIDs::DIPLO_ENG_FRA, Powers::PAPACY => locationIDs::DIPLO_FRA_PAP, Powers::PROTESTANT => locationIDs::DIPLO_FRA_PRO, Powers::MINOR_GENOA => locationIDs::DIPLO_FRA_GEN, Powers::MINOR_SCOTLAND => locationIDs::DIPLO_FRA_SCO, Powers::MINOR_VENICE => locationIDs::DIPLO_FRA_VEN], 
    Powers::PAPACY     => [Powers::OTTOMAN => locationIDs::DIPLO_OTT_PAP, Powers::HAPSBURG => locationIDs::DIPLO_HAP_PAP, Powers::ENGLAND => locationIDs::DIPLO_ENG_PAP, Powers::FRANCE => locationIDs::DIPLO_FRA_PAP, Powers::PROTESTANT => locationIDs::DIPLO_PAP_PRO, Powers::MINOR_GENOA => locationIDs::DIPLO_PAP_GEN, Powers::MINOR_VENICE => locationIDs::DIPLO_PAP_VEN], 
    Powers::PROTESTANT => [Powers::OTTOMAN => locationIDs::DIPLO_OTT_PRO, Powers::HAPSBURG => locationIDs::DIPLO_HAP_PRO, Powers::ENGLAND => locationIDs::DIPLO_ENG_PAP, Powers::FRANCE => locationIDs::DIPLO_FRA_PRO, Powers::PAPACY => locationIDs::DIPLO_PAP_PRO, Powers::MINOR_GENOA => locationIDs::DIPLO_PRO_GEN, Powers::MINOR_VENICE => locationIDs::DIPLO_PRO_VEN]
];

const HomeCard_key_locations = [
    Powers::OTTOMAN => [locationIDs::OTTOMAN_KEY_1, locationIDs::OTTOMAN_KEY_2, locationIDs::OTTOMAN_KEY_3, locationIDs::OTTOMAN_KEY_4, locationIDs::OTTOMAN_KEY_5, locationIDs::OTTOMAN_KEY_6, locationIDs::OTTOMAN_KEY_7, locationIDs::OTTOMAN_KEY_8, locationIDs::OTTOMAN_KEY_9, locationIDs::OTTOMAN_KEY_10, locationIDs::OTTOMAN_KEY_11],
    Powers::HAPSBURG => [locationIDs::HAPSBURG_KEY_1, locationIDs::HAPSBURG_KEY_2, locationIDs::HAPSBURG_KEY_3, locationIDs::HAPSBURG_KEY_4, locationIDs::HAPSBURG_KEY_5, locationIDs::HAPSBURG_KEY_6, locationIDs::HAPSBURG_KEY_7, locationIDs::HAPSBURG_KEY_8, locationIDs::HAPSBURG_KEY_9, locationIDs::HAPSBURG_KEY_10, locationIDs::HAPSBURG_KEY_11, locationIDs::HAPSBURG_KEY_12, locationIDs::HAPSBURG_KEY_13, locationIDs::HAPSBURG_KEY_14],
    Powers::ENGLAND => [locationIDs::ENGLAND_KEY_1, locationIDs::ENGLAND_KEY_2, locationIDs::ENGLAND_KEY_3, locationIDs::ENGLAND_KEY_4, locationIDs::ENGLAND_KEY_5, locationIDs::ENGLAND_KEY_6, locationIDs::ENGLAND_KEY_7, locationIDs::ENGLAND_KEY_8, locationIDs::ENGLAND_KEY_9],
    Powers::FRANCE => [locationIDs::FRANCE_KEY_1, locationIDs::FRANCE_KEY_2, locationIDs::FRANCE_KEY_3, locationIDs::FRANCE_KEY_4, locationIDs::FRANCE_KEY_5, locationIDs::FRANCE_KEY_6, locationIDs::FRANCE_KEY_7, locationIDs::FRANCE_KEY_8, locationIDs::FRANCE_KEY_9, locationIDs::FRANCE_KEY_10, locationIDs::FRANCE_KEY_11],
    Powers::PAPACY => [locationIDs::PAPACY_KEY_1, locationIDs::PAPACY_KEY_2, locationIDs::PAPACY_KEY_3, locationIDs::PAPACY_KEY_4, locationIDs::PAPACY_KEY_5, locationIDs::PAPACY_KEY_6, locationIDs::PAPACY_KEY_7]
];
/*
 * Game options
 */

/*
 * Stats
 */
