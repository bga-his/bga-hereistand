<?php

//require_once 'generated_constants.inc.php';

enum GameStates : int{
    case ST_GAME_SETUP = 1;
    case ST_PICK_CARD = 2;
    case ST_IMPULSE_ACTIONS = 3;
    case ST_DECLARE_FORMATION = 4;
    case ST_DECLARE_DESTINATION = 5;
    case ST_FIND_MOVEMENT_RESPONSES = 6;
    case ST_FIND_INTERCEPTIONS = 7;
    case ST_INTERCEPT_INTENT = 8;
    case ST_ROLL_INTERCEPTION = 9;
    case ST_MOVE_FORMATION = 10;
    case ST_FIND_AVOID = 11;
    case ST_AVOID_INTENT = 12;
    case ST_DECLARE_AVOID_DESTINATION = 13;
    case ST_ROLL_AVOID = 14;
    case ST_FIND_WITHDRAW = 15;
    case ST_WITHDRAW_INTENT = 16;
    case ST_FIND_BATTLE = 17;
    case ST_FIELD_BATTLE = 18;
    case ST_FIND_FIELD_BATTLE_RESPONSES = 19;
    case ST_FIELD_BATTLE_DICE = 20;
    case ST_FIELD_BATTLE_CARD = 21;
    case ST_PLAY_FIELD_BATTLE_CARD = 22;
    case ST_ROLL_FIELD_BATTLE_DICE = 23;
    case ST_PLAY_JANISSARIES = 24;
    case ST_DECLARE_FIELD_BATTLE_WINNER = 25;
    case ST_FIELD_BATTLE_CASUALTIES = 26;
    case ST_TAKE_FIELD_BATTLE_CASUALTIES = 27;
    case ST_FIELD_BATTLE_CAPTURE_LEADERS = 28;
    case ST_FIELD_BATTLE_RETREATS = 29;
    case ST_DECLARE_RETREAT_DESTINATION = 30;
    case ST_FIND_SIEGE = 31;
    case ST_CONCLUDE_FIELD_BATTLE = 32;
    case ST_MOVEMENT_RESPONSE = 33;
    case ST_FIELD_BATTLE_RESPONSE = 34;
    case ST_NEXT_PLAYER = 35;
    case ST_BUY_UNIT = 36;
    case ST_CP_REFORMATION_ATTEMPS = 37;
    case ST_DISCARD = 38;
    case ST_END_GAME = 99;
    case ST_EVT_Janissaries = 101;
    case ST_EVT_HOLYROMAN = 102;
    case ST_EVT_SIXWIVESOFHENRY = 103;
    case ST_EVT_SixWIVES_FRANCE_INTERVENTION = 104;
    case ST_EVT_PATRONOFARTS = 105;
    case ST_EVT_PAPAL_BULL = 106;
}


/*
 * Powers constants
 */
enum Powers : string{
    case FRANCE = 'france';
    case HAPSBURG = 'hapsburg';
    case OTTOMAN = 'ottoman';
    case ENGLAND = 'england';
    case PAPACY = 'papacy';
    case PROTESTANT = 'protestant';
    case MINOR_VENICE = 'venice';
    case MINOR_SCOTLAND = 'scotland';
    case MINOR_HUNGARY = 'hungary';
    case MINOR_GENOA = 'genoa';
    case INDEPENDENT = 'independent';
    case OTHER = 'other';
}

/*
 * Language constants
 */
enum LanguageZones : int{
    case SPANISH = 0;
    case ENGLISH = 1;
    case FRENCH = 2;
    case GERMAN = 3;
    case ITALIAN = 4;
}
/*
 * Token state constants
 */
enum TokenSides : int{
    case FRONT = 0; // regular unit, uncommited debator, ...
    case BACK = 1;
 }

//what is this used for?
enum TokenTypes : int{
    case FORTRESS = 1212;
    case PIRATE_HAVEN = 1213;
    case JESUIT_UNIVERSITY = 1214;
    case CONTROL = 2000;
    case KEYS = 2001;
    case CATHOLIC = 2002;
    case REFORMED = 2003;
    case HEX = 2004;
    case MILITARY = 2005;
    case UNITS = 2006;
    case MERCENARY = 2007;
    case CAVALRY = 2008;
    case LEADER = 2009;
    case NAVAL = 2010;
    case DIPLOMACY = 2011;
    case UNREST_MARKER = 2012;
    case VP_MARKER = 2013;
    case LOANED = 2014;
    case REFORMER = 2015;
    case DEBATER = 2016;
    case COMMITTED = 2017;
    case EXPLORATION = 2018;
    case CHARTED = 2019;
    case EXPLORER = 2020;
    case UNKNOWN = 2021;
    case COLONY = 2022;
    case CONQUEST = 2023;
    case CONQUISTADOR = 2024;
    case RELIGIOUS = 2025;
    case COUNTER = 2026;
    case TURN_MARKER = 2027;
    case CARDS_MARKER = 2028;
    case WIFE = 2029;
    case BENEFIT = 2030;
    case WIVES = 2031;
    case STATUS = 2032;
    case TRANSLATION = 2033;
    case SAINT_PETERS = 2034;
    case EVENT_REMINDER = 2035;
    case EXCOMMUNION = 2036;
    case FORTRESS_MARKER = 2037;
    case PIRATEHAVEN = 2038;
    case UNIVERSITY = 2039;
}

/*
 * Token Type constants
 */
enum UnitTypes : int{
    case REGULAR = 0;
    case MERC = 1;
    case SHIP = 2;
    case CAV = 3;
}

enum UnitShips : int{
    const ENGLISH_SQUADRON = 1060;
const FRENCH_SQUADRON = 1061;
const GENOESE_SQAUADRON = 1062;
const HAPSBURG_SQUADRON = 1063;
const OTTOMAN_SQUADRON = 1064;
const PAPACY_SQUADRON = 1065;
const SCOTTISH_SQUADRON = 1066;
const VENETIAN_SQUADRON = 1067;
}

