<?php

//require_once 'generated_constants.inc.php';
//TODO add seazones (each city up to two adjacend sea zone, each sea zone up to ? adjacend cities, ? seazones, a name, location for ships and piracy markers)
/*
 * Sea zones
 * /
abstract class SeazoneIds{
    const 
}

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
    const Other = 5;
}
/*
 * Token state constants
 */
abstract class TokenSides{
    const FRONT = 0; // regular unit, uncommited debator, ...
    const BACK = 1;
 }

//what is this used for?
abstract class TokenTypes{
    const FORTRESS = 1212;
    const PIRATE_HAVEN = 1213;
    const JESUIT_UNIVERSITY = 1214;
    const CONTROL = 2000;
    const KEYS = 2001;
    const CATHOLIC = 2002;
    const REFORMED = 2003;
    const HEX = 2004;
    const MILITARY = 2005;
    const UNITS = 2006;
    const MERCENARY = 2007;
    const CAVALRY = 2008;
    const LEADER = 2009;
    const NAVAL = 2010;
    const DIPLOMACY = 2011;
    const UNREST_MARKER = 2012;
    const VP_MARKER = 2013;
    const LOANED = 2014;
    const REFORMER = 2015;
    const DEBATER = 2016;
    const COMMITTED = 2017;
    const EXPLORATION = 2018;
    const CHARTED = 2019;
    const EXPLORER = 2020;
    const UNKNOWN = 2021;
    const COLONY = 2022;
    const CONQUEST = 2023;
    const CONQUISTADOR = 2024;
    const RELIGIOUS = 2025;
    const COUNTER = 2026;
    const TURN_MARKER = 2027;
    const CARDS_MARKER = 2028;
    const WIFE = 2029;
    const BENEFIT = 2030;
    const WIVES = 2031;
    const STATUS = 2032;
    const TRANSLATION = 2033;
    const SAINT_PETERS = 2034;
    const EVENT_REMINDER = 2035;
    const EXCOMMUNION = 2036;
    const FORTRESS_MARKER = 2037;
    const PIRATEHAVEN = 2038;
    const UNIVERSITY = 2039;
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

abstract class UnitShips{
    const ENGLISH_SQUADRON = 1060;
    const FRENCH_SQUADRON = 1061;
    const GENOESE_SQAUADRON = 1062;
    const HAPSBURG_SQUADRON = 1063;
    const OTTOMAN_SQUADRON = 1064;
    const PAPACY_SQUADRON = 1065;
    const SCOTTISH_SQUADRON = 1066;
    const VENETIAN_SQUADRON = 1067;
}

abstract class MilitaryLeadersToken{
const BRANDON = 1045;
const CHARLES_V = 1046;
const DUDLEY = 1047;
const DUKE_ALVA = 1048;
const FERDINAND = 1049;
const FRANCIS_I = 1050;
const HENRY_II = 1051;
const HENRY_VIII = 1052;
const IBRAHIM = 1053;
const JOHN_FREDERICK = 1054;
const MAURICE_OF_SAXONY = 1055;
const MONTMORENCY = 1056;
const PHILIP_HESSE = 1057;
const RENEGADE = 1058;
const SULEIMAN = 1059;
const ANDREA_DORIA = 1068;
const BARBAROSSA = 1069;
const DRAGUT = 1070;
}

abstract class LandUnitTokens{
const ENGLAND_1UNIT = 1013;
const ENGLAND_2UNIT = 1014;
const ENGLAND_4UNIT = 1015;
const ENGLAND_6UNIT = 1016;
const FRANCE_1UNIT = 1017;
const FRANCE_2UNIT = 1018;
const FRANCE_4UNIT = 1019;
const FRANCE_6UNIT = 1020;
const GENOA_1UNIT = 1021;
const GENOA_2UNIT = 1022;
const HAPSBURG_1UNIT = 1023;
const HAPSBURG_2UNIT = 1024;
const HAPSBURG_4UNIT = 1025;
const HAPSBURG_6UNIT = 1026;
const HUNGARY_1UNIT = 1027;
const HUNGARY_4UNIT = 1028;
const INDEPENDENT_1UNIT = 1029;
const KNIGHTS_1UNIT = 1030;
const OTTOMAN_1UNIT = 1031;
const OTTOMAN_2UNIT = 1032;
const OTTOMAN_4UNIT = 1033;
const OTTOMAN_6UNIT = 1034;
const PAPACY_1UNIT = 1035;
const PAPACY_2UNIT = 1036;
const PAPACY_4UNIT = 1037;
const PROTESTANT_1UNIT = 1038;
const PROTESTANT_2UNIT = 1039;
const PROTESTANT_4UNIT = 1040;
const SCOTLAND_1UNIT = 1041;
const SCOTLAND_2UNIT = 1042;
const VENICE_1UNIT = 1043;
const VENICE_2UNIT = 1044;
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

abstract class CardIds{
    const JANISSARIES = 5000;
    const HOLY_ROMAN_EMPEROR = 5001;
    const SIX_WIVES_OF_HENRY_VIII = 5002;
    const PATRON_OF_THE_ARTS = 5003;
    const PAPAL_BULL = 5004;
    const LEIPZIG_DEBATE = 5005;
    const HERE_I_STAND = 5006;
    const LUTHER_95_THESES = 5007;
    const BARBARY_PIRATES = 5008;
    const CLEMENT_VII = 5009;
    const DEFENDER_OF_THE_FAITH = 5010;
    const MASTER_OF_ITALY = 5011;
    const SCHMALKALDIC_LEAGUE = 5012;
    const PAUL_III = 5013;
    const SOCIETY_OF_JESUS = 5014;
    const CALVIN = 5015;
    const COUNCIL_OF_TRENT = 5016;
    const DRAGUT = 5017;
    const EDWARD_VI = 5018;
    const HENRY_II = 5019;
    const MARY_I = 5020;
    const JULIUS_III = 5021;
    const ELIZABETH_I = 5022;
    const ARQUEBUSIERS = 5023;
    const FIELD_ARTILLERY = 5024;
    const MERCENARIES_BRIBED = 5025;
    const MERCENARIES_GROW_RESTLESS = 5026;
    const SIEGE_MINING = 5027;
    const SURPRISE_ATTACK = 5028;
    const TERCIOS = 5029;
    const FOUL_WEATHER = 5030;
    const GOUT = 5031;
    const LANDSKNECHTS = 5032;
    const PROFESSIONAL_ROWERS = 5033;
    const SIEGE_ARTILLERY = 5034;
    const SWISS_MERCENARIES = 5035;
    const THE_WARTBURG = 5036;
    const HALLEY_COMET = 5037;
    const AUGSBURG_CONFESSION = 5038;
    const MACHIAVELLI_THE_PRINCE = 5039;
    const MARBURG_COLLOQUY = 5040;
    const ROXELANA = 5041;
    const ZWINGLI_DONS_ARMOR = 5042;
    const AFFAIR_OF_THE_PLACARDS = 5043;
    const CALVIN_EXPELLED = 5044;
    const CALVIN_INSTITUTES = 5045;
    const COPERNICUS = 5046;
    const GALLEONS = 5047;
    const HUGUENOT_RAIDERS = 5048;
    const MERCATORMAP = 5049;
    const MICHAEL_SERVETUS = 5050;
    const MICHELANGELO = 5051;
    const PLANTATIONS = 5052;
    const POTOSI_SILVER_MINES = 5053;
    const JESUIT_EDUCATION = 5054;
    const PAPAL_INQUISITION = 5055;
    const PHILIP_OF_HESSE_BIGAMY = 5056;
    const SPANISH_INQUISITION = 5057;
    const LADY_JANE_GREY = 5058;
    const MAURICE_OF_SAXONY = 5059;
    const MARY_DEFIES_COUNCIL = 5060;
    const BOOK_OF_COMMON_PRAYER = 5061;
    const DISSOLUTION_OF_THE_MONASTERIES = 5062;
    const PILGRIMAGE_OF_GRACE = 5063;
    const A_MIGHTY_FORTRESS = 5064;
    const AKINJI_RAIDERS = 5065;
    const ANABAPTISTS = 5066;
    const ANDREA_DORIA = 5067;
    const AULD_ALLIANCE = 5068;
    const CHARLES_BOURBON = 5069;
    const CITY_STATE_REBELS = 5070;
    const CLOTH_PRICES_FLUCTUATE = 5071;
    const DIPLOMATIC_MARRIAGE = 5072;
    const DIPLOMATIC_OVERTURE = 5073;
    const ERASMUS = 5074;
    const FOREIGN_RECRUITS = 5075;
    const FOUNTAIN_OF_YOUTH = 5076;
    const FREDERICK_THE_WISE = 5077;
    const FUGGERS = 5078;
    const GABELLE_REVOLT = 5079;
    const INDULGENCE_VENDOR = 5080;
    const JANISSARIES_REBEL = 5081;
    const JOHN_ZAPOLYA = 5082;
    const JULIA_GONZAGA = 5083;
    const KATHERINA_BORA = 5084;
    const KNIGHTS_OF_ST_JOHN = 5085;
    const MERCENARIES_DEMAND_PAY = 5086;
    const PEASANTS_WAR = 5087;
    const PIRATE_HAVEN = 5088;
    const PRINTING_PRESS = 5089;
    const RANSOM = 5090;
    const REVOLT_IN_EGYPT = 5091;
    const REVOLT_IN_IRELAND = 5092;
    const REVOLT_OF_THE_COMMUNEROS = 5093;
    const SACK_OF_ROME = 5094;
    const SALE_OF_MOLUCCAS = 5095;
    const SCOTS_RAID = 5096;
    const SEARCH_FOR_CIBOLA = 5097;
    const SEBASTIAN_CABOT = 5098;
    const SHIPBUILDING = 5099;
    const SMALLPOX = 5100;
    const SPRING_PREPARATIONS = 5101;
    const THREAT_TO_POWER = 5102;
    const TRACE_ITALIENNE = 5103;
    const TREACHERY = 5104;
    const UNPAID_MERCENARIES = 5105;
    const UNSANITARY_CAMP = 5106;
    const VENETIAN_ALLIANCE = 5107;
    const VENETIAN_INFORMANT = 5108;
    const WAR_IN_PERSIA = 5109;
    const COLONIAL_GOVERNOR_NATIVE_UPRISING = 5110;
    const THOMAS_MORE = 5111;
    const IMPERIAL_CORONATION = 5112;
    const LA_FORET_EMBASSY_IN_ISTANBUL = 5113;
    const THOMAS_CROMWELL = 5114;
    const ROUGH_WOOING = 5115;
}

abstract class DiploCards{
    const ANDREA_DORIA = 5116;
    const FRENCH_CONSTABLE_INVADES = 5117;
    const CORSAIR_RAID = 5118;
    const DIPLOMATIC_MARRIAGE = 5119;
    const DIPLOMATIC_PRESSURE = 5120;
    const DIPLOMATIC_FRENCH_INVASION = 5121;
    const HENRY_PETITIONS_FOR_DIVORCE = 5122;
    const KNIGHTS_OF_ST_JOHN = 5123;
    const PLAGUE = 5124;
    const SHIPBUILDING = 5125;
    const SPANISH_INVASION = 5126;
    const VENETIAN_ALLIANCE = 5127;
    const AUSTRIAN_INVASION = 5128;
    const IMPERIAL_INVASION = 5129;
    const MACHIAVELLI = 5130;
    const OTTOMAN_INVASION = 5131;
    const SECRET_PROTESTANT_CIRCLE = 5132;
    const SIEGE_OF_VIENNA = 5133;
    const SPANISH_INQUISITION = 5134;
}

abstract class SpaceControllTokens{
const ENGLAND_KEY = 1000;
const FRANCE_KEY = 1001;
const HAPSBURG_KEY = 1002;
const OTTOMAN_KEY = 1003;
const INDEPENDENT_KEY = 1004;
const PAPACY_KEY = 1005;
const ENGLAND_HEX = 1006;
const FRANCE_HEX = 1007;
const HAPSBURG_HEX = 1008;
const INDEPENDENT_HEX = 1009;
const OTTOMAN_HEX = 1010;
const PAPACY_HEX = 1011;
const PROTESTANT_HEX = 1012;
}

abstract class CityIds{
    const WITTENBERG = 3000;
    const BRANDENBURG = 3001;
    const MAINZ = 3002;
    const COLOGNE = 3003;
    const TRIER = 3004;
    const AUGSBURG = 3005;
    const STETTIN = 3006;
    const LUBECK = 3007;
    const MAGDEBURG = 3008;
    const HAMBURG = 3009;
    const BRUNSWICK = 3010;
    const BREMEN = 3011;
    const MUNSTER = 3012;
    const KASSEL = 3013;
    const ERFURT = 3014;
    const LEIPZIG = 3015;
    const NUREMBERG = 3016;
    const WORMS = 3017;
    const REGENSBURG = 3018;
    const STRASBURG = 3019;
    const SALZBURG = 3020;
    const VIENNA = 3021;
    const LINZ = 3022;
    const GRAZ = 3023;
    const INNSBRUCK = 3024;
    const ZURICH = 3025;
    const BASEL = 3026;
    const LONDON = 3027;
    const BRISTOL = 3028;
    const YORK = 3029;
    const NORWICH = 3030;
    const PORTSMOUTH = 3031;
    const PLYMOUTH = 3032;
    const LINCOLN = 3033;
    const WALES = 3034;
    const SHREWSBURY = 3035;
    const CARLISLE = 3036;
    const BERWICK = 3037;
    const EDINBURGH = 3038;
    const STIRLING = 3039;
    const GLASGOW = 3040;
    const PARIS = 3041;
    const LYON = 3042;
    const ROUEN = 3043;
    const MARSEILLE = 3044;
    const BORDEAUX = 3045;
    const GRENOBLE = 3046;
    const DIJON = 3047;
    const ST_DIZIER = 3048;
    const ST_QUENTIN = 3049;
    const BOULOGNE = 3050;
    const ORLEANS = 3051;
    const AVIGNON = 3052;
    const TOULOUSE = 3053;
    const LIMOGES = 3054;
    const TOURS = 3055;
    const NANTES = 3056;
    const BREST = 3057;
    const BRUSSELS = 3058;
    const BESANCON = 3059;
    const CALAIS = 3060;
    const METZ = 3061;
    const LIEGE = 3062;
    const GENEVA = 3063;
    const NICE = 3064;
    const ROME = 3065;
    const RAVENNA = 3066;
    const ANCONA = 3067;
    const NAPLES = 3068;
    const TRIESTE = 3069;
    const CERIGNOLA = 3070;
    const TARANTO = 3071;
    const MESSINA = 3072;
    const PALERMO = 3073;
    const GENOA = 3074;
    const VENICE = 3075;
    const MILAN = 3076;
    const FLORENCE = 3077;
    const TURIN = 3078;
    const TRENT = 3079;
    const MODENA = 3080;
    const PAVIA = 3081;
    const SIENA = 3082;
    const VALLADOLID = 3083;
    const NAVARRE = 3084;
    const BARCELONA = 3085;
    const SEVILLE = 3086;
    const GIBRALTAR = 3087;
    const CORUNNA = 3088;
    const BILBAO = 3089;
    const ZARAGOZA = 3090;
    const MADRID = 3091;
    const VALENCIA = 3092;
    const PALMA = 3093;
    const CORDOBA = 3094;
    const GRANADA = 3095;
    const CARTAGENA = 3096;
    const ISTANBUL = 3097;
    const EDIRNE = 3098;
    const SALONIKA = 3099;
    const ATHENS = 3100;
    const SCUTARI = 3101;
    const VARNA = 3102;
    const BUCHAREST = 3103;
    const NICOPOLIS = 3104;
    const SOFIA = 3105;
    const LARISSA = 3106;
    const LEPANTO = 3107;
    const CORON = 3108;
    const NEZH = 3109;
    const DURAZZO = 3110;
    const ALGIERS = 3111;
    const ORAN = 3112;
    const TRIPOLI = 3113;
    const BELGRADE = 3114;
    const BUDA = 3115;
    const PRAGUE = 3116;
    const SZEGEDIN = 3117;
    const PRESSBURG = 3118;
    const MOHACS = 3119;
    const AGRAM = 3120;
    const BRUNN = 3121;
    const BRESLAU = 3122;
    const ANTWERP = 3123;
    const MALTA = 3124;
    const CAGLIARI = 3125;
    const AMSTERDAM = 3126;
    const CANDIA = 3127;
    const CORFU = 3128;
    const ZARA = 3129;
    const BASTIA = 3130;
    const TUNIS = 3131;
    const RHODES = 3132;
    const RAGUSA = 3133;
}

// Protestant and papal debators
//debators: are on the religius strugle display and make debates.
//reformes: are on citiys and help with publish treatise.
abstract class Debators{
const CALVIN_REFORMER = 1085;//maybe own sektion for reformers?
const CRANMER_REFORMER = 1086;
const LUTHER_REFORMER = 1087;
const ZWINGLI_REFORMER = 1088;

const ALEANDER = 1089;
const CAJETAN = 1090;
const CAMPEGGIO = 1091;
const CANISIUS = 1092;
const CARAFFA = 1093;
const CONTARINI = 1094;
const ECK = 1095;
const FABER = 1096;
const GARDINER = 1097;
const LOYOLA = 1098;
const POLE = 1099;
const TETZEL = 1100;
const BUCER = 1101;
const BULLINGER = 1102;
const CALVIN = 1103;
const CARLSTADT = 1104;
const COP = 1105;
const COVERDALE = 1106;
const CRANMER = 1107;
const FAREL = 1108;
const KNOX = 1109;
const LATIMER = 1110;
const LUTHER = 1111;
const MELANCHTHON = 1112;
const OEKOLAMPADIUS = 1113;
const OLIVETAN = 1114;
const TYNDALE = 1115;
const WISHART = 1116;
const ZWINGLI = 1117;
}

abstract class DebatorLocations{
    const CURRENT_DEBATER_PAP = 4326;
    const CURRENT_DEBATER_PRO = 4327;
    const POPE_1 = 4328;
    const POPE_2 = 4329;
    const POPE_3 = 4330;
    const POPE_4 = 4331;
    const POPE_5 = 4332;
    const POPE_6 = 4333;
    const POPE_7 = 4334;
    const POPE_8 = 4335;
    const POPE_9 = 4336;
    const POPE_10 = 4337;
    const POPE_11 = 4338;
    const POPE_12 = 4339;
    const GER_1 = 4340;
    const GER_2 = 4341;
    const GER_3 = 4342;
    const GER_4 = 4343;
    const GER_5 = 4344;
    const GER_6 = 4345;
    const GER_7 = 4346;
    const ENG_1 = 4347;
    const ENG_2 = 4348;
    const ENG_3 = 4349;
    const ENG_4 = 4350;
    const ENG_5 = 4351;
    const ENG_6 = 4352;
    const FRE_1 = 4353;
    const FRE_2 = 4354;
    const FRE_3 = 4355;
    const FRE_4 = 4356;
}

abstract class UnitTokens{

}

abstract class ControllMarkerTokens{

}

//TODO split this into reasonable named subsections
abstract class OtherTokens{
    const UNREST = 1073;
}

abstract class TrackTokens{

