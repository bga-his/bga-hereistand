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
			PARIS,
			ST_QUENTIN,
			BRUSSELS,
			METZ,
			DIJON,
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
			PARIS,
			BOULOGNE,
			BRUSSELS,
			ST_DIZIER,
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
			PARIS,
			ST_QUENTIN,
			ROUEN,
			CALAIS,
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
			PARIS,
			TOURS,
			DIJON,
			LYON,
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
			LYON,
			MARSEILLE,
			TOULOUSE,
		],
		"passes" => [
			BARCELONA,
		],
	],
	TOULOUSE => [
		"x" => 2110,
		"y" => 1862,
		"name" => "Toulouse",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			BORDEAUX,
			AVIGNON,
		],
		"passes" => [
			BARCELONA,
		],
	],
	LIMOGES => [
		"x" => 2094,
		"y" => 1522,
		"name" => "Limoges",
		"home_power" => FRANCE,
		"language" => FRENCH,
		"connections" => [
			LYON,
			TOURS,
			BORDEAUX,
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
			ROUEN,
			ORLEANS,
			BORDEAUX,
			LIMOGES,
			NANTES,
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
			ROUEN,
			TOURS,
			BORDEAUX,
			BREST,
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
			NANTES,
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
			CALAIS,
			ANTWERP,
			LIEGE,
			ST_QUENTIN,
			ST_DIZIER,
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
			METZ,
			STRASBURG,
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
			BOULOGNE,
			ANTWERP,
			BRUSSELS,
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
			TRIER,
			BESANCON,
			LIEGE,
			STRASBURG,
			ST_DIZIER,
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
			TRIER,
			ANTWERP,
			BRUSSELS,
			METZ,
			COLOGNE,
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
			MARSEILLE,
		],
		"passes" => [
			GENOA,
		],
	],
	ROME => [
		"x" => 3241,
		"y" => 2045,
		"name" => "Rome",
		"home_power" => PAPACY,
		"language" => ITALIAN,
		"connections" => [
			NAPLES,
			SIENA,
			ANCONA,
			CERIGNOLA,
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
			ANCONA,
			VENICE,
			MODENA,
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
			RAVENNA,
			ROME,
			CERIGNOLA,
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
			TARANTO,
			ROME,
			MESSINA,
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
			VENICE,
			GRAZ,
			AGRAM,
			ZARA,
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
			ANCONA,
			ROME,
			TARANTO,
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
			NAPLES,
			CERIGNOLA,
			MESSINA,
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
			NAPLES,
			PALERMO,
			TARANTO,
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
			MESSINA,
		],
		"passes" => [

		],
	],
	GENOA => [
		"x" => 2844,
		"y" => 1750,
		"name" => "Genoa",
		"home_power" => MINOR_GENOA,
		"language" => ITALIAN,
		"connections" => [
			TURIN,
			PAVIA,
			FLORENCE,
			SIENA,
		],
		"passes" => [
			NICE,
		],
	],
	VENICE => [
		"x" => 3205,
		"y" => 1524,
		"name" => "Venice",
		"home_power" => MINOR_VENICE,
		"language" => ITALIAN,
		"connections" => [
			TRENT,
			MODENA,
			RAVENNA,
			TRIESTE,
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
			TRENT,
			MODENA,
			PAVIA,
			TURIN,
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
			MODENA,
			GENOA,
			SIENA,
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
			PAVIA,
			GENOA,
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
			MODENA,
			VENICE,
			MILAN,
		],
		"passes" => [
			INNSBRUCK,
		],
	],
	MODENA => [
		"x" => 3069,
		"y" => 1613,
		"name" => "Modena",
		"home_power" => INDEPENDENT,
		"language" => ITALIAN,
		"connections" => [
			MILAN,
			VENICE,
			RAVENNA,
			PAVIA,
			FLORENCE,
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
			MILAN,
			MODENA,
			GENOA,
			TURIN,
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
			FLORENCE,
			ROME,
			GENOA,
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
			MADRID,
			BILBAO,
			CORUNNA,
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
			BILBAO,
			ZARAGOZA,
		],
		"passes" => [
			BORDEAUX,
		],
	],
	BARCELONA => [
		"x" => 2227,
		"y" => 2186,
		"name" => "Barcelona",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [
			ZARAGOZA,
			VALENCIA,
		],
		"passes" => [
			TOULOUSE,
		],
	],
	SEVILLE => [
		"x" => 1442,
		"y" => 2766,
		"name" => "Seville",
		"home_power" => HAPSBURG,
		"language" => SPANISH,
		"connections" => [
			CORDOBA,
			GIBRALTAR,
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
			SEVILLE,
			GRANADA,
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
			BILBAO,
			VALLADOLID,
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
			CORUNNA,
			VALLADOLID,
			NAVARRE,
			ZARAGOZA,
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
			BILBAO,
			MADRID,
			NAVARRE,
			BARCELONA,
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
			VALLADOLID,
			ZARAGOZA,
			VALENCIA,
			CORDOBA,
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
			MADRID,
			BARCELONA,
			CARTAGENA,
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
			SEVILLE,
			GRANADA,
			MADRID,
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
			CORDOBA,
			GIBRALTAR,
			CARTAGENA,
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
			VALENCIA,
			GRANADA,
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
			EDIRNE,
			VARNA,
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
			ISTANBUL,
			VARNA,
			SOFIA,
			SALONIKA,
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
			EDIRNE,
			LARISSA,
		],
		"passes" => [
			SOFIA,
		],
	],
	ATHENS => [
		"x" => 4404,
		"y" => 2470,
		"name" => "Athens",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [
			LARISSA,
			LEPANTO,
			CORON,
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
			DURAZZO,
			RAGUSA,
		],
		"passes" => [
			NEZH,
		],
	],
	VARNA => [
		"x" => 4772,
		"y" => 1747,
		"name" => "Varna",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [
			BUCHAREST,
			EDIRNE,
			ISTANBUL,
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
			NICOPOLIS,
			VARNA,
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
			BUCHAREST,
			BELGRADE,
		],
		"passes" => [
			SOFIA,
		],
	],
	SOFIA => [
		"x" => 4392,
		"y" => 1890,
		"name" => "Sofia",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [
			EDIRNE,
			NEZH,
		],
		"passes" => [
			NICOPOLIS,
		],
	],
	LARISSA => [
		"x" => 4249,
		"y" => 2307,
		"name" => "Larissa",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [
			SALONIKA,
			LEPANTO,
			ATHENS,
		],
		"passes" => [
			DURAZZO,
		],
	],
	LEPANTO => [
		"x" => 4177,
		"y" => 2446,
		"name" => "Lepanto",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [
			LARISSA,
			ATHENS,
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
			ATHENS,
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
			BELGRADE,
			SOFIA,
		],
		"passes" => [
			SCUTARI,
		],
	],
	DURAZZO => [
		"x" => 3963,
		"y" => 2164,
		"name" => "Durazzo",
		"home_power" => OTTOMAN,
		"language" => OTHER,
		"connections" => [
			SCUTARI,
		],
		"passes" => [
			LARISSA,
		],
	],
	ALGIERS => [
		"x" => 2394,
		"y" => 2779,
		"name" => "Algiers",
		"home_power" => INDEPENDENT,
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
			NICOPOLIS,
			NEZH,
			SZEGEDIN,
			MOHACS,
			AGRAM,
		],
		"passes" => [
			RAGUSA,
		],
	],
	BUDA => [
		"x" => 3865,
		"y" => 1232,
		"name" => "Buda",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [
			SZEGEDIN,
			MOHACS,
			PRESSBURG,
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
			BRUNN,
			LINZ,
			WITTENBERG,
			LEIPZIG,
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
			BUDA,
			BELGRADE,
		],
		"passes" => [
			NICOPOLIS,
		],
	],
	PRESSBURG => [
		"x" => 3731,
		"y" => 1207,
		"name" => "Pressburg",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [
			BUDA,
			VIENNA,
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
			BUDA,
			BELGRADE,
			GRAZ,
			AGRAM,
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
			TRIESTE,
			GRAZ,
			MOHACS,
			BELGRADE,
		],
		"passes" => [
			ZARA,
		],
	],
	BRUNN => [
		"x" => 3645,
		"y" => 966,
		"name" => "Brunn",
		"home_power" => MINOR_HUNGARY,
		"language" => OTHER,
		"connections" => [
			BRESLAU,
			PRAGUE,
			VIENNA,
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
			BRUNN,
			WITTENBERG,
			BRANDENBURG,
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
			CALAIS,
			LIEGE,
			BRUSSELS,
			AMSTERDAM,
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
			ANTWERP,
			MUNSTER,
		],
		"passes" => [

		],
	],
	CANDIA => [
		"x" => 4603,
		"y" => 2791,
		"name" => "Candia",
		"home_power" => VENICE,
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
		"home_power" => VENICE,
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
		"home_power" => VENICE,
		"language" => OTHER,
		"connections" => [
			TRIESTE,
			RAGUSA,
		],
		"passes" => [
			AGRAM,
		],
	],
	BASTIA => [
		"x" => 2903,
		"y" => 1951,
		"name" => "Bastia",
		"home_power" => GENOA,
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
			ZARA,
			SCUTARI,
		],
		"passes" => [
			BELGRADE,
		],
	],
];