enum MilitaryLeadersToken : int{
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

enum LandUnitTokens : int{
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
enum CardTypes : int{
    case HOME_CARD = 0;
    case MANDATORY_CARD = 1;
    case COMBAT_CARD = 2;
    case RESPONSE_CARD = 3;
    case EVENT_CARD = 4;
    case DIPLOMACY_CARD = 5;
}

enum CardIds : int{
    case JANISSARIES = 5000;
    case HOLY_ROMAN_EMPEROR = 5001;
    case SIX_WIVES_OF_HENRY_VIII = 5002;
    case PATRON_OF_THE_ARTS = 5003;
    case PAPAL_BULL = 5004;
    case LEIPZIG_DEBATE = 5005;
    case HERE_I_STAND = 5006;
    case LUTHER_95_THESES = 5007;
    case BARBARY_PIRATES = 5008;
    case CLEMENT_VII = 5009;
    case DEFENDER_OF_THE_FAITH = 5010;
    case MASTER_OF_ITALY = 5011;
    case SCHMALKALDIC_LEAGUE = 5012;
    case PAUL_III = 5013;
    case SOCIETY_OF_JESUS = 5014;
    case CALVIN = 5015;
    case COUNCIL_OF_TRENT = 5016;
    case DRAGUT = 5017;
    case EDWARD_VI = 5018;
    case HENRY_II = 5019;
    case MARY_I = 5020;
    case JULIUS_III = 5021;
    case ELIZABETH_I = 5022;
    case ARQUEBUSIERS = 5023;
    case FIELD_ARTILLERY = 5024;
    case MERCENARIES_BRIBED = 5025;
    case MERCENARIES_GROW_RESTLESS = 5026;
    case SIEGE_MINING = 5027;
    case SURPRISE_ATTACK = 5028;
    case TERCIOS = 5029;
    case FOUL_WEATHER = 5030;
    case GOUT = 5031;
    case LANDSKNECHTS = 5032;
    case PROFESSIONAL_ROWERS = 5033;
    case SIEGE_ARTILLERY = 5034;
    case SWISS_MERCENARIES = 5035;
    case THE_WARTBURG = 5036;
    case HALLEY_COMET = 5037;
    case AUGSBURG_CONFESSION = 5038;
    case MACHIAVELLI_THE_PRINCE = 5039;
    case MARBURG_COLLOQUY = 5040;
    case ROXELANA = 5041;
    case ZWINGLI_DONS_ARMOR = 5042;
    case AFFAIR_OF_THE_PLACARDS = 5043;
    case CALVIN_EXPELLED = 5044;
    case CALVIN_INSTITUTES = 5045;
    case COPERNICUS = 5046;
    case GALLEONS = 5047;
    case HUGUENOT_RAIDERS = 5048;
    case MERCATORMAP = 5049;
    case MICHAEL_SERVETUS = 5050;
    case MICHELANGELO = 5051;
    case PLANTATIONS = 5052;
    case POTOSI_SILVER_MINES = 5053;
    case JESUIT_EDUCATION = 5054;
    case PAPAL_INQUISITION = 5055;
    case PHILIP_OF_HESSE_BIGAMY = 5056;
    case SPANISH_INQUISITION = 5057;
    case LADY_JANE_GREY = 5058;
    case MAURICE_OF_SAXONY = 5059;
    case MARY_DEFIES_COUNCIL = 5060;
    case BOOK_OF_COMMON_PRAYER = 5061;
    case DISSOLUTION_OF_THE_MONASTERIES = 5062;
    case PILGRIMAGE_OF_GRACE = 5063;
    case A_MIGHTY_FORTRESS = 5064;
    case AKINJI_RAIDERS = 5065;
    case ANABAPTISTS = 5066;
    case ANDREA_DORIA = 5067;
    case AULD_ALLIANCE = 5068;
    case CHARLES_BOURBON = 5069;
    case CITY_STATE_REBELS = 5070;
    case CLOTH_PRICES_FLUCTUATE = 5071;
    case DIPLOMATIC_MARRIAGE = 5072;
    case DIPLOMATIC_OVERTURE = 5073;
    case ERASMUS = 5074;
    case FOREIGN_RECRUITS = 5075;
    case FOUNTAIN_OF_YOUTH = 5076;
    case FREDERICK_THE_WISE = 5077;
    case FUGGERS = 5078;
    case GABELLE_REVOLT = 5079;
    case INDULGENCE_VENDOR = 5080;
    case JANISSARIES_REBEL = 5081;
    case JOHN_ZAPOLYA = 5082;
    case JULIA_GONZAGA = 5083;
    case KATHERINA_BORA = 5084;
    case KNIGHTS_OF_ST_JOHN = 5085;
    case MERCENARIES_DEMAND_PAY = 5086;
    case PEASANTS_WAR = 5087;
    case PIRATE_HAVEN = 5088;
    case PRINTING_PRESS = 5089;
    case RANSOM = 5090;
    case REVOLT_IN_EGYPT = 5091;
    case REVOLT_IN_IRELAND = 5092;
    case REVOLT_OF_THE_COMMUNEROS = 5093;
    case SACK_OF_ROME = 5094;
    case SALE_OF_MOLUCCAS = 5095;
    case SCOTS_RAID = 5096;
    case SEARCH_FOR_CIBOLA = 5097;
    case SEBASTIAN_CABOT = 5098;
    case SHIPBUILDING = 5099;
    case SMALLPOX = 5100;
    case SPRING_PREPARATIONS = 5101;
    case THREAT_TO_POWER = 5102;
    case TRACE_ITALIENNE = 5103;
    case TREACHERY = 5104;
    case UNPAID_MERCENARIES = 5105;
    case UNSANITARY_CAMP = 5106;
    case VENETIAN_ALLIANCE = 5107;
    case VENETIAN_INFORMANT = 5108;
    case WAR_IN_PERSIA = 5109;
    case COLONIAL_GOVERNOR_NATIVE_UPRISING = 5110;
    case THOMAS_MORE = 5111;
    case IMPERIAL_CORONATION = 5112;
    case LA_FORET_EMBASSY_IN_ISTANBUL = 5113;
    case THOMAS_CROMWELL = 5114;
    case ROUGH_WOOING = 5115;
}

enum DiploCards : int{
    case ANDREA_DORIA = 5116;
    case FRENCH_CONSTABLE_INVADES = 5117;
    case CORSAIR_RAID = 5118;
    case DIPLOMATIC_MARRIAGE = 5119;
    case DIPLOMATIC_PRESSURE = 5120;
    case DIPLOMATIC_FRENCH_INVASION = 5121;
    case HENRY_PETITIONS_FOR_DIVORCE = 5122;
    case KNIGHTS_OF_ST_JOHN = 5123;
    case PLAGUE = 5124;
    case SHIPBUILDING = 5125;
    case SPANISH_INVASION = 5126;
    case VENETIAN_ALLIANCE = 5127;
    case AUSTRIAN_INVASION = 5128;
    case IMPERIAL_INVASION = 5129;
    case MACHIAVELLI = 5130;
    case OTTOMAN_INVASION = 5131;
    case SECRET_PROTESTANT_CIRCLE = 5132;
    case SIEGE_OF_VIENNA = 5133;
    case SPANISH_INQUISITION = 5134;
}

enum SpaceControllTokens : int{
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

enum CityIds : int{
    case WITTENBERG = 3000;
    case BRANDENBURG = 3001;
    case MAINZ = 3002;
    case COLOGNE = 3003;
    case TRIER = 3004;
    case AUGSBURG = 3005;
    case STETTIN = 3006;
    case LUBECK = 3007;
    case MAGDEBURG = 3008;
    case HAMBURG = 3009;
    case BRUNSWICK = 3010;
    case BREMEN = 3011;
    case MUNSTER = 3012;
    case KASSEL = 3013;
    case ERFURT = 3014;
    case LEIPZIG = 3015;
    case NUREMBERG = 3016;
    case WORMS = 3017;
    case REGENSBURG = 3018;
    case STRASBURG = 3019;
    case SALZBURG = 3020;
    case VIENNA = 3021;
    case LINZ = 3022;
    case GRAZ = 3023;
    case INNSBRUCK = 3024;
    case ZURICH = 3025;
    case BASEL = 3026;
    case LONDON = 3027;
    case BRISTOL = 3028;
    case YORK = 3029;
    case NORWICH = 3030;
    case PORTSMOUTH = 3031;
    case PLYMOUTH = 3032;
    case LINCOLN = 3033;
    case WALES = 3034;
    case SHREWSBURY = 3035;
    case CARLISLE = 3036;
    case BERWICK = 3037;
    case EDINBURGH = 3038;
    case STIRLING = 3039;
    case GLASGOW = 3040;
    case PARIS = 3041;
    case LYON = 3042;
    case ROUEN = 3043;
    case MARSEILLE = 3044;
    case BORDEAUX = 3045;
    case GRENOBLE = 3046;
    case DIJON = 3047;
    case ST_DIZIER = 3048;
    case ST_QUENTIN = 3049;
    case BOULOGNE = 3050;
    case ORLEANS = 3051;
    case AVIGNON = 3052;
    case TOULOUSE = 3053;
    case LIMOGES = 3054;
    case TOURS = 3055;
    case NANTES = 3056;
    case BREST = 3057;
    case BRUSSELS = 3058;
    case BESANCON = 3059;
    case CALAIS = 3060;
    case METZ = 3061;
    case LIEGE = 3062;
    case GENEVA = 3063;
    case NICE = 3064;
    case ROME = 3065;
    case RAVENNA = 3066;
    case ANCONA = 3067;
    case NAPLES = 3068;
    case TRIESTE = 3069;
    case CERIGNOLA = 3070;
    case TARANTO = 3071;
    case MESSINA = 3072;
    case PALERMO = 3073;
    case GENOA = 3074;
    case VENICE = 3075;
    case MILAN = 3076;
    case FLORENCE = 3077;
    case TURIN = 3078;
    case TRENT = 3079;
    case MODENA = 3080;
    case PAVIA = 3081;
    case SIENA = 3082;
    case VALLADOLID = 3083;
    case NAVARRE = 3084;
    case BARCELONA = 3085;
    case SEVILLE = 3086;
    case GIBRALTAR = 3087;
    case CORUNNA = 3088;
    case BILBAO = 3089;
    case ZARAGOZA = 3090;
    case MADRID = 3091;
    case VALENCIA = 3092;
    case PALMA = 3093;
    case CORDOBA = 3094;
    case GRANADA = 3095;
    case CARTAGENA = 3096;
    case ISTANBUL = 3097;
    case EDIRNE = 3098;
    case SALONIKA = 3099;
    case ATHENS = 3100;
    case SCUTARI = 3101;
    case VARNA = 3102;
    case BUCHAREST = 3103;
    case NICOPOLIS = 3104;
    case SOFIA = 3105;
    case LARISSA = 3106;
    case LEPANTO = 3107;
    case CORON = 3108;
    case NEZH = 3109;
    case DURAZZO = 3110;
    case ALGIERS = 3111;
    case ORAN = 3112;
    case TRIPOLI = 3113;
    case BELGRADE = 3114;
    case BUDA = 3115;
    case PRAGUE = 3116;
    case SZEGEDIN = 3117;
    case PRESSBURG = 3118;
    case MOHACS = 3119;
    case AGRAM = 3120;
    case BRUNN = 3121;
    case BRESLAU = 3122;
    case ANTWERP = 3123;
    case MALTA = 3124;
    case CAGLIARI = 3125;
    case AMSTERDAM = 3126;
    case CANDIA = 3127;
    case CORFU = 3128;
    case ZARA = 3129;
    case BASTIA = 3130;
    case TUNIS = 3131;
    case RHODES = 3132;
    case RAGUSA = 3133;
}

// Protestant and papal debators
//debators: are on the religius strugle display and make debates.
//reformes: are on citiys and help with publish treatise.
enum Debators : int{
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

enum DebatorLocations : int{
    case CURRENT_DEBATER_PAP = 4326;
    case CURRENT_DEBATER_PRO = 4327;
    case POPE_1 = 4328;
    case POPE_2 = 4329;
    case POPE_3 = 4330;
    case POPE_4 = 4331;
    case POPE_5 = 4332;
    case POPE_6 = 4333;
    case POPE_7 = 4334;
    case POPE_8 = 4335;
    case POPE_9 = 4336;
    case POPE_10 = 4337;
    case POPE_11 = 4338;
    case POPE_12 = 4339;
    case GER_1 = 4340;
    case GER_2 = 4341;
    case GER_3 = 4342;
    case GER_4 = 4343;
    case GER_5 = 4344;
    case GER_6 = 4345;
    case GER_7 = 4346;
    case ENG_1 = 4347;
    case ENG_2 = 4348;
    case ENG_3 = 4349;
    case ENG_4 = 4350;
    case ENG_5 = 4351;
    case ENG_6 = 4352;
    case FRE_1 = 4353;
    case FRE_2 = 4354;
    case FRE_3 = 4355;
    case FRE_4 = 4356;
}

enum UnitTokens : int{

}

enum ControllMarkerTokens : int{

}

//TODO split this into reasonable named subsections
enum OtherTokens : int{
    const UNREST = 1073;
}

enum TrackTokens : int{

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
enum TrackLocations : int{
    case TURN_TRACK_1 = 4000;
    case TURN_TRACK_2 = 4001;
    case TURN_TRACK_3 = 4002;
    case TURN_TRACK_4 = 4003;
    case TURN_TRACK_5 = 4004;
    case TURN_TRACK_6 = 4005;
    case TURN_TRACK_7 = 4006;
    case TURN_TRACK_8 = 4007;
    case TURN_TRACK_9 = 4008;

