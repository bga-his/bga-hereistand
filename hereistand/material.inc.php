<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * hereistand implementation : © CONTRIBUTORS
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * material.inc.php
 *
 * hereistand game material description
 *
 * Here, you can describe the material of your game with PHP variables.
 *
 * This file is loaded in your game logic class constructor, ie these variables
 * are available everywhere in your game logic code.
 *
 */

require_once 'modules/php/constants.inc.php';

$this->cities = [
	WITTENBERG => [
		"x" => 3247,
		"y" => 731,
		"name" => "Wittenberg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			BRANDENBURG,
			MAGDEBURG,
			LEIPZIG,
			PRAGUE,
			BRESLAU,
		],
		"passes" => [

		],
	],
	BRANDENBURG => [
		"x" => 3196,
		"y" => 590,
		"name" => "Brandenburg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			WITTENBERG,
			MAGDEBURG,
			BRESLAU,
			LUBECK,
			STETTIN,
		],
		"passes" => [

		],
	],
	MAINZ => [
		"x" => 2783,
		"y" => 992,
		"name" => "Mainz",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			KASSEL,
			NUREMBERG,
			COLOGNE,
			TRIER,
			WORMS,
		],
		"passes" => [

		],
	],
	COLOGNE => [
		"x" => 2617,
		"y" => 848,
		"name" => "Cologne",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			MAINZ,
			MUNSTER,
			LIEGE,
		],
		"passes" => [

		],
	],
	TRIER => [
		"x" => 2636,
		"y" => 1018,
		"name" => "Trier",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			MAINZ,
			METZ,
			LIEGE,
		],
		"passes" => [

		],
	],
	AUGSBURG => [
		"x" => 2981,
		"y" => 1203,
		"name" => "Augsburg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			REGENSBURG,
			NUREMBERG,
			SALZBURG,
			WORMS,
		],
		"passes" => [
			INNSBRUCK,
		],
	],
	STETTIN => [
		"x" => 3332,
		"y" => 436,
		"name" => "Stettin",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			BRANDENBURG,
			LUBECK,
		],
		"passes" => [

		],
	],
	LUBECK => [
		"x" => 3103,
		"y" => 382,
		"name" => "Lübeck",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			BRANDENBURG,
			STETTIN,
			MAGDEBURG,
			HAMBURG,
		],
		"passes" => [

		],
	],
	MAGDEBURG => [
		"x" => 3052,
		"y" => 660,
		"name" => "Magdeburg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			WITTENBERG,
			BRANDENBURG,
			LUBECK,
			BRUNSWICK,
			ERFURT,
		],
		"passes" => [

		],
	],
	HAMBURG => [
		"x" => 2877,
		"y" => 471,
		"name" => "Hamburg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			LUBECK,
			BRUNSWICK,
			BREMEN,
		],
		"passes" => [

		],
	],
	BRUNSWICK => [
		"x" => 2842,
		"y" => 692,
		"name" => "Brunswick",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			HAMBURG,
			MAGDEBURG,
			BREMEN,
			KASSEL,
		],
		"passes" => [

		],
	],
	BREMEN => [
		"x" => 2714,
		"y" => 547,
		"name" => "Bremen",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			HAMBURG,
			BRUNSWICK,
			MUNSTER,
		],
		"passes" => [

		],
	],
	MUNSTER => [
		"x" => 2620,
		"y" => 662,
		"name" => "Münster",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			BREMEN,
			KASSEL,
			AMSTERDAM,
		],
		"passes" => [

		],
	],
	KASSEL => [
		"x" => 2785,
		"y" => 839,
		"name" => "Kassel",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			MAINZ,
			BRUNSWICK,
			MUNSTER,
			NUREMBERG,
			ERFURT,
		],
		"passes" => [

		],
	],
	ERFURT => [
		"x" => 2942,
		"y" => 875,
		"name" => "Erfurt",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			KASSEL,
			MAGDEBURG,
			LEIPZIG,
		],
		"passes" => [

		],
	],
	LEIPZIG => [
		"x" => 3101,
		"y" => 813,
		"name" => "Leipzig",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			WITTENBERG,
			NUREMBERG,
			ERFURT,
			PRAGUE,
		],
		"passes" => [

		],
	],
	NUREMBERG => [
		"x" => 2954,
		"y" => 1049,
		"name" => "Nuremberg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			KASSEL,
			REGENSBURG,
			LEIPZIG,
			AUGSBURG,
			WORMS,
		],
		"passes" => [

		],
	],
	WORMS => [
		"x" => 2823,
		"y" => 1133,
		"name" => "Worms",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			MAINZ,
			NUREMBERG,
			AUGSBURG,
			STRASBURG,
		],
		"passes" => [

		],
	],
	REGENSBURG => [
		"x" => 3152,
		"y" => 1079,
		"name" => "Regensburg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			SALZBURG,
			NUREMBERG,
			AUGSBURG,
			LINZ,
		],
		"passes" => [

		],
	],
	STRASBURG => [
		"x" => 2698,
		"y" => 1194,
		"name" => "Strasburg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			WORMS,
			METZ,
			BESANCON,
			BASEL,
		],
		"passes" => [

		],
	],
	SALZBURG => [
		"x" => 3267,
		"y" => 1233,
		"name" => "Salzburg",
		"home_power" => PROTESTANT,
		"language" => GERMAN,
		"connections" => [
			INNSBRUCK,
			REGENSBURG,
			AUGSBURG,
			LINZ,
		],
		"passes" => [
			GRAZ,
		],
	],
	VIENNA => [
		"x" => 3594,
		"y" => 1144,
		"name" => "Vienna",
		"home_power" => HAPSBURG,
		"language" => GERMAN,
		"connections" => [
			LINZ,
			BRUNN,
			PRESSBURG,
			GRAZ,
		],
		"passes" => [

		],
	],
	LINZ => [
		"x" => 3406,
		"y" => 1172,
		"name" => "Linz",
		"home_power" => HAPSBURG,
		"language" => GERMAN,
		"connections" => [
			VIENNA,
			REGENSBURG,
			SALZBURG,
			PRAGUE,
		],
		"passes" => [

		],
	],
	GRAZ => [
		"x" => 3491,
		"y" => 1331,
		"name" => "Graz",
		"home_power" => HAPSBURG,
		"language" => GERMAN,
		"connections" => [
			VIENNA,
			MOHACS,
			TRIESTE,
			AGRAM,
		],
		"passes" => [
			SALZBURG,
		],
	],
	INNSBRUCK => [
		"x" => 3135,
		"y" => 1295,
		"name" => "Innsbruck",
		"home_power" => HAPSBURG,
		"language" => GERMAN,
		"connections" => [
			SALZBURG,
			ZURICH,
		],
		"passes" => [
			AUGSBURG,
		],
	],
	ZURICH => [
		"x" => 2830,
		"y" => 1342,
		"name" => "Zürich",
		"home_power" => INDEPENDENT,
		"language" => GERMAN,
		"connections" => [
			BASEL,
			INNSBRUCK,
		],
		"passes" => [

		],
	],
	BASEL => [
		"x" => 2675,
		"y" => 1338,
		"name" => "Basel",
		"home_power" => INDEPENDENT,
		"language" => GERMAN,
		"connections" => [
			ZURICH,
			STRASBURG,
			GENEVA,
			BESANCON,
		],
		"passes" => [

		],
	],
	LONDON => [
		"x" => 1904,
		"y" => 830,
		"name" => "London",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			NORWICH,
			LINCOLN,
			SHREWSBURY,
			BRISTOL,
			PORTSMOUTH,
		],
		"passes" => [

		],
	],
	BRISTOL => [
		"x" => 1674,
		"y" => 812,
		"name" => "Bristol",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			LONDON,
			WALES,
			SHREWSBURY,
			PLYMOUTH,
			PORTSMOUTH,
		],
		"passes" => [

		],
	],
	YORK => [
		"x" => 1715,
		"y" => 499,
		"name" => "York",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			CARLISLE,
			LINCOLN,
			SHREWSBURY,
			BERWICK,
		],
		"passes" => [

		],
	],
	NORWICH => [
		"x" => 2016,
		"y" => 663,
		"name" => "Norwich",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			LONDON,
		],
		"passes" => [

		],
	],
	PORTSMOUTH => [
		"x" => 1784,
		"y" => 945,
		"name" => "Portsmouth",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			LONDON,
			BRISTOL,
			PLYMOUTH,
		],
		"passes" => [

		],
	],
	PLYMOUTH => [
		"x" => 1517,
		"y" => 1023,
		"name" => "Plymouth",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			BRISTOL,
			PLYMOUTH,
		],
		"passes" => [

		],
	],
	LINCOLN => [
		"x" => 1828,
		"y" => 658,
		"name" => "Lincoln",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			LONDON,
			YORK,
		],
		"passes" => [

		],
	],
	WALES => [
		"x" => 1518,
		"y" => 758,
		"name" => "Wales",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			BRISTOL,
			SHREWSBURY,
		],
		"passes" => [

		],
	],
	SHREWSBURY => [
		"x" => 1657,
		"y" => 646,
		"name" => "Shrewsbury",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			LONDON,
			WALES,
			BRISTOL,
			YORK,
			CARLISLE,
		],
		"passes" => [

		],
	],
	CARLISLE => [
		"x" => 1569,
		"y" => 404,
		"name" => "Carlisle",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			BERWICK,
			YORK,
			SHREWSBURY,
			GLASGOW,
		],
		"passes" => [

		],
	],
	BERWICK => [
		"x" => 1692,
		"y" => 308,
		"name" => "Berwick",
		"home_power" => ENGLAND,
		"language" => ENGLISH,
		"connections" => [
			CARLISLE,
			YORK,
			EDINBURGH,
		],
		"passes" => [

		],
	],
	EDINBURGH => [
		"x" => 1540,
		"y" => 254,
		"name" => "Edinburgh",
		"home_power" => MINOR_SCOTLAND,
		"language" => ENGLISH,
		"connections" => [
			BERWICK,
			STIRLING,
			GLASGOW,
		],
		"passes" => [

		],
	],
	STIRLING => [
		"x" => 1382,
		"y" => 204,
		"name" => "Stirling",
		"home_power" => MINOR_SCOTLAND,
		"language" => ENGLISH,
		"connections" => [
			EDINBURGH,
			GLASGOW,
		],
		"passes" => [

		],
	],
	GLASGOW => [
		"x" => 1403,
		"y" => 362,
		"name" => "Glasgow",
		"home_power" => MINOR_SCOTLAND,
		"language" => ENGLISH,
		"connections" => [
			CARLISLE,
			STIRLING,
			EDINBURGH,
		],
		"passes" => [

		],
	],
	PARIS => [
		"x" => 2128,
		"y" => 1188,
		"name" => "Paris",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			ROUEN,
			BOULOGNE,
			ST_QUENTIN,
			ST_DIZIER,
			DIJON,
		],
		"passes" => [

		],
	],
	LYON => [
		"x" => 2430,
		"y" => 1567,
		"name" => "Lyon",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			GENEVA,
			ORLEANS,
			DIJON,
			LIMOGES,
			AVIGNON,
		],
		"passes" => [

		],
	],
	ROUEN => [
		"x" => 1926,
		"y" => 1123,
		"name" => "Rouen",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			PARIS,
			BOULOGNE,
			TOURS,
			NANTES,
		],
		"passes" => [

		],
	],
	MARSEILLE => [
		"x" => 2506,
		"y" => 1905,
		"name" => "Marseille",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			AVIGNON,
			NICE,
		],
		"passes" => [

		],
	],
	BORDEAUX => [
		"x" => 1899,
		"y" => 1690,
		"name" => "Bordeaux",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			NANTES,
			TOURS,
			LIMOGES,
			TOULOUSE,
		],
		"passes" => [
			NAVARRE,
		],
	],
	GRENOBLE => [
		"x" => 2556,
		"y" => 1716,
		"name" => "Grenoble",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			LYON,
			GENEVA,
		],
		"passes" => [
			TURIN,
		],
	],
	DIJON => [
		"x" => 2321,
		"y" => 1332,
		"name" => "Dijon",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			ORLEANS,
			LYON,
			BESANCON,
			PARIS,
			ST_DIZIER,
		],
		"passes" => [

		],
	],
	ST_DIZIER => [
		"x" => 2322,
		"y" => 1170,
		"name" => "St. Dizier",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	ST_QUENTIN => [
		"x" => 2211,
		"y" => 1059,
		"name" => "St. Quentin",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	BOULOGNE => [
		"x" => 2075,
		"y" => 1005,
		"name" => "Boulogne",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	ORLEANS => [
		"x" => 2138,
		"y" => 1345,
		"name" => "Orleans",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	AVIGNON => [
		"x" => 2410,
		"y" => 1771,
		"name" => "Avignon",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	TOULOUSE => [
		"x" => 2110,
		"y" => 1862,
		"name" => "Toulouse",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	LIMOGES => [
		"x" => 2094,
		"y" => 1522,
		"name" => "Limoges",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	TOURS => [
		"x" => 1969,
		"y" => 1403,
		"name" => "Tours",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	NANTES => [
		"x" => 1770,
		"y" => 1434,
		"name" => "Nantes",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	BREST => [
		"x" => 1528,
		"y" => 1299,
		"name" => "Brest",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	BRUSSELS => [
		"x" => 2320,
		"y" => 947,
		"name" => "Brussels",
		"home_power" => HAPSBURG,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	BESANCON => [
		"x" => 2510,
		"y" => 1292,
		"name" => "Besançon",
		"home_power" => HAPSBURG,
		"language" => FRENCH,
		"connections" => [
			DIJON,
			BASEL,
			GENEVA,
		],
		"passes" => [

		],
	],
	CALAIS => [
		"x" => 2142,
		"y" => 869,
		"name" => "Calais",
		"home_power" => ENGLAND,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	METZ => [
		"x" => 2503,
		"y" => 1118,
		"name" => "Metz",
		"home_power" => INDEPENDENT,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	LIEGE => [
		"x" => 2471,
		"y" => 908,
		"name" => "Liege",
		"home_power" => INDEPENDENT,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	GENEVA => [
		"x" => 2593,
		"y" => 1491,
		"name" => "Geneva",
		"home_power" => INDEPENDENT,
		"language" => FRENCH,
		"connections" => [
			LYON,
			BESANCON,
			BASEL,
			GRENOBLE,
		],
		"passes" => [
			TURIN,
		],
	],
	NICE => [
		"x" => 2700,
		"y" => 1858,
		"name" => "Nice",
		"home_power" => INDEPENDENT,
		"language" => FRENCH,
		"connections" => [

		],
		"passes" => [

		],
	],
	ROME => [
		"x" => 3241,
		"y" => 2045,
		"name" => "Rome",
		"home_power" => PAPACY,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	RAVENNA => [
		"x" => 3247,
		"y" => 1720,
		"name" => "Ravenna",
		"home_power" => PAPACY,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	ANCONA => [
		"x" => 3357,
		"y" => 1878,
		"name" => "Ancona",
		"home_power" => PAPACY,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	NAPLES => [
		"x" => 3475,
		"y" => 2213,
		"name" => "Naples",
		"home_power" => HAPSBURG,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	TRIESTE => [
		"x" => 3337,
		"y" => 1514,
		"name" => "Trieste",
		"home_power" => HAPSBURG,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	CERIGNOLA => [
		"x" => 3444,
		"y" => 2042,
		"name" => "Cerignola",
		"home_power" => HAPSBURG,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	TARANTO => [
		"x" => 3716,
		"y" => 2205,
		"name" => "Taranto",
		"home_power" => HAPSBURG,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	MESSINA => [
		"x" => 3494,
		"y" => 2553,
		"name" => "Messina",
		"home_power" => HAPSBURG,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	PALERMO => [
		"x" => 3378,
		"y" => 2546,
		"name" => "Palermo",
		"home_power" => HAPSBURG,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	"Minor_Genoa" => [
		"x" => 2844,
		"y" => 1750,
		"name" => "Minor_Genoa",
		"home_power" => MINOR_GENOA,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	VENICE => [
		"x" => 3205,
		"y" => 1524,
		"name" => "Minor_Venice",
		"home_power" => MINOR_VENICE,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	MILAN => [
		"x" => 2864,
		"y" => 1495,
		"name" => "Milan",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	FLORENCE => [
		"x" => 3094,
		"y" => 1769,
		"name" => "Florence",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	TURIN => [
		"x" => 2702,
		"y" => 1655,
		"name" => "Turin",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [
			MILAN,
		],
		"passes" => [
			GENEVA,
		],
	],
	TRENT => [
		"x" => 3051,
		"y" => 1436,
		"name" => "Trent",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	MODENA => [
		"x" => 3069,
		"y" => 1613,
		"name" => "Modena",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	PAVIA => [
		"x" => 2917,
		"y" => 1630,
		"name" => "Pavia",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	SIENA => [
		"x" => 3106,
		"y" => 1932,
		"name" => "Siena",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [

		],
		"passes" => [

		],
	],
	VALLADOLID => [
		"x" => 1514,
		"y" => 2180,
		"name" => "Valladolid",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	NAVARRE => [
		"x" => 1822,
		"y" => 1939,
		"name" => "Navarre",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	BARCELONA => [
		"x" => 2227,
		"y" => 2186,
		"name" => "Barcelona",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	SEVILLE => [
		"x" => 1442,
		"y" => 2766,
		"name" => "Seville",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	GIBRALTAR => [
		"x" => 1494,
		"y" => 2945,
		"name" => "Gibraltar",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	CORUNNA => [
		"x" => 1136,
		"y" => 1996,
		"name" => "Corunna",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	BILBAO => [
		"x" => 1653,
		"y" => 1950,
		"name" => "Bilbao",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	ZARAGOZA => [
		"x" => 1897,
		"y" => 2150,
		"name" => "Zaragoza",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	MADRID => [
		"x" => 1670,
		"y" => 2358,
		"name" => "Madrid",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	VALENCIA => [
		"x" => 1992,
		"y" => 2457,
		"name" => "Valencia",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	PALMA => [
		"x" => 2341,
		"y" => 2392,
		"name" => "Palma",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	CORDOBA => [
		"x" => 1566,
		"y" => 2654,
		"name" => "Cordoba",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	GRANADA => [
		"x" => 1676,
		"y" => 2781,
		"name" => "Granada",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	CARTAGENA => [
		"x" => 1949,
		"y" => 2716,
		"name" => "Cartagena",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [

		],
		"passes" => [

		],
	],
	ISTANBUL => [
		"x" => 4892,
		"y" => 2014,
		"name" => "Istanbul",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	EDIRNE => [
		"x" => 4651,
		"y" => 1964,
		"name" => "Edirne",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	SALONIKA => [
		"x" => 4283,
		"y" => 2134,
		"name" => "Salonika",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	ATHENS => [
		"x" => 4404,
		"y" => 2470,
		"name" => "Athens",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	SCUTARI => [
		"x" => 3937,
		"y" => 1984,
		"name" => "Scutari",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	VARNA => [
		"x" => 4772,
		"y" => 1747,
		"name" => "Varna",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	BUCHAREST => [
		"x" => 4576,
		"y" => 1552,
		"name" => "Bucharest",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	NICOPOLIS => [
		"x" => 4454,
		"y" => 1694,
		"name" => "Nicopolis",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	SOFIA => [
		"x" => 4392,
		"y" => 1890,
		"name" => "Sofia",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	LARISSA => [
		"x" => 4249,
		"y" => 2307,
		"name" => "Larissa",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	LEPANTO => [
		"x" => 4177,
		"y" => 2446,
		"name" => "Lepanto",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	CORON => [
		"x" => 4264,
		"y" => 2634,
		"name" => "Coron",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	NEZH => [
		"x" => 4188,
		"y" => 1777,
		"name" => "Nezh",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	DURAZZO => [
		"x" => 3963,
		"y" => 2164,
		"name" => "Durazzo",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	ALGIERS => [
		"x" => 2394,
		"y" => 2779,
		"name" => "Algiers",
		"home_power" => OTHER,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	ORAN => [
		"x" => 2041,
		"y" => 2944,
		"name" => "Oran",
		"home_power" => HAPSBURG,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	TRIPOLI => [
		"x" => 3435,
		"y" => 3135,
		"name" => "Tripoli",
		"home_power" => HAPSBURG,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	BELGRADE => [
		"x" => 4010,
		"y" => 1574,
		"name" => "Belgrade",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	BUDA => [
		"x" => 3865,
		"y" => 1232,
		"name" => "Buda",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	PRAGUE => [
		"x" => 3346,
		"y" => 912,
		"name" => "Prague",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	SZEGEDIN => [
		"x" => 3964,
		"y" => 1393,
		"name" => "Szegedin",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	PRESSBURG => [
		"x" => 3731,
		"y" => 1207,
		"name" => "Pressburg",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	MOHACS => [
		"x" => 3829,
		"y" => 1477,
		"name" => "Mohacs",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	AGRAM => [
		"x" => 3578,
		"y" => 1496,
		"name" => "Agram",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	BRUNN => [
		"x" => 3645,
		"y" => 966,
		"name" => "Brunn",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	BRESLAU => [
		"x" => 3585,
		"y" => 765,
		"name" => "Breslau",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	ANTWERP => [
		"x" => 2287,
		"y" => 795,
		"name" => "Antwerp",
		"home_power" => HAPSBURG,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	MALTA => [
		"x" => 3498,
		"y" => 2839,
		"name" => "Malta",
		"home_power" => HAPSBURG,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	CAGLIARI => [
		"x" => 2949,
		"y" => 2448,
		"name" => "Cagliari",
		"home_power" => HAPSBURG,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	AMSTERDAM => [
		"x" => 2363,
		"y" => 672,
		"name" => "Amsterdam",
		"home_power" => HAPSBURG,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	CANDIA => [
		"x" => 4603,
		"y" => 2791,
		"name" => "Candia",
		"home_power" => MINOR_VENICE,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	CORFU => [
		"x" => 3987,
		"y" => 2333,
		"name" => "Corfu",
		"home_power" => MINOR_VENICE,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	ZARA => [
		"x" => 3492,
		"y" => 1696,
		"name" => "Zara",
		"home_power" => MINOR_VENICE,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	BASTIA => [
		"x" => 2903,
		"y" => 1951,
		"name" => "Bastia",
		"home_power" => MINOR_GENOA,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	TUNIS => [
		"x" => 3064,
		"y" => 2720,
		"name" => "Tunis",
		"home_power" => INDEPENDENT,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	RHODES => [
		"x" => 4851,
		"y" => 2646,
		"name" => "Rhodes",
		"home_power" => INDEPENDENT,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
	RAGUSA => [
		"x" => 3779,
		"y" => 1874,
		"name" => "Ragusa",
		"home_power" => INDEPENDENT,
		"language" => OTHER,
		"connections" => [

		],
		"passes" => [

		],
	],
];

$this->tokens = [
	ENGLAND_KEY => [
		"name" => "English Key",
		"power" => ENGLAND,
		"style" => "Keys england_key",
		"db_id" => "england_scm_{INDEX}",
	],
	FRANCE_KEY => [
		"name" => "French Key",
		"power" => FRANCE,
		"style" => "Keys france_key",
		"db_id" => "tbd_1_{INDEX}",
	],
	HAPSBURG_KEY => [
		"name" => "Hapsburg Key",
		"power" => HAPSBURG,
		"style" => "Keys hapsburg_key",
		"db_id" => "tbd_2_{INDEX}",
	],
	OTTOMAN_KEY => [
		"name" => "Ottoman Key",
		"power" => OTTOMAN,
		"style" => "Keys ottoman_key",
		"db_id" => "tbd_3_{INDEX}",
	],
	INDEPENDENT_KEY => [
		"name" => "Independent Key",
		"power" => OTHER,
		"style" => "Keys independent_key",
		"db_id" => "tbd_4_{INDEX}",
	],
	PAPACY_KEY => [
		"name" => "Papacy Key",
		"power" => PAPACY,
		"style" => "Keys papacy_key",
		"db_id" => "tbd_5_{INDEX}",
	],
	ENGLAND_HEX => [
		"name" => "English Hexagonal Marker",
		"power" => OTHER,
		"style" => "Hex Markers england_hex",
		"db_id" => "tbd_6_{INDEX}",
	],
	FRANCE_HEX => [
		"name" => "French Hexagonal Marker",
		"power" => OTHER,
		"style" => "Hex Markers france_hex",
		"db_id" => "tbd_7_{INDEX}",
	],
	HAPSBURG_HEX => [
		"name" => "Hapsburg Hexagonal Marker",
		"power" => OTHER,
		"style" => "Hex Markers hapsburg_hex",
		"db_id" => "tbd_8_{INDEX}",
	],
	INDEPENDENT_HEX => [
		"name" => "Independent Hexagonal Marker",
		"power" => OTHER,
		"style" => "Hex Markers independent_hex",
		"db_id" => "tbd_9_{INDEX}",
	],
	OTTOMAN_HEX => [
		"name" => "Ottoman Hexagonal Marker",
		"power" => OTHER,
		"style" => "Hex Markers ottoman_hex",
		"db_id" => "tbd_10_{INDEX}",
	],
	PAPACY_HEX => [
		"name" => "Papacy Hexagonal Marker",
		"power" => OTHER,
		"style" => "Hex Markers papacy_hex",
		"db_id" => "tbd_11_{INDEX}",
	],
	PROTESTANT_HEX => [
		"name" => "Protestant Hexagonal Marker",
		"power" => OTHER,
		"style" => "Hex Markers protestant_hex",
		"db_id" => "tbd_12_{INDEX}",
	],
	ENGLAND_1UNIT => [
		"name" => "English 1 Military Unit",
		"power" => ENGLAND,
		"style" => "Military Units england_1unit",
		"db_id" => "england_1unit_{INDEX}",
	],
	ENGLAND_2UNIT => [
		"name" => "English 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units england_2unit",
		"db_id" => "tbd_14_{INDEX}",
	],
	ENGLAND_4UNIT => [
		"name" => "English 4 Military Unit",
		"power" => OTHER,
		"style" => "Military Units england_4unit",
		"db_id" => "tbd_15_{INDEX}",
	],
	ENGLAND_6UNIT => [
		"name" => "English 6 Military Unit",
		"power" => OTHER,
		"style" => "Military Units england_6unit",
		"db_id" => "tbd_16",
	],
	FRANCE_1UNIT => [
		"name" => "French 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units france_1unit",
		"db_id" => "tbd_17_{INDEX}",
	],
	FRANCE_2UNIT => [
		"name" => "French 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units france_2unit",
		"db_id" => "tbd_18_{INDEX}",
	],
	FRANCE_4UNIT => [
		"name" => "French 4 Military Unit",
		"power" => OTHER,
		"style" => "Military Units france_4unit",
		"db_id" => "tbd_19_{INDEX}",
	],
	FRANCE_6UNIT => [
		"name" => "French 6 Military Unit",
		"power" => OTHER,
		"style" => "Military Units france_6unit",
		"db_id" => "tbd_20",
	],
	GENOA_1UNIT => [
		"name" => "Genoese 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units genoa_1unit",
		"db_id" => "tbd_21",
	],
	GENOA_2UNIT => [
		"name" => "Genoese 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units genoa_2unit",
		"db_id" => "tbd_22",
	],
	HAPSBURG_1UNIT => [
		"name" => "Hapsburg 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units hapsburg_1unit",
		"db_id" => "tbd_23_{INDEX}",
	],
	HAPSBURG_2UNIT => [
		"name" => "Hapsburg 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units hapsburg_2unit",
		"db_id" => "tbd_24_{INDEX}",
	],
	HAPSBURG_4UNIT => [
		"name" => "Hapsburg 4 Military Unit",
		"power" => OTHER,
		"style" => "Military Units hapsburg_4unit",
		"db_id" => "tbd_25_{INDEX}",
	],
	HAPSBURG_6UNIT => [
		"name" => "Hapsburg 6 Military Unit",
		"power" => OTHER,
		"style" => "Military Units hapsburg_6unit",
		"db_id" => "tbd_26",
	],
	HUNGARY_1UNIT => [
		"name" => "Hungarian 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units hungary_1unit",
		"db_id" => "tbd_27_{INDEX}",
	],
	HUNGARY_4UNIT => [
		"name" => "Hungarian 4 Military Unit",
		"power" => OTHER,
		"style" => "Military Units hungary_4unit",
		"db_id" => "tbd_28",
	],
	INDEPENDENT_1UNIT => [
		"name" => "Independent 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units independent_1unit",
		"db_id" => "tbd_29_{INDEX}",
	],
	KNIGHTS_1UNIT => [
		"name" => "Knights of Saint John 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units knights_1unit",
		"db_id" => "tbd_30",
	],
	OTTOMAN_1UNIT => [
		"name" => "Ottoman 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units ottoman_1unit",
		"db_id" => "tbd_31_{INDEX}",
	],
	OTTOMAN_2UNIT => [
		"name" => "Ottoman 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units ottoman_2unit",
		"db_id" => "tbd_32_{INDEX}",
	],
	OTTOMAN_4UNIT => [
		"name" => "Ottoman 4 Military Unit",
		"power" => OTHER,
		"style" => "Military Units ottoman_4unit",
		"db_id" => "tbd_33_{INDEX}",
	],
	OTTOMAN_6UNIT => [
		"name" => "Ottoman 6 Military Unit",
		"power" => OTHER,
		"style" => "Military Units ottoman_6unit",
		"db_id" => "tbd_34",
	],
	PAPACY_1UNIT => [
		"name" => "Papacy 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units papacy_1unit",
		"db_id" => "tbd_35_{INDEX}",
	],
	PAPACY_2UNIT => [
		"name" => "Papacy 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units papacy_2unit",
		"db_id" => "tbd_36_{INDEX}",
	],
	PAPACY_4UNIT => [
		"name" => "Papacy 4 Military Unit",
		"power" => OTHER,
		"style" => "Military Units papacy_4unit",
		"db_id" => "tbd_37_{INDEX}",
	],
	PROTESTANT_1UNIT => [
		"name" => "Protestant 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units protestant_1unit",
		"db_id" => "tbd_38_{INDEX}",
	],
	PROTESTANT_2UNIT => [
		"name" => "Protestant 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units protestant_2unit",
		"db_id" => "tbd_39_{INDEX}",
	],
	PROTESTANT_4UNIT => [
		"name" => "Protestant 4 Military Unit",
		"power" => OTHER,
		"style" => "Military Units protestant_4unit",
		"db_id" => "tbd_40_{INDEX}",
	],
	SCOTLAND_1UNIT => [
		"name" => "Scottish 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units scotland_1unit",
		"db_id" => "tbd_41_{INDEX}",
	],
	SCOTLAND_2UNIT => [
		"name" => "Scottish 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units scotland_2unit",
		"db_id" => "tbd_42",
	],
	VENICE_1UNIT => [
		"name" => "Venetian 1 Military Unit",
		"power" => OTHER,
		"style" => "Military Units venice_1unit",
		"db_id" => "tbd_43",
	],
	VENICE_2UNIT => [
		"name" => "Venetian 2 Military Unit",
		"power" => OTHER,
		"style" => "Military Units venice_2unit",
		"db_id" => "tbd_44",
	],
	BRANDON => [
		"name" => "Brandon",
		"power" => OTHER,
		"style" => "Military Leader brandon",
		"db_id" => "brandon",
	],
	CHARLES_V => [
		"name" => "Charles V",
		"power" => OTHER,
		"style" => "Military Leader charles_v",
		"db_id" => "charles_v",
	],
	DUDLEY => [
		"name" => "Dudley",
		"power" => OTHER,
		"style" => "Military Leader dudley",
		"db_id" => "dudly",
	],
	DUKE_ALVA => [
		"name" => "Duke of Alva",
		"power" => OTHER,
		"style" => "Military Leader duke_alva",
		"db_id" => "duke_alva",
	],
	FERDINAND => [
		"name" => "Ferdinand",
		"power" => OTHER,
		"style" => "Military Leader ferdinand",
		"db_id" => "tbd_49",
	],
	FRANCIS_I => [
		"name" => "Francis I",
		"power" => OTHER,
		"style" => "Military Leader francis_i",
		"db_id" => "tbd_50",
	],
	HENRY_II => [
		"name" => "Henry II",
		"power" => OTHER,
		"style" => "Military Leader henry_ii",
		"db_id" => "tbd_51",
	],
	HENRY_VIII => [
		"name" => "Henry VIII",
		"power" => OTHER,
		"style" => "Military Leader henry_viii",
		"db_id" => "tbd_52",
	],
	IBRAHIM => [
		"name" => "Ibrahim",
		"power" => OTHER,
		"style" => "Military Leader ibrahim",
		"db_id" => "tbd_53",
	],
	JOHN_FREDERICK => [
		"name" => "John Frederick",
		"power" => OTHER,
		"style" => "Military Leader john_frederick",
		"db_id" => "tbd_54",
	],
	MAURICE_OF_SAXONY => [
		"name" => "Maurice of Saxony",
		"power" => OTHER,
		"style" => "Military Leader maurice_of_saxony",
		"db_id" => "maurice_of_saxony",
	],
	MONTMORENCY => [
		"name" => "Montmorency",
		"power" => OTHER,
		"style" => "Military Leader montmorency",
		"db_id" => "tbd_56",
	],
	PHILIP_HESSE => [
		"name" => "Philip of Hesse",
		"power" => OTHER,
		"style" => "Military Leader philip_hesse",
		"db_id" => "tbd_57",
	],
	RENEGADE => [
		"name" => "Charles Borbon, Renegade Leader",
		"power" => OTHER,
		"style" => "Military Leader renegade",
		"db_id" => "tbd_58",
	],
	SULEIMAN => [
		"name" => "Suleiman",
		"power" => OTHER,
		"style" => "Military Leader suleiman",
		"db_id" => "tbd_59",
	],
	ENGLISH_SQUADRON => [
		"name" => "English Squadron",
		"power" => OTHER,
		"style" => "Naval Units english_squadron",
		"db_id" => "tbd_60_{INDEX}",
	],
	FRENCH_SQUADRON => [
		"name" => "French Squadron",
		"power" => OTHER,
		"style" => "Naval Units french_squadron",
		"db_id" => "tbd_61_{INDEX}",
	],
	GENOESE_SQAUADRON => [
		"name" => "Genoese Squadron",
		"power" => OTHER,
		"style" => "Naval Units genoese_sqauadron",
		"db_id" => "tbd_62",
	],
	HAPSBURG_SQUADRON => [
		"name" => "Hapsburg Squadron",
		"power" => OTHER,
		"style" => "Naval Units hapsburg_squadron",
		"db_id" => "tbd_63_{INDEX}",
	],
	OTTOMAN_SQUADRON => [
		"name" => "Ottoman Squadron",
		"power" => OTHER,
		"style" => "Naval Units ottoman_squadron",
		"db_id" => "tbd_64_{INDEX}",
	],
	PAPACY_SQUADRON => [
		"name" => "Papacy Squadron",
		"power" => OTHER,
		"style" => "Naval Units papacy_squadron",
		"db_id" => "tbd_65_{INDEX}",
	],
	SCOTTISH_SQUADRON => [
		"name" => "Scottish Squadron",
		"power" => OTHER,
		"style" => "Naval Units scottish_squadron",
		"db_id" => "tbd_66",
	],
	VENETIAN_SQUADRON => [
		"name" => "Venetian Squadron",
		"power" => OTHER,
		"style" => "Naval Units venetian_squadron",
		"db_id" => "tbd_67_{INDEX}",
	],
	ANDREA_DORIA => [
		"name" => "Andrea Doria",
		"power" => OTHER,
		"style" => "Naval Leader andrea_doria",
		"db_id" => "tbd_68",
	],
	BARBAROSSA => [
		"name" => "Barbarossa",
		"power" => OTHER,
		"style" => "Naval Leader barbarossa",
		"db_id" => "tbd_69",
	],
	DRAGUT => [
		"name" => "Dragut",
		"power" => OTHER,
		"style" => "Naval Leader dragut",
		"db_id" => "tbd_70",
	],
	ALLIED => [
		"name" => "Allied",
		"power" => OTHER,
		"style" => "Diplomacy allied",
		"db_id" => "tbd_71_{INDEX}",
	],
	AT_WAR => [
		"name" => "At War",
		"power" => OTHER,
		"style" => "Diplomacy at_war",
		"db_id" => "tbd_72_{INDEX}",
	],
	UNREST => [
		"name" => "Unrest",
		"power" => OTHER,
		"style" => "Unrest unrest",
		"db_id" => "tbd_73_{INDEX}",
	],
	VP_ENGLAND => [
		"name" => "English VP's",
		"power" => OTHER,
		"style" => "VP Counter vp_england",
		"db_id" => "tbd_74",
	],
	VP_FRANCE => [
		"name" => "French VP's",
		"power" => OTHER,
		"style" => "VP Counter vp_france",
		"db_id" => "tbd_75",
	],
	VP_HAPSBURG => [
		"name" => "Hapsburg VP's",
		"power" => OTHER,
		"style" => "VP Counter vp_hapsburg",
		"db_id" => "tbd_76",
	],
	VP_OTTOMAN => [
		"name" => "Ottoman VP's",
		"power" => OTHER,
		"style" => "VP Counter vp_ottoman",
		"db_id" => "tbd_77",
	],
	VP_PAPACY => [
		"name" => "Papacy VP's",
		"power" => OTHER,
		"style" => "VP Counter vp_papacy",
		"db_id" => "tbd_78",
	],
	VP_PROTESTANT => [
		"name" => "Protestant VP's",
		"power" => OTHER,
		"style" => "VP Counter vp_protestant",
		"db_id" => "tbd_79",
	],
	LOANED_ENGLAND => [
		"name" => "Loaned to England",
		"power" => OTHER,
		"style" => "Loaned loaned_england",
		"db_id" => "tbd_80_{INDEX}",
	],
	LOANED_FRANCE => [
		"name" => "Loaned to France",
		"power" => OTHER,
		"style" => "Loaned loaned_france",
		"db_id" => "tbd_81_{INDEX}",
	],
	LOANED_HAPSBURG => [
		"name" => "Loaned to Hapsburg",
		"power" => OTHER,
		"style" => "Loaned loaned_hapsburg",
		"db_id" => "tbd_82_{INDEX}",
	],
	LOANED_OTTOMAN => [
		"name" => "Loaned to Ottoman",
		"power" => OTHER,
		"style" => "Loaned loaned_ottoman",
		"db_id" => "tbd_83_{INDEX}",
	],
	LOANED_PAPACY => [
		"name" => "Loaned to Papacy",
		"power" => OTHER,
		"style" => "Loaned loaned_papacy",
		"db_id" => "tbd_84_{INDEX}",
	],
	CALVIN_REFORMER => [
		"name" => "Calvin Reformer",
		"power" => OTHER,
		"style" => "Reformer calvin_reformer",
		"db_id" => "tbd_85",
	],
	CRANMER_REFORMER => [
		"name" => "Cranmer Reformer",
		"power" => OTHER,
		"style" => "Reformer cranmer_reformer",
		"db_id" => "tbd_86",
	],
	LUTHER_REFORMER => [
		"name" => "Luther Reformer",
		"power" => OTHER,
		"style" => "Reformer luther_reformer",
		"db_id" => "tbd_87",
	],
	ZWINGLI_REFORMER => [
		"name" => "Zwingli Reformer",
		"power" => OTHER,
		"style" => "Reformer zwingli_reformer",
		"db_id" => "tbd_88",
	],
	ALEANDER => [
		"name" => "Aleander",
		"power" => OTHER,
		"style" => "Debater aleander",
		"db_id" => "tbd_89",
	],
	CAJETAN => [
		"name" => "Cajetan",
		"power" => OTHER,
		"style" => "Debater cajetan",
		"db_id" => "tbd_90",
	],
	CAMPEGGIO => [
		"name" => "Campeggio",
		"power" => OTHER,
		"style" => "Debater campeggio",
		"db_id" => "tbd_91",
	],
	CANISIUS => [
		"name" => "Canisius",
		"power" => OTHER,
		"style" => "Debater canisius",
		"db_id" => "tbd_92",
	],
	CARAFFA => [
		"name" => "Caraffa",
		"power" => OTHER,
		"style" => "Debater caraffa",
		"db_id" => "tbd_93",
	],
	CONTARINI => [
		"name" => "Contarini",
		"power" => OTHER,
		"style" => "Debater contarini",
		"db_id" => "tbd_94",
	],
	ECK => [
		"name" => "Eck",
		"power" => OTHER,
		"style" => "Debater eck",
		"db_id" => "tbd_95",
	],
	FABER => [
		"name" => "Faber",
		"power" => OTHER,
		"style" => "Debater faber",
		"db_id" => "tbd_96",
	],
	GARDINER => [
		"name" => "Gardiner",
		"power" => OTHER,
		"style" => "Debater gardiner",
		"db_id" => "tbd_97",
	],
	LOYOLA => [
		"name" => "Loyola",
		"power" => OTHER,
		"style" => "Debater loyola",
		"db_id" => "tbd_98",
	],
	POLE => [
		"name" => "Pole",
		"power" => OTHER,
		"style" => "Debater pole",
		"db_id" => "tbd_99",
	],
	TETZEL => [
		"name" => "Tetzel",
		"power" => OTHER,
		"style" => "Debater tetzel",
		"db_id" => "tbd_100",
	],
	BUCER => [
		"name" => "Bucer",
		"power" => OTHER,
		"style" => "Debater bucer",
		"db_id" => "tbd_101",
	],
	BULLINGER => [
		"name" => "Bullinger",
		"power" => OTHER,
		"style" => "Debater bullinger",
		"db_id" => "tbd_102",
	],
	CALVIN => [
		"name" => "Calvin",
		"power" => OTHER,
		"style" => "Debater calvin",
		"db_id" => "tbd_103",
	],
	CARLSTADT => [
		"name" => "Carlstadt",
		"power" => OTHER,
		"style" => "Debater carlstadt",
		"db_id" => "tbd_104",
	],
	COP => [
		"name" => "Cop",
		"power" => OTHER,
		"style" => "Debater cop",
		"db_id" => "tbd_105",
	],
	COVERDALE => [
		"name" => "Coverdale",
		"power" => OTHER,
		"style" => "Debater coverdale",
		"db_id" => "tbd_106",
	],
	CRANMER => [
		"name" => "Cranmer",
		"power" => OTHER,
		"style" => "Debater cranmer",
		"db_id" => "tbd_107",
	],
	FAREL => [
		"name" => "Farel",
		"power" => OTHER,
		"style" => "Debater farel",
		"db_id" => "tbd_108",
	],
	KNOX => [
		"name" => "Knox",
		"power" => OTHER,
		"style" => "Debater knox",
		"db_id" => "tbd_109",
	],
	LATIMER => [
		"name" => "Latimer",
		"power" => OTHER,
		"style" => "Debater latimer",
		"db_id" => "tbd_110",
	],
	LUTHER => [
		"name" => "Luther",
		"power" => OTHER,
		"style" => "Debater luther",
		"db_id" => "tbd_111",
	],
	MELANCHTHON => [
		"name" => "Melanchthon",
		"power" => OTHER,
		"style" => "Debater melanchthon",
		"db_id" => "tbd_112",
	],
	OEKOLAMPADIUS => [
		"name" => "Oekolampadius",
		"power" => OTHER,
		"style" => "Debater oekolampadius",
		"db_id" => "tbd_113",
	],
	OLIVETAN => [
		"name" => "Olivetan",
		"power" => OTHER,
		"style" => "Debater olivetan",
		"db_id" => "tbd_114",
	],
	TYNDALE => [
		"name" => "Tyndale",
		"power" => OTHER,
		"style" => "Debater tyndale",
		"db_id" => "tbd_115",
	],
	WISHART => [
		"name" => "Wishart",
		"power" => OTHER,
		"style" => "Debater wishart",
		"db_id" => "tbd_116",
	],
	ZWINGLI => [
		"name" => "Zwingli",
		"power" => OTHER,
		"style" => "Debater zwingli",
		"db_id" => "tbd_117",
	],
	ENGLISH_EXPLORATION => [
		"name" => "English Exploration Underway",
		"power" => OTHER,
		"style" => "Exploration english_exploration",
		"db_id" => "tbd_118",
	],
	FRENCH_EXPLORATION => [
		"name" => "French Exploration Underway",
		"power" => OTHER,
		"style" => "Exploration french_exploration",
		"db_id" => "tbd_119",
	],
	HAPSBURG_EXPLORATION => [
		"name" => "Hapsburg Exploration Underway",
		"power" => OTHER,
		"style" => "Exploration hapsburg_exploration",
		"db_id" => "tbd_120",
	],
	CABOT_ENG => [
		"name" => "Cabot English",
		"power" => OTHER,
		"style" => "Explorer cabot_eng",
		"db_id" => "tbd_121",
	],
	CABOT_FRE => [
		"name" => "Cabot French",
		"power" => OTHER,
		"style" => "Explorer cabot_fre",
		"db_id" => "tbd_122",
	],
	CABOT_HAP => [
		"name" => "Cabot Hapsburg",
		"power" => OTHER,
		"style" => "Explorer cabot_hap",
		"db_id" => "tbd_123",
	],
	CARTIER => [
		"name" => "Cartier",
		"power" => OTHER,
		"style" => "Explorer cartier",
		"db_id" => "tbd_124",
	],
	CHANCELLOR => [
		"name" => "Chancellor",
		"power" => OTHER,
		"style" => "Explorer chancellor",
		"db_id" => "tbd_125",
	],
	DE_VACA => [
		"name" => "De Vaca",
		"power" => OTHER,
		"style" => "Explorer de_vaca",
		"db_id" => "tbd_126",
	],
	DE_SOTO => [
		"name" => "De Soto",
		"power" => OTHER,
		"style" => "Explorer de_soto",
		"db_id" => "tbd_127",
	],
	LEON => [
		"name" => "Leon",
		"power" => OTHER,
		"style" => "Explorer leon",
		"db_id" => "tbd_128",
	],
	MAGELLAN => [
		"name" => "Magellan",
		"power" => OTHER,
		"style" => "Explorer magellan",
		"db_id" => "tbd_129",
	],
	NARVAEZ => [
		"name" => "Narvaez",
		"power" => OTHER,
		"style" => "Explorer narvaez",
		"db_id" => "tbd_130",
	],
	ORELLANA => [
		"name" => "Orellana",
		"power" => OTHER,
		"style" => "Explorer orellana",
		"db_id" => "tbd_131",
	],
	ROBERVAL => [
		"name" => "Roberval",
		"power" => OTHER,
		"style" => "Explorer roberval",
		"db_id" => "tbd_132",
	],
	RUT => [
		"name" => "Rut",
		"power" => OTHER,
		"style" => "Explorer rut",
		"db_id" => "tbd_133",
	],
	VERRAZANO => [
		"name" => "Verrazano",
		"power" => OTHER,
		"style" => "Explorer verrazano",
		"db_id" => "tbd_134",
	],
	WILLOUGHBY => [
		"name" => "Willoughby",
		"power" => OTHER,
		"style" => "Explorer willoughby",
		"db_id" => "tbd_135",
	],
	CHARLESBOURG => [
		"name" => "Charlesbourg",
		"power" => OTHER,
		"style" => "Colony charlesbourg",
		"db_id" => "tbd_136",
	],
	CUBA => [
		"name" => "Cuba",
		"power" => OTHER,
		"style" => "Colony cuba",
		"db_id" => "tbd_137",
	],
	HISPANIOLA => [
		"name" => "Hispaniola",
		"power" => OTHER,
		"style" => "Colony hispaniola",
		"db_id" => "tbd_138",
	],
	JAMESTOWN => [
		"name" => "Jamestown",
		"power" => OTHER,
		"style" => "Colony jamestown",
		"db_id" => "tbd_139",
	],
	MONTREAL => [
		"name" => "Montreal",
		"power" => OTHER,
		"style" => "Colony montreal",
		"db_id" => "tbd_140",
	],
	POTOSI => [
		"name" => "Potosi Silver Mines",
		"power" => OTHER,
		"style" => "Colony potosi",
		"db_id" => "tbd_141",
	],
	PUERTO_RICO => [
		"name" => "Puerto Rico",
		"power" => OTHER,
		"style" => "Colony puerto_rico",
		"db_id" => "tbd_142",
	],
	ROANOKE => [
		"name" => "Roanoke",
		"power" => OTHER,
		"style" => "Colony roanoke",
		"db_id" => "tbd_143",
	],
	HAPSBURG_CONQUEST => [
		"name" => "Hapsburg Conquest Underway",
		"power" => OTHER,
		"style" => "Conquest hapsburg_conquest",
		"db_id" => "tbd_144",
	],
	ENGLISH_CONQUEST => [
		"name" => "English Conquest",
		"power" => OTHER,
		"style" => "Conquistador english_conquest",
		"db_id" => "tbd_145_{INDEX}",
	],
	FRENCH_CONQUEST => [
		"name" => "French Conquest",
		"power" => OTHER,
		"style" => "Conquistador french_conquest",
		"db_id" => "tbd_146_{INDEX}",
	],
	CORDOVA => [
		"name" => "Cordova",
		"power" => OTHER,
		"style" => "Conquistador cordova",
		"db_id" => "tbd_147",
	],
	CORONADO => [
		"name" => "Coronado",
		"power" => OTHER,
		"style" => "Conquistador coronado",
		"db_id" => "tbd_148",
	],
	CORTEZ => [
		"name" => "Cortez",
		"power" => OTHER,
		"style" => "Conquistador cortez",
		"db_id" => "tbd_149",
	],
	MONTEJO => [
		"name" => "Montejo",
		"power" => OTHER,
		"style" => "Conquistador montejo",
		"db_id" => "tbd_150",
	],
	PIZARRO => [
		"name" => "Pizarro",
		"power" => OTHER,
		"style" => "Conquistador pizarro",
		"db_id" => "tbd_151",
	],
	ENGLISH_PROT_COUNTER => [
		"name" => "English Home Protestant Spaces",
		"power" => OTHER,
		"style" => "Religious counter english_prot_counter",
		"db_id" => "tbd_152",
	],
	PROTESTANT_SPACES => [
		"name" => "Protestant Spaces",
		"power" => OTHER,
		"style" => "Religious counter protestant_spaces",
		"db_id" => "tbd_153",
	],
	TURN => [
		"name" => "Turn",
		"power" => OTHER,
		"style" => "Turn counter turn",
		"db_id" => "tbd_154",
	],
	MINUS_ONE_CARD => [
		"name" => "-1 Card",
		"power" => OTHER,
		"style" => "Cards Marker minus_one_card",
		"db_id" => "tbd_155_{INDEX}",
	],
	GREAT_LAKES_1VP => [
		"name" => "Great Lakes 1 VP",
		"power" => VP,
		"style" => "VP marker great_lakes_1vp",
		"db_id" => "tbd_156",
	],
	MISSISSIPPI_RIVER_1VP => [
		"name" => "Mississippi River 1 VP",
		"power" => OTHER,
		"style" => "VP marker mississippi_river_1vp",
		"db_id" => "tbd_157",
	],
	ST_LAWRENCE_RIVER_1VP => [
		"name" => "Saint Lawrence River 1 VP",
		"power" => OTHER,
		"style" => "VP marker st_lawrence_river_1vp",
		"db_id" => "tbd_158",
	],
	AMAZON_RIVER_2VP => [
		"name" => "Amazon River 2 VP's",
		"power" => OTHER,
		"style" => "VP marker amazon_river_2vp",
		"db_id" => "tbd_159",
	],
	PACIFIC_STRAIT_1VP => [
		"name" => "Pacific Strait 1 VP",
		"power" => OTHER,
		"style" => "VP marker pacific_strait_1vp",
		"db_id" => "tbd_160",
	],
	CIRCUMNAVIGATION_3VP => [
		"name" => "Circumnavigation 3 VP",
		"power" => OTHER,
		"style" => "VP marker circumnavigation_3vp",
		"db_id" => "tbd_161",
	],
	MAYA_1VP => [
		"name" => "Maya 1 VP",
		"power" => OTHER,
		"style" => "VP marker maya_1vp",
		"db_id" => "tbd_162",
	],
	AZTECS_2VP => [
		"name" => "Aztecs 2 VP's",
		"power" => OTHER,
		"style" => "VP marker aztecs_2vp",
		"db_id" => "tbd_163",
	],
	INCA_2VP => [
		"name" => "Inca 2 VP's",
		"power" => OTHER,
		"style" => "VP marker inca_2vp",
		"db_id" => "inca_2vp",
	],
	BIBLE_ENG_1VP => [
		"name" => "Bible English Translation 1 VP",
		"power" => OTHER,
		"style" => "VP marker bible_eng_1vp",
		"db_id" => "bible_eng_1vp",
	],
	BIBLE_FRE_1VP => [
		"name" => "Bible French Translation 1 VP",
		"power" => OTHER,
		"style" => "VP marker bible_fre_1vp",
		"db_id" => "bible_fre_1vp",
	],
	BIBLE_GER_1VP => [
		"name" => "Bible German Translation 1 VP",
		"power" => OTHER,
		"style" => "VP marker bible_ger_1vp",
		"db_id" => "bible_ger_1vp",
	],
	CHATEAUX_VP => [
		"name" => "Chateaux VP's",
		"power" => OTHER,
		"style" => "VP marker chateaux_vp",
		"db_id" => "tbd_168",
	],
	PIRACY_VP => [
		"name" => "Piracy VP's",
		"power" => OTHER,
		"style" => "VP marker piracy_vp",
		"db_id" => "tbd_169",
	],
	ST_PETERS_VP => [
		"name" => "Saint Peter's VP's",
		"power" => OTHER,
		"style" => "VP marker st_peters_vp",
		"db_id" => "tbd_170",
	],
	COPERNICUS_1VP => [
		"name" => "Copernicus 1 VP",
		"power" => OTHER,
		"style" => "VP marker copernicus_1vp",
		"db_id" => "tbd_171",
	],
	COPERNICUS_2VP => [
		"name" => "Copernicus 2 VP's",
		"power" => OTHER,
		"style" => "VP marker copernicus_2vp",
		"db_id" => "tbd_172",
	],
	EDWARD_5VP => [
		"name" => "Edward VI 5 VP's",
		"power" => OTHER,
		"style" => "VP marker edward_5vp",
		"db_id" => "tbd_173",
	],
	ELIZABETH_2VP => [
		"name" => "Elizabeth 2 VP's",
		"power" => OTHER,
		"style" => "VP marker elizabeth_2vp",
		"db_id" => "tbd_174",
	],
	GONZAGA_1VP => [
		"name" => "Giulia Gonzaga 1 VP",
		"power" => OTHER,
		"style" => "VP marker gonzaga_1vp",
		"db_id" => "tbd_175",
	],
	SERVETUS_1VP => [
		"name" => "Servetus 1 VP",
		"power" => OTHER,
		"style" => "VP marker servetus_1vp",
		"db_id" => "tbd_176",
	],
	MASTER_OF_ITALY_1VP => [
		"name" => "Master of Italy 1 VP",
		"power" => OTHER,
		"style" => "VP marker master_of_italy_1vp",
		"db_id" => "tbd_177_{INDEX}",
	],
	MASTER_OF_ITALY_2VP => [
		"name" => "Master of Italy 2 VP's",
		"power" => OTHER,
		"style" => "VP marker master_of_italy_2vp",
		"db_id" => "tbd_178_{INDEX}",
	],
	WAR_WINNER_1VP => [
		"name" => "War Winner 1 VP",
		"power" => OTHER,
		"style" => "VP marker war_winner_1vp",
		"db_id" => "tbd_179_{INDEX}",
	],
	WAR_WINNER_2VP => [
		"name" => "War Winner 2 VP's",
		"power" => OTHER,
		"style" => "VP marker war_winner_2vp",
		"db_id" => "tbd_180_{INDEX}",
	],
	PHONYSCOTLAND_MINUS1 => [
		"name" => "Phony War in Scotland -1 VP's",
		"power" => OTHER,
		"style" => "VP marker phonyscotland_minus1",
		"db_id" => "tbd_181",
	],
	PHONYVENICE_MINUS1 => [
		"name" => "Phony War in Venice - 1 VP's",
		"power" => OTHER,
		"style" => "VP marker phonyvenice_minus1",
		"db_id" => "tbd_182",
	],
	ANNE_BOLEYN => [
		"name" => "Anne Boleyn",
		"power" => OTHER,
		"style" => "Wife anne_boleyn",
		"db_id" => "tbd_183",
	],
	ANNE_CLEVES => [
		"name" => "Anne of Cleves",
		"power" => OTHER,
		"style" => "Wife anne_cleves",
		"db_id" => "tbd_184",
	],
	CATHERINE_ARAGON => [
		"name" => "Catherine of Aragon",
		"power" => OTHER,
		"style" => "Wife catherine_aragon",
		"db_id" => "tbd_185",
	],
	JANE_SEYMOUR => [
		"name" => "Jane Seymour",
		"power" => OTHER,
		"style" => "Wife jane_seymour",
		"db_id" => "tbd_186",
	],
	KATHERINE_PARR => [
		"name" => "Katherine Parr",
		"power" => OTHER,
		"style" => "Wife katherine_parr",
		"db_id" => "tbd_187",
	],
	KATHRYN_HOWARD => [
		"name" => "Kathryn Howard",
		"power" => OTHER,
		"style" => "Wife kathryn_howard",
		"db_id" => "tbd_188",
	],
	HENRY_MARITAL_STATUS => [
		"name" => "Henry Marital Status",
		"power" => OTHER,
		"style" => "Wives Status henry_marital_status",
		"db_id" => "tbd_189",
	],
	BIBLE_ENGLISH => [
		"name" => "Bible English",
		"power" => OTHER,
		"style" => "Translation bible_english",
		"db_id" => "tbd_190",
	],
	BIBLE_FRENCH => [
		"name" => "Bible French",
		"power" => OTHER,
		"style" => "Translation bible_french",
		"db_id" => "tbd_191",
	],
	BIBLE_GERMAN => [
		"name" => "Bible German",
		"power" => OTHER,
		"style" => "Translation bible_german",
		"db_id" => "tbd_192",
	],
	NEW_TESTAMENT_ENGLISH => [
		"name" => "New Testament English",
		"power" => OTHER,
		"style" => "Translation new_testament_english",
		"db_id" => "tbd_193",
	],
	NEW_TESTAMENT_FRENCH => [
		"name" => "New Testament French",
		"power" => OTHER,
		"style" => "Translation new_testament_french",
		"db_id" => "tbd_194",
	],
	NEW_TESTAMENT_GERMAN => [
		"name" => "New Testament German",
		"power" => OTHER,
		"style" => "Translation new_testament_german",
		"db_id" => "tbd_195",
	],
	ST_PETERS_CP => [
		"name" => "Saint Peter's CP Status",
		"power" => OTHER,
		"style" => "Saint Peter's st_peters_cp",
		"db_id" => "tbd_196",
	],
	AUGSBURG_CONFESSION => [
		"name" => "Augsburg Confession Active",
		"power" => OTHER,
		"style" => "Event reminder augsburg_confession",
		"db_id" => "tbd_197",
	],
	PRINTING_PRESS => [
		"name" => "Printing Press Active",
		"power" => OTHER,
		"style" => "Event reminder printing_press",
		"db_id" => "tbd_198",
	],
	COLONIAL_GOVERNOR => [
		"name" => "Colonial Governor",
		"power" => OTHER,
		"style" => "Event reminder colonial_governor",
		"db_id" => "tbd_199_{INDEX}",
	],
	GALLEONS => [
		"name" => "Galleons",
		"power" => OTHER,
		"style" => "Event reminder galleons",
		"db_id" => "tbd_200_{INDEX}",
	],
	PLANTATIONS => [
		"name" => "Plantations",
		"power" => OTHER,
		"style" => "Event reminder plantations",
		"db_id" => "tbd_201_{INDEX}",
	],
	PIRACY => [
		"name" => "Piracy Marker",
		"power" => OTHER,
		"style" => "Event reminder piracy",
		"db_id" => "tbd_202_{INDEX}",
	],
	NATIVE_UPRISING => [
		"name" => "Native Uprising",
		"power" => OTHER,
		"style" => "Event reminder native_uprising",
		"db_id" => "tbd_203_{INDEX}",
	],
	RAIDER_ENGLISH => [
		"name" => "English Huguenot Raider",
		"power" => OTHER,
		"style" => "Event reminder raider_english",
		"db_id" => "tbd_204",
	],
	RAIDER_FRENCH => [
		"name" => "French Huguenot Raider",
		"power" => OTHER,
		"style" => "Event reminder raider_french",
		"db_id" => "tbd_205",
	],
	RAIDER_PROTESTANT => [
		"name" => "Protestant Huguenot Raider",
		"power" => OTHER,
		"style" => "Event reminder raider_protestant",
		"db_id" => "tbd_206",
	],
	MERCATOR_MAP => [
		"name" => "Mercator's Map",
		"power" => OTHER,
		"style" => "Event reminder mercator_map",
		"db_id" => "tbd_207",
	],
	SMALLPOX => [
		"name" => "Smallpox",
		"power" => OTHER,
		"style" => "Event reminder smallpox",
		"db_id" => "tbd_208",
	],
	THOMAS_MORE => [
		"name" => "Thomas More",
		"power" => OTHER,
		"style" => "Event reminder thomas_more",
		"db_id" => "tbd_209",
	],
	WARTBURG => [
		"name" => "Wartburg",
		"power" => OTHER,
		"style" => "Event reminder wartburg",
		"db_id" => "tbd_210",
	],
	EXCOMMUNICATED => [
		"name" => "Excommunicated",
		"power" => OTHER,
		"style" => "Excommunion excommunicated",
		"db_id" => "tbd_211_{INDEX}",
	],
	FORTRESS => [
		"name" => "Fortress",
		"power" => OTHER,
		"style" => "Fortress fortress",
		"db_id" => "tbd_212_{INDEX}",
	],
	PIRATE_HAVEN => [
		"name" => "Pirate Haven",
		"power" => OTHER,
		"style" => "Pirate Haven pirate_haven",
		"db_id" => "tbd_213_{INDEX}",
	],
	JESUIT_UNIVERSITY => [
		"name" => "Jesuit University",
		"power" => OTHER,
		"style" => "University jesuit_university",
		"db_id" => "tbd_214_{INDEX}",
	],
];

$this->starting_token_counts = [
	ENGLAND_KEY => 9,
	FRANCE_KEY => 11,
	HAPSBURG_KEY => 14,
	OTTOMAN_KEY => 11,
	INDEPENDENT_KEY => 18,
	PAPACY_KEY => 7,
	ENGLAND_HEX => 100,
	FRANCE_HEX => 100,
	HAPSBURG_HEX => 100,
	INDEPENDENT_HEX => 31,
	OTTOMAN_HEX => 100,
	PAPACY_HEX => 100,
	PROTESTANT_HEX => 100,
	ENGLAND_1UNIT => 9,
	ENGLAND_2UNIT => 5,
	ENGLAND_4UNIT => 2,
	ENGLAND_6UNIT => 1,
	FRANCE_1UNIT => 10,
	FRANCE_2UNIT => 4,
	FRANCE_4UNIT => 3,
	FRANCE_6UNIT => 1,
	GENOA_1UNIT => 1,
	GENOA_2UNIT => 1,
	HAPSBURG_1UNIT => 12,
	HAPSBURG_2UNIT => 7,
	HAPSBURG_4UNIT => 4,
	HAPSBURG_6UNIT => 1,
	HUNGARY_1UNIT => 3,
	HUNGARY_4UNIT => 1,
	INDEPENDENT_1UNIT => 6,
	KNIGHTS_1UNIT => 1,
	OTTOMAN_1UNIT => 11,
	OTTOMAN_2UNIT => 7,
	OTTOMAN_4UNIT => 4,
	OTTOMAN_6UNIT => 1,
	PAPACY_1UNIT => 7,
	PAPACY_2UNIT => 4,
	PAPACY_4UNIT => 2,
	PROTESTANT_1UNIT => 8,
	PROTESTANT_2UNIT => 5,
	PROTESTANT_4UNIT => 2,
	SCOTLAND_1UNIT => 2,
	SCOTLAND_2UNIT => 1,
	VENICE_1UNIT => 1,
	VENICE_2UNIT => 1,
	BRANDON => 1,
	CHARLES_V => 1,
	DUDLEY => 1,
	DUKE_ALVA => 1,
	FERDINAND => 1,
	FRANCIS_I => 1,
	HENRY_II => 1,
	HENRY_VIII => 1,
	IBRAHIM => 1,
	JOHN_FREDERICK => 1,
	MAURICE_OF_SAXONY => 1,
	MONTMORENCY => 1,
	PHILIP_HESSE => 1,
	RENEGADE => 1,
	SULEIMAN => 1,
	ENGLISH_SQUADRON => 5,
	FRENCH_SQUADRON => 5,
	GENOESE_SQAUADRON => 1,
	HAPSBURG_SQUADRON => 6,
	OTTOMAN_SQUADRON => 9,
	PAPACY_SQUADRON => 2,
	SCOTTISH_SQUADRON => 1,
	VENETIAN_SQUADRON => 4,
	ANDREA_DORIA => 1,
	BARBAROSSA => 1,
	DRAGUT => 1,
	ALLIED => 18,
	AT_WAR => 30,
	UNREST => 100,
	VP_ENGLAND => 1,
	VP_FRANCE => 1,
	VP_HAPSBURG => 1,
	VP_OTTOMAN => 1,
	VP_PAPACY => 1,
	VP_PROTESTANT => 1,
	LOANED_ENGLAND => 28,
	LOANED_FRANCE => 28,
	LOANED_HAPSBURG => 27,
	LOANED_OTTOMAN => 22,
	LOANED_PAPACY => 22,
	CALVIN_REFORMER => 1,
	CRANMER_REFORMER => 1,
	LUTHER_REFORMER => 1,
	ZWINGLI_REFORMER => 1,
	ALEANDER => 1,
	CAJETAN => 1,
	CAMPEGGIO => 1,
	CANISIUS => 1,
	CARAFFA => 1,
	CONTARINI => 1,
	ECK => 1,
	FABER => 1,
	GARDINER => 1,
	LOYOLA => 1,
	POLE => 1,
	TETZEL => 1,
	BUCER => 1,
	BULLINGER => 1,
	CALVIN => 1,
	CARLSTADT => 1,
	COP => 1,
	COVERDALE => 1,
	CRANMER => 1,
	FAREL => 1,
	KNOX => 1,
	LATIMER => 1,
	LUTHER => 1,
	MELANCHTHON => 1,
	OEKOLAMPADIUS => 1,
	OLIVETAN => 1,
	TYNDALE => 1,
	WISHART => 1,
	ZWINGLI => 1,
	ENGLISH_EXPLORATION => 1,
	FRENCH_EXPLORATION => 1,
	HAPSBURG_EXPLORATION => 1,
	CABOT_ENG => 1,
	CABOT_FRE => 1,
	CABOT_HAP => 1,
	CARTIER => 1,
	CHANCELLOR => 1,
	DE_VACA => 1,
	DE_SOTO => 1,
	LEON => 1,
	MAGELLAN => 1,
	NARVAEZ => 1,
	ORELLANA => 1,
	ROBERVAL => 1,
	RUT => 1,
	VERRAZANO => 1,
	WILLOUGHBY => 1,
	CHARLESBOURG => 1,
	CUBA => 1,
	HISPANIOLA => 1,
	JAMESTOWN => 1,
	MONTREAL => 1,
	POTOSI => 1,
	PUERTO_RICO => 1,
	ROANOKE => 1,
	HAPSBURG_CONQUEST => 1,
	ENGLISH_CONQUEST => 2,
	FRENCH_CONQUEST => 2,
	CORDOVA => 1,
	CORONADO => 1,
	CORTEZ => 1,
	MONTEJO => 1,
	PIZARRO => 1,
	ENGLISH_PROT_COUNTER => 1,
	PROTESTANT_SPACES => 1,
	TURN => 1,
	MINUS_ONE_CARD => 7,
	GREAT_LAKES_1VP => 1,
	MISSISSIPPI_RIVER_1VP => 1,
	ST_LAWRENCE_RIVER_1VP => 1,
	AMAZON_RIVER_2VP => 1,
	PACIFIC_STRAIT_1VP => 1,
	CIRCUMNAVIGATION_3VP => 1,
	MAYA_1VP => 1,
	AZTECS_2VP => 1,
	INCA_2VP => 1,
	BIBLE_ENG_1VP => 1,
	BIBLE_FRE_1VP => 1,
	BIBLE_GER_1VP => 1,
	CHATEAUX_VP => 1,
	PIRACY_VP => 1,
	ST_PETERS_VP => 1,
	COPERNICUS_1VP => 1,
	COPERNICUS_2VP => 1,
	EDWARD_5VP => 1,
	ELIZABETH_2VP => 1,
	GONZAGA_1VP => 1,
	SERVETUS_1VP => 1,
	MASTER_OF_ITALY_1VP => 9,
	MASTER_OF_ITALY_2VP => 9,
	WAR_WINNER_1VP => 100,
	WAR_WINNER_2VP => 100,
	PHONYSCOTLAND_MINUS1 => 1,
	PHONYVENICE_MINUS1 => 1,
	ANNE_BOLEYN => 1,
	ANNE_CLEVES => 1,
	CATHERINE_ARAGON => 1,
	JANE_SEYMOUR => 1,
	KATHERINE_PARR => 1,
	KATHRYN_HOWARD => 1,
	HENRY_MARITAL_STATUS => 1,
	BIBLE_ENGLISH => 1,
	BIBLE_FRENCH => 1,
	BIBLE_GERMAN => 1,
	NEW_TESTAMENT_ENGLISH => 1,
	NEW_TESTAMENT_FRENCH => 1,
	NEW_TESTAMENT_GERMAN => 1,
	ST_PETERS_CP => 1,
	AUGSBURG_CONFESSION => 1,
	PRINTING_PRESS => 1,
	COLONIAL_GOVERNOR => 3,
	GALLEONS => 3,
	PLANTATIONS => 3,
	PIRACY => 4,
	NATIVE_UPRISING => 3,
	RAIDER_ENGLISH => 1,
	RAIDER_FRENCH => 1,
	RAIDER_PROTESTANT => 1,
	MERCATOR_MAP => 1,
	SMALLPOX => 1,
	THOMAS_MORE => 1,
	WARTBURG => 1,
	EXCOMMUNICATED => 7,
	FORTRESS => 9,
	PIRATE_HAVEN => 2,
	JESUIT_UNIVERSITY => 53,
];

$this->board_locations = [
	TURN_TRACK_1 => [
		"x" => 3862,
		"y" => 3095,
	],
];

$this->cards = [
	CARD_JANISSARIES => [
		"class_name" => "Janissaries",
		"name" => "Janissaries",
		"type" => HOME_CARD,
		"cp" => 5,
	],
	CARD_HOLY_ROMAN_EMPEROR => [
		"class_name" => "HolyRomanEmperor",
		"name" => "Holy Roman Emperor",
		"type" => HOME_CARD,
		"cp" => 5,
	],
	CARD_SIX_WIVES_OF_HENRY_VIII => [
		"class_name" => "SixWives",
		"name" => "Six Wives of Henry VIII",
		"type" => HOME_CARD,
		"cp" => 5,
	],
	CARD_PATRON_OF_THE_ARTS => [
		"class_name" => "PatronArts",
		"name" => "Patron of the Arts",
		"type" => HOME_CARD,
		"cp" => 5,
	],
	CARD_PAPAL_BULL => [
		"class_name" => "PapalBull",
		"name" => "Papal Bull",
		"type" => HOME_CARD,
		"cp" => 4,
	],
	CARD_LEIPZIG_DEBATE => [
		"class_name" => "LeipzigDebate",
		"name" => "Leipzig Debate",
		"type" => HOME_CARD,
		"cp" => 3,
	],
	CARD_HERE_I_STAND => [
		"class_name" => "HereIStand",
		"name" => "Here I Stand",
		"type" => HOME_CARD,
		"cp" => 5,
	],
	CARD_LUTHER_95_THESES => [
		"class_name" => "LutherTheses",
		"name" => "Luther's 95 Theses",
		"type" => MANDATORY_CARD,
		"cp" => 0,
		"remove" => "Yes",
		"scenario" => 1517,
	],
];