    const VP_ENGLAND = 1074;
    const VP_FRANCE = 1075;
    const VP_HAPSBURG = 1076;
    const VP_OTTOMAN = 1077;
    const VP_PAPACY = 1078;
    const VP_PROTESTANT = 1079;

const ENGLISH_PROT_COUNTER = 1152;
const PROTESTANT_SPACES = 1153;
const TURN = 1154;

const CHATEAUX_VP = 1168;
const PIRACY_VP = 1169;
const ST_PETERS_VP = 1170;

const HENRY_MARITAL_STATUS = 1189;
const BIBLE_ENGLISH = 1190;
const BIBLE_FRENCH = 1191;
const BIBLE_GERMAN = 1192;
const NEW_TESTAMENT_ENGLISH = 1193;
const NEW_TESTAMENT_FRENCH = 1194;
const NEW_TESTAMENT_GERMAN = 1195;
const ST_PETERS_CP = 1196;

const ANNE_BOLEYN = 1183; //Do henrys wives belong here?
const ANNE_CLEVES = 1184;
const CATHERINE_ARAGON = 1185;
const JANE_SEYMOUR = 1186;
const KATHERINE_PARR = 1187;
const KATHRYN_HOWARD = 1188;
}

//all named positions on the, excluding cities
abstract class TrackLocations{
    const TURN_TRACK_1 = 4000;
    const TURN_TRACK_2 = 4001;
    const TURN_TRACK_3 = 4002;
    const TURN_TRACK_4 = 4003;
    const TURN_TRACK_5 = 4004;
    const TURN_TRACK_6 = 4005;
    const TURN_TRACK_7 = 4006;
    const TURN_TRACK_8 = 4007;
    const TURN_TRACK_9 = 4008;