    case NT_TRANSLATION_0 = 4205;
    case NT_TRANSLATION_1 = 4206;
    case NT_TRANSLATION_2 = 4207;
    case NT_TRANSLATION_3 = 4208;
    case NT_TRANSLATION_4 = 4209;
    case NT_TRANSLATION_5 = 4210;
    case NT_TRANSLATION_6 = 4211;
    case BIBLE_TRANSLATION_0 = 4212;
    case BIBLE_TRANSLATION_1 = 4213;
    case BIBLE_TRANSLATION_2 = 4214;
    case BIBLE_TRANSLATION_3 = 4215;
    case BIBLE_TRANSLATION_4 = 4216;
    case BIBLE_TRANSLATION_5 = 4217;
    case BIBLE_TRANSLATION_6 = 4218;
    case BIBLE_TRANSLATION_7 = 4219;
    case BIBLE_TRANSLATION_8 = 4220;
    case BIBLE_TRANSLATION_9 = 4221;
    case BIBLE_TRANSLATION_10 = 4222;
    case CHATEAUX_0 = 4223;
    case CHATEAUX_1 = 4224;
    case CHATEAUX_2 = 4225;
    case CHATEAUX_3 = 4226;
    case CHATEAUX_4 = 4227;
    case CHATEAUX_5 = 4228;
    case CHATEAUX_6 = 4229;
    case PREGNANCY_CHART_1 = 4105;
    case PREGNANCY_CHART_2 = 4106;
    case PREGNANCY_CHART_3 = 4107;
    case PREGNANCY_CHART_4 = 4108;
    case PREGNANCY_CHART_5 = 4109;
    case PREGNANCY_CHART_6 = 4110;
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