$this->tokens = [
	ENGLAND_KEY => [
		"name" => "English Key",
		"power" => ENGLAND,
		"style" => "Control Keys Catholic england_key",
		"db_id" => "england_scm_{INDEX}",
		"types" => [
			CONTROL,
			KEYS,
			CATHOLIC,
		],
		BACK => [
			"name" => "English Key Protestant",
			"style" => "Control Keys Reformed england_key",
			"types" => [
				CONTROL,
				KEYS,
				REFORMED,
			],
		],
	],
	FRANCE_KEY => [
		"name" => "French Key",
		"power" => FRANCE,
		"style" => "Control Keys Catholic france_key",
		"db_id" => "tbd_1_{INDEX}",
		"types" => [
			CONTROL,
			KEYS,
			CATHOLIC,
		],
		BACK => [
			"name" => "French Key Protestant",
			"style" => "Control Keys Reformed france_key",
			"types" => [
				CONTROL,
				KEYS,
				REFORMED,
			],
		],
	],
	HAPSBURG_KEY => [
		"name" => "Hapsburg Key",
		"power" => HAPSBURG,
		"style" => "Control Keys Catholic hapsburg_key",
		"db_id" => "tbd_2_{INDEX}",
		"types" => [
			CONTROL,
			KEYS,
			CATHOLIC,
		],
		BACK => [
			"name" => "Hapsburg Key Protestant",
			"style" => "Control Keys Reformed hapsburg_key",
			"types" => [
				CONTROL,
				KEYS,
				REFORMED,
			],
		],
	],
	OTTOMAN_KEY => [
		"name" => "Ottoman Key",
		"power" => OTTOMAN,
		"style" => "Control Keys Catholic ottoman_key",
		"db_id" => "tbd_3_{INDEX}",
		"types" => [
			CONTROL,
			KEYS,
			CATHOLIC,
		],
		BACK => [
			"name" => "Ottoman Key Protestant",
			"style" => "Control Keys Reformed ottoman_key",
			"types" => [
				CONTROL,
				KEYS,
				REFORMED,
			],
		],
	],
	INDEPENDENT_KEY => [
		"name" => "Independent Key",
		"power" => INDEPENDENT,
		"style" => "Control Keys Catholic independent_key",
		"db_id" => "tbd_4_{INDEX}",
		"types" => [
			CONTROL,
			KEYS,
			CATHOLIC,
		],
		BACK => [
			"name" => "Independent Key Protestant",
			"style" => "Control Keys Reformed independent_key",
			"types" => [
				CONTROL,
				KEYS,
				REFORMED,
			],
		],
	],
	PAPACY_KEY => [
		"name" => "Papacy Key",
		"power" => PAPACY,
		"style" => "Control Keys Catholic papacy_key",
		"db_id" => "tbd_5_{INDEX}",
		"types" => [
			CONTROL,
			KEYS,
			CATHOLIC,
		],
		BACK => [
			"name" => "Papacy Key Protestant",
			"style" => "Control Keys Reformed papacy_key",
			"types" => [
				CONTROL,
				KEYS,
				REFORMED,
			],
		],
	],
	ENGLAND_HEX => [
		"name" => "English Hexagonal Marker",
		"power" => ENGLAND,
		"style" => "Control Hex Catholic england_hex",
		"db_id" => "tbd_6_{INDEX}",
		"types" => [
			CONTROL,
			HEX,
			CATHOLIC,
		],
		BACK => [
			"name" => "English Hexagonal Marker Protestant",
			"style" => "Control Hex Reformed england_hex",
			"types" => [
				CONTROL,
				HEX,
				REFORMED,
			],
		],
	],
	FRANCE_HEX => [
		"name" => "French Hexagonal Marker",
		"power" => FRANCE,
		"style" => "Control Hex Catholic france_hex",
		"db_id" => "tbd_7_{INDEX}",
		"types" => [
			CONTROL,
			HEX,
			CATHOLIC,
		],
		BACK => [
			"name" => "French Hexagonal Marker Protestant",
			"style" => "Control Hex Reformed france_hex",
			"types" => [
				CONTROL,
				HEX,
				REFORMED,
			],
		],
	],
	HAPSBURG_HEX => [
		"name" => "Hapsburg Hexagonal Marker",
		"power" => HAPSBURG,
		"style" => "Control Hex Catholic hapsburg_hex",
		"db_id" => "tbd_8_{INDEX}",
		"types" => [
			CONTROL,
			HEX,
			CATHOLIC,
		],
		BACK => [
			"name" => "Hapsburg Hexagonal Marker Protestant",
			"style" => "Control Hex Reformed hapsburg_hex",
			"types" => [
				CONTROL,
				HEX,
				REFORMED,
			],
		],
	],
	INDEPENDENT_HEX => [
		"name" => "Independent Hexagonal Marker",
		"power" => INDEPENDENT,
		"style" => "Control Hex Catholic independent_hex",
		"db_id" => "tbd_9_{INDEX}",
		"types" => [
			CONTROL,
			HEX,
			CATHOLIC,
		],
		BACK => [
			"name" => "Independent Hexagonal Marker Protestant",
			"style" => "Control Hex Reformed independent_hex",
			"types" => [
				CONTROL,
				HEX,
				REFORMED,
			],
		],
	],
	OTTOMAN_HEX => [
		"name" => "Ottoman Hexagonal Marker",
		"power" => OTTOMAN,
		"style" => "Control Hex Catholic ottoman_hex",
		"db_id" => "tbd_10_{INDEX}",
		"types" => [
			CONTROL,
			HEX,
			CATHOLIC,
		],
		BACK => [
			"name" => "Ottoman Hexagonal Marker Protestant",
			"style" => "Control Hex Reformed ottoman_hex",
			"types" => [
				CONTROL,
				HEX,
				REFORMED,
			],
		],
	],
	PAPACY_HEX => [
		"name" => "Papacy Hexagonal Marker",
		"power" => PAPACY,
		"style" => "Control Hex Catholic papacy_hex",
		"db_id" => "tbd_11_{INDEX}",
		"types" => [
			CONTROL,
			HEX,
			CATHOLIC,
		],
		BACK => [
			"name" => "Papacy Hexagonal Marker Protestant",
			"style" => "Control Hex Reformed papacy_hex",
			"types" => [
				CONTROL,
				HEX,
				REFORMED,
			],
		],
	],
	PROTESTANT_HEX => [
		"name" => "Protestant Hexagonal Marker",
		"power" => PROTESTANT,
		"style" => "Control Hex Catholic protestant_hex",
		"db_id" => "tbd_12_{INDEX}",
		"types" => [
			CONTROL,
			HEX,
			CATHOLIC,
		],
		BACK => [
			"name" => "Protestant Hexagonal Marker Protestant",
			"style" => "Control Hex Reformed protestant_hex",
			"types" => [
				CONTROL,
				HEX,
				REFORMED,
			],
		],
	],
	ENGLAND_1UNIT => [
		"name" => "English 1 Military Unit",
		"power" => ENGLAND,
		"style" => "Military Units england_1unit",
		"db_id" => "england_1unit_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "English 1 Mercenary Unit",
			"style" => "Military Units Mercenary england_1unit",
			"strength" => 1,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	ENGLAND_2UNIT => [
		"name" => "English 2 Military Unit",
		"power" => ENGLAND,
		"style" => "Military Units england_2unit",
		"db_id" => "tbd_14_{INDEX}",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "English 2 Mercenary Unit",
			"style" => "Military Units Mercenary england_2unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	ENGLAND_4UNIT => [
		"name" => "English 4 Military Unit",
		"power" => ENGLAND,
		"style" => "Military Units england_4unit",
		"db_id" => "tbd_15_{INDEX}",
		"strength" => 4,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "English 4 Mercenary Unit",
			"style" => "Military Units Mercenary england_4unit",
			"strength" => 4,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	ENGLAND_6UNIT => [
		"name" => "English 6 Military Unit",
		"power" => ENGLAND,
		"style" => "Military Units england_6unit",
		"db_id" => "tbd_16",
		"strength" => 6,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "English 6 Mercenary Unit",
			"style" => "Military Units Mercenary england_6unit",
			"strength" => 6,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	FRANCE_1UNIT => [
		"name" => "French 1 Military Unit",
		"power" => FRANCE,
		"style" => "Military Units france_1unit",
		"db_id" => "tbd_17_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "French 1 Mercenary Unit",
			"style" => "Military Units Mercenary france_1unit",
			"strength" => 1,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	FRANCE_2UNIT => [
		"name" => "French 2 Military Unit",
		"power" => FRANCE,
		"style" => "Military Units france_2unit",
		"db_id" => "tbd_18_{INDEX}",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "French 2 Mercenary Unit",
			"style" => "Military Units Mercenary france_2unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	FRANCE_4UNIT => [
		"name" => "French 4 Military Unit",
		"power" => FRANCE,
		"style" => "Military Units france_4unit",
		"db_id" => "tbd_19_{INDEX}",
		"strength" => 4,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "French 4 Mercenary Unit",
			"style" => "Military Units Mercenary france_4unit",
			"strength" => 4,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	FRANCE_6UNIT => [
		"name" => "French 6 Military Unit",
		"power" => FRANCE,
		"style" => "Military Units france_6unit",
		"db_id" => "tbd_20",
		"strength" => 6,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "French 6 Mercenary Unit",
			"style" => "Military Units Mercenary france_6unit",
			"strength" => 6,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	GENOA_1UNIT => [
		"name" => "Genoese 1 Military Unit",
		"power" => MINOR_GENOA,
		"style" => "Military Units genoa_1unit",
		"db_id" => "tbd_21",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
	],
	GENOA_2UNIT => [
		"name" => "Genoese 2 Military Unit",
		"power" => MINOR_GENOA,
		"style" => "Military Units genoa_2unit",
		"db_id" => "tbd_22",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
	],
	HAPSBURG_1UNIT => [
		"name" => "Hapsburg 1 Military Unit",
		"power" => HAPSBURG,
		"style" => "Military Units hapsburg_1unit",
		"db_id" => "tbd_23_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Hapsburg 1 Mercenary Unit",
			"style" => "Military Units Mercenary hapsburg_1unit",
			"strength" => 1,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	HAPSBURG_2UNIT => [
		"name" => "Hapsburg 2 Military Unit",
		"power" => HAPSBURG,
		"style" => "Military Units hapsburg_2unit",
		"db_id" => "tbd_24_{INDEX}",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Hapsburg 2 Mercenary Unit",
			"style" => "Military Units Mercenary hapsburg_2unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	HAPSBURG_4UNIT => [
		"name" => "Hapsburg 4 Military Unit",
		"power" => HAPSBURG,
		"style" => "Military Units hapsburg_4unit",
		"db_id" => "tbd_25_{INDEX}",
		"strength" => 4,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Hapsburg 4 Mercenary Unit",
			"style" => "Military Units Mercenary hapsburg_4unit",
			"strength" => 4,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	HAPSBURG_6UNIT => [
		"name" => "Hapsburg 6 Military Unit",
		"power" => HAPSBURG,
		"style" => "Military Units hapsburg_6unit",
		"db_id" => "tbd_26",
		"strength" => 6,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Hapsburg 6 Mercenary Unit",
			"style" => "Military Units Mercenary hapsburg_6unit",
			"strength" => 6,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	HUNGARY_1UNIT => [
		"name" => "Hungarian 1 Military Unit",
		"power" => MINOR_HUNGARY,
		"style" => "Military Units hungary_1unit",
		"db_id" => "tbd_27_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Hungarian 2 Military Unit",
			"style" => "Military Units hungary_1unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
			],
		],
	],
	HUNGARY_4UNIT => [
		"name" => "Hungarian 4 Military Unit",
		"power" => MINOR_HUNGARY,
		"style" => "Military Units hungary_4unit",
		"db_id" => "tbd_28",
		"strength" => 4,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Hungarian 2 Military Unit",
			"style" => "Military Units hungary_4unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
			],
		],
	],
	INDEPENDENT_1UNIT => [
		"name" => "Independent 1 Military Unit",
		"power" => INDEPENDENT,
		"style" => "Military Units independent_1unit",
		"db_id" => "tbd_29_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Independent 2 Military Unit",
			"style" => "Military Units independent_1unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
			],
		],
	],
	KNIGHTS_1UNIT => [
		"name" => "Knights of Saint John 1 Military Unit",
		"power" => INDEPENDENT,
		"style" => "Military Units knights_1unit",
		"db_id" => "tbd_30",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
	],
	OTTOMAN_1UNIT => [
		"name" => "Ottoman 1 Military Unit",
		"power" => OTTOMAN,
		"style" => "Military Units ottoman_1unit",
		"db_id" => "tbd_31_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Ottoman 1 Cavalry Unit",
			"style" => "Military Units Cavalry ottoman_1unit",
			"strength" => 1,
			"types" => [
				MILITARY,
				UNITS,
				CAVALRY,
			],
		],
	],
	OTTOMAN_2UNIT => [
		"name" => "Ottoman 2 Military Unit",
		"power" => OTTOMAN,
		"style" => "Military Units ottoman_2unit",
		"db_id" => "tbd_32_{INDEX}",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Ottoman 2 Cavalry Unit",
			"style" => "Military Units Cavalry ottoman_2unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
				CAVALRY,
			],
		],
	],
	OTTOMAN_4UNIT => [
		"name" => "Ottoman 4 Military Unit",
		"power" => OTTOMAN,
		"style" => "Military Units ottoman_4unit",
		"db_id" => "tbd_33_{INDEX}",
		"strength" => 4,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Ottoman 4 Cavalry Unit",
			"style" => "Military Units Cavalry ottoman_4unit",
			"strength" => 4,
			"types" => [
				MILITARY,
				UNITS,
				CAVALRY,
			],
		],
	],
	OTTOMAN_6UNIT => [
		"name" => "Ottoman 6 Military Unit",
		"power" => OTTOMAN,
		"style" => "Military Units ottoman_6unit",
		"db_id" => "tbd_34",
		"strength" => 6,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Ottoman 6 Cavalry Unit",
			"style" => "Military Units Cavalry ottoman_6unit",
			"strength" => 6,
			"types" => [
				MILITARY,
				UNITS,
				CAVALRY,
			],
		],
	],
	PAPACY_1UNIT => [
		"name" => "Papacy 1 Military Unit",
		"power" => PAPACY,
		"style" => "Military Units papacy_1unit",
		"db_id" => "tbd_35_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Papacy 1 Mercenary Unit",
			"style" => "Military Units Mercenary papacy_1unit",
			"strength" => 1,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	PAPACY_2UNIT => [
		"name" => "Papacy 2 Military Unit",
		"power" => PAPACY,
		"style" => "Military Units papacy_2unit",
		"db_id" => "tbd_36_{INDEX}",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Papacy 2 Mercenary Unit",
			"style" => "Military Units Mercenary papacy_2unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	PAPACY_4UNIT => [
		"name" => "Papacy 4 Military Unit",
		"power" => PAPACY,
		"style" => "Military Units papacy_4unit",
		"db_id" => "tbd_37_{INDEX}",
		"strength" => 4,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Papacy 4 Mercenary Unit",
			"style" => "Military Units Mercenary papacy_4unit",
			"strength" => 4,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	PROTESTANT_1UNIT => [
		"name" => "Protestant 1 Military Unit",
		"power" => PROTESTANT,
		"style" => "Military Units protestant_1unit",
		"db_id" => "tbd_38_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Protestant 1 Mercenary Unit",
			"style" => "Military Units Mercenary protestant_1unit",
			"strength" => 1,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	PROTESTANT_2UNIT => [
		"name" => "Protestant 2 Military Unit",
		"power" => PROTESTANT,
		"style" => "Military Units protestant_2unit",
		"db_id" => "tbd_39_{INDEX}",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Protestant 2 Mercenary Unit",
			"style" => "Military Units Mercenary protestant_2unit",
			"strength" => 2,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	PROTESTANT_4UNIT => [
		"name" => "Protestant 4 Military Unit",
		"power" => PROTESTANT,
		"style" => "Military Units protestant_4unit",
		"db_id" => "tbd_40_{INDEX}",
		"strength" => 4,
		"types" => [
			MILITARY,
			UNITS,
		],
		BACK => [
			"name" => "Protestant 4 Mercenary Unit",
			"style" => "Military Units Mercenary protestant_4unit",
			"strength" => 4,
			"types" => [
				MILITARY,
				UNITS,
				MERCENARY,
			],
		],
	],
	SCOTLAND_1UNIT => [
		"name" => "Scottish 1 Military Unit",
		"power" => MINOR_SCOTLAND,
		"style" => "Military Units scotland_1unit",
		"db_id" => "tbd_41_{INDEX}",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
	],
	SCOTLAND_2UNIT => [
		"name" => "Scottish 2 Military Unit",
		"power" => MINOR_SCOTLAND,
		"style" => "Military Units scotland_2unit",
		"db_id" => "tbd_42",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
	],
	VENICE_1UNIT => [
		"name" => "Venetian 1 Military Unit",
		"power" => MINOR_VENICE,
		"style" => "Military Units venice_1unit",
		"db_id" => "tbd_43",
		"strength" => 1,
		"types" => [
			MILITARY,
			UNITS,
		],
	],
	VENICE_2UNIT => [
		"name" => "Venetian 2 Military Unit",
		"power" => MINOR_VENICE,
		"style" => "Military Units venice_2unit",
		"db_id" => "tbd_44",
		"strength" => 2,
		"types" => [
			MILITARY,
			UNITS,
		],
	],
	BRANDON => [
		"name" => "Brandon",
		"power" => ENGLAND,
		"style" => "Military Leader brandon",
		"db_id" => "brandon",
		"command_rating" => 6,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	CHARLES_V => [
		"name" => "Charles V",
		"power" => HAPSBURG,
		"style" => "Military Leader charles_v",
		"db_id" => "charles_v",
		"command_rating" => 10,
		"battle_rating" => 2,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	DUDLEY => [
		"name" => "Dudley",
		"power" => OTHER,
		"style" => "Military Leader dudley",
		"db_id" => "dudly",
		"command_rating" => 6,
		"battle_rating" => 0,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	DUKE_ALVA => [
		"name" => "Duke of Alva",
		"power" => HAPSBURG,
		"style" => "Military Leader duke_alva",
		"db_id" => "duke_alva",
		"command_rating" => 6,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	FERDINAND => [
		"name" => "Ferdinand",
		"power" => HAPSBURG,
		"style" => "Military Leader ferdinand",
		"db_id" => "tbd_49",
		"command_rating" => 6,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	FRANCIS_I => [
		"name" => "Francis I",
		"power" => FRANCE,
		"style" => "Military Leader francis_i",
		"db_id" => "tbd_50",
		"command_rating" => 8,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	HENRY_II => [
		"name" => "Henry II",
		"power" => ENGLAND,
		"style" => "Military Leader henry_ii",
		"db_id" => "tbd_51",
		"command_rating" => 8,
		"battle_rating" => 0,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	HENRY_VIII => [
		"name" => "Henry VIII",
		"power" => ENGLAND,
		"style" => "Military Leader henry_viii",
		"db_id" => "tbd_52",
		"command_rating" => 8,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	IBRAHIM => [
		"name" => "Ibrahim",
		"power" => OTTOMAN,
		"style" => "Military Leader ibrahim",
		"db_id" => "tbd_53",
		"command_rating" => 6,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	JOHN_FREDERICK => [
		"name" => "John Frederick",
		"power" => OTHER,
		"style" => "Military Leader john_frederick",
		"db_id" => "tbd_54",
		"command_rating" => 6,
		"battle_rating" => 0,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	MAURICE_OF_SAXONY => [
		"name" => "Maurice of Saxony",
		"power" => OTHER,
		"style" => "Military Leader maurice_of_saxony",
		"db_id" => "maurice_of_saxony",
		"command_rating" => 6,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
		BACK => [
			"name" => "Maurice of Saxony",
			"style" => "Military Leader maurice_of_saxony",
			"types" => [
				MILITARY,
				LEADER,
			],
		],
	],
	MONTMORENCY => [
		"name" => "Montmorency",
		"power" => FRANCE,
		"style" => "Military Leader montmorency",
		"db_id" => "tbd_56",
		"command_rating" => 6,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	PHILIP_HESSE => [
		"name" => "Philip of Hesse",
		"power" => OTHER,
		"style" => "Military Leader philip_hesse",
		"db_id" => "tbd_57",
		"command_rating" => 6,
		"battle_rating" => 0,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	RENEGADE => [
		"name" => "Charles Borbon, Renegade Leader",
		"power" => OTHER,
		"style" => "Military Leader renegade",
		"db_id" => "tbd_58",
		"command_rating" => 6,
		"battle_rating" => 1,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	SULEIMAN => [
		"name" => "Suleiman",
		"power" => OTTOMAN,
		"style" => "Military Leader suleiman",
		"db_id" => "tbd_59",
		"command_rating" => 12,
		"battle_rating" => 2,
		"types" => [
			MILITARY,
			LEADER,
		],
	],
	ENGLISH_SQUADRON => [
		"name" => "English Squadron",
		"power" => ENGLAND,
		"style" => "Naval Units english_squadron",
		"db_id" => "tbd_60_{INDEX}",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	FRENCH_SQUADRON => [
		"name" => "French Squadron",
		"power" => FRANCE,
		"style" => "Naval Units french_squadron",
		"db_id" => "tbd_61_{INDEX}",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	GENOESE_SQAUADRON => [
		"name" => "Genoese Squadron",
		"power" => MINOR_GENOA,
		"style" => "Naval Units genoese_sqauadron",
		"db_id" => "tbd_62",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	HAPSBURG_SQUADRON => [
		"name" => "Hapsburg Squadron",
		"power" => HAPSBURG,
		"style" => "Naval Units hapsburg_squadron",
		"db_id" => "tbd_63_{INDEX}",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	OTTOMAN_SQUADRON => [
		"name" => "Ottoman Squadron",
		"power" => OTTOMAN,
		"style" => "Naval Units ottoman_squadron",
		"db_id" => "tbd_64_{INDEX}",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	PAPACY_SQUADRON => [
		"name" => "Papacy Squadron",
		"power" => PAPACY,
		"style" => "Naval Units papacy_squadron",
		"db_id" => "tbd_65_{INDEX}",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	SCOTTISH_SQUADRON => [
		"name" => "Scottish Squadron",
		"power" => MINOR_SCOTLAND,
		"style" => "Naval Units scottish_squadron",
		"db_id" => "tbd_66",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	VENETIAN_SQUADRON => [
		"name" => "Venetian Squadron",
		"power" => MINOR_VENICE,
		"style" => "Naval Units venetian_squadron",
		"db_id" => "tbd_67_{INDEX}",
		"strength" => 2,
		"types" => [
			NAVAL,
			UNITS,
		],
	],
	ANDREA_DORIA => [
		"name" => "Andrea Doria",
		"power" => OTHER,
		"style" => "Naval Leader andrea_doria",
		"db_id" => "tbd_68",
		"strength" => 2,
		"types" => [
			NAVAL,
			LEADER,
		],
	],
	BARBAROSSA => [
		"name" => "Barbarossa",
		"power" => OTHER,
		"style" => "Naval Leader barbarossa",
		"db_id" => "tbd_69",
		"battle_rating" => 2,
		"piracy_rating" => 1,
		"types" => [
			NAVAL,
			LEADER,
		],
	],
	DRAGUT => [
		"name" => "Dragut",
		"power" => OTHER,
		"style" => "Naval Leader dragut",
		"db_id" => "tbd_70",
		"battle_rating" => 1,
		"piracy_rating" => 2,
		"types" => [
			NAVAL,
			LEADER,
		],
	],
	ALLIED => [
		"name" => "Allied",
		"power" => OTHER,
		"style" => "Diplomacy allied",
		"db_id" => "tbd_71_{INDEX}",
		"types" => [
			DIPLOMACY,
		],
	],
	AT_WAR => [
		"name" => "At War",
		"power" => OTHER,
		"style" => "Diplomacy at_war",
		"db_id" => "tbd_72_{INDEX}",
		"types" => [
			DIPLOMACY,
		],
	],
	UNREST => [
		"name" => "Unrest",
		"power" => OTHER,
		"style" => "Unrest_marker unrest",
		"db_id" => "tbd_73_{INDEX}",
		"types" => [
			UNREST_MARKER,
		],
	],
	VP_ENGLAND => [
		"name" => "English VP's",
		"power" => OTHER,
		"style" => "VP_marker vp_england",
		"db_id" => "tbd_74",
		"types" => [
			VP_MARKER,
		],
	],
	VP_FRANCE => [
		"name" => "French VP's",
		"power" => OTHER,
		"style" => "VP_marker vp_france",
		"db_id" => "tbd_75",
		"types" => [
			VP_MARKER,
		],
	],
	VP_HAPSBURG => [
		"name" => "Hapsburg VP's",
		"power" => OTHER,
		"style" => "VP_marker vp_hapsburg",
		"db_id" => "tbd_76",
		"types" => [
			VP_MARKER,
		],
	],
	VP_OTTOMAN => [
		"name" => "Ottoman VP's",
		"power" => OTHER,
		"style" => "VP_marker vp_ottoman",
		"db_id" => "tbd_77",
		"types" => [
			VP_MARKER,
		],
	],
	VP_PAPACY => [
		"name" => "Papacy VP's",
		"power" => OTHER,
		"style" => "VP_marker vp_papacy",
		"db_id" => "tbd_78",
		"types" => [
			VP_MARKER,
		],
	],
	VP_PROTESTANT => [
		"name" => "Protestant VP's",
		"power" => OTHER,
		"style" => "VP_marker vp_protestant",
		"db_id" => "tbd_79",
		"types" => [
			VP_MARKER,
		],
	],
	LOANED_ENGLAND => [
		"name" => "Loaned to England",
		"power" => OTHER,
		"style" => "Loaned loaned_england",
		"db_id" => "tbd_80_{INDEX}",
		"types" => [
			LOANED,
		],
	],
	LOANED_FRANCE => [
		"name" => "Loaned to France",
		"power" => OTHER,
		"style" => "Loaned loaned_france",
		"db_id" => "tbd_81_{INDEX}",
		"types" => [
			LOANED,
		],
	],
	LOANED_HAPSBURG => [
		"name" => "Loaned to Hapsburg",
		"power" => OTHER,
		"style" => "Loaned loaned_hapsburg",
		"db_id" => "tbd_82_{INDEX}",
		"types" => [
			LOANED,
		],
	],
	LOANED_OTTOMAN => [
		"name" => "Loaned to Ottoman",
		"power" => OTHER,
		"style" => "Loaned loaned_ottoman",
		"db_id" => "tbd_83_{INDEX}",
		"types" => [
			LOANED,
		],
	],
	LOANED_PAPACY => [
		"name" => "Loaned to Papacy",
		"power" => OTHER,
		"style" => "Loaned loaned_papacy",
		"db_id" => "tbd_84_{INDEX}",
		"types" => [
			LOANED,
		],
	],
	CALVIN_REFORMER => [
		"name" => "Calvin Reformer",
		"power" => OTHER,
		"style" => "Reformer calvin_reformer",
		"db_id" => "tbd_85",
		"types" => [
			REFORMER,
		],
	],
	CRANMER_REFORMER => [
		"name" => "Cranmer Reformer",
		"power" => OTHER,
		"style" => "Reformer cranmer_reformer",
		"db_id" => "tbd_86",
		"types" => [
			REFORMER,
		],
	],
	LUTHER_REFORMER => [
		"name" => "Luther Reformer",
		"power" => OTHER,
		"style" => "Reformer luther_reformer",
		"db_id" => "tbd_87",
		"types" => [
			REFORMER,
		],
	],
	ZWINGLI_REFORMER => [
		"name" => "Zwingli Reformer",
		"power" => OTHER,
		"style" => "Reformer zwingli_reformer",
		"db_id" => "tbd_88",
		"types" => [
			REFORMER,
		],
	],
	ALEANDER => [
		"name" => "Aleander",
		"power" => PROTESTANT,
		"style" => "Debater aleander",
		"db_id" => "tbd_89",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Aleander",
			"style" => "Debater Committed aleander",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CAJETAN => [
		"name" => "Cajetan",
		"power" => PROTESTANT,
		"style" => "Debater cajetan",
		"db_id" => "tbd_90",
		"debate_value" => 1,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Cajetan",
			"style" => "Debater Committed cajetan",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CAMPEGGIO => [
		"name" => "Campeggio",
		"power" => PROTESTANT,
		"style" => "Debater campeggio",
		"db_id" => "tbd_91",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Campeggio",
			"style" => "Debater Committed campeggio",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CANISIUS => [
		"name" => "Canisius",
		"power" => PROTESTANT,
		"style" => "Debater canisius",
		"db_id" => "tbd_92",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Canisius",
			"style" => "Debater Committed canisius",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CARAFFA => [
		"name" => "Caraffa",
		"power" => PROTESTANT,
		"style" => "Debater caraffa",
		"db_id" => "tbd_93",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Caraffa",
			"style" => "Debater Committed caraffa",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CONTARINI => [
		"name" => "Contarini",
		"power" => PROTESTANT,
		"style" => "Debater contarini",
		"db_id" => "tbd_94",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Contarini",
			"style" => "Debater Committed contarini",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	ECK => [
		"name" => "Eck",
		"power" => PROTESTANT,
		"style" => "Debater eck",
		"db_id" => "tbd_95",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Eck",
			"style" => "Debater Committed eck",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	FABER => [
		"name" => "Faber",
		"power" => PROTESTANT,
		"style" => "Debater faber",
		"db_id" => "tbd_96",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Faber",
			"style" => "Debater Committed faber",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	GARDINER => [
		"name" => "Gardiner",
		"power" => PROTESTANT,
		"style" => "Debater gardiner",
		"db_id" => "tbd_97",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Gardiner",
			"style" => "Debater Committed gardiner",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	LOYOLA => [
		"name" => "Loyola",
		"power" => PROTESTANT,
		"style" => "Debater loyola",
		"db_id" => "tbd_98",
		"debate_value" => 4,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Loyola",
			"style" => "Debater Committed loyola",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	POLE => [
		"name" => "Pole",
		"power" => PROTESTANT,
		"style" => "Debater pole",
		"db_id" => "tbd_99",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Pole",
			"style" => "Debater Committed pole",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	TETZEL => [
		"name" => "Tetzel",
		"power" => PROTESTANT,
		"style" => "Debater tetzel",
		"db_id" => "tbd_100",
		"debate_value" => 1,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Tetzel",
			"style" => "Debater Committed tetzel",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	BUCER => [
		"name" => "Bucer",
		"power" => PAPACY,
		"style" => "Debater bucer",
		"db_id" => "tbd_101",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Bucer",
			"style" => "Debater Committed bucer",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	BULLINGER => [
		"name" => "Bullinger",
		"power" => PAPACY,
		"style" => "Debater bullinger",
		"db_id" => "tbd_102",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Bullinger",
			"style" => "Debater Committed bullinger",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CALVIN => [
		"name" => "Calvin",
		"power" => PAPACY,
		"style" => "Debater calvin",
		"db_id" => "tbd_103",
		"debate_value" => 4,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Calvin",
			"style" => "Debater Committed calvin",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CARLSTADT => [
		"name" => "Carlstadt",
		"power" => PAPACY,
		"style" => "Debater carlstadt",
		"db_id" => "tbd_104",
		"debate_value" => 1,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Carlstadt",
			"style" => "Debater Committed carlstadt",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	COP => [
		"name" => "Cop",
		"power" => PAPACY,
		"style" => "Debater cop",
		"db_id" => "tbd_105",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Cop",
			"style" => "Debater Committed cop",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	COVERDALE => [
		"name" => "Coverdale",
		"power" => PAPACY,
		"style" => "Debater coverdale",
		"db_id" => "tbd_106",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Coverdale",
			"style" => "Debater Committed coverdale",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	CRANMER => [
		"name" => "Cranmer",
		"power" => PAPACY,
		"style" => "Debater cranmer",
		"db_id" => "tbd_107",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Cranmer",
			"style" => "Debater Committed cranmer",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	FAREL => [
		"name" => "Farel",
		"power" => PAPACY,
		"style" => "Debater farel",
		"db_id" => "tbd_108",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Farel",
			"style" => "Debater Committed farel",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	KNOX => [
		"name" => "Knox",
		"power" => PAPACY,
		"style" => "Debater knox",
		"db_id" => "tbd_109",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Knox",
			"style" => "Debater Committed knox",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	LATIMER => [
		"name" => "Latimer",
		"power" => PAPACY,
		"style" => "Debater latimer",
		"db_id" => "tbd_110",
		"debate_value" => 1,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Latimer",
			"style" => "Debater Committed latimer",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	LUTHER => [
		"name" => "Luther",
		"power" => PAPACY,
		"style" => "Debater luther",
		"db_id" => "tbd_111",
		"debate_value" => 4,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Luther",
			"style" => "Debater Committed luther",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	MELANCHTHON => [
		"name" => "Melanchthon",
		"power" => PAPACY,
		"style" => "Debater melanchthon",
		"db_id" => "tbd_112",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Melanchthon",
			"style" => "Debater Committed melanchthon",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	OEKOLAMPADIUS => [
		"name" => "Oekolampadius",
		"power" => PAPACY,
		"style" => "Debater oekolampadius",
		"db_id" => "tbd_113",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Oekolampadius",
			"style" => "Debater Committed oekolampadius",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	OLIVETAN => [
		"name" => "Olivetan",
		"power" => PAPACY,
		"style" => "Debater olivetan",
		"db_id" => "tbd_114",
		"debate_value" => 1,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Olivetan",
			"style" => "Debater Committed olivetan",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	TYNDALE => [
		"name" => "Tyndale",
		"power" => PAPACY,
		"style" => "Debater tyndale",
		"db_id" => "tbd_115",
		"debate_value" => 2,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Tyndale",
			"style" => "Debater Committed tyndale",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	WISHART => [
		"name" => "Wishart",
		"power" => PAPACY,
		"style" => "Debater wishart",
		"db_id" => "tbd_116",
		"debate_value" => 1,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Wishart",
			"style" => "Debater Committed wishart",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	ZWINGLI => [
		"name" => "Zwingli",
		"power" => PAPACY,
		"style" => "Debater zwingli",
		"db_id" => "tbd_117",
		"debate_value" => 3,
		"types" => [
			DEBATER,
		],
		BACK => [
			"name" => "Zwingli",
			"style" => "Debater Committed zwingli",
			"types" => [
				DEBATER,
				COMMITTED,
			],
		],
	],
	ENGLISH_EXPLORATION => [
		"name" => "English Exploration Underway",
		"power" => ENGLAND,
		"style" => "Exploration Charted english_exploration",
		"db_id" => "tbd_118",
		"types" => [
			EXPLORATION,
			CHARTED,
		],
		BACK => [
			"name" => "English Exploration",
			"style" => "Exploration english_exploration",
			"types" => [
				EXPLORATION,
			],
		],
	],
	FRENCH_EXPLORATION => [
		"name" => "French Exploration Underway",
		"power" => FRANCE,
		"style" => "Exploration Charted french_exploration",
		"db_id" => "tbd_119",
		"types" => [
			EXPLORATION,
			CHARTED,
		],
		BACK => [
			"name" => "French Exploratinon",
			"style" => "Exploration french_exploration",
			"types" => [
				EXPLORATION,
			],
		],
	],
	HAPSBURG_EXPLORATION => [
		"name" => "Hapsburg Exploration Underway",
		"power" => HAPSBURG,
		"style" => "Exploration Charted hapsburg_exploration",
		"db_id" => "tbd_120",
		"types" => [
			EXPLORATION,
			CHARTED,
		],
		BACK => [
			"name" => "Hapsburg Exploration",
			"style" => "Exploration hapsburg_exploration",
			"types" => [
				EXPLORATION,
			],
		],
	],
	CABOT_ENG => [
		"name" => "Cabot English",
		"power" => ENGLAND,
		"style" => "Explorer cabot_eng",
		"db_id" => "tbd_121",
		"explorer_value" => 1,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "English Explorer",
			"style" => "Explorer Unknown cabot_eng",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	CABOT_FRE => [
		"name" => "Cabot French",
		"power" => FRANCE,
		"style" => "Explorer cabot_fre",
		"db_id" => "tbd_122",
		"explorer_value" => 1,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "French Explorer",
			"style" => "Explorer Unknown cabot_fre",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	CABOT_HAP => [
		"name" => "Cabot Hapsburg",
		"power" => HAPSBURG,
		"style" => "Explorer cabot_hap",
		"db_id" => "tbd_123",
		"explorer_value" => 1,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "Hapsburg Explorer",
			"style" => "Explorer Unknown cabot_hap",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	CARTIER => [
		"name" => "Cartier",
		"power" => FRANCE,
		"style" => "Explorer cartier",
		"db_id" => "tbd_124",
		"explorer_value" => 3,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "French Explorer",
			"style" => "Explorer Unknown cartier",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	CHANCELLOR => [
		"name" => "Chancellor",
		"power" => ENGLAND,
		"style" => "Explorer chancellor",
		"db_id" => "tbd_125",
		"explorer_value" => 1,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "English Explorer",
			"style" => "Explorer Unknown chancellor",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	DE_VACA => [
		"name" => "De Vaca",
		"power" => HAPSBURG,
		"style" => "Explorer de_vaca",
		"db_id" => "tbd_126",
		"explorer_value" => 0,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "Hapsburg Explorer",
			"style" => "Explorer Unknown de_vaca",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	DE_SOTO => [
		"name" => "De Soto",
		"power" => HAPSBURG,
		"style" => "Explorer de_soto",
		"db_id" => "tbd_127",
		"explorer_value" => 2,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "Hapsburg Explorer",
			"style" => "Explorer Unknown de_soto",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	LEON => [
		"name" => "Leon",
		"power" => HAPSBURG,
		"style" => "Explorer leon",
		"db_id" => "tbd_128",
		"explorer_value" => 1,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "Hapsburg Explorer",
			"style" => "Explorer Unknown leon",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	MAGELLAN => [
		"name" => "Magellan",
		"power" => HAPSBURG,
		"style" => "Explorer magellan",
		"db_id" => "tbd_129",
		"explorer_value" => 4,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "Hapsburg Explorer",
			"style" => "Explorer Unknown magellan",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	NARVAEZ => [
		"name" => "Narvaez",
		"power" => HAPSBURG,
		"style" => "Explorer narvaez",
		"db_id" => "tbd_130",
		"explorer_value" => -1,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "Hapsburg Explorer",
			"style" => "Explorer Unknown narvaez",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	ORELLANA => [
		"name" => "Orellana",
		"power" => HAPSBURG,
		"style" => "Explorer orellana",
		"db_id" => "tbd_131",
		"explorer_value" => 3,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "Hapsburg Explorer",
			"style" => "Explorer Unknown orellana",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	ROBERVAL => [
		"name" => "Roberval",
		"power" => FRANCE,
		"style" => "Explorer roberval",
		"db_id" => "tbd_132",
		"explorer_value" => 0,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "French Explorer",
			"style" => "Explorer Unknown roberval",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	RUT => [
		"name" => "Rut",
		"power" => ENGLAND,
		"style" => "Explorer rut",
		"db_id" => "tbd_133",
		"explorer_value" => 1,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "English Explorer",
			"style" => "Explorer Unknown rut",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	VERRAZANO => [
		"name" => "Verrazano",
		"power" => FRANCE,
		"style" => "Explorer verrazano",
		"db_id" => "tbd_134",
		"explorer_value" => 2,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "French Explorer",
			"style" => "Explorer Unknown verrazano",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	WILLOUGHBY => [
		"name" => "Willoughby",
		"power" => ENGLAND,
		"style" => "Explorer willoughby",
		"db_id" => "tbd_135",
		"explorer_value" => 0,
		"types" => [
			EXPLORER,
		],
		BACK => [
			"name" => "English Explorer",
			"style" => "Explorer Unknown willoughby",
			"types" => [
				EXPLORER,
				UNKNOWN,
			],
		],
	],
	CHARLESBOURG => [
		"name" => "Charlesbourg",
		"power" => FRANCE,
		"style" => "Colony charlesbourg",
		"db_id" => "tbd_136",
		"types" => [
			COLONY,
		],
	],
	CUBA => [
		"name" => "Cuba",
		"power" => HAPSBURG,
		"style" => "Colony cuba",
		"db_id" => "tbd_137",
		"types" => [
			COLONY,
		],
	],
	HISPANIOLA => [
		"name" => "Hispaniola",
		"power" => HAPSBURG,
		"style" => "Colony hispaniola",
		"db_id" => "tbd_138",
		"types" => [
			COLONY,
		],
	],
	JAMESTOWN => [
		"name" => "Jamestown",
		"power" => ENGLAND,
		"style" => "Colony jamestown",
		"db_id" => "tbd_139",
		"types" => [
			COLONY,
		],
	],
	MONTREAL => [
		"name" => "Montreal",
		"power" => FRANCE,
		"style" => "Colony montreal",
		"db_id" => "tbd_140",
		"types" => [
			COLONY,
		],
	],
	POTOSI => [
		"name" => "Potosi Silver Mines",
		"power" => OTHER,
		"style" => "Colony potosi",
		"db_id" => "tbd_141",
		"types" => [
			COLONY,
		],
	],
	PUERTO_RICO => [
		"name" => "Puerto Rico",
		"power" => HAPSBURG,
		"style" => "Colony puerto_rico",
		"db_id" => "tbd_142",
		"types" => [
			COLONY,
		],
	],
	ROANOKE => [
		"name" => "Roanoke",
		"power" => ENGLAND,
		"style" => "Colony roanoke",
		"db_id" => "tbd_143",
		"types" => [
			COLONY,
		],
	],
	HAPSBURG_CONQUEST => [
		"name" => "Hapsburg Conquest Underway",
		"power" => HAPSBURG,
		"style" => "Conquest hapsburg_conquest",
		"db_id" => "tbd_144",
		"types" => [
			CONQUEST,
		],
	],
	ENGLISH_CONQUEST => [
		"name" => "English Conquest",
		"power" => ENGLAND,
		"style" => "Conquistador english_conquest",
		"db_id" => "tbd_145_{INDEX}",
		"explorer_value" => 0,
		"types" => [
			CONQUISTADOR,
		],
	],
	FRENCH_CONQUEST => [
		"name" => "French Conquest",
		"power" => FRANCE,
		"style" => "Conquistador french_conquest",
		"db_id" => "tbd_146_{INDEX}",
		"explorer_value" => 0,
		"types" => [
			CONQUISTADOR,
		],
	],
	CORDOVA => [
		"name" => "Cordova",
		"power" => HAPSBURG,
		"style" => "Conquistador cordova",
		"db_id" => "tbd_147",
		"explorer_value" => 1,
		"types" => [
			CONQUISTADOR,
		],
		BACK => [
			"name" => "Hapsburg Conqueror",
			"style" => "Conquistador Unknown cordova",
			"types" => [
				CONQUISTADOR,
				UNKNOWN,
			],
		],
	],
	CORONADO => [
		"name" => "Coronado",
		"power" => HAPSBURG,
		"style" => "Conquistador coronado",
		"db_id" => "tbd_148",
		"explorer_value" => 1,
		"types" => [
			CONQUISTADOR,
		],
		BACK => [
			"name" => "Hapsburg Conqueror",
			"style" => "Conquistador Unknown coronado",
			"types" => [
				CONQUISTADOR,
				UNKNOWN,
			],
		],
	],
	CORTEZ => [
		"name" => "Cortez",
		"power" => HAPSBURG,
		"style" => "Conquistador cortez",
		"db_id" => "tbd_149",
		"explorer_value" => 4,
		"types" => [
			CONQUISTADOR,
		],
		BACK => [
			"name" => "Hapsburg Conqueror",
			"style" => "Conquistador Unknown cortez",
			"types" => [
				CONQUISTADOR,
				UNKNOWN,
			],
		],
	],
	MONTEJO => [
		"name" => "Montejo",
		"power" => HAPSBURG,
		"style" => "Conquistador montejo",
		"db_id" => "tbd_150",
		"explorer_value" => 2,
		"types" => [
			CONQUISTADOR,
		],
		BACK => [
			"name" => "Hapsburg Conqueror",
			"style" => "Conquistador Unknown montejo",
			"types" => [
				CONQUISTADOR,
				UNKNOWN,
			],
		],
	],
	PIZARRO => [
		"name" => "Pizarro",
		"power" => HAPSBURG,
		"style" => "Conquistador pizarro",
		"db_id" => "tbd_151",
		"explorer_value" => 3,
		"types" => [
			CONQUISTADOR,
		],
		BACK => [
			"name" => "Hapsburg Conqueror",
			"style" => "Conquistador Unknown pizarro",
			"types" => [
				CONQUISTADOR,
				UNKNOWN,
			],
		],
	],
	ENGLISH_PROT_COUNTER => [
		"name" => "English Home Protestant Spaces",
		"power" => OTHER,
		"style" => "Religious counter english_prot_counter",
		"db_id" => "tbd_152",
		"types" => [
			RELIGIOUS,
			COUNTER,
		],
	],
	PROTESTANT_SPACES => [
		"name" => "Protestant Spaces",
		"power" => OTHER,
		"style" => "Religious counter protestant_spaces",
		"db_id" => "tbd_153",
		"types" => [
			RELIGIOUS,
			COUNTER,
		],
	],
	TURN => [
		"name" => "Turn",
		"power" => OTHER,
		"style" => "Turn_marker turn",
		"db_id" => "tbd_154",
		"types" => [
			TURN_MARKER,
		],
	],
	MINUS_ONE_CARD => [
		"name" => "-1 Card",
		"power" => OTHER,
		"style" => "Cards_marker minus_one_card",
		"db_id" => "tbd_155_{INDEX}",
		"types" => [
			CARDS_MARKER,
		],
	],
	GREAT_LAKES_1VP => [
		"name" => "Great Lakes 1 VP",
		"power" => VP,
		"style" => "VP_marker great_lakes_1vp",
		"db_id" => "tbd_156",
		"types" => [
			VP_MARKER,
		],
	],
	MISSISSIPPI_RIVER_1VP => [
		"name" => "Mississippi River 1 VP",
		"power" => VP,
		"style" => "VP_marker mississippi_river_1vp",
		"db_id" => "tbd_157",
		"types" => [
			VP_MARKER,
		],
	],
	ST_LAWRENCE_RIVER_1VP => [
		"name" => "Saint Lawrence River 1 VP",
		"power" => VP,
		"style" => "VP_marker st_lawrence_river_1vp",
		"db_id" => "tbd_158",
		"types" => [
			VP_MARKER,
		],
	],
	AMAZON_RIVER_2VP => [
		"name" => "Amazon River 2 VP's",
		"power" => VP,
		"style" => "VP_marker amazon_river_2vp",
		"db_id" => "tbd_159",
		"types" => [
			VP_MARKER,
		],
	],
	PACIFIC_STRAIT_1VP => [
		"name" => "Pacific Strait 1 VP",
		"power" => VP,
		"style" => "VP_marker pacific_strait_1vp",
		"db_id" => "tbd_160",
		"types" => [
			VP_MARKER,
		],
	],
	CIRCUMNAVIGATION_3VP => [
		"name" => "Circumnavigation 3 VP",
		"power" => VP,
		"style" => "VP_marker circumnavigation_3vp",
		"db_id" => "tbd_161",
		"types" => [
			VP_MARKER,
		],
	],
	MAYA_1VP => [
		"name" => "Maya 1 VP",
		"power" => VP,
		"style" => "VP_marker maya_1vp",
		"db_id" => "tbd_162",
		"types" => [
			VP_MARKER,
		],
	],
	AZTECS_2VP => [
		"name" => "Aztecs 2 VP's",
		"power" => VP,
		"style" => "VP_marker aztecs_2vp",
		"db_id" => "tbd_163",
		"types" => [
			VP_MARKER,
		],
	],
	INCA_2VP => [
		"name" => "Inca 2 VP's",
		"power" => VP,
		"style" => "VP_marker inca_2vp",
		"db_id" => "inca_2vp",
		"types" => [
			VP_MARKER,
		],
	],
	BIBLE_ENG_1VP => [
		"name" => "Bible English Translation 1 VP",
		"power" => VP,
		"style" => "VP_marker bible_eng_1vp",
		"db_id" => "bible_eng_1vp",
		"types" => [
			VP_MARKER,
		],
	],
	BIBLE_FRE_1VP => [
		"name" => "Bible French Translation 1 VP",
		"power" => VP,
		"style" => "VP_marker bible_fre_1vp",
		"db_id" => "bible_fre_1vp",
		"types" => [
			VP_MARKER,
		],
	],
	BIBLE_GER_1VP => [
		"name" => "Bible German Translation 1 VP",
		"power" => VP,
		"style" => "VP_marker bible_ger_1vp",
		"db_id" => "bible_ger_1vp",
		"types" => [
			VP_MARKER,
		],
	],
	CHATEAUX_VP => [
		"name" => "Chateaux VP's",
		"power" => VP,
		"style" => "VP_marker chateaux_vp",
		"db_id" => "tbd_168",
		"types" => [
			VP_MARKER,
		],
	],
	PIRACY_VP => [
		"name" => "Piracy VP's",
		"power" => VP,
		"style" => "VP_marker piracy_vp",
		"db_id" => "tbd_169",
		"types" => [
			VP_MARKER,
		],
	],
	ST_PETERS_VP => [
		"name" => "Saint Peter's VP's",
		"power" => VP,
		"style" => "VP_marker st_peters_vp",
		"db_id" => "tbd_170",
		"types" => [
			VP_MARKER,
		],
	],
	COPERNICUS_1VP => [
		"name" => "Copernicus 1 VP",
		"power" => VP,
		"style" => "VP_marker copernicus_1vp",
		"db_id" => "tbd_171",
		"types" => [
			VP_MARKER,
		],
	],
	COPERNICUS_2VP => [
		"name" => "Copernicus 2 VP's",
		"power" => VP,
		"style" => "VP_marker copernicus_2vp",
		"db_id" => "tbd_172",
		"types" => [
			VP_MARKER,
		],
	],
	EDWARD_5VP => [
		"name" => "Edward VI 5 VP's",
		"power" => VP,
		"style" => "VP_marker edward_5vp",
		"db_id" => "tbd_173",
		"types" => [
			VP_MARKER,
		],
	],
	ELIZABETH_2VP => [
		"name" => "Elizabeth 2 VP's",
		"power" => VP,
		"style" => "VP_marker elizabeth_2vp",
		"db_id" => "tbd_174",
		"types" => [
			VP_MARKER,
		],
	],
	GONZAGA_1VP => [
		"name" => "Giulia Gonzaga 1 VP",
		"power" => VP,
		"style" => "VP_marker gonzaga_1vp",
		"db_id" => "tbd_175",
		"types" => [
			VP_MARKER,
		],
	],
	SERVETUS_1VP => [
		"name" => "Servetus 1 VP",
		"power" => VP,
		"style" => "VP_marker servetus_1vp",
		"db_id" => "tbd_176",
		"types" => [
			VP_MARKER,
		],
	],
	MASTER_OF_ITALY_1VP => [
		"name" => "Master of Italy 1 VP",
		"power" => VP,
		"style" => "VP_marker master_of_italy_1vp",
		"db_id" => "tbd_177_{INDEX}",
		"types" => [
			VP_MARKER,
		],
	],
	MASTER_OF_ITALY_2VP => [
		"name" => "Master of Italy 2 VP's",
		"power" => VP,
		"style" => "VP_marker master_of_italy_2vp",
		"db_id" => "tbd_178_{INDEX}",
		"types" => [
			VP_MARKER,
		],
	],
	WAR_WINNER_1VP => [
		"name" => "War Winner 1 VP",
		"power" => VP,
		"style" => "VP_marker war_winner_1vp",
		"db_id" => "tbd_179_{INDEX}",
		"types" => [
			VP_MARKER,
		],
	],
	WAR_WINNER_2VP => [
		"name" => "War Winner 2 VP's",
		"power" => VP,
		"style" => "VP_marker war_winner_2vp",
		"db_id" => "tbd_180_{INDEX}",
		"types" => [
			VP_MARKER,
		],
	],
	PHONYSCOTLAND_MINUS1 => [
		"name" => "Phony War in Scotland -1 VP's",
		"power" => VP,
		"style" => "VP_marker phonyscotland_minus1",
		"db_id" => "tbd_181",
		"types" => [
			VP_MARKER,
		],
	],
	PHONYVENICE_MINUS1 => [
		"name" => "Phony War in Venice - 1 VP's",
		"power" => VP,
		"style" => "VP_marker phonyvenice_minus1",
		"db_id" => "tbd_182",
		"types" => [
			VP_MARKER,
		],
	],
	ANNE_BOLEYN => [
		"name" => "Anne Boleyn",
		"power" => ENGLAND,
		"style" => "Wife anne_boleyn",
		"db_id" => "tbd_183",
		"types" => [
			WIFE,
		],
		BACK => [
			"name" => "Anne Boleyn",
			"style" => "Wife Benefit anne_boleyn",
			"types" => [
				WIFE,
				BENEFIT,
			],
		],
	],
	ANNE_CLEVES => [
		"name" => "Anne of Cleves",
		"power" => ENGLAND,
		"style" => "Wife anne_cleves",
		"db_id" => "tbd_184",
		"types" => [
			WIFE,
		],
		BACK => [
			"name" => "Anne of Cleves",
			"style" => "Wife Benefit anne_cleves",
			"types" => [
				WIFE,
				BENEFIT,
			],
		],
	],
	CATHERINE_ARAGON => [
		"name" => "Catherine of Aragon",
		"power" => ENGLAND,
		"style" => "Wife catherine_aragon",
		"db_id" => "tbd_185",
		"types" => [
			WIFE,
		],
		BACK => [
			"name" => "Catherine of Aragon",
			"style" => "Wife Benefit catherine_aragon",
			"types" => [
				WIFE,
				BENEFIT,
			],
		],
	],
	JANE_SEYMOUR => [
		"name" => "Jane Seymour",
		"power" => ENGLAND,
		"style" => "Wife jane_seymour",
		"db_id" => "tbd_186",
		"types" => [
			WIFE,
		],
		BACK => [
			"name" => "Jane Seymour",
			"style" => "Wife Benefit jane_seymour",
			"types" => [
				WIFE,
				BENEFIT,
			],
		],
	],
	KATHERINE_PARR => [
		"name" => "Katherine Parr",
		"power" => ENGLAND,
		"style" => "Wife katherine_parr",
		"db_id" => "tbd_187",
		"types" => [
			WIFE,
		],
		BACK => [
			"name" => "Katherine Parr",
			"style" => "Wife Benefit katherine_parr",
			"types" => [
				WIFE,
				BENEFIT,
			],
		],
	],
	KATHRYN_HOWARD => [
		"name" => "Kathryn Howard",
		"power" => ENGLAND,
		"style" => "Wife kathryn_howard",
		"db_id" => "tbd_188",
		"types" => [
			WIFE,
		],
		BACK => [
			"name" => "Kathryn Howard",
			"style" => "Wife Benefit kathryn_howard",
			"types" => [
				WIFE,
				BENEFIT,
			],
		],
	],
	HENRY_MARITAL_STATUS => [
		"name" => "Henry Marital Status",
		"power" => ENGLAND,
		"style" => "Wives Status henry_marital_status",
		"db_id" => "tbd_189",
		"types" => [
			WIVES,
			STATUS,
		],
	],
	BIBLE_ENGLISH => [
		"name" => "Bible English",
		"power" => PROTESTANT,
		"style" => "Translation bible_english",
		"db_id" => "tbd_190",
		"types" => [
			TRANSLATION,
		],
	],
	BIBLE_FRENCH => [
		"name" => "Bible French",
		"power" => PROTESTANT,
		"style" => "Translation bible_french",
		"db_id" => "tbd_191",
		"types" => [
			TRANSLATION,
		],
	],
	BIBLE_GERMAN => [
		"name" => "Bible German",
		"power" => PROTESTANT,
		"style" => "Translation bible_german",
		"db_id" => "tbd_192",
		"types" => [
			TRANSLATION,
		],
	],
	NEW_TESTAMENT_ENGLISH => [
		"name" => "New Testament English",
		"power" => PROTESTANT,
		"style" => "Translation new_testament_english",
		"db_id" => "tbd_193",
		"types" => [
			TRANSLATION,
		],
	],
	NEW_TESTAMENT_FRENCH => [
		"name" => "New Testament French",
		"power" => PROTESTANT,
		"style" => "Translation new_testament_french",
		"db_id" => "tbd_194",
		"types" => [
			TRANSLATION,
		],
	],
	NEW_TESTAMENT_GERMAN => [
		"name" => "New Testament German",
		"power" => PROTESTANT,
		"style" => "Translation new_testament_german",
		"db_id" => "tbd_195",
		"types" => [
			TRANSLATION,
		],
	],
	ST_PETERS_CP => [
		"name" => "Saint Peter's CP Status",
		"power" => PAPACY,
		"style" => "Saint_Peters st_peters_cp",
		"db_id" => "tbd_196",
		"types" => [
			SAINT_PETERS,
		],
	],
	AUGSBURG_CONFESSION => [
		"name" => "Augsburg Confession Active",
		"power" => PROTESTANT,
		"style" => "Event_reminder augsburg_confession",
		"db_id" => "tbd_197",
		"types" => [
			EVENT_REMINDER,
		],
	],
	PRINTING_PRESS => [
		"name" => "Printing Press Active",
		"power" => PROTESTANT,
		"style" => "Event_reminder printing_press",
		"db_id" => "tbd_198",
		"types" => [
			EVENT_REMINDER,
		],
	],
	COLONIAL_GOVERNOR => [
		"name" => "Colonial Governor",
		"power" => OTHER,
		"style" => "Event_reminder colonial_governor",
		"db_id" => "tbd_199_{INDEX}",
		"types" => [
			EVENT_REMINDER,
		],
	],
	GALLEONS => [
		"name" => "Galleons",
		"power" => OTHER,
		"style" => "Event_reminder galleons",
		"db_id" => "tbd_200_{INDEX}",
		"types" => [
			EVENT_REMINDER,
		],
	],
	PLANTATIONS => [
		"name" => "Plantations",
		"power" => OTHER,
		"style" => "Event_reminder plantations",
		"db_id" => "tbd_201_{INDEX}",
		"types" => [
			EVENT_REMINDER,
		],
	],
	PIRACY => [
		"name" => "Piracy Marker",
		"power" => OTHER,
		"style" => "Event_reminder piracy",
		"db_id" => "tbd_202_{INDEX}",
		"types" => [
			EVENT_REMINDER,
		],
	],
	NATIVE_UPRISING => [
		"name" => "Native Uprising",
		"power" => OTHER,
		"style" => "Event_reminder native_uprising",
		"db_id" => "tbd_203_{INDEX}",
		"types" => [
			EVENT_REMINDER,
		],
	],
	RAIDER_ENGLISH => [
		"name" => "English Huguenot Raider",
		"power" => OTHER,
		"style" => "Event_reminder raider_english",
		"db_id" => "tbd_204",
		"types" => [
			EVENT_REMINDER,
		],
	],
	RAIDER_FRENCH => [
		"name" => "French Huguenot Raider",
		"power" => OTHER,
		"style" => "Event_reminder raider_french",
		"db_id" => "tbd_205",
		"types" => [
			EVENT_REMINDER,
		],
	],
	RAIDER_PROTESTANT => [
		"name" => "Protestant Huguenot Raider",
		"power" => OTHER,
		"style" => "Event_reminder raider_protestant",
		"db_id" => "tbd_206",
		"types" => [
			EVENT_REMINDER,
		],
	],
	MERCATOR_MAP => [
		"name" => "Mercator's Map",
		"power" => OTHER,
		"style" => "Event_reminder mercator_map",
		"db_id" => "tbd_207",
		"types" => [
			EVENT_REMINDER,
		],
	],
	SMALLPOX => [
		"name" => "Smallpox",
		"power" => OTHER,
		"style" => "Event_reminder smallpox",
		"db_id" => "tbd_208",
		"types" => [
			EVENT_REMINDER,
		],
	],
	THOMAS_MORE => [
		"name" => "Thomas More",
		"power" => OTHER,
		"style" => "Event_reminder thomas_more",
		"db_id" => "tbd_209",
		"types" => [
			EVENT_REMINDER,
		],
	],
	WARTBURG => [
		"name" => "Wartburg",
		"power" => PROTESTANT,
		"style" => "Event_reminder wartburg",
		"db_id" => "tbd_210",
		"types" => [
			EVENT_REMINDER,
		],
	],
	EXCOMMUNICATED => [
		"name" => "Excommunicated",
		"power" => PAPACY,
		"style" => "Excommunion excommunicated",
		"db_id" => "tbd_211_{INDEX}",
		"types" => [
			EXCOMMUNION,
		],
	],
	FORTRESS => [
		"name" => "Fortress",
		"power" => OTHER,
		"style" => "Fortress_marker fortress",
		"db_id" => "tbd_212_{INDEX}",
		"types" => [
			FORTRESS_MARKER,
		],
	],
	PIRATE_HAVEN => [
		"name" => "Pirate Haven",
		"power" => OTHER,
		"style" => "PirateHaven pirate_haven",
		"db_id" => "tbd_213_{INDEX}",
		"types" => [
			PIRATEHAVEN,
		],
	],
	JESUIT_UNIVERSITY => [
		"name" => "Jesuit University",
		"power" => PAPACY,
		"style" => "University jesuit_university",
		"db_id" => "tbd_214_{INDEX}",
		"types" => [
			UNIVERSITY,
		],
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