    const NT_TRANSLATION_0 = 4205;
    const NT_TRANSLATION_1 = 4206;
    const NT_TRANSLATION_2 = 4207;
    const NT_TRANSLATION_3 = 4208;
    const NT_TRANSLATION_4 = 4209;
    const NT_TRANSLATION_5 = 4210;
    const NT_TRANSLATION_6 = 4211;
    const BIBLE_TRANSLATION_0 = 4212;
    const BIBLE_TRANSLATION_1 = 4213;
    const BIBLE_TRANSLATION_2 = 4214;
    const BIBLE_TRANSLATION_3 = 4215;
    const BIBLE_TRANSLATION_4 = 4216;
    const BIBLE_TRANSLATION_5 = 4217;
    const BIBLE_TRANSLATION_6 = 4218;
    const BIBLE_TRANSLATION_7 = 4219;
    const BIBLE_TRANSLATION_8 = 4220;
    const BIBLE_TRANSLATION_9 = 4221;
    const BIBLE_TRANSLATION_10 = 4222;
    const CHATEAUX_0 = 4223;
    const CHATEAUX_1 = 4224;
    const CHATEAUX_2 = 4225;
    const CHATEAUX_3 = 4226;
    const CHATEAUX_4 = 4227;
    const CHATEAUX_5 = 4228;
    const CHATEAUX_6 = 4229;
    const PREGNANCY_CHART_1 = 4105;
    const PREGNANCY_CHART_2 = 4106;
    const PREGNANCY_CHART_3 = 4107;
    const PREGNANCY_CHART_4 = 4108;
    const PREGNANCY_CHART_5 = 4109;
    const PREGNANCY_CHART_6 = 4110;
    const PIRACY_0 = 4230;
    const PIRACY_1 = 4231;
    const PIRACY_2 = 4232;
    const PIRACY_3 = 4233;
    const PIRACY_4 = 4234;
    const PIRACY_5 = 4235;
    const PIRACY_6 = 4236;
    const PIRACY_7 = 4237;
    const PIRACY_8 = 4238;
    const PIRACY_9 = 4239;
    const PIRACY_10 = 4240;
    const MARITAL_STATUS_1 = 4241;
    const MARITAL_STATUS_2 = 4242;
    const MARITAL_STATUS_3 = 4243;
    const MARITAL_STATUS_4 = 4244;
    const MARITAL_STATUS_5 = 4245;
    const MARITAL_STATUS_6 = 4246;
    const MARITAL_STATUS_7 = 4247;
    const SAINT_PETERS_CP_0 = 4248;
    const SAINT_PETERS_CP_1 = 4249;
    const SAINT_PETERS_CP_2 = 4250;
    const SAINT_PETERS_CP_3 = 4251;
    const SAINT_PETERS_CP_4 = 4252;
    const SAINT_PETERS_CP_5 = 4253;
    const SAINT_PETERS_VP_0 = 4254;
    const SAINT_PETERS_VP_1 = 4255;
    const SAINT_PETERS_VP_2 = 4256;
    const SAINT_PETERS_VP_3 = 4257;
    const SAINT_PETERS_VP_4 = 4258;
    const SAINT_PETERS_VP_5 = 4259;