    case VICTORY_TRACK_0 = 4040;
    case VICTORY_TRACK_1 = 4041;
    case VICTORY_TRACK_2 = 4042;
    case VICTORY_TRACK_3 = 4043;
    case VICTORY_TRACK_4 = 4044;
    case VICTORY_TRACK_5 = 4045;
    case VICTORY_TRACK_6 = 4046;
    case VICTORY_TRACK_7 = 4047;
    case VICTORY_TRACK_8 = 4048;
    case VICTORY_TRACK_9 = 4049;
    case VICTORY_TRACK_10 = 4050;
    case VICTORY_TRACK_11 = 4051;
    case VICTORY_TRACK_12 = 4052;
    case VICTORY_TRACK_13 = 4053;
    case VICTORY_TRACK_14 = 4054;
    case VICTORY_TRACK_15 = 4055;
    case VICTORY_TRACK_16 = 4056;
    case VICTORY_TRACK_17 = 4057;
    case VICTORY_TRACK_18 = 4058;
    case VICTORY_TRACK_19 = 4059;
    case VICTORY_TRACK_20 = 4060;
    case VICTORY_TRACK_21 = 4061;
    case VICTORY_TRACK_22 = 4062;
    case VICTORY_TRACK_23 = 4063;
    case VICTORY_TRACK_24 = 4064;
    case VICTORY_TRACK_25 = 4065;
    case VICTORY_TRACK_26 = 4066;
    case VICTORY_TRACK_27 = 4067;
    case VICTORY_TRACK_28 = 4068;
    case VICTORY_TRACK_29 = 4069;

    case PROTESTANT_SPACES_0 = 4275;
    case PROTESTANT_SPACES_1 = 4276;
    case PROTESTANT_SPACES_2 = 4277;
    case PROTESTANT_SPACES_3 = 4278;
    case PROTESTANT_SPACES_4 = 4279;
    case PROTESTANT_SPACES_5 = 4280;
    case PROTESTANT_SPACES_6 = 4281;
    case PROTESTANT_SPACES_7 = 4282;
    case PROTESTANT_SPACES_8 = 4283;
    case PROTESTANT_SPACES_9 = 4284;
    case PROTESTANT_SPACES_10 = 4285;
    case PROTESTANT_SPACES_11 = 4286;
    case PROTESTANT_SPACES_12 = 4287;
    case PROTESTANT_SPACES_13 = 4288;
    case PROTESTANT_SPACES_14 = 4289;
    case PROTESTANT_SPACES_15 = 4290;
    case PROTESTANT_SPACES_16 = 4291;
    case PROTESTANT_SPACES_17 = 4292;
    case PROTESTANT_SPACES_18 = 4293;
    case PROTESTANT_SPACES_19 = 4294;
    case PROTESTANT_SPACES_20 = 4295;
    case PROTESTANT_SPACES_21 = 4296;
    case PROTESTANT_SPACES_22 = 4297;
    case PROTESTANT_SPACES_23 = 4298;
    case PROTESTANT_SPACES_24 = 4299;
    case PROTESTANT_SPACES_25 = 4300;
    case PROTESTANT_SPACES_26 = 4301;
    case PROTESTANT_SPACES_27 = 4302;
    case PROTESTANT_SPACES_28 = 4303;
    case PROTESTANT_SPACES_29 = 4304;
    case PROTESTANT_SPACES_30 = 4305;
    case PROTESTANT_SPACES_31 = 4306;
    case PROTESTANT_SPACES_32 = 4307;
    case PROTESTANT_SPACES_33 = 4308;
    case PROTESTANT_SPACES_34 = 4309;
    case PROTESTANT_SPACES_35 = 4310;
    case PROTESTANT_SPACES_36 = 4311;
    case PROTESTANT_SPACES_37 = 4312;
    case PROTESTANT_SPACES_38 = 4313;
    case PROTESTANT_SPACES_39 = 4314;
    case PROTESTANT_SPACES_40 = 4315;
    case PROTESTANT_SPACES_41 = 4316;
    case PROTESTANT_SPACES_42 = 4317;
    case PROTESTANT_SPACES_43 = 4318;
    case PROTESTANT_SPACES_44 = 4319;
    case PROTESTANT_SPACES_45 = 4320;
    case PROTESTANT_SPACES_46 = 4321;
    case PROTESTANT_SPACES_47 = 4322;
    case PROTESTANT_SPACES_48 = 4323;
    case PROTESTANT_SPACES_49 = 4324;
    case PROTESTANT_SPACES_50 = 4325;
}

enum VPTokens : int{
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

enum PlayerBoardLocations: int{
    //TODO location for minus1 card markers missing
    case ENG_VP_TOKEN_1 = 4169; // Location id for Tokens with VP (e.g. Warwinner or new world)
    case ENG_VP_TOKEN_2 = 4170;
    case ENG_VP_TOKEN_3 = 4171;
    case ENG_VP_TOKEN_4 = 4172;
    case ENG_VP_TOKEN_5 = 4173;
    case ENG_VP_TOKEN_6 = 4174;
    case FRA_VP_TOKEN_1 = 4175;
    case FRA_VP_TOKEN_2 = 4176;
    case FRA_VP_TOKEN_3 = 4177;
    case FRA_VP_TOKEN_4 = 4178;
    case FRA_VP_TOKEN_5 = 4179;
    case FRA_VP_TOKEN_6 = 4180;
    case HAP_VP_TOKEN_1 = 4181;
    case HAP_VP_TOKEN_2 = 4182;
    case HAP_VP_TOKEN_3 = 4183;
    case HAP_VP_TOKEN_4 = 4184;
    case HAP_VP_TOKEN_5 = 4185;
    case HAP_VP_TOKEN_6 = 4186;
    case PAP_VP_TOKEN_1 = 4187;
    case PAP_VP_TOKEN_2 = 4188;
    case PAP_VP_TOKEN_3 = 4189;
    case PAP_VP_TOKEN_4 = 4190;
    case PAP_VP_TOKEN_5 = 4191;
    case PAP_VP_TOKEN_6 = 4192;
    case PRO_VP_TOKEN_1 = 4193;
    case PRO_VP_TOKEN_2 = 4194;
    case PRO_VP_TOKEN_3 = 4195;
    case PRO_VP_TOKEN_4 = 4196;
    case PRO_VP_TOKEN_5 = 4197;
    case PRO_VP_TOKEN_6 = 4198;
    case OTT_VP_TOKEN_1 = 4199;
    case OTT_VP_TOKEN_2 = 4200;
    case OTT_VP_TOKEN_3 = 4201;
    case OTT_VP_TOKEN_4 = 4202;
    case OTT_VP_TOKEN_5 = 4203;
    case OTT_VP_TOKEN_6 = 4204;
    