    const VICTORY_TRACK_0 = 4040;
    const VICTORY_TRACK_1 = 4041;
    const VICTORY_TRACK_2 = 4042;
    const VICTORY_TRACK_3 = 4043;
    const VICTORY_TRACK_4 = 4044;
    const VICTORY_TRACK_5 = 4045;
    const VICTORY_TRACK_6 = 4046;
    const VICTORY_TRACK_7 = 4047;
    const VICTORY_TRACK_8 = 4048;
    const VICTORY_TRACK_9 = 4049;
    const VICTORY_TRACK_10 = 4050;
    const VICTORY_TRACK_11 = 4051;
    const VICTORY_TRACK_12 = 4052;
    const VICTORY_TRACK_13 = 4053;
    const VICTORY_TRACK_14 = 4054;
    const VICTORY_TRACK_15 = 4055;
    const VICTORY_TRACK_16 = 4056;
    const VICTORY_TRACK_17 = 4057;
    const VICTORY_TRACK_18 = 4058;
    const VICTORY_TRACK_19 = 4059;
    const VICTORY_TRACK_20 = 4060;
    const VICTORY_TRACK_21 = 4061;
    const VICTORY_TRACK_22 = 4062;
    const VICTORY_TRACK_23 = 4063;
    const VICTORY_TRACK_24 = 4064;
    const VICTORY_TRACK_25 = 4065;
    const VICTORY_TRACK_26 = 4066;
    const VICTORY_TRACK_27 = 4067;
    const VICTORY_TRACK_28 = 4068;
    const VICTORY_TRACK_29 = 4069;