    case ENGLAND_KEY_1 = 4111;
    case ENGLAND_KEY_2 = 4112;
    case ENGLAND_KEY_3 = 4113;
    case ENGLAND_KEY_4 = 4114;
    case ENGLAND_KEY_5 = 4115;
    case ENGLAND_KEY_6 = 4116;
    case ENGLAND_KEY_7 = 4117;
    case ENGLAND_KEY_8 = 4118;
    case ENGLAND_KEY_9 = 4119;
    case FRANCE_KEY_1 = 4120;
    case FRANCE_KEY_2 = 4121;
    case FRANCE_KEY_3 = 4122;
    case FRANCE_KEY_4 = 4123;
    case FRANCE_KEY_5 = 4124;
    case FRANCE_KEY_6 = 4125;
    case FRANCE_KEY_7 = 4126;
    case FRANCE_KEY_8 = 4127;
    case FRANCE_KEY_9 = 4128;
    case FRANCE_KEY_10 = 4129;
    case FRANCE_KEY_11 = 4130;
    case HAPSBURG_KEY_1 = 4131;
    case HAPSBURG_KEY_2 = 4132;
    case HAPSBURG_KEY_3 = 4133;
    case HAPSBURG_KEY_4 = 4134;
    case HAPSBURG_KEY_5 = 4135;
    case HAPSBURG_KEY_6 = 4136;
    case HAPSBURG_KEY_7 = 4137;
    case HAPSBURG_KEY_8 = 4138;
    case HAPSBURG_KEY_9 = 4139;
    case HAPSBURG_KEY_10 = 4140;
    case HAPSBURG_KEY_11 = 4141;
    case HAPSBURG_KEY_12 = 4142;
    case HAPSBURG_KEY_13 = 4143;
    case HAPSBURG_KEY_14 = 4144;
    case OTTOMAN_KEY_1 = 4145;
    case OTTOMAN_KEY_2 = 4146;
    case OTTOMAN_KEY_3 = 4147;
    case OTTOMAN_KEY_4 = 4148;
    case OTTOMAN_KEY_5 = 4149;
    case OTTOMAN_KEY_6 = 4150;
    case OTTOMAN_KEY_7 = 4151;
    case OTTOMAN_KEY_8 = 4152;
    case OTTOMAN_KEY_9 = 4153;
    case OTTOMAN_KEY_10 = 4154;
    case OTTOMAN_KEY_11 = 4155;
    case PAPACY_KEY_1 = 4156;
    case PAPACY_KEY_2 = 4157;
    case PAPACY_KEY_3 = 4158;
    case PAPACY_KEY_4 = 4159;
    case PAPACY_KEY_5 = 4160;
    case PAPACY_KEY_6 = 4161;
    case PAPACY_KEY_7 = 4162;
    case PRISION_ENGLAND = 4163;
    case PRISION_FRANCE = 4164;
    case PRISION_HAPSBURG = 4165;
    case PRISION_OTTOMAN = 4166;
    case PRISION_PAPACY = 4167;
    case PRISION_PROTESTANT = 4168;
}

enum LoanedTokens : int{
const LOANED_ENGLAND = 1080;
const LOANED_FRANCE = 1081;
const LOANED_HAPSBURG = 1082;
const LOANED_OTTOMAN = 1083;
const LOANED_PAPACY = 1084;
}

enum newWorldTokens : int{
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

enum newWorldLocations : int{
    case CONQUEST_ENG_1 = 4092;
    case CONQUEST_ENG_2 = 4093;
    case CONQUEST_FRA_1 = 4094;
    case CONQUEST_FRA_2 = 4095;
    case CONQUEST_HAP_1 = 4096;
    case CONQUEST_HAP_2 = 4097;
    case CONQUEST_HAP_3 = 4098;
    case COLONY_ENG_1 = 4079;
    case COLONY_ENG_2 = 4080;
    case COLONY_FRA_1 = 4081;
    case COLONY_FRA_2 = 4082;
    case COLONY_HAP_1 = 4083;
    case COLONY_HAP_2 = 4084;
    case COLONY_HAP_3 = 4085;

    case ST_LAWRENCE_RIVER = 4070;
    case GREAT_LAKES = 4071;
    case MISSISSIPI_RIVER = 4072;
    case AZTEC = 4073;
    case MAYA = 4074;
    case AMAZON_RIVER = 4075;
    case INCA = 4076;
    case PACIFIC_STRAIT = 4077;
    case CIRCUMNAVIGATION = 4078;
    
    case CROSSING_ATLANTIC_1 = 4099;
    case CROSSING_ATLANTIC_2 = 4100;
    case CROSSING_ATLANTIC_3 = 4101;
    case CROSSING_ATLANTIC_4 = 4102;
    case CROSSING_ATLANTIC_5 = 4103;
    case CROSSING_ATLANTIC_6 = 4104;
}


enum ELECTORATE_DISPLAY_Locations : int{
    case AUG = 4086;
    case TRI = 4087;
    case COL = 4088;
    case WIT = 4089;
    case MAI = 4090;
    case BRA = 4091;
}

//should this be an enum or an list?
//what is this even used for?
enum ExkomunikationLocations: int{
    case EXCOMMUNICATED_1 = 4262;
    case EXCOMMUNICATED_2 = 4263;
    case EXCOMMUNICATED_3 = 4264;
    case EXCOMMUNICATED_4 = 4265;
    case EXCOMMUNICATED_5 = 4266;
    case EXCOMMUNICATED_6 = 4267;
    case EXCOMMUNICATED_7 = 4268;
}

enum DiploTokens : int{
const ALLIED = 1071;
const AT_WAR = 1072;
}

enum DiploLocations : int{
    case OTT_HAP = 4009;
    case OTT_ENG = 4010;
    case OTT_FRA = 4011;
    case OTT_PAP = 4012;
    case OTT_PRO = 4013;
    case OTT_GEN = 4014;
    case OTT_HUN = 4015;// not enabled, and other not enabled spaces are missing completly
    case OTT_VEN = 4016;
    case OTT_SCO = -1;
    case HAP_ENG = 4017;
    case HAP_FRA = 4018;
    case HAP_PAP = 4019;
    case HAP_PRO = 4020;
    case HAP_GEN = 4021;
    case HAP_HUN = 4022;
    case HAP_SCO = 4023;
    case HAP_VEN = 4024;
    case ENG_FRA = 4025;
    case ENG_PAP = 4026;
    case ENG_PRO = 4027;
    case ENG_GEN = 4028;
    case ENG_SCO = 4029;
    case FRA_PAP = 4030;
    case FRA_PRO = 4031;
    case FRA_GEN = 4032;
    case FRA_SCO = 4033;
    case FRA_VEN = 4034;
    case PAP_PRO = 4035;
    case PAP_GEN = 4036;
    case PAP_VEN = 4037;
    case PRO_GEN = 4038;
    case PRO_VEN = 4039;
}

//Tokens on the Turn treck for events that affekt more than one impulse
enum EventReminders: int{
    case AUGSBURG_CONFESSION = 1197;
    case PRINTING_PRESS = 1198;
}


/*
 * tracks
 * def strTrack(strName, intMax):
 *  return f"const {strName}_TRACK = [" + ", ".join([str(i) + " => " + strName+str(i) for i in range(0, intMax+1)]) + "];"
 */
const TURN_TRACK_TOKENS = [TURN];
const TURN_TRACK_TRACK = [1 => TURN_TRACK_1, 2 => TURN_TRACK_2, 3 => TURN_TRACK_3, 4 => TURN_TRACK_4, 5 => TURN_TRACK_5, 
    6 => TURN_TRACK_6, 7 => TURN_TRACK_7, 8 => TURN_TRACK_8, 9 => TURN_TRACK_9];

const VICTORY_TRACK_TOKENS = [VP_OTTOMAN, VP_HAPSBURG, VP_ENGLAND, VP_FRANCE, VP_PAPACY, VP_PROTESTANT];
const VICTORY_TRACK = [0 => VICTORY_TRACK_0, 1 => VICTORY_TRACK_1, 2 => VICTORY_TRACK_2, 3 => VICTORY_TRACK_3, 4 => VICTORY_TRACK_4, 
    5 => VICTORY_TRACK_5, 6 => VICTORY_TRACK_6, 7 => VICTORY_TRACK_7, 8 => VICTORY_TRACK_8, 9 => VICTORY_TRACK_9, 10 => VICTORY_TRACK_10, 
    11 => VICTORY_TRACK_11, 12 => VICTORY_TRACK_12, 13 => VICTORY_TRACK_13, 14 => VICTORY_TRACK_14, 15 => VICTORY_TRACK_15, 
    16 => VICTORY_TRACK_16, 17 => VICTORY_TRACK_17, 18 => VICTORY_TRACK_18, 19 => VICTORY_TRACK_19, 20 => VICTORY_TRACK_20, 
    21 => VICTORY_TRACK_21, 22 => VICTORY_TRACK_22, 23 => VICTORY_TRACK_23, 24 => VICTORY_TRACK_24, 25 => VICTORY_TRACK_25, 
    26 => VICTORY_TRACK_26, 27 => VICTORY_TRACK_27, 28 => VICTORY_TRACK_28, 29 => VICTORY_TRACK_29];

const PIRACY_TRACK_TOKENS = [PIRACY_VP];
const PIRACY_TRACK = [0 => PIRACY_0, 1 => PIRACY_1, 2 => PIRACY_2, 3 => PIRACY_3, 4 => PIRACY_4, 5 => PIRACY_5, 6 => PIRACY_6, 
    7 => PIRACY_7, 8 => PIRACY_8, 9 => PIRACY_9, 10 => PIRACY_10];

const PROTESTANT_SPACES_TRACK_TOKENS = [ENGLISH_PROT_COUNTER, PROTESTANT_SPACES];
const PROTESTANT_SPACES_TRACK = [0 => PROTESTANT_SPACES_0, 1 => PROTESTANT_SPACES_1, 2 => PROTESTANT_SPACES_2, 3 => PROTESTANT_SPACES_3, 4 => PROTESTANT_SPACES_4, 5 => PROTESTANT_SPACES_5, 
    6 => PROTESTANT_SPACES_6, 7 => PROTESTANT_SPACES_7, 8 => PROTESTANT_SPACES_8, 9 => PROTESTANT_SPACES_9, 10 => PROTESTANT_SPACES_10, 11 => PROTESTANT_SPACES_11, 12 => PROTESTANT_SPACES_12, 
    13 => PROTESTANT_SPACES_13, 14 => PROTESTANT_SPACES_14, 15 => PROTESTANT_SPACES_15, 16 => PROTESTANT_SPACES_16, 17 => PROTESTANT_SPACES_17, 18 => PROTESTANT_SPACES_18, 19 => PROTESTANT_SPACES_19, 
    20 => PROTESTANT_SPACES_20, 21 => PROTESTANT_SPACES_21, 22 => PROTESTANT_SPACES_22, 23 => PROTESTANT_SPACES_23, 24 => PROTESTANT_SPACES_24, 25 => PROTESTANT_SPACES_25, 26 => PROTESTANT_SPACES_26, 
    27 => PROTESTANT_SPACES_27, 28 => PROTESTANT_SPACES_28, 29 => PROTESTANT_SPACES_29, 30 => PROTESTANT_SPACES_30, 31 => PROTESTANT_SPACES_31, 32 => PROTESTANT_SPACES_32, 33 => PROTESTANT_SPACES_33, 
    34 => PROTESTANT_SPACES_34, 35 => PROTESTANT_SPACES_35, 36 => PROTESTANT_SPACES_36, 37 => PROTESTANT_SPACES_37, 38 => PROTESTANT_SPACES_38, 39 => PROTESTANT_SPACES_39, 40 => PROTESTANT_SPACES_40, 
    41 => PROTESTANT_SPACES_41, 42 => PROTESTANT_SPACES_42, 43 => PROTESTANT_SPACES_43, 44 => PROTESTANT_SPACES_44, 45 => PROTESTANT_SPACES_45, 46 => PROTESTANT_SPACES_46, 47 => PROTESTANT_SPACES_47, 
    48 => PROTESTANT_SPACES_48, 49 => PROTESTANT_SPACES_49, 50 => PROTESTANT_SPACES_50];

const MARTIAL_STATUS_TRACK_TOKENS = [HENRY_MARITAL_STATUS];
const MARITAL_STATUS_TRACK = [1 => MARITAL_STATUS_1, 2 => MARITAL_STATUS_2, 3 => MARITAL_STATUS_3, 4 => MARITAL_STATUS_4, 5 => MARITAL_STATUS_5, 
    6 => MARITAL_STATUS_6, 7 => MARITAL_STATUS_7];

const SAINT_PETERS_CP_TRACK_TOKENS = [ST_PETERS_CP];
const SAINT_PETERS_CP_TRACK = [0 => SAINT_PETERS_CP_0, 1 => SAINT_PETERS_CP_1, 2 => SAINT_PETERS_CP_2, 3 => SAINT_PETERS_CP_3, 
    4 => SAINT_PETERS_CP_4, 5 => SAINT_PETERS_CP_5];

const SAINT_PETERS_VP_TRACK_TOKENS = [ST_PETERS_VP];
const SAINT_PETERS_VP_TRACK = [0 => SAINT_PETERS_VP_0, 1 => SAINT_PETERS_VP_1, 2 => SAINT_PETERS_VP_2, 3 => SAINT_PETERS_VP_3, 
    4 => SAINT_PETERS_VP_4, 5 => SAINT_PETERS_VP_5];

const NT_TRANSLATION_TRACK_TOKENS = [NEW_TESTAMENT_ENGLISH, NEW_TESTAMENT_FRENCH, NEW_TESTAMENT_GERMAN];
const NT_TRANSLATION_TRACK = [0 => NT_TRANSLATION_0, 1 => NT_TRANSLATION_1, 2 => NT_TRANSLATION_2, 3 => NT_TRANSLATION_3, 
    4 => NT_TRANSLATION_4, 5 => NT_TRANSLATION_5, 6 => NT_TRANSLATION_6];

const BIBLE_TRANSLATION_TRACK_TOKENS = [BIBLE_ENGLISH, BIBLE_FRENCH, BIBLE_GERMAN];
const BIBLE_TRANSLATION_TRACK = [0 => BIBLE_TRANSLATION_0, 1 => BIBLE_TRANSLATION_1, 2 => BIBLE_TRANSLATION_2, 3 => BIBLE_TRANSLATION_3, 
    4 => BIBLE_TRANSLATION_4, 5 => BIBLE_TRANSLATION_5, 6 => BIBLE_TRANSLATION_6, 7 => BIBLE_TRANSLATION_7, 8 => BIBLE_TRANSLATION_8, 
    9 => BIBLE_TRANSLATION_9, 10 => BIBLE_TRANSLATION_10];

const DiploLocationsArray = [
    Powers::OTTOMAN    => [Powers::HAPSBURG => DiploLocations::OTT_HAP, Powers::ENGLAND => DiploLocations::OTT_ENG, Powers::FRANCE => DiploLocations::OTT_FRA, Powers::PAPACY => DiploLocations::OTT_PAP, Powers::PROTESTANT => DiploLocations::OTT_PRO, Powers::MINOR_GENOA => DiploLocations::OTT_GEN, Powers::MINOR_HUNGARY => DiploLocations::OTT_HUN, Powers::MINOR_SCOTLAND => DiploLocations::OTT_SCO, Powers::MINOR_VENICE => DiploLocations::OTT_VEN], 
    Powers::HAPSBURG   => [Powers::OTTOMAN => DiploLocations::OTT_HAP, Powers::ENGLAND => DiploLocations::HAP_ENG, Powers::FRANCE => DiploLocations::HAP_FRA, Powers::PAPACY => DiploLocations::HAP_PAP, Powers::PROTESTANT => DiploLocations::HAP_PRO, Powers::MINOR_GENOA => DiploLocations::HAP_GEN, Powers::MINOR_HUNGARY => DiploLocations::HAP_HUN, Powers::MINOR_SCOTLAND => DiploLocations::HAP_SCO, Powers::MINOR_VENICE => DiploLocations::HAP_VEN], 
    Powers::ENGLAND    => [Powers::OTTOMAN => DiploLocations::OTT_ENG, Powers::HAPSBURG => DiploLocations::HAP_ENG, Powers::FRANCE => DiploLocations::ENG_FRA, Powers::PAPACY => DiploLocations::ENG_PAP, Powers::PROTESTANT => DiploLocations::ENG_PRO, Powers::MINOR_GENOA => DiploLocations::ENG_GEN, Powers::MINOR_HUNGARY => DiploLocations::ENG_HUN, Powers::MINOR_SCOTLAND => DiploLocations::ENG_SCO, Powers::MINOR_VENICE => DiploLocations::ENG_VEN], 
    Powers::FRANCE     => [Powers::OTTOMAN => DiploLocations::OTT_FRA, Powers::HAPSBURG => DiploLocations::HAP_FRA, Powers::ENGLAND => DiploLocations::ENG_FRA, Powers::PAPACY => DiploLocations::FRA_PAP, Powers::PROTESTANT => DiploLocations::FRA_PRO, Powers::MINOR_GENOA => DiploLocations::FRA_GEN, Powers::MINOR_HUNGARY => DiploLocations::FRA_HUN, Powers::MINOR_SCOTLAND => DiploLocations::FRA_SCO, Powers::MINOR_VENICE => DiploLocations::FRA_VEN], 
    Powers::PAPACY     => [Powers::OTTOMAN => DiploLocations::OTT_PAP, Powers::HAPSBURG => DiploLocations::HAP_PAP, Powers::ENGLAND => DiploLocations::ENG_PAP, Powers::FRANCE => DiploLocations::FRA_PAP, Powers::PROTESTANT => DiploLocations::PAP_PRO, Powers::MINOR_GENOA => DiploLocations::PAP_GEN, Powers::MINOR_HUNGARY => DiploLocations::PAP_HUN, Powers::MINOR_SCOTLAND => DiploLocations::PAP_SCO, Powers::MINOR_VENICE => DiploLocations::PAP_VEN], 
    Powers::PROTESTANT => [Powers::OTTOMAN => DiploLocations::OTT_PRO, Powers::HAPSBURG => DiploLocations::Hap_PRO, Powers::ENGLAND => DiploLocations::ENG_PAP, Powers::FRANCE => DiploLocations::FRA_PRO, Powers::PAPACY => DiploLocations::PAP_PRO, Powers::MINOR_GENOA => DiploLocations::PRO_GEN, Powers::MINOR_HUNGARY => DiploLocations::PRO_HUN, Powers::MINOR_SCOTLAND => DiploLocations::PRO_SCO, Powers::MINOR_VENICE => DiploLocations::PRO_VEN]
    ]
/*
 * Game options
 */

/*
 * Stats
 */