    const PROTESTANT_SPACES_0 = 4275;
    const PROTESTANT_SPACES_1 = 4276;
    const PROTESTANT_SPACES_2 = 4277;
    const PROTESTANT_SPACES_3 = 4278;
    const PROTESTANT_SPACES_4 = 4279;
    const PROTESTANT_SPACES_5 = 4280;
    const PROTESTANT_SPACES_6 = 4281;
    const PROTESTANT_SPACES_7 = 4282;
    const PROTESTANT_SPACES_8 = 4283;
    const PROTESTANT_SPACES_9 = 4284;
    const PROTESTANT_SPACES_10 = 4285;
    const PROTESTANT_SPACES_11 = 4286;
    const PROTESTANT_SPACES_12 = 4287;
    const PROTESTANT_SPACES_13 = 4288;
    const PROTESTANT_SPACES_14 = 4289;
    const PROTESTANT_SPACES_15 = 4290;
    const PROTESTANT_SPACES_16 = 4291;
    const PROTESTANT_SPACES_17 = 4292;
    const PROTESTANT_SPACES_18 = 4293;
    const PROTESTANT_SPACES_19 = 4294;
    const PROTESTANT_SPACES_20 = 4295;
    const PROTESTANT_SPACES_21 = 4296;
    const PROTESTANT_SPACES_22 = 4297;
    const PROTESTANT_SPACES_23 = 4298;
    const PROTESTANT_SPACES_24 = 4299;
    const PROTESTANT_SPACES_25 = 4300;
    const PROTESTANT_SPACES_26 = 4301;
    const PROTESTANT_SPACES_27 = 4302;
    const PROTESTANT_SPACES_28 = 4303;
    const PROTESTANT_SPACES_29 = 4304;
    const PROTESTANT_SPACES_30 = 4305;
    const PROTESTANT_SPACES_31 = 4306;
    const PROTESTANT_SPACES_32 = 4307;
    const PROTESTANT_SPACES_33 = 4308;
    const PROTESTANT_SPACES_34 = 4309;
    const PROTESTANT_SPACES_35 = 4310;
    const PROTESTANT_SPACES_36 = 4311;
    const PROTESTANT_SPACES_37 = 4312;
    const PROTESTANT_SPACES_38 = 4313;
    const PROTESTANT_SPACES_39 = 4314;
    const PROTESTANT_SPACES_40 = 4315;
    const PROTESTANT_SPACES_41 = 4316;
    const PROTESTANT_SPACES_42 = 4317;
    const PROTESTANT_SPACES_43 = 4318;
    const PROTESTANT_SPACES_44 = 4319;
    const PROTESTANT_SPACES_45 = 4320;
    const PROTESTANT_SPACES_46 = 4321;
    const PROTESTANT_SPACES_47 = 4322;
    const PROTESTANT_SPACES_48 = 4323;
    const PROTESTANT_SPACES_49 = 4324;
    const PROTESTANT_SPACES_50 = 4325;
}

abstract class VPTokens{
const WAR_WINNER_1VP = 1179;
const WAR_WINNER_2VP = 1180;
const PHONYSCOTLAND_MINUS1 = 1181;
const PHONYVENICE_MINUS1 = 1182;

const COPERNICUS_1VP = 1171;
const COPERNICUS_2VP = 1172;
const EDWARD_5VP = 1173;
const ELIZABETH_2VP = 1174;
const GONZAGA_1VP = 1175;
const SERVETUS_1VP = 1176;
const MASTER_OF_ITALY_1VP = 1177;
const MASTER_OF_ITALY_2VP = 1178;

const GREAT_LAKES_1VP = 1156;
const MISSISSIPPI_RIVER_1VP = 1157;
const ST_LAWRENCE_RIVER_1VP = 1158;
const AMAZON_RIVER_2VP = 1159;
const PACIFIC_STRAIT_1VP = 1160;
const CIRCUMNAVIGATION_3VP = 1161;
const MAYA_1VP = 1162;
const AZTECS_2VP = 1163;
const INCA_2VP = 1164;

const BIBLE_ENG_1VP = 1165;
const BIBLE_FRE_1VP = 1166;
const BIBLE_GER_1VP = 1167;
}

abstract class PlayerBoardLocations{
    //TODO location for minus1 card markers missing
    const ENG_VP_TOKEN_1 = 4169; // Location id for Tokens with VP (e.g. Warwinner or new world)
    const ENG_VP_TOKEN_2 = 4170;
    const ENG_VP_TOKEN_3 = 4171;
    const ENG_VP_TOKEN_4 = 4172;
    const ENG_VP_TOKEN_5 = 4173;
    const ENG_VP_TOKEN_6 = 4174;
    const FRA_VP_TOKEN_1 = 4175;
    const FRA_VP_TOKEN_2 = 4176;
    const FRA_VP_TOKEN_3 = 4177;
    const FRA_VP_TOKEN_4 = 4178;
    const FRA_VP_TOKEN_5 = 4179;
    const FRA_VP_TOKEN_6 = 4180;
    const HAP_VP_TOKEN_1 = 4181;
    const HAP_VP_TOKEN_2 = 4182;
    const HAP_VP_TOKEN_3 = 4183;
    const HAP_VP_TOKEN_4 = 4184;
    const HAP_VP_TOKEN_5 = 4185;
    const HAP_VP_TOKEN_6 = 4186;
    const PAP_VP_TOKEN_1 = 4187;
    const PAP_VP_TOKEN_2 = 4188;
    const PAP_VP_TOKEN_3 = 4189;
    const PAP_VP_TOKEN_4 = 4190;
    const PAP_VP_TOKEN_5 = 4191;
    const PAP_VP_TOKEN_6 = 4192;
    const PRO_VP_TOKEN_1 = 4193;
    const PRO_VP_TOKEN_2 = 4194;
    const PRO_VP_TOKEN_3 = 4195;
    const PRO_VP_TOKEN_4 = 4196;
    const PRO_VP_TOKEN_5 = 4197;
    const PRO_VP_TOKEN_6 = 4198;
    const OTT_VP_TOKEN_1 = 4199;
    const OTT_VP_TOKEN_2 = 4200;
    const OTT_VP_TOKEN_3 = 4201;
    const OTT_VP_TOKEN_4 = 4202;
    const OTT_VP_TOKEN_5 = 4203;
    const OTT_VP_TOKEN_6 = 4204;
    
    const ENGLAND_KEY_1 = 4111;
    const ENGLAND_KEY_2 = 4112;
    const ENGLAND_KEY_3 = 4113;
    const ENGLAND_KEY_4 = 4114;
    const ENGLAND_KEY_5 = 4115;
    const ENGLAND_KEY_6 = 4116;
    const ENGLAND_KEY_7 = 4117;
    const ENGLAND_KEY_8 = 4118;
    const ENGLAND_KEY_9 = 4119;
    const FRANCE_KEY_1 = 4120;
    const FRANCE_KEY_2 = 4121;
    const FRANCE_KEY_3 = 4122;
    const FRANCE_KEY_4 = 4123;
    const FRANCE_KEY_5 = 4124;
    const FRANCE_KEY_6 = 4125;
    const FRANCE_KEY_7 = 4126;
    const FRANCE_KEY_8 = 4127;
    const FRANCE_KEY_9 = 4128;
    const FRANCE_KEY_10 = 4129;
    const FRANCE_KEY_11 = 4130;
    const HAPSBURG_KEY_1 = 4131;
    const HAPSBURG_KEY_2 = 4132;
    const HAPSBURG_KEY_3 = 4133;
    const HAPSBURG_KEY_4 = 4134;
    const HAPSBURG_KEY_5 = 4135;
    const HAPSBURG_KEY_6 = 4136;
    const HAPSBURG_KEY_7 = 4137;
    const HAPSBURG_KEY_8 = 4138;
    const HAPSBURG_KEY_9 = 4139;
    const HAPSBURG_KEY_10 = 4140;
    const HAPSBURG_KEY_11 = 4141;
    const HAPSBURG_KEY_12 = 4142;
    const HAPSBURG_KEY_13 = 4143;
    const HAPSBURG_KEY_14 = 4144;
    const OTTOMAN_KEY_1 = 4145;
    const OTTOMAN_KEY_2 = 4146;
    const OTTOMAN_KEY_3 = 4147;
    const OTTOMAN_KEY_4 = 4148;
    const OTTOMAN_KEY_5 = 4149;
    const OTTOMAN_KEY_6 = 4150;
    const OTTOMAN_KEY_7 = 4151;
    const OTTOMAN_KEY_8 = 4152;
    const OTTOMAN_KEY_9 = 4153;
    const OTTOMAN_KEY_10 = 4154;
    const OTTOMAN_KEY_11 = 4155;
    const PAPACY_KEY_1 = 4156;
    const PAPACY_KEY_2 = 4157;
    const PAPACY_KEY_3 = 4158;
    const PAPACY_KEY_4 = 4159;
    const PAPACY_KEY_5 = 4160;
    const PAPACY_KEY_6 = 4161;
    const PAPACY_KEY_7 = 4162;
    const PRISION_ENGLAND = 4163;
    const PRISION_FRANCE = 4164;
    const PRISION_HAPSBURG = 4165;
    const PRISION_OTTOMAN = 4166;
    const PRISION_PAPACY = 4167;
    const PRISION_PROTESTANT = 4168;
}

abstract class LoanedTokens{
const LOANED_ENGLAND = 1080;
const LOANED_FRANCE = 1081;
const LOANED_HAPSBURG = 1082;
const LOANED_OTTOMAN = 1083;
const LOANED_PAPACY = 1084;
}

abstract class newWorldTokens{
    const ENGLISH_EXPLORATION = 1118;
const FRENCH_EXPLORATION = 1119;
const HAPSBURG_EXPLORATION = 1120;
const CABOT_ENG = 1121;
const CABOT_FRE = 1122;
const CABOT_HAP = 1123;
const CARTIER = 1124;
const CHANCELLOR = 1125;
const DE_VACA = 1126;
const DE_SOTO = 1127;
const LEON = 1128;
const MAGELLAN = 1129;
const NARVAEZ = 1130;
const ORELLANA = 1131;
const ROBERVAL = 1132;
const RUT = 1133;
const VERRAZANO = 1134;
const WILLOUGHBY = 1135;
const CHARLESBOURG = 1136;
const CUBA = 1137;
const HISPANIOLA = 1138;
const JAMESTOWN = 1139;
const MONTREAL = 1140;
const POTOSI = 1141;
const PUERTO_RICO = 1142;
const ROANOKE = 1143;
const HAPSBURG_CONQUEST = 1144;
const ENGLISH_CONQUEST = 1145;
const FRENCH_CONQUEST = 1146;
const CORDOVA = 1147;
const CORONADO = 1148;
const CORTEZ = 1149;
const MONTEJO = 1150;
const PIZARRO = 1151;

const NATIVE_UPRISING = 1203;
const RAIDER_ENGLISH = 1204;
const RAIDER_FRENCH = 1205;
const RAIDER_PROTESTANT = 1206;
const MERCATOR_MAP = 1207;
const SMALLPOX = 1208;
const COLONIAL_GOVERNOR = 1199;
const GALLEONS = 1200;
const PLANTATIONS = 1201;
}

abstract class newWorldLocations{
    const CONQUEST_ENG_1 = 4092;
    const CONQUEST_ENG_2 = 4093;
    const CONQUEST_FRA_1 = 4094;
    const CONQUEST_FRA_2 = 4095;
    const CONQUEST_HAP_1 = 4096;
    const CONQUEST_HAP_2 = 4097;
    const CONQUEST_HAP_3 = 4098;
    const COLONY_ENG_1 = 4079;
    const COLONY_ENG_2 = 4080;
    const COLONY_FRA_1 = 4081;
    const COLONY_FRA_2 = 4082;
    const COLONY_HAP_1 = 4083;
    const COLONY_HAP_2 = 4084;
    const COLONY_HAP_3 = 4085;

    const ST_LAWRENCE_RIVER = 4070;
    const GREAT_LAKES = 4071;
    const MISSISSIPI_RIVER = 4072;
    const AZTEC = 4073;
    const MAYA = 4074;
    const AMAZON_RIVER = 4075;
    const INCA = 4076;
    const PACIFIC_STRAIT = 4077;
    const CIRCUMNAVIGATION = 4078;
    
    const CROSSING_ATLANTIC_1 = 4099;
    const CROSSING_ATLANTIC_2 = 4100;
    const CROSSING_ATLANTIC_3 = 4101;
    const CROSSING_ATLANTIC_4 = 4102;
    const CROSSING_ATLANTIC_5 = 4103;
    const CROSSING_ATLANTIC_6 = 4104;
}


abstract class ELECTORATE_DISPLAY_Locations{
    const AUG = 4086;
    const TRI = 4087;
    const COL = 4088;
    const WIT = 4089;
    const MAI = 4090;
    const BRA = 4091;
}

//what is this even used for?
abstract class ExkomunikationLocations{
    const EXCOMMUNICATED_1 = 4262;
    const EXCOMMUNICATED_2 = 4263;
    const EXCOMMUNICATED_3 = 4264;
    const EXCOMMUNICATED_4 = 4265;
    const EXCOMMUNICATED_5 = 4266;
    const EXCOMMUNICATED_6 = 4267;
    const EXCOMMUNICATED_7 = 4268;
}

abstract class DiploTokens{
const ALLIED = 1071;
const AT_WAR = 1072;
}

abstract class DiploLocations{
    const OTT_HAP = 4009;
    const OTT_ENG = 4010;
    const OTT_FRA = 4011;
    const OTT_PAP = 4012;
    const OTT_PRO = 4013;
    const OTT_GEN = 4014;
    const OTT_HUN = 4015;// not enabled, and other not enabled spaces are missing completly
    const OTT_VEN = 4016;
    const OTT_SCO = -1;
    const HAP_ENG = 4017;
    const HAP_FRA = 4018;
    const HAP_PAP = 4019;
    const HAP_PRO = 4020;
    const HAP_GEN = 4021;
    const HAP_HUN = 4022;
    const HAP_SCO = 4023;
    const HAP_VEN = 4024;
    const ENG_FRA = 4025;
    const ENG_PAP = 4026;
    const ENG_PRO = 4027;
    const ENG_GEN = 4028;
    const ENG_SCO = 4029;
    const FRA_PAP = 4030;
    const FRA_PRO = 4031;
    const FRA_GEN = 4032;
    const FRA_SCO = 4033;
    const FRA_VEN = 4034;
    const PAP_PRO = 4035;
    const PAP_GEN = 4036;
    const PAP_VEN = 4037;
    const PRO_GEN = 4038;
    const PRO_VEN = 4039;
}

//Tokens on the Turn treck for events that affekt more than one impulse
abstract class EventReminders{
    const AUGSBURG_CONFESSION = 1197;
    const PRINTING_PRESS = 1198;
}


/*
 * tracks
 * def strTrack(strName, intMax):
 *  return f"const {strName}_TRACK = [" + ", ".join([str(i) + " => TrackLocations::" + strName+"_"+str(i) for i in range(0, intMax+1)]) + "];"
 */
const TURN_TRACK_TOKENS = [TrackTokens::TURN];
const TURN_TRACK = [1 => TrackLocations::TURN_TRACK_1, 2 => TrackLocations::TURN_TRACK_2, 3 => TrackLocations::TURN_TRACK_3, 4 => TrackLocations::TURN_TRACK_4, 5 => TrackLocations::TURN_TRACK_5, 
    6 => TrackLocations::TURN_TRACK_6, 7 => TrackLocations::TURN_TRACK_7, 8 => TrackLocations::TURN_TRACK_8, 9 => TrackLocations::TURN_TRACK_9];

const VICTORY_TRACK_TOKENS = [TrackTokens::VP_OTTOMAN, TrackTokens::VP_HAPSBURG, TrackTokens::VP_ENGLAND, TrackTokens::VP_FRANCE, TrackTokens::VP_PAPACY, TrackTokens::VP_PROTESTANT];
const VICTORY_TRACK = [
    0 => TrackLocations::VICTORY_TRACK_0, 1 => TrackLocations::VICTORY_TRACK_1, 2 => TrackLocations::VICTORY_TRACK_2, 3 => TrackLocations::VICTORY_TRACK_3, 4 => TrackLocations::VICTORY_TRACK_4, 
    5 => TrackLocations::VICTORY_TRACK_5, 6 => TrackLocations::VICTORY_TRACK_6, 7 => TrackLocations::VICTORY_TRACK_7, 8 => TrackLocations::VICTORY_TRACK_8, 9 => TrackLocations::VICTORY_TRACK_9, 
    10 => TrackLocations::VICTORY_TRACK_10, 11 => TrackLocations::VICTORY_TRACK_11, 12 => TrackLocations::VICTORY_TRACK_12, 13 => TrackLocations::VICTORY_TRACK_13, 14 => TrackLocations::VICTORY_TRACK_14, 
    15 => TrackLocations::VICTORY_TRACK_15, 16 => TrackLocations::VICTORY_TRACK_16, 17 => TrackLocations::VICTORY_TRACK_17, 18 => TrackLocations::VICTORY_TRACK_18, 19 => TrackLocations::VICTORY_TRACK_19, 
    20 => TrackLocations::VICTORY_TRACK_20, 21 => TrackLocations::VICTORY_TRACK_21, 22 => TrackLocations::VICTORY_TRACK_22, 23 => TrackLocations::VICTORY_TRACK_23, 24 => TrackLocations::VICTORY_TRACK_24, 
    25 => TrackLocations::VICTORY_TRACK_25, 26 => TrackLocations::VICTORY_TRACK_26, 27 => TrackLocations::VICTORY_TRACK_27, 28 => TrackLocations::VICTORY_TRACK_28, 29 => TrackLocations::VICTORY_TRACK_29];

const PIRACY_TRACK_TOKENS = [TrackTokens::PIRACY_VP];
const PIRACY_TRACK = [
    0 => TrackLocations::PIRACY_0, 1 => TrackLocations::PIRACY_1, 2 => TrackLocations::PIRACY_2, 3 => TrackLocations::PIRACY_3, 4 => TrackLocations::PIRACY_4, 
    5 => TrackLocations::PIRACY_5, 6 => TrackLocations::PIRACY_6, 7 => TrackLocations::PIRACY_7, 8 => TrackLocations::PIRACY_8, 9 => TrackLocations::PIRACY_9, 
    10 => TrackLocations::PIRACY_10];

const CHATEAUX_TRACK_TOKENS = [TrackTokens::CHATEAUX_VP];
const CHATEAUX_TRACK = [
    0 => TrackLocations::CHATEAUX_0, 1 => TrackLocations::CHATEAUX_1, 2 => TrackLocations::CHATEAUX_2, 3 => TrackLocations::CHATEAUX_3, 4 => TrackLocations::CHATEAUX_4, 
    5 => TrackLocations::CHATEAUX_5, 6 => TrackLocations::CHATEAUX_6];

const MARTIAL_STATUS_TRACK_TOKENS = [TrackTokens::HENRY_MARITAL_STATUS];
const MARITAL_STATUS_TRACK = [
    1 => TrackLocations::MARITAL_STATUS_1, 2 => TrackLocations::MARITAL_STATUS_2, 3 => TrackLocations::MARITAL_STATUS_3, 4 => TrackLocations::MARITAL_STATUS_4, 
    5 => TrackLocations::MARITAL_STATUS_5, 6 => TrackLocations::MARITAL_STATUS_6, 7 => TrackLocations::MARITAL_STATUS_7];

const PROTESTANT_SPACES_TRACK_TOKENS = [TrackTokens::ENGLISH_PROT_COUNTER, TrackTokens::PROTESTANT_SPACES];
const PROTESTANT_SPACES_TRACK = [
    0 => TrackLocations::PROTESTANT_SPACES_0, 1 => TrackLocations::PROTESTANT_SPACES_1, 2 => TrackLocations::PROTESTANT_SPACES_2, 3 => TrackLocations::PROTESTANT_SPACES_3, 4 => TrackLocations::PROTESTANT_SPACES_4, 
    5 => TrackLocations::PROTESTANT_SPACES_5, 6 => TrackLocations::PROTESTANT_SPACES_6, 7 => TrackLocations::PROTESTANT_SPACES_7, 8 => TrackLocations::PROTESTANT_SPACES_8, 9 => TrackLocations::PROTESTANT_SPACES_9, 
    10 => TrackLocations::PROTESTANT_SPACES_10, 11 => TrackLocations::PROTESTANT_SPACES_11, 12 => TrackLocations::PROTESTANT_SPACES_12, 13 => TrackLocations::PROTESTANT_SPACES_13, 14 => TrackLocations::PROTESTANT_SPACES_14, 
    15 => TrackLocations::PROTESTANT_SPACES_15, 16 => TrackLocations::PROTESTANT_SPACES_16, 17 => TrackLocations::PROTESTANT_SPACES_17, 18 => TrackLocations::PROTESTANT_SPACES_18, 19 => TrackLocations::PROTESTANT_SPACES_19, 
    20 => TrackLocations::PROTESTANT_SPACES_20, 21 => TrackLocations::PROTESTANT_SPACES_21, 22 => TrackLocations::PROTESTANT_SPACES_22, 23 => TrackLocations::PROTESTANT_SPACES_23, 24 => TrackLocations::PROTESTANT_SPACES_24, 
    25 => TrackLocations::PROTESTANT_SPACES_25, 26 => TrackLocations::PROTESTANT_SPACES_26, 27 => TrackLocations::PROTESTANT_SPACES_27, 28 => TrackLocations::PROTESTANT_SPACES_28, 29 => TrackLocations::PROTESTANT_SPACES_29, 
    30 => TrackLocations::PROTESTANT_SPACES_30, 31 => TrackLocations::PROTESTANT_SPACES_31, 32 => TrackLocations::PROTESTANT_SPACES_32, 33 => TrackLocations::PROTESTANT_SPACES_33, 34 => TrackLocations::PROTESTANT_SPACES_34, 
    35 => TrackLocations::PROTESTANT_SPACES_35, 36 => TrackLocations::PROTESTANT_SPACES_36, 37 => TrackLocations::PROTESTANT_SPACES_37, 38 => TrackLocations::PROTESTANT_SPACES_38, 39 => TrackLocations::PROTESTANT_SPACES_39, 
    40 => TrackLocations::PROTESTANT_SPACES_40, 41 => TrackLocations::PROTESTANT_SPACES_41, 42 => TrackLocations::PROTESTANT_SPACES_42, 43 => TrackLocations::PROTESTANT_SPACES_43, 44 => TrackLocations::PROTESTANT_SPACES_44, 
    45 => TrackLocations::PROTESTANT_SPACES_45, 46 => TrackLocations::PROTESTANT_SPACES_46, 47 => TrackLocations::PROTESTANT_SPACES_47, 48 => TrackLocations::PROTESTANT_SPACES_48, 49 => TrackLocations::PROTESTANT_SPACES_49, 
    50 => TrackLocations::PROTESTANT_SPACES_50];

const SAINT_PETERS_CP_TRACK_TOKENS = [TrackTokens::ST_PETERS_CP];
const SAINT_PETERS_CP_TRACK = [
    0 => TrackLocations::SAINT_PETERS_CP_0, 1 => TrackLocations::SAINT_PETERS_CP_1, 2 => TrackLocations::SAINT_PETERS_CP_2, 3 => TrackLocations::SAINT_PETERS_CP_3, 4 => TrackLocations::SAINT_PETERS_CP_4, 
    5 => TrackLocations::SAINT_PETERS_CP_5];

const SAINT_PETERS_VP_TRACK_TOKENS = [TrackTokens::ST_PETERS_VP];
const SAINT_PETERS_VP_TRACK = [
    0 => TrackLocations::SAINT_PETERS_VP_0, 1 => TrackLocations::SAINT_PETERS_VP_1, 2 => TrackLocations::SAINT_PETERS_VP_2, 3 => TrackLocations::SAINT_PETERS_VP_3, 4 => TrackLocations::SAINT_PETERS_VP_4, 
    5 => TrackLocations::SAINT_PETERS_VP_5];

const NT_TRANSLATION_TRACK_TOKENS = [TrackTokens::NEW_TESTAMENT_ENGLISH, TrackTokens::NEW_TESTAMENT_FRENCH, TrackTokens::NEW_TESTAMENT_GERMAN];
const NT_TRANSLATION_TRACK = [
    0 => TrackLocations::NT_TRANSLATION_0, 1 => TrackLocations::NT_TRANSLATION_1, 2 => TrackLocations::NT_TRANSLATION_2, 3 => TrackLocations::NT_TRANSLATION_3, 4 => TrackLocations::NT_TRANSLATION_4, 
    5 => TrackLocations::NT_TRANSLATION_5, 6 => TrackLocations::NT_TRANSLATION_6];

const BIBLE_TRANSLATION_TRACK_TOKENS = [TrackTokens::BIBLE_ENGLISH, TrackTokens::BIBLE_FRENCH, TrackTokens::BIBLE_GERMAN];
const BIBLE_TRANSLATION_TRACK = [
    0 => TrackLocations::BIBLE_TRANSLATION_0, 1 => TrackLocations::BIBLE_TRANSLATION_1, 2 => TrackLocations::BIBLE_TRANSLATION_2, 3 => TrackLocations::BIBLE_TRANSLATION_3, 4 => TrackLocations::BIBLE_TRANSLATION_4, 
    5 => TrackLocations::BIBLE_TRANSLATION_5, 6 => TrackLocations::BIBLE_TRANSLATION_6, 7 => TrackLocations::BIBLE_TRANSLATION_7, 8 => TrackLocations::BIBLE_TRANSLATION_8, 9 => TrackLocations::BIBLE_TRANSLATION_9, 
    10 => TrackLocations::BIBLE_TRANSLATION_10];

const DiploLocationsArray = [
    Powers::OTTOMAN    => [Powers::HAPSBURG => DiploLocations::OTT_HAP, Powers::ENGLAND => DiploLocations::OTT_ENG, Powers::FRANCE => DiploLocations::OTT_FRA, Powers::PAPACY => DiploLocations::OTT_PAP, Powers::PROTESTANT => DiploLocations::OTT_PRO, Powers::MINOR_GENOA => DiploLocations::OTT_GEN, Powers::MINOR_HUNGARY => DiploLocations::OTT_HUN, Powers::MINOR_SCOTLAND => DiploLocations::OTT_SCO, Powers::MINOR_VENICE => DiploLocations::OTT_VEN], 
    Powers::HAPSBURG   => [Powers::OTTOMAN => DiploLocations::OTT_HAP, Powers::ENGLAND => DiploLocations::HAP_ENG, Powers::FRANCE => DiploLocations::HAP_FRA, Powers::PAPACY => DiploLocations::HAP_PAP, Powers::PROTESTANT => DiploLocations::HAP_PRO, Powers::MINOR_GENOA => DiploLocations::HAP_GEN, Powers::MINOR_HUNGARY => DiploLocations::HAP_HUN, Powers::MINOR_SCOTLAND => DiploLocations::HAP_SCO, Powers::MINOR_VENICE => DiploLocations::HAP_VEN], 
    Powers::ENGLAND    => [Powers::OTTOMAN => DiploLocations::OTT_ENG, Powers::HAPSBURG => DiploLocations::HAP_ENG, Powers::FRANCE => DiploLocations::ENG_FRA, Powers::PAPACY => DiploLocations::ENG_PAP, Powers::PROTESTANT => DiploLocations::ENG_PRO, Powers::MINOR_GENOA => DiploLocations::ENG_GEN, Powers::MINOR_SCOTLAND => DiploLocations::ENG_SCO], 
    Powers::FRANCE     => [Powers::OTTOMAN => DiploLocations::OTT_FRA, Powers::HAPSBURG => DiploLocations::HAP_FRA, Powers::ENGLAND => DiploLocations::ENG_FRA, Powers::PAPACY => DiploLocations::FRA_PAP, Powers::PROTESTANT => DiploLocations::FRA_PRO, Powers::MINOR_GENOA => DiploLocations::FRA_GEN, Powers::MINOR_SCOTLAND => DiploLocations::FRA_SCO, Powers::MINOR_VENICE => DiploLocations::FRA_VEN], 
    Powers::PAPACY     => [Powers::OTTOMAN => DiploLocations::OTT_PAP, Powers::HAPSBURG => DiploLocations::HAP_PAP, Powers::ENGLAND => DiploLocations::ENG_PAP, Powers::FRANCE => DiploLocations::FRA_PAP, Powers::PROTESTANT => DiploLocations::PAP_PRO, Powers::MINOR_GENOA => DiploLocations::PAP_GEN, Powers::MINOR_VENICE => DiploLocations::PAP_VEN], 
    Powers::PROTESTANT => [Powers::OTTOMAN => DiploLocations::OTT_PRO, Powers::HAPSBURG => DiploLocations::HAP_PRO, Powers::ENGLAND => DiploLocations::ENG_PAP, Powers::FRANCE => DiploLocations::FRA_PRO, Powers::PAPACY => DiploLocations::PAP_PRO, Powers::MINOR_GENOA => DiploLocations::PRO_GEN, Powers::MINOR_VENICE => DiploLocations::PRO_VEN]
];
/*
 * Game options
 */

/*
 * Stats
 */
