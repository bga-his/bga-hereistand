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
 *  2023-10-03 14:54
 */

require_once 'modules/php/constants.inc.php';

$this->spaces = [
SpaceIDs::WITTENBERG => [
"x" => 3247,
"y" => 731,
"name" => "Wittenberg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::BRANDENBURG,
  SpaceIDs::MAGDEBURG,
  SpaceIDs::LEIPZIG,
  SpaceIDs::PRAGUE,
  SpaceIDs::BRESLAU],
"id" => SpaceIDs::WITTENBERG,
"passes" => [],
"seazones" => []
],
SpaceIDs::BRANDENBURG => [
"x" => 3196,
"y" => 590,
"name" => "Brandenburg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::WITTENBERG,
  SpaceIDs::MAGDEBURG,
  SpaceIDs::BRESLAU,
  SpaceIDs::LUBECK,
  SpaceIDs::STETTIN],
"id" => SpaceIDs::BRANDENBURG,
"passes" => [],
"seazones" => []
],
SpaceIDs::MAINZ => [
"x" => 2783,
"y" => 992,
"name" => "Mainz",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::KASSEL,
  SpaceIDs::NUREMBERG,
  SpaceIDs::COLOGNE,
  SpaceIDs::TRIER,
  SpaceIDs::WORMS],
"id" => SpaceIDs::MAINZ,
"passes" => [],
"seazones" => []
],
SpaceIDs::COLOGNE => [
"x" => 2617,
"y" => 848,
"name" => "Cologne",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::MAINZ,
  SpaceIDs::MUNSTER,
  SpaceIDs::LIEGE],
"id" => SpaceIDs::COLOGNE,
"passes" => [],
"seazones" => []
],
SpaceIDs::TRIER => [
"x" => 2636,
"y" => 1018,
"name" => "Trier",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::MAINZ,
  SpaceIDs::METZ,
  SpaceIDs::LIEGE],
"id" => SpaceIDs::TRIER,
"passes" => [],
"seazones" => []
],
SpaceIDs::AUGSBURG => [
"x" => 2981,
"y" => 1203,
"name" => "Augsburg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::REGENSBURG,
  SpaceIDs::NUREMBERG,
  SpaceIDs::SALZBURG,
  SpaceIDs::WORMS],
"id" => SpaceIDs::AUGSBURG,
"passes" => [
  SpaceIDs::INNSBRUCK],
"seazones" => []
],
SpaceIDs::STETTIN => [
"x" => 3332,
"y" => 436,
"name" => "Stettin",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::BRANDENBURG,
  SpaceIDs::LUBECK],
"id" => SpaceIDs::STETTIN,
"passes" => [],
"seazones" => [
  SeazoneIds::BALTIC_SEA]
],
SpaceIDs::LUBECK => [
"x" => 3103,
"y" => 382,
"name" => "Lübeck",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::BRANDENBURG,
  SpaceIDs::STETTIN,
  SpaceIDs::MAGDEBURG,
  SpaceIDs::HAMBURG],
"id" => SpaceIDs::LUBECK,
"passes" => [],
"seazones" => [
  SeazoneIds::BALTIC_SEA]
],
SpaceIDs::MAGDEBURG => [
"x" => 3052,
"y" => 660,
"name" => "Magdeburg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::WITTENBERG,
  SpaceIDs::BRANDENBURG,
  SpaceIDs::LUBECK,
  SpaceIDs::BRUNSWICK,
  SpaceIDs::ERFURT],
"id" => SpaceIDs::MAGDEBURG,
"passes" => [],
"seazones" => []
],
SpaceIDs::HAMBURG => [
"x" => 2877,
"y" => 471,
"name" => "Hamburg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::LUBECK,
  SpaceIDs::BRUNSWICK,
  SpaceIDs::BREMEN],
"id" => SpaceIDs::HAMBURG,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::BRUNSWICK => [
"x" => 2842,
"y" => 692,
"name" => "Brunswick",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::HAMBURG,
  SpaceIDs::MAGDEBURG,
  SpaceIDs::BREMEN,
  SpaceIDs::KASSEL],
"id" => SpaceIDs::BRUNSWICK,
"passes" => [],
"seazones" => []
],
SpaceIDs::BREMEN => [
"x" => 2714,
"y" => 547,
"name" => "Bremen",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::HAMBURG,
  SpaceIDs::BRUNSWICK,
  SpaceIDs::MUNSTER],
"id" => SpaceIDs::BREMEN,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::MUNSTER => [
"x" => 2620,
"y" => 662,
"name" => "Münster",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::BREMEN,
  SpaceIDs::KASSEL,
  SpaceIDs::AMSTERDAM],
"id" => SpaceIDs::MUNSTER,
"passes" => [],
"seazones" => []
],
SpaceIDs::KASSEL => [
"x" => 2785,
"y" => 839,
"name" => "Kassel",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::MAINZ,
  SpaceIDs::BRUNSWICK,
  SpaceIDs::MUNSTER,
  SpaceIDs::NUREMBERG,
  SpaceIDs::ERFURT],
"id" => SpaceIDs::KASSEL,
"passes" => [],
"seazones" => []
],
SpaceIDs::ERFURT => [
"x" => 2942,
"y" => 875,
"name" => "Erfurt",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::KASSEL,
  SpaceIDs::MAGDEBURG,
  SpaceIDs::LEIPZIG],
"id" => SpaceIDs::ERFURT,
"passes" => [],
"seazones" => []
],
SpaceIDs::LEIPZIG => [
"x" => 3101,
"y" => 813,
"name" => "Leipzig",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::WITTENBERG,
  SpaceIDs::NUREMBERG,
  SpaceIDs::ERFURT,
  SpaceIDs::PRAGUE],
"id" => SpaceIDs::LEIPZIG,
"passes" => [],
"seazones" => []
],
SpaceIDs::NUREMBERG => [
"x" => 2954,
"y" => 1049,
"name" => "Nuremberg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::KASSEL,
  SpaceIDs::REGENSBURG,
  SpaceIDs::LEIPZIG,
  SpaceIDs::AUGSBURG,
  SpaceIDs::WORMS],
"id" => SpaceIDs::NUREMBERG,
"passes" => [],
"seazones" => []
],
SpaceIDs::WORMS => [
"x" => 2823,
"y" => 1133,
"name" => "Worms",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::MAINZ,
  SpaceIDs::NUREMBERG,
  SpaceIDs::AUGSBURG,
  SpaceIDs::STRASBURG],
"id" => SpaceIDs::WORMS,
"passes" => [],
"seazones" => []
],
SpaceIDs::REGENSBURG => [
"x" => 3152,
"y" => 1079,
"name" => "Regensburg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::SALZBURG,
  SpaceIDs::NUREMBERG,
  SpaceIDs::AUGSBURG,
  SpaceIDs::LINZ],
"id" => SpaceIDs::REGENSBURG,
"passes" => [],
"seazones" => []
],
SpaceIDs::STRASBURG => [
"x" => 2698,
"y" => 1194,
"name" => "Strasburg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::WORMS,
  SpaceIDs::METZ,
  SpaceIDs::BESANCON,
  SpaceIDs::BASEL],
"id" => SpaceIDs::STRASBURG,
"passes" => [],
"seazones" => []
],
SpaceIDs::SALZBURG => [
"x" => 3267,
"y" => 1233,
"name" => "Salzburg",
"home_power" => Powers::PROTESTANT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::INNSBRUCK,
  SpaceIDs::REGENSBURG,
  SpaceIDs::AUGSBURG,
  SpaceIDs::LINZ],
"id" => SpaceIDs::SALZBURG,
"passes" => [
  SpaceIDs::GRAZ],
"seazones" => []
],
SpaceIDs::VIENNA => [
"x" => 3594,
"y" => 1144,
"name" => "Vienna",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::LINZ,
  SpaceIDs::BRUNN,
  SpaceIDs::PRESSBURG,
  SpaceIDs::GRAZ],
"id" => SpaceIDs::VIENNA,
"passes" => [],
"seazones" => []
],
SpaceIDs::LINZ => [
"x" => 3406,
"y" => 1172,
"name" => "Linz",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::VIENNA,
  SpaceIDs::REGENSBURG,
  SpaceIDs::SALZBURG,
  SpaceIDs::PRAGUE],
"id" => SpaceIDs::LINZ,
"passes" => [],
"seazones" => []
],
SpaceIDs::GRAZ => [
"x" => 3491,
"y" => 1331,
"name" => "Graz",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::VIENNA,
  SpaceIDs::MOHACS,
  SpaceIDs::TRIESTE,
  SpaceIDs::AGRAM],
"id" => SpaceIDs::GRAZ,
"passes" => [
  SpaceIDs::SALZBURG],
"seazones" => []
],
SpaceIDs::INNSBRUCK => [
"x" => 3135,
"y" => 1295,
"name" => "Innsbruck",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::SALZBURG,
  SpaceIDs::ZURICH],
"id" => SpaceIDs::INNSBRUCK,
"passes" => [
  SpaceIDs::AUGSBURG],
"seazones" => []
],
SpaceIDs::ZURICH => [
"x" => 2830,
"y" => 1342,
"name" => "Zürich",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::BASEL,
  SpaceIDs::INNSBRUCK],
"id" => SpaceIDs::ZURICH,
"passes" => [],
"seazones" => []
],
SpaceIDs::BASEL => [
"x" => 2675,
"y" => 1338,
"name" => "Basel",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::GERMAN,
"connections" => [
  SpaceIDs::ZURICH,
  SpaceIDs::STRASBURG,
  SpaceIDs::GENEVA,
  SpaceIDs::BESANCON],
"id" => SpaceIDs::BASEL,
"passes" => [],
"seazones" => []
],
SpaceIDs::LONDON => [
"x" => 1904,
"y" => 830,
"name" => "London",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::NORWICH,
  SpaceIDs::LINCOLN,
  SpaceIDs::SHREWSBURY,
  SpaceIDs::BRISTOL,
  SpaceIDs::PORTSMOUTH],
"id" => SpaceIDs::LONDON,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::BRISTOL => [
"x" => 1674,
"y" => 812,
"name" => "Bristol",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::LONDON,
  SpaceIDs::WALES,
  SpaceIDs::SHREWSBURY,
  SpaceIDs::PLYMOUTH,
  SpaceIDs::PORTSMOUTH],
"id" => SpaceIDs::BRISTOL,
"passes" => [],
"seazones" => [
  SeazoneIds::IRISH_SEA]
],
SpaceIDs::YORK => [
"x" => 1715,
"y" => 499,
"name" => "York",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::CARLISLE,
  SpaceIDs::LINCOLN,
  SpaceIDs::SHREWSBURY,
  SpaceIDs::BERWICK],
"id" => SpaceIDs::YORK,
"passes" => [],
"seazones" => []
],
SpaceIDs::NORWICH => [
"x" => 2016,
"y" => 663,
"name" => "Norwich",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::LONDON],
"id" => SpaceIDs::NORWICH,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::PORTSMOUTH => [
"x" => 1784,
"y" => 945,
"name" => "Portsmouth",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::LONDON,
  SpaceIDs::BRISTOL,
  SpaceIDs::PLYMOUTH],
"id" => SpaceIDs::PORTSMOUTH,
"passes" => [],
"seazones" => [
  SeazoneIds::ENGLISH_CHANNEL]
],
SpaceIDs::PLYMOUTH => [
"x" => 1517,
"y" => 1023,
"name" => "Plymouth",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::BRISTOL,
  SpaceIDs::PLYMOUTH],
"id" => SpaceIDs::PLYMOUTH,
"passes" => [],
"seazones" => [
  SeazoneIds::ENGLISH_CHANNEL]
],
SpaceIDs::LINCOLN => [
"x" => 1828,
"y" => 658,
"name" => "Lincoln",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::LONDON,
  SpaceIDs::YORK],
"id" => SpaceIDs::LINCOLN,
"passes" => [],
"seazones" => []
],
SpaceIDs::WALES => [
"x" => 1518,
"y" => 758,
"name" => "Wales",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::BRISTOL,
  SpaceIDs::SHREWSBURY],
"id" => SpaceIDs::WALES,
"passes" => [],
"seazones" => []
],
SpaceIDs::SHREWSBURY => [
"x" => 1657,
"y" => 646,
"name" => "Shrewsbury",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::LONDON,
  SpaceIDs::WALES,
  SpaceIDs::BRISTOL,
  SpaceIDs::YORK,
  SpaceIDs::CARLISLE],
"id" => SpaceIDs::SHREWSBURY,
"passes" => [],
"seazones" => []
],
SpaceIDs::CARLISLE => [
"x" => 1569,
"y" => 404,
"name" => "Carlisle",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::BERWICK,
  SpaceIDs::YORK,
  SpaceIDs::SHREWSBURY,
  SpaceIDs::GLASGOW],
"id" => SpaceIDs::CARLISLE,
"passes" => [],
"seazones" => []
],
SpaceIDs::BERWICK => [
"x" => 1692,
"y" => 308,
"name" => "Berwick",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::CARLISLE,
  SpaceIDs::YORK,
  SpaceIDs::EDINBURGH],
"id" => SpaceIDs::BERWICK,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::EDINBURGH => [
"x" => 1540,
"y" => 254,
"name" => "Edinburgh",
"home_power" => Powers::MINOR_SCOTLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::BERWICK,
  SpaceIDs::STIRLING,
  SpaceIDs::GLASGOW],
"id" => SpaceIDs::EDINBURGH,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::STIRLING => [
"x" => 1382,
"y" => 204,
"name" => "Stirling",
"home_power" => Powers::MINOR_SCOTLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::EDINBURGH,
  SpaceIDs::GLASGOW],
"id" => SpaceIDs::STIRLING,
"passes" => [],
"seazones" => []
],
SpaceIDs::GLASGOW => [
"x" => 1403,
"y" => 362,
"name" => "Glasgow",
"home_power" => Powers::MINOR_SCOTLAND,
"language" => LanguageZones::ENGLISH,
"connections" => [
  SpaceIDs::CARLISLE,
  SpaceIDs::STIRLING,
  SpaceIDs::EDINBURGH],
"id" => SpaceIDs::GLASGOW,
"passes" => [],
"seazones" => [
  SeazoneIds::IRISH_SEA]
],
SpaceIDs::PARIS => [
"x" => 2128,
"y" => 1188,
"name" => "Paris",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::ROUEN,
  SpaceIDs::BOULOGNE,
  SpaceIDs::ST_QUENTIN,
  SpaceIDs::ST_DIZIER,
  SpaceIDs::DIJON],
"id" => SpaceIDs::PARIS,
"passes" => [],
"seazones" => []
],
SpaceIDs::LYON => [
"x" => 2430,
"y" => 1567,
"name" => "Lyon",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::GENEVA,
  SpaceIDs::ORLEANS,
  SpaceIDs::DIJON,
  SpaceIDs::LIMOGES,
  SpaceIDs::AVIGNON],
"id" => SpaceIDs::LYON,
"passes" => [],
"seazones" => []
],
SpaceIDs::ROUEN => [
"x" => 1926,
"y" => 1123,
"name" => "Rouen",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::PARIS,
  SpaceIDs::BOULOGNE,
  SpaceIDs::TOURS,
  SpaceIDs::NANTES],
"id" => SpaceIDs::ROUEN,
"passes" => [],
"seazones" => [
  SeazoneIds::ENGLISH_CHANNEL]
],
SpaceIDs::MARSEILLE => [
"x" => 2506,
"y" => 1905,
"name" => "Marseille",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::AVIGNON,
  SpaceIDs::NICE],
"id" => SpaceIDs::MARSEILLE,
"passes" => [],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::BORDEAUX => [
"x" => 1899,
"y" => 1690,
"name" => "Bordeaux",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::NANTES,
  SpaceIDs::TOURS,
  SpaceIDs::LIMOGES,
  SpaceIDs::TOULOUSE],
"id" => SpaceIDs::BORDEAUX,
"passes" => [
  SpaceIDs::NAVARRE],
"seazones" => [
  SeazoneIds::BAY_OF_BISCAY]
],
SpaceIDs::GRENOBLE => [
"x" => 2556,
"y" => 1716,
"name" => "Grenoble",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::LYON,
  SpaceIDs::GENEVA],
"id" => SpaceIDs::GRENOBLE,
"passes" => [
  SpaceIDs::TURIN],
"seazones" => []
],
SpaceIDs::DIJON => [
"x" => 2321,
"y" => 1332,
"name" => "Dijon",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::ORLEANS,
  SpaceIDs::LYON,
  SpaceIDs::BESANCON,
  SpaceIDs::PARIS,
  SpaceIDs::ST_DIZIER],
"id" => SpaceIDs::DIJON,
"passes" => [],
"seazones" => []
],
SpaceIDs::ST_DIZIER => [
"x" => 2322,
"y" => 1170,
"name" => "St. Dizier",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::PARIS,
  SpaceIDs::ST_QUENTIN,
  SpaceIDs::BRUSSELS,
  SpaceIDs::METZ,
  SpaceIDs::DIJON],
"id" => SpaceIDs::ST_DIZIER,
"passes" => [],
"seazones" => []
],
SpaceIDs::ST_QUENTIN => [
"x" => 2211,
"y" => 1059,
"name" => "St. Quentin",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::PARIS,
  SpaceIDs::BOULOGNE,
  SpaceIDs::BRUSSELS,
  SpaceIDs::ST_DIZIER],
"id" => SpaceIDs::ST_QUENTIN,
"passes" => [],
"seazones" => []
],
SpaceIDs::BOULOGNE => [
"x" => 2075,
"y" => 1005,
"name" => "Boulogne",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::PARIS,
  SpaceIDs::ST_QUENTIN,
  SpaceIDs::ROUEN,
  SpaceIDs::CALAIS],
"id" => SpaceIDs::BOULOGNE,
"passes" => [],
"seazones" => [
  SeazoneIds::ENGLISH_CHANNEL]
],
SpaceIDs::ORLEANS => [
"x" => 2138,
"y" => 1345,
"name" => "Orleans",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::PARIS,
  SpaceIDs::TOURS,
  SpaceIDs::DIJON,
  SpaceIDs::LYON],
"id" => SpaceIDs::ORLEANS,
"passes" => [],
"seazones" => []
],
SpaceIDs::AVIGNON => [
"x" => 2410,
"y" => 1771,
"name" => "Avignon",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::LYON,
  SpaceIDs::MARSEILLE,
  SpaceIDs::TOULOUSE],
"id" => SpaceIDs::AVIGNON,
"passes" => [
  SpaceIDs::BARCELONA],
"seazones" => []
],
SpaceIDs::TOULOUSE => [
"x" => 2110,
"y" => 1862,
"name" => "Toulouse",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::BORDEAUX,
  SpaceIDs::AVIGNON],
"id" => SpaceIDs::TOULOUSE,
"passes" => [
  SpaceIDs::BARCELONA],
"seazones" => []
],
SpaceIDs::LIMOGES => [
"x" => 2094,
"y" => 1522,
"name" => "Limoges",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::LYON,
  SpaceIDs::TOURS,
  SpaceIDs::BORDEAUX],
"id" => SpaceIDs::LIMOGES,
"passes" => [],
"seazones" => []
],
SpaceIDs::TOURS => [
"x" => 1969,
"y" => 1403,
"name" => "Tours",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::ROUEN,
  SpaceIDs::ORLEANS,
  SpaceIDs::BORDEAUX,
  SpaceIDs::LIMOGES,
  SpaceIDs::NANTES],
"id" => SpaceIDs::TOURS,
"passes" => [],
"seazones" => []
],
SpaceIDs::NANTES => [
"x" => 1770,
"y" => 1434,
"name" => "Nantes",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::ROUEN,
  SpaceIDs::TOURS,
  SpaceIDs::BORDEAUX,
  SpaceIDs::BREST],
"id" => SpaceIDs::NANTES,
"passes" => [],
"seazones" => [
  SeazoneIds::BAY_OF_BISCAY]
],
SpaceIDs::BREST => [
"x" => 1528,
"y" => 1299,
"name" => "Brest",
"home_power" => Powers::FRANCE,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::NANTES],
"id" => SpaceIDs::BREST,
"passes" => [],
"seazones" => [
  SeazoneIds::ENGLISH_CHANNEL]
],
SpaceIDs::BRUSSELS => [
"x" => 2320,
"y" => 947,
"name" => "Brussels",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::CALAIS,
  SpaceIDs::ANTWERP,
  SpaceIDs::LIEGE,
  SpaceIDs::ST_QUENTIN,
  SpaceIDs::ST_DIZIER],
"id" => SpaceIDs::BRUSSELS,
"passes" => [],
"seazones" => []
],
SpaceIDs::BESANCON => [
"x" => 2510,
"y" => 1292,
"name" => "Besançon",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::DIJON,
  SpaceIDs::BASEL,
  SpaceIDs::GENEVA,
  SpaceIDs::METZ,
  SpaceIDs::STRASBURG],
"id" => SpaceIDs::BESANCON,
"passes" => [],
"seazones" => []
],
SpaceIDs::CALAIS => [
"x" => 2142,
"y" => 869,
"name" => "Calais",
"home_power" => Powers::ENGLAND,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::BOULOGNE,
  SpaceIDs::ANTWERP,
  SpaceIDs::BRUSSELS],
"id" => SpaceIDs::CALAIS,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::METZ => [
"x" => 2503,
"y" => 1118,
"name" => "Metz",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::TRIER,
  SpaceIDs::BESANCON,
  SpaceIDs::LIEGE,
  SpaceIDs::STRASBURG,
  SpaceIDs::ST_DIZIER],
"id" => SpaceIDs::METZ,
"passes" => [],
"seazones" => []
],
SpaceIDs::LIEGE => [
"x" => 2471,
"y" => 908,
"name" => "Liege",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::TRIER,
  SpaceIDs::ANTWERP,
  SpaceIDs::BRUSSELS,
  SpaceIDs::METZ,
  SpaceIDs::COLOGNE],
"id" => SpaceIDs::LIEGE,
"passes" => [],
"seazones" => []
],
SpaceIDs::GENEVA => [
"x" => 2593,
"y" => 1491,
"name" => "Geneva",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::LYON,
  SpaceIDs::BESANCON,
  SpaceIDs::BASEL,
  SpaceIDs::GRENOBLE],
"id" => SpaceIDs::GENEVA,
"passes" => [
  SpaceIDs::TURIN],
"seazones" => []
],
SpaceIDs::NICE => [
"x" => 2700,
"y" => 1858,
"name" => "Nice",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::FRENCH,
"connections" => [
  SpaceIDs::MARSEILLE],
"id" => SpaceIDs::NICE,
"passes" => [
  SpaceIDs::GENOA],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::ROME => [
"x" => 3241,
"y" => 2045,
"name" => "Rome",
"home_power" => Powers::PAPACY,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::NAPLES,
  SpaceIDs::SIENA,
  SpaceIDs::ANCONA,
  SpaceIDs::CERIGNOLA],
"id" => SpaceIDs::ROME,
"passes" => [],
"seazones" => [
  SeazoneIds::TYRRHENIAN_SEA]
],
SpaceIDs::RAVENNA => [
"x" => 3247,
"y" => 1720,
"name" => "Ravenna",
"home_power" => Powers::PAPACY,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::ANCONA,
  SpaceIDs::VENICE,
  SpaceIDs::MODENA],
"id" => SpaceIDs::RAVENNA,
"passes" => [],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
],
SpaceIDs::ANCONA => [
"x" => 3357,
"y" => 1878,
"name" => "Ancona",
"home_power" => Powers::PAPACY,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::RAVENNA,
  SpaceIDs::ROME,
  SpaceIDs::CERIGNOLA],
"id" => SpaceIDs::ANCONA,
"passes" => [],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
],
SpaceIDs::NAPLES => [
"x" => 3475,
"y" => 2213,
"name" => "Naples",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::TARANTO,
  SpaceIDs::ROME,
  SpaceIDs::MESSINA],
"id" => SpaceIDs::NAPLES,
"passes" => [],
"seazones" => [
  SeazoneIds::TYRRHENIAN_SEA]
],
SpaceIDs::TRIESTE => [
"x" => 3375,
"y" => 1515,
"name" => "Trieste",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::VENICE,
  SpaceIDs::GRAZ,
  SpaceIDs::AGRAM,
  SpaceIDs::ZARA],
"id" => SpaceIDs::TRIESTE,
"passes" => [],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
],
SpaceIDs::CERIGNOLA => [
"x" => 3544,
"y" => 2042,
"name" => "Cerignola",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::ANCONA,
  SpaceIDs::ROME,
  SpaceIDs::TARANTO],
"id" => SpaceIDs::CERIGNOLA,
"passes" => [],
"seazones" => []
],
SpaceIDs::TARANTO => [
"x" => 3716,
"y" => 2205,
"name" => "Taranto",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::NAPLES,
  SpaceIDs::CERIGNOLA,
  SpaceIDs::MESSINA],
"id" => SpaceIDs::TARANTO,
"passes" => [],
"seazones" => [
  SeazoneIds::IONIAN_SEA]
],
SpaceIDs::MESSINA => [
"x" => 3594,
"y" => 2553,
"name" => "Messina",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::NAPLES,
  SpaceIDs::PALERMO,
  SpaceIDs::TARANTO],
"id" => SpaceIDs::MESSINA,
"passes" => [],
"seazones" => [
  SeazoneIds::TYRRHENIAN_SEA]
],
SpaceIDs::PALERMO => [
"x" => 3378,
"y" => 2546,
"name" => "Palermo",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::MESSINA],
"id" => SpaceIDs::PALERMO,
"passes" => [],
"seazones" => [
  SeazoneIds::TYRRHENIAN_SEA]
],
SpaceIDs::GENOA => [
"x" => 2844,
"y" => 1750,
"name" => "Genoa",
"home_power" => Powers::MINOR_GENOA,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::TURIN,
  SpaceIDs::PAVIA,
  SpaceIDs::FLORENCE,
  SpaceIDs::SIENA],
"id" => SpaceIDs::GENOA,
"passes" => [
  SpaceIDs::NICE],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::VENICE => [
"x" => 3205,
"y" => 1524,
"name" => "Venice",
"home_power" => Powers::MINOR_VENICE,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::TRENT,
  SpaceIDs::MODENA,
  SpaceIDs::RAVENNA,
  SpaceIDs::TRIESTE],
"id" => SpaceIDs::VENICE,
"passes" => [],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
],
SpaceIDs::MILAN => [
"x" => 2864,
"y" => 1495,
"name" => "Milan",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::TRENT,
  SpaceIDs::MODENA,
  SpaceIDs::PAVIA,
  SpaceIDs::TURIN],
"id" => SpaceIDs::MILAN,
"passes" => [],
"seazones" => []
],
SpaceIDs::FLORENCE => [
"x" => 3094,
"y" => 1769,
"name" => "Florence",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::MODENA,
  SpaceIDs::GENOA,
  SpaceIDs::SIENA],
"id" => SpaceIDs::FLORENCE,
"passes" => [],
"seazones" => []
],
SpaceIDs::TURIN => [
"x" => 2702,
"y" => 1655,
"name" => "Turin",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::MILAN,
  SpaceIDs::PAVIA,
  SpaceIDs::GENOA],
"id" => SpaceIDs::TURIN,
"passes" => [
  SpaceIDs::GENEVA],
"seazones" => []
],
SpaceIDs::TRENT => [
"x" => 3051,
"y" => 1436,
"name" => "Trent",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::MODENA,
  SpaceIDs::VENICE,
  SpaceIDs::MILAN],
"id" => SpaceIDs::TRENT,
"passes" => [
  SpaceIDs::INNSBRUCK],
"seazones" => []
],
SpaceIDs::MODENA => [
"x" => 3069,
"y" => 1613,
"name" => "Modena",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::MILAN,
  SpaceIDs::VENICE,
  SpaceIDs::RAVENNA,
  SpaceIDs::PAVIA,
  SpaceIDs::FLORENCE],
"id" => SpaceIDs::MODENA,
"passes" => [],
"seazones" => []
],
SpaceIDs::PAVIA => [
"x" => 2917,
"y" => 1630,
"name" => "Pavia",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::MILAN,
  SpaceIDs::MODENA,
  SpaceIDs::GENOA,
  SpaceIDs::TURIN],
"id" => SpaceIDs::PAVIA,
"passes" => [],
"seazones" => []
],
SpaceIDs::SIENA => [
"x" => 3106,
"y" => 1932,
"name" => "Siena",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::ITALIAN,
"connections" => [
  SpaceIDs::FLORENCE,
  SpaceIDs::ROME,
  SpaceIDs::GENOA],
"id" => SpaceIDs::SIENA,
"passes" => [],
"seazones" => []
],
SpaceIDs::VALLADOLID => [
"x" => 1514,
"y" => 2180,
"name" => "Valladolid",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::MADRID,
  SpaceIDs::BILBAO,
  SpaceIDs::CORUNNA],
"id" => SpaceIDs::VALLADOLID,
"passes" => [],
"seazones" => []
],
SpaceIDs::NAVARRE => [
"x" => 1822,
"y" => 1939,
"name" => "Navarre",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::BILBAO,
  SpaceIDs::ZARAGOZA],
"id" => SpaceIDs::NAVARRE,
"passes" => [
  SpaceIDs::BORDEAUX],
"seazones" => []
],
SpaceIDs::BARCELONA => [
"x" => 2227,
"y" => 2186,
"name" => "Barcelona",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::ZARAGOZA,
  SpaceIDs::VALENCIA],
"id" => SpaceIDs::BARCELONA,
"passes" => [
  SpaceIDs::TOULOUSE],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::SEVILLE => [
"x" => 1442,
"y" => 2766,
"name" => "Seville",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::CORDOBA,
  SpaceIDs::GIBRALTAR],
"id" => SpaceIDs::SEVILLE,
"passes" => [],
"seazones" => [
  SeazoneIds::ATLANTIC_OCEAN]
],
SpaceIDs::GIBRALTAR => [
"x" => 1494,
"y" => 2945,
"name" => "Gibraltar",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::SEVILLE,
  SpaceIDs::GRANADA],
"id" => SpaceIDs::GIBRALTAR,
"passes" => [],
"seazones" => [
  SeazoneIds::ATLANTIC_OCEAN]
],
SpaceIDs::CORUNNA => [
"x" => 1136,
"y" => 1996,
"name" => "Corunna",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::BILBAO,
  SpaceIDs::VALLADOLID],
"id" => SpaceIDs::CORUNNA,
"passes" => [],
"seazones" => [
  SeazoneIds::BAY_OF_BISCAY]
],
SpaceIDs::BILBAO => [
"x" => 1653,
"y" => 1950,
"name" => "Bilbao",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::CORUNNA,
  SpaceIDs::VALLADOLID,
  SpaceIDs::NAVARRE,
  SpaceIDs::ZARAGOZA],
"id" => SpaceIDs::BILBAO,
"passes" => [],
"seazones" => []
],
SpaceIDs::ZARAGOZA => [
"x" => 1897,
"y" => 2150,
"name" => "Zaragoza",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::BILBAO,
  SpaceIDs::MADRID,
  SpaceIDs::NAVARRE,
  SpaceIDs::BARCELONA],
"id" => SpaceIDs::ZARAGOZA,
"passes" => [],
"seazones" => []
],
SpaceIDs::MADRID => [
"x" => 1670,
"y" => 2358,
"name" => "Madrid",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::VALLADOLID,
  SpaceIDs::ZARAGOZA,
  SpaceIDs::VALENCIA,
  SpaceIDs::CORDOBA],
"id" => SpaceIDs::MADRID,
"passes" => [],
"seazones" => []
],
SpaceIDs::VALENCIA => [
"x" => 1992,
"y" => 2457,
"name" => "Valencia",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::MADRID,
  SpaceIDs::BARCELONA,
  SpaceIDs::CARTAGENA],
"id" => SpaceIDs::VALENCIA,
"passes" => [],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::PALMA => [
"x" => 2341,
"y" => 2392,
"name" => "Palma",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [],
"id" => SpaceIDs::PALMA,
"passes" => [],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::CORDOBA => [
"x" => 1566,
"y" => 2654,
"name" => "Cordoba",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::SEVILLE,
  SpaceIDs::GRANADA,
  SpaceIDs::MADRID],
"id" => SpaceIDs::CORDOBA,
"passes" => [],
"seazones" => []
],
SpaceIDs::GRANADA => [
"x" => 1676,
"y" => 2781,
"name" => "Granada",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::CORDOBA,
  SpaceIDs::GIBRALTAR,
  SpaceIDs::CARTAGENA],
"id" => SpaceIDs::GRANADA,
"passes" => [],
"seazones" => []
],
SpaceIDs::CARTAGENA => [
"x" => 1949,
"y" => 2716,
"name" => "Cartagena",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::SPANISH,
"connections" => [
  SpaceIDs::VALENCIA,
  SpaceIDs::GRANADA],
"id" => SpaceIDs::CARTAGENA,
"passes" => [],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::ISTANBUL => [
"x" => 4892,
"y" => 2014,
"name" => "Istanbul",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::EDIRNE,
  SpaceIDs::VARNA],
"id" => SpaceIDs::ISTANBUL,
"passes" => [],
"seazones" => [
  SeazoneIds::BLACK_SEA]
],
SpaceIDs::EDIRNE => [
"x" => 4651,
"y" => 1964,
"name" => "Edirne",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::ISTANBUL,
  SpaceIDs::VARNA,
  SpaceIDs::SOFIA,
  SpaceIDs::SALONIKA],
"id" => SpaceIDs::EDIRNE,
"passes" => [],
"seazones" => []
],
SpaceIDs::SALONIKA => [
"x" => 4283,
"y" => 2134,
"name" => "Salonika",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::EDIRNE,
  SpaceIDs::LARISSA],
"id" => SpaceIDs::SALONIKA,
"passes" => [
  SpaceIDs::SOFIA],
"seazones" => [
  SeazoneIds::AEGEAN_SEA]
],
SpaceIDs::ATHENS => [
"x" => 4404,
"y" => 2470,
"name" => "Athens",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::LARISSA,
  SpaceIDs::LEPANTO,
  SpaceIDs::CORON],
"id" => SpaceIDs::ATHENS,
"passes" => [],
"seazones" => [
  SeazoneIds::AEGEAN_SEA]
],
SpaceIDs::SCUTARI => [
"x" => 3937,
"y" => 1984,
"name" => "Scutari",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::DURAZZO,
  SpaceIDs::RAGUSA],
"id" => SpaceIDs::SCUTARI,
"passes" => [
  SpaceIDs::NEZH],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
],
SpaceIDs::VARNA => [
"x" => 4772,
"y" => 1747,
"name" => "Varna",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BUCHAREST,
  SpaceIDs::EDIRNE,
  SpaceIDs::ISTANBUL],
"id" => SpaceIDs::VARNA,
"passes" => [],
"seazones" => [
  SeazoneIds::BLACK_SEA]
],
SpaceIDs::BUCHAREST => [
"x" => 4576,
"y" => 1552,
"name" => "Bucharest",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::NICOPOLIS,
  SpaceIDs::VARNA],
"id" => SpaceIDs::BUCHAREST,
"passes" => [],
"seazones" => []
],
SpaceIDs::NICOPOLIS => [
"x" => 4454,
"y" => 1694,
"name" => "Nicopolis",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BUCHAREST,
  SpaceIDs::BELGRADE],
"id" => SpaceIDs::NICOPOLIS,
"passes" => [
  SpaceIDs::SOFIA],
"seazones" => []
],
SpaceIDs::SOFIA => [
"x" => 4392,
"y" => 1890,
"name" => "Sofia",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::EDIRNE,
  SpaceIDs::NEZH],
"id" => SpaceIDs::SOFIA,
"passes" => [
  SpaceIDs::NICOPOLIS],
"seazones" => []
],
SpaceIDs::LARISSA => [
"x" => 4249,
"y" => 2307,
"name" => "Larissa",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::SALONIKA,
  SpaceIDs::LEPANTO,
  SpaceIDs::ATHENS],
"id" => SpaceIDs::LARISSA,
"passes" => [
  SpaceIDs::DURAZZO],
"seazones" => []
],
SpaceIDs::LEPANTO => [
"x" => 4177,
"y" => 2446,
"name" => "Lepanto",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::LARISSA,
  SpaceIDs::ATHENS],
"id" => SpaceIDs::LEPANTO,
"passes" => [],
"seazones" => [
  SeazoneIds::IONIAN_SEA]
],
SpaceIDs::CORON => [
"x" => 4264,
"y" => 2634,
"name" => "Coron",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::ATHENS],
"id" => SpaceIDs::CORON,
"passes" => [],
"seazones" => [
  SeazoneIds::IONIAN_SEA]
],
SpaceIDs::NEZH => [
"x" => 4188,
"y" => 1777,
"name" => "Nezh",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BELGRADE,
  SpaceIDs::SOFIA],
"id" => SpaceIDs::NEZH,
"passes" => [
  SpaceIDs::SCUTARI],
"seazones" => []
],
SpaceIDs::DURAZZO => [
"x" => 3963,
"y" => 2164,
"name" => "Durazzo",
"home_power" => Powers::OTTOMAN,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::SCUTARI],
"id" => SpaceIDs::DURAZZO,
"passes" => [
  SpaceIDs::LARISSA],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
],
SpaceIDs::ALGIERS => [
"x" => 2394,
"y" => 2779,
"name" => "Algiers",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::ALGIERS,
"passes" => [],
"seazones" => [
  SeazoneIds::BARBARY_COAST]
],
SpaceIDs::ORAN => [
"x" => 2021,
"y" => 2944,
"name" => "Oran",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::ORAN,
"passes" => [],
"seazones" => [
  SeazoneIds::BARBARY_COAST]
],
SpaceIDs::TRIPOLI => [
"x" => 3435,
"y" => 3153,
"name" => "Tripoli",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::TRIPOLI,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_AFRICAN_COAST]
],
SpaceIDs::BELGRADE => [
"x" => 4010,
"y" => 1574,
"name" => "Belgrade",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::NICOPOLIS,
  SpaceIDs::NEZH,
  SpaceIDs::SZEGEDIN,
  SpaceIDs::MOHACS,
  SpaceIDs::AGRAM],
"id" => SpaceIDs::BELGRADE,
"passes" => [
  SpaceIDs::RAGUSA],
"seazones" => []
],
SpaceIDs::BUDA => [
"x" => 3865,
"y" => 1232,
"name" => "Buda",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::SZEGEDIN,
  SpaceIDs::MOHACS,
  SpaceIDs::PRESSBURG],
"id" => SpaceIDs::BUDA,
"passes" => [],
"seazones" => []
],
SpaceIDs::PRAGUE => [
"x" => 3346,
"y" => 912,
"name" => "Prague",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BRUNN,
  SpaceIDs::LINZ,
  SpaceIDs::WITTENBERG,
  SpaceIDs::LEIPZIG],
"id" => SpaceIDs::PRAGUE,
"passes" => [],
"seazones" => []
],
SpaceIDs::SZEGEDIN => [
"x" => 3964,
"y" => 1393,
"name" => "Szegedin",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BUDA,
  SpaceIDs::BELGRADE],
"id" => SpaceIDs::SZEGEDIN,
"passes" => [
  SpaceIDs::NICOPOLIS],
"seazones" => []
],
SpaceIDs::PRESSBURG => [
"x" => 3731,
"y" => 1207,
"name" => "Pressburg",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BUDA,
  SpaceIDs::VIENNA],
"id" => SpaceIDs::PRESSBURG,
"passes" => [],
"seazones" => []
],
SpaceIDs::MOHACS => [
"x" => 3829,
"y" => 1477,
"name" => "Mohacs",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BUDA,
  SpaceIDs::BELGRADE,
  SpaceIDs::GRAZ,
  SpaceIDs::AGRAM],
"id" => SpaceIDs::MOHACS,
"passes" => [],
"seazones" => []
],
SpaceIDs::AGRAM => [
"x" => 3578,
"y" => 1496,
"name" => "Agram",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::TRIESTE,
  SpaceIDs::GRAZ,
  SpaceIDs::MOHACS,
  SpaceIDs::BELGRADE],
"id" => SpaceIDs::AGRAM,
"passes" => [
  SpaceIDs::ZARA],
"seazones" => []
],
SpaceIDs::BRUNN => [
"x" => 3645,
"y" => 966,
"name" => "Brunn",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BRESLAU,
  SpaceIDs::PRAGUE,
  SpaceIDs::VIENNA],
"id" => SpaceIDs::BRUNN,
"passes" => [],
"seazones" => []
],
SpaceIDs::BRESLAU => [
"x" => 3585,
"y" => 765,
"name" => "Breslau",
"home_power" => Powers::MINOR_HUNGARY,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::BRUNN,
  SpaceIDs::WITTENBERG,
  SpaceIDs::BRANDENBURG],
"id" => SpaceIDs::BRESLAU,
"passes" => [],
"seazones" => []
],
SpaceIDs::ANTWERP => [
"x" => 2287,
"y" => 795,
"name" => "Antwerp",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::CALAIS,
  SpaceIDs::LIEGE,
  SpaceIDs::BRUSSELS,
  SpaceIDs::AMSTERDAM],
"id" => SpaceIDs::ANTWERP,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::MALTA => [
"x" => 3498,
"y" => 2839,
"name" => "Malta",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::MALTA,
"passes" => [],
"seazones" => [
  SeazoneIds::IONIAN_SEA]
],
SpaceIDs::CAGLIARI => [
"x" => 2949,
"y" => 2448,
"name" => "Cagliari",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::CAGLIARI,
"passes" => [],
"seazones" => [
  SeazoneIds::TYRRHENIAN_SEA]
],
SpaceIDs::AMSTERDAM => [
"x" => 2363,
"y" => 672,
"name" => "Amsterdam",
"home_power" => Powers::HAPSBURG,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::ANTWERP,
  SpaceIDs::MUNSTER],
"id" => SpaceIDs::AMSTERDAM,
"passes" => [],
"seazones" => [
  SeazoneIds::NORTH_SEA]
],
SpaceIDs::CANDIA => [
"x" => 4603,
"y" => 2791,
"name" => "Candia",
"home_power" => Powers::MINOR_VENICE,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::CANDIA,
"passes" => [],
"seazones" => [
  SeazoneIds::AEGEAN_SEA]
],
SpaceIDs::CORFU => [
"x" => 3987,
"y" => 2333,
"name" => "Corfu",
"home_power" => Powers::MINOR_VENICE,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::CORFU,
"passes" => [],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
],
SpaceIDs::ZARA => [
"x" => 3492,
"y" => 1696,
"name" => "Zara",
"home_power" => Powers::MINOR_VENICE,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::TRIESTE,
  SpaceIDs::RAGUSA],
"id" => SpaceIDs::ZARA,
"passes" => [
  SpaceIDs::AGRAM],
"seazones" => []
],
SpaceIDs::BASTIA => [
"x" => 2903,
"y" => 1951,
"name" => "Bastia",
"home_power" => Powers::MINOR_GENOA,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::BASTIA,
"passes" => [],
"seazones" => [
  SeazoneIds::GULF_OF_LYON]
],
SpaceIDs::TUNIS => [
"x" => 3064,
"y" => 2720,
"name" => "Tunis",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::TUNIS,
"passes" => [],
"seazones" => [
  SeazoneIds::BARBARY_COAST]
],
SpaceIDs::RHODES => [
"x" => 4851,
"y" => 2646,
"name" => "Rhodes",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::OTHER,
"connections" => [],
"id" => SpaceIDs::RHODES,
"passes" => [],
"seazones" => [
  SeazoneIds::AEGEAN_SEA]
],
SpaceIDs::RAGUSA => [
"x" => 3779,
"y" => 1874,
"name" => "Ragusa",
"home_power" => Powers::INDEPENDENT,
"language" => LanguageZones::OTHER,
"connections" => [
  SpaceIDs::ZARA,
  SpaceIDs::SCUTARI],
"id" => SpaceIDs::RAGUSA,
"passes" => [
  SpaceIDs::BELGRADE],
"seazones" => [
  SeazoneIds::ADRIATIC_SEA]
]
];

$this->tokens = [
TokenIDs::ENGLAND_KEY => [
"name" => "English Key",
"power" => Powers::ENGLAND,
"style" => "Control Keys Catholic england_key",
"db_id" => "england_scm_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "English Key Protestant",
"style" => "Control Keys Reformed england_key",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::FRANCE_KEY => [
"name" => "French Key",
"power" => Powers::FRANCE,
"style" => "Control Keys Catholic france_key",
"db_id" => "tbd_1001_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "French Key Protestant",
"style" => "Control Keys Reformed france_key",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::HAPSBURG_KEY => [
"name" => "Hapsburg Key",
"power" => Powers::HAPSBURG,
"style" => "Control Keys Catholic hapsburg_key",
"db_id" => "tbd_1002_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Hapsburg Key Protestant",
"style" => "Control Keys Reformed hapsburg_key",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::OTTOMAN_KEY => [
"name" => "Ottoman Key",
"power" => Powers::OTTOMAN,
"style" => "Control Keys Catholic ottoman_key",
"db_id" => "tbd_1003_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Ottoman Key Protestant",
"style" => "Control Keys Reformed ottoman_key",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::INDEPENDENT_KEY => [
"name" => "Independent Key",
"power" => Powers::INDEPENDENT,
"style" => "Control Keys Catholic independent_key",
"db_id" => "tbd_1004_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Independent Key Protestant",
"style" => "Control Keys Reformed independent_key",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::PAPACY_KEY => [
"name" => "Papacy Key",
"power" => Powers::PAPACY,
"style" => "Control Keys Catholic papacy_key",
"db_id" => "tbd_1005_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Papacy Key Protestant",
"style" => "Control Keys Reformed papacy_key",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::KEYS,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::ENGLAND_HEX => [
"name" => "English Hexagonal Marker",
"power" => Powers::ENGLAND,
"style" => "Control Hex Catholic england_hex",
"db_id" => "tbd_1006_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "English Hexagonal Marker Protestant",
"style" => "Control Hex Reformed england_hex",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::FRANCE_HEX => [
"name" => "French Hexagonal Marker",
"power" => Powers::FRANCE,
"style" => "Control Hex Catholic france_hex",
"db_id" => "tbd_1007_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "French Hexagonal Marker Protestant",
"style" => "Control Hex Reformed france_hex",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::HAPSBURG_HEX => [
"name" => "Hapsburg Hexagonal Marker",
"power" => Powers::HAPSBURG,
"style" => "Control Hex Catholic hapsburg_hex",
"db_id" => "tbd_1008_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Hapsburg Hexagonal Marker Protestant",
"style" => "Control Hex Reformed hapsburg_hex",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::INDEPENDENT_HEX => [
"name" => "Independent Hexagonal Marker",
"power" => Powers::INDEPENDENT,
"style" => "Control Hex Catholic independent_hex",
"db_id" => "tbd_1009_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Independent Hexagonal Marker Protestant",
"style" => "Control Hex Reformed independent_hex",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::OTTOMAN_HEX => [
"name" => "Ottoman Hexagonal Marker",
"power" => Powers::OTTOMAN,
"style" => "Control Hex Catholic ottoman_hex",
"db_id" => "tbd_1010_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Ottoman Hexagonal Marker Protestant",
"style" => "Control Hex Reformed ottoman_hex",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::PAPACY_HEX => [
"name" => "Papacy Hexagonal Marker",
"power" => Powers::PAPACY,
"style" => "Control Hex Catholic papacy_hex",
"db_id" => "tbd_1011_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Papacy Hexagonal Marker Protestant",
"style" => "Control Hex Reformed papacy_hex",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::PROTESTANT_HEX => [
"name" => "Protestant Hexagonal Marker",
"power" => Powers::PROTESTANT,
"style" => "Control Hex Catholic protestant_hex",
"db_id" => "tbd_1012_{INDEX}",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::CATHOLIC],
"BACK" => [
"name" => "Protestant Hexagonal Marker Protestant",
"style" => "Control Hex Reformed protestant_hex",
"types" => [
  tokenTypeIDs::CONTROL,
  tokenTypeIDs::HEX,
  tokenTypeIDs::REFORMED]
]
],
TokenIDs::ENGLAND_1UNIT => [
"name" => "English 1 Military Unit",
"power" => Powers::ENGLAND,
"style" => "Military Units england_1unit",
"db_id" => "england_1unit_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "English 1 Mercenary Unit",
"style" => "Military Units Mercenary england_1unit",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::ENGLAND_2UNIT => [
"name" => "English 2 Military Unit",
"power" => Powers::ENGLAND,
"style" => "Military Units england_2unit",
"db_id" => "tbd_1014_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "English 2 Mercenary Unit",
"style" => "Military Units Mercenary england_2unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::ENGLAND_4UNIT => [
"name" => "English 4 Military Unit",
"power" => Powers::ENGLAND,
"style" => "Military Units england_4unit",
"db_id" => "tbd_1015_{INDEX}",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "English 4 Mercenary Unit",
"style" => "Military Units Mercenary england_4unit",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::ENGLAND_6UNIT => [
"name" => "English 6 Military Unit",
"power" => Powers::ENGLAND,
"style" => "Military Units england_6unit",
"db_id" => "tbd_1016",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "English 6 Mercenary Unit",
"style" => "Military Units Mercenary england_6unit",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::FRANCE_1UNIT => [
"name" => "French 1 Military Unit",
"power" => Powers::FRANCE,
"style" => "Military Units france_1unit",
"db_id" => "tbd_1017_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "French 1 Mercenary Unit",
"style" => "Military Units Mercenary france_1unit",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::FRANCE_2UNIT => [
"name" => "French 2 Military Unit",
"power" => Powers::FRANCE,
"style" => "Military Units france_2unit",
"db_id" => "tbd_1018_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "French 2 Mercenary Unit",
"style" => "Military Units Mercenary france_2unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::FRANCE_4UNIT => [
"name" => "French 4 Military Unit",
"power" => Powers::FRANCE,
"style" => "Military Units france_4unit",
"db_id" => "tbd_1019_{INDEX}",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "French 4 Mercenary Unit",
"style" => "Military Units Mercenary france_4unit",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::FRANCE_6UNIT => [
"name" => "French 6 Military Unit",
"power" => Powers::FRANCE,
"style" => "Military Units france_6unit",
"db_id" => "tbd_1020",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "French 6 Mercenary Unit",
"style" => "Military Units Mercenary france_6unit",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::GENOA_1UNIT => [
"name" => "Genoese 1 Military Unit",
"power" => Powers::MINOR_GENOA,
"style" => "Military Units genoa_1unit",
"db_id" => "tbd_1021_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Genoese 2 Military Unit",
"style" => "Military Units genoa_1unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS]
]
],
TokenIDs::HAPSBURG_1UNIT => [
"name" => "Hapsburg 1 Military Unit",
"power" => Powers::HAPSBURG,
"style" => "Military Units hapsburg_1unit",
"db_id" => "tbd_1022_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Hapsburg 1 Mercenary Unit",
"style" => "Military Units Mercenary hapsburg_1unit",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::HAPSBURG_2UNIT => [
"name" => "Hapsburg 2 Military Unit",
"power" => Powers::HAPSBURG,
"style" => "Military Units hapsburg_2unit",
"db_id" => "tbd_1023_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Hapsburg 2 Mercenary Unit",
"style" => "Military Units Mercenary hapsburg_2unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::HAPSBURG_4UNIT => [
"name" => "Hapsburg 4 Military Unit",
"power" => Powers::HAPSBURG,
"style" => "Military Units hapsburg_4unit",
"db_id" => "tbd_1024_{INDEX}",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Hapsburg 4 Mercenary Unit",
"style" => "Military Units Mercenary hapsburg_4unit",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::HAPSBURG_6UNIT => [
"name" => "Hapsburg 6 Military Unit",
"power" => Powers::HAPSBURG,
"style" => "Military Units hapsburg_6unit",
"db_id" => "tbd_1025",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Hapsburg 6 Mercenary Unit",
"style" => "Military Units Mercenary hapsburg_6unit",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::HUNGARY_1UNIT => [
"name" => "Hungarian 1 Military Unit",
"power" => Powers::MINOR_HUNGARY,
"style" => "Military Units hungary_1unit",
"db_id" => "tbd_1026_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Hungarian 2 Military Unit",
"style" => "Military Units hungary_1unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS]
]
],
TokenIDs::HUNGARY_4UNIT => [
"name" => "Hungarian 4 Military Unit",
"power" => Powers::MINOR_HUNGARY,
"style" => "Military Units hungary_4unit",
"db_id" => "tbd_1027",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Hungarian 2 Military Unit",
"style" => "Military Units hungary_4unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS]
]
],
TokenIDs::INDEPENDENT_1UNIT => [
"name" => "Independent 1 Military Unit",
"power" => Powers::INDEPENDENT,
"style" => "Military Units independent_1unit",
"db_id" => "tbd_1028_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Independent 2 Military Unit",
"style" => "Military Units independent_1unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS]
]
],
TokenIDs::KNIGHTS_1UNIT => [
"name" => "Knights of Saint John 1 Military Unit",
"power" => Powers::INDEPENDENT,
"style" => "Military Units knights_1unit",
"db_id" => "tbd_1029",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS]
],
TokenIDs::OTTOMAN_1UNIT => [
"name" => "Ottoman 1 Military Unit",
"power" => Powers::OTTOMAN,
"style" => "Military Units ottoman_1unit",
"db_id" => "tbd_1030_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Ottoman 1 Cavalry Unit",
"style" => "Military Units Cavalry ottoman_1unit",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::CAVALRY]
]
],
TokenIDs::OTTOMAN_2UNIT => [
"name" => "Ottoman 2 Military Unit",
"power" => Powers::OTTOMAN,
"style" => "Military Units ottoman_2unit",
"db_id" => "tbd_1031_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Ottoman 2 Cavalry Unit",
"style" => "Military Units Cavalry ottoman_2unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::CAVALRY]
]
],
TokenIDs::OTTOMAN_4UNIT => [
"name" => "Ottoman 4 Military Unit",
"power" => Powers::OTTOMAN,
"style" => "Military Units ottoman_4unit",
"db_id" => "tbd_1032_{INDEX}",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Ottoman 4 Cavalry Unit",
"style" => "Military Units Cavalry ottoman_4unit",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::CAVALRY]
]
],
TokenIDs::OTTOMAN_6UNIT => [
"name" => "Ottoman 6 Military Unit",
"power" => Powers::OTTOMAN,
"style" => "Military Units ottoman_6unit",
"db_id" => "tbd_1033",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Ottoman 6 Cavalry Unit",
"style" => "Military Units Cavalry ottoman_6unit",
"strength" => 6,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::CAVALRY]
]
],
TokenIDs::PAPACY_1UNIT => [
"name" => "Papacy 1 Military Unit",
"power" => Powers::PAPACY,
"style" => "Military Units papacy_1unit",
"db_id" => "tbd_1034_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Papacy 1 Mercenary Unit",
"style" => "Military Units Mercenary papacy_1unit",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::PAPACY_2UNIT => [
"name" => "Papacy 2 Military Unit",
"power" => Powers::PAPACY,
"style" => "Military Units papacy_2unit",
"db_id" => "tbd_1035_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Papacy 2 Mercenary Unit",
"style" => "Military Units Mercenary papacy_2unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::PAPACY_4UNIT => [
"name" => "Papacy 4 Military Unit",
"power" => Powers::PAPACY,
"style" => "Military Units papacy_4unit",
"db_id" => "tbd_1036_{INDEX}",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Papacy 4 Mercenary Unit",
"style" => "Military Units Mercenary papacy_4unit",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::PROTESTANT_1UNIT => [
"name" => "Protestant 1 Military Unit",
"power" => Powers::PROTESTANT,
"style" => "Military Units protestant_1unit",
"db_id" => "tbd_1037_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Protestant 1 Mercenary Unit",
"style" => "Military Units Mercenary protestant_1unit",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::PROTESTANT_2UNIT => [
"name" => "Protestant 2 Military Unit",
"power" => Powers::PROTESTANT,
"style" => "Military Units protestant_2unit",
"db_id" => "tbd_1038_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Protestant 2 Mercenary Unit",
"style" => "Military Units Mercenary protestant_2unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::PROTESTANT_4UNIT => [
"name" => "Protestant 4 Military Unit",
"power" => Powers::PROTESTANT,
"style" => "Military Units protestant_4unit",
"db_id" => "tbd_1039_{INDEX}",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Protestant 4 Mercenary Unit",
"style" => "Military Units Mercenary protestant_4unit",
"strength" => 4,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS,
  tokenTypeIDs::MERCENARY]
]
],
TokenIDs::SCOTLAND_1UNIT => [
"name" => "Scottish 1 Military Unit",
"power" => Powers::MINOR_SCOTLAND,
"style" => "Military Units scotland_1unit",
"db_id" => "tbd_1040_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Scottish 2 Military Unit",
"style" => "Military Units scotland_1unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS]
]
],
TokenIDs::VENICE_1UNIT => [
"name" => "Venetian 1 Military Unit",
"power" => Powers::MINOR_VENICE,
"style" => "Military Units venice_1unit",
"db_id" => "tbd_1041_{INDEX}",
"strength" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS],
"BACK" => [
"name" => "Venetian 2 Military Unit",
"style" => "Military Units venice_1unit",
"strength" => 2,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::UNITS]
]
],
TokenIDs::BRANDON => [
"name" => "Brandon",
"power" => Powers::ENGLAND,
"style" => "Military Leader brandon",
"db_id" => "brandon",
"command_rating" => 6,
"battle_rating" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::CHARLES_V => [
"name" => "Charles V",
"power" => Powers::HAPSBURG,
"style" => "Military Leader Ruler charles_v",
"db_id" => "charles_v",
"command_rating" => 10,
"battle_rating" => 2,
"admin_rating" => 2,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER,
  tokenTypeIDs::RULER]
],
TokenIDs::DUDLEY => [
"name" => "Dudley",
"power" => Powers::OTHER,
"style" => "Military Leader dudley",
"db_id" => "dudly",
"command_rating" => 6,
"battle_rating" => 0,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::DUKE_ALVA => [
"name" => "Duke of Alva",
"power" => Powers::HAPSBURG,
"style" => "Military Leader duke_alva",
"db_id" => "duke_alva",
"command_rating" => 6,
"battle_rating" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::FERDINAND => [
"name" => "Ferdinand",
"power" => Powers::HAPSBURG,
"style" => "Military Leader ferdinand",
"db_id" => "tbd_1046",
"command_rating" => 6,
"battle_rating" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::FRANCIS_I => [
"name" => "Francis I",
"power" => Powers::FRANCE,
"style" => "Military Leader Ruler francis_i",
"db_id" => "tbd_1047",
"command_rating" => 8,
"battle_rating" => 1,
"admin_rating" => 1,
"card_bonus" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER,
  tokenTypeIDs::RULER]
],
TokenIDs::HENRY_II => [
"name" => "Henry II",
"power" => Powers::ENGLAND,
"style" => "Military Leader Ruler henry_ii",
"db_id" => "tbd_1048",
"command_rating" => 8,
"battle_rating" => 0,
"admin_rating" => 1,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER,
  tokenTypeIDs::RULER]
],
TokenIDs::HENRY_VIII => [
"name" => "Henry VIII",
"power" => Powers::ENGLAND,
"style" => "Military Leader Ruler henry_viii",
"db_id" => "tbd_1049",
"command_rating" => 8,
"battle_rating" => 1,
"admin_rating" => 1,
"card_bonus" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER,
  tokenTypeIDs::RULER]
],
TokenIDs::IBRAHIM => [
"name" => "Ibrahim",
"power" => Powers::OTTOMAN,
"style" => "Military Leader ibrahim",
"db_id" => "tbd_1050",
"command_rating" => 6,
"battle_rating" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::JOHN_FREDERICK => [
"name" => "John Frederick",
"power" => Powers::PROTESTANT,
"style" => "Military Leader john_frederick",
"db_id" => "tbd_1051",
"command_rating" => 6,
"battle_rating" => 0,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::MAURICE_OF_SAXONY => [
"name" => "Maurice of Saxony",
"power" => Powers::OTHER,
"style" => "Military Leader maurice_of_saxony",
"db_id" => "maurice_of_saxony",
"command_rating" => 6,
"battle_rating" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER],
"BACK" => [
"name" => "Maurice of Saxony",
"style" => "Military Leader maurice_of_saxony",
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
]
],
TokenIDs::MONTMORENCY => [
"name" => "Montmorency",
"power" => Powers::FRANCE,
"style" => "Military Leader montmorency",
"db_id" => "tbd_1053",
"command_rating" => 6,
"battle_rating" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::PHILIP_HESSE => [
"name" => "Philip of Hesse",
"power" => Powers::PROTESTANT,
"style" => "Military Leader philip_hesse",
"db_id" => "tbd_1054",
"command_rating" => 6,
"battle_rating" => 0,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::RENEGADE => [
"name" => "Charles Borbon, Renegade Leader",
"power" => Powers::OTHER,
"style" => "Military Leader renegade",
"db_id" => "tbd_1055",
"command_rating" => 6,
"battle_rating" => 1,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER]
],
TokenIDs::SULEIMAN => [
"name" => "Suleiman",
"power" => Powers::OTTOMAN,
"style" => "Military Leader Ruler suleiman",
"db_id" => "tbd_1056",
"command_rating" => 12,
"battle_rating" => 2,
"admin_rating" => 2,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::MILITARY,
  tokenTypeIDs::LEADER,
  tokenTypeIDs::RULER]
],
TokenIDs::ENGLISH_SQUADRON => [
"name" => "English Squadron",
"power" => Powers::ENGLAND,
"style" => "Naval Units english_squadron",
"db_id" => "tbd_1057_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::FRENCH_SQUADRON => [
"name" => "French Squadron",
"power" => Powers::FRANCE,
"style" => "Naval Units french_squadron",
"db_id" => "tbd_1058_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::GENOESE_SQAUADRON => [
"name" => "Genoese Squadron",
"power" => Powers::MINOR_GENOA,
"style" => "Naval Units genoese_sqauadron",
"db_id" => "tbd_1059",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::HAPSBURG_SQUADRON => [
"name" => "Hapsburg Squadron",
"power" => Powers::HAPSBURG,
"style" => "Naval Units hapsburg_squadron",
"db_id" => "tbd_1060_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::OTTOMAN_SQUADRON => [
"name" => "Ottoman Squadron",
"power" => Powers::OTTOMAN,
"style" => "Naval Units ottoman_squadron",
"db_id" => "tbd_1061_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::PAPACY_SQUADRON => [
"name" => "Papacy Squadron",
"power" => Powers::PAPACY,
"style" => "Naval Units papacy_squadron",
"db_id" => "tbd_1062_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::SCOTTISH_SQUADRON => [
"name" => "Scottish Squadron",
"power" => Powers::MINOR_SCOTLAND,
"style" => "Naval Units scottish_squadron",
"db_id" => "tbd_1063",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::VENETIAN_SQUADRON => [
"name" => "Venetian Squadron",
"power" => Powers::MINOR_VENICE,
"style" => "Naval Units venetian_squadron",
"db_id" => "tbd_1064_{INDEX}",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::UNITS]
],
TokenIDs::ANDREA_DORIA => [
"name" => "Andrea Doria",
"power" => Powers::OTHER,
"style" => "Naval Leader andrea_doria",
"db_id" => "tbd_1065",
"strength" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::LEADER]
],
TokenIDs::BARBAROSSA => [
"name" => "Barbarossa",
"power" => Powers::OTHER,
"style" => "Naval Leader barbarossa",
"db_id" => "tbd_1066",
"battle_rating" => 2,
"piracy_rating" => 1,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::LEADER]
],
TokenIDs::DRAGUT => [
"name" => "Dragut",
"power" => Powers::OTHER,
"style" => "Naval Leader dragut",
"db_id" => "tbd_1067",
"battle_rating" => 1,
"piracy_rating" => 2,
"types" => [
  tokenTypeIDs::NAVAL,
  tokenTypeIDs::LEADER]
],
TokenIDs::ALLIED => [
"name" => "Allied",
"power" => Powers::OTHER,
"style" => "Diplomacy allied",
"db_id" => "tbd_1068_{INDEX}",
"types" => [
  tokenTypeIDs::DIPLOMACY]
],
TokenIDs::AT_WAR => [
"name" => "At War",
"power" => Powers::OTHER,
"style" => "Diplomacy at_war",
"db_id" => "tbd_1069_{INDEX}",
"types" => [
  tokenTypeIDs::DIPLOMACY]
],
TokenIDs::UNREST => [
"name" => "Unrest",
"power" => Powers::OTHER,
"style" => "Unrest_marker unrest",
"db_id" => "tbd_1070_{INDEX}",
"types" => [
  tokenTypeIDs::UNREST_MARKER]
],
TokenIDs::VP_ENGLAND => [
"name" => "English VP's",
"power" => Powers::OTHER,
"style" => "VP_marker vp_england",
"db_id" => "tbd_1071",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::VP_FRANCE => [
"name" => "French VP's",
"power" => Powers::OTHER,
"style" => "VP_marker vp_france",
"db_id" => "tbd_1072",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::VP_HAPSBURG => [
"name" => "Hapsburg VP's",
"power" => Powers::OTHER,
"style" => "VP_marker vp_hapsburg",
"db_id" => "tbd_1073",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::VP_OTTOMAN => [
"name" => "Ottoman VP's",
"power" => Powers::OTHER,
"style" => "VP_marker vp_ottoman",
"db_id" => "tbd_1074",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::VP_PAPACY => [
"name" => "Papacy VP's",
"power" => Powers::OTHER,
"style" => "VP_marker vp_papacy",
"db_id" => "tbd_1075",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::VP_PROTESTANT => [
"name" => "Protestant VP's",
"power" => Powers::OTHER,
"style" => "VP_marker vp_protestant",
"db_id" => "tbd_1076",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::LOANED_ENGLAND => [
"name" => "Loaned to England",
"power" => Powers::ENGLAND,
"style" => "Loaned loaned_england",
"db_id" => "tbd_1077_{INDEX}",
"types" => [
  tokenTypeIDs::LOANED]
],
TokenIDs::LOANED_FRANCE => [
"name" => "Loaned to France",
"power" => Powers::FRANCE,
"style" => "Loaned loaned_france",
"db_id" => "tbd_1078_{INDEX}",
"types" => [
  tokenTypeIDs::LOANED]
],
TokenIDs::LOANED_HAPSBURG => [
"name" => "Loaned to Hapsburg",
"power" => Powers::HAPSBURG,
"style" => "Loaned loaned_hapsburg",
"db_id" => "tbd_1079_{INDEX}",
"types" => [
  tokenTypeIDs::LOANED]
],
TokenIDs::LOANED_OTTOMAN => [
"name" => "Loaned to Ottoman",
"power" => Powers::OTTOMAN,
"style" => "Loaned loaned_ottoman",
"db_id" => "tbd_1080_{INDEX}",
"types" => [
  tokenTypeIDs::LOANED]
],
TokenIDs::LOANED_PAPACY => [
"name" => "Loaned to Papacy",
"power" => Powers::PAPACY,
"style" => "Loaned loaned_papacy",
"db_id" => "tbd_1081_{INDEX}",
"types" => [
  tokenTypeIDs::LOANED]
],
TokenIDs::CALVIN_REFORMER => [
"name" => "Calvin Reformer",
"power" => Powers::OTHER,
"style" => "Reformer calvin_reformer",
"db_id" => "tbd_1082",
"types" => [
  tokenTypeIDs::REFORMER]
],
TokenIDs::CRANMER_REFORMER => [
"name" => "Cranmer Reformer",
"power" => Powers::OTHER,
"style" => "Reformer cranmer_reformer",
"db_id" => "tbd_1083",
"types" => [
  tokenTypeIDs::REFORMER]
],
TokenIDs::LUTHER_REFORMER => [
"name" => "Luther Reformer",
"power" => Powers::OTHER,
"style" => "Reformer luther_reformer",
"db_id" => "tbd_1084",
"types" => [
  tokenTypeIDs::REFORMER]
],
TokenIDs::ZWINGLI_REFORMER => [
"name" => "Zwingli Reformer",
"power" => Powers::OTHER,
"style" => "Reformer zwingli_reformer",
"db_id" => "tbd_1085",
"types" => [
  tokenTypeIDs::REFORMER]
],
TokenIDs::ALEANDER => [
"name" => "Aleander",
"power" => Powers::PROTESTANT,
"style" => "Debater aleander",
"db_id" => "tbd_1086",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Aleander",
"style" => "Debater Committed aleander",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CAJETAN => [
"name" => "Cajetan",
"power" => Powers::PROTESTANT,
"style" => "Debater cajetan",
"db_id" => "tbd_1087",
"debate_value" => 1,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Cajetan",
"style" => "Debater Committed cajetan",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CAMPEGGIO => [
"name" => "Campeggio",
"power" => Powers::PROTESTANT,
"style" => "Debater campeggio",
"db_id" => "tbd_1088",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Campeggio",
"style" => "Debater Committed campeggio",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CANISIUS => [
"name" => "Canisius",
"power" => Powers::PROTESTANT,
"style" => "Debater canisius",
"db_id" => "tbd_1089",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Canisius",
"style" => "Debater Committed canisius",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CARAFFA => [
"name" => "Caraffa",
"power" => Powers::PROTESTANT,
"style" => "Debater caraffa",
"db_id" => "tbd_1090",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Caraffa",
"style" => "Debater Committed caraffa",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CONTARINI => [
"name" => "Contarini",
"power" => Powers::PROTESTANT,
"style" => "Debater contarini",
"db_id" => "tbd_1091",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Contarini",
"style" => "Debater Committed contarini",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::ECK => [
"name" => "Eck",
"power" => Powers::PROTESTANT,
"style" => "Debater eck",
"db_id" => "tbd_1092",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Eck",
"style" => "Debater Committed eck",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::FABER => [
"name" => "Faber",
"power" => Powers::PROTESTANT,
"style" => "Debater faber",
"db_id" => "tbd_1093",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Faber",
"style" => "Debater Committed faber",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::GARDINER => [
"name" => "Gardiner",
"power" => Powers::PROTESTANT,
"style" => "Debater gardiner",
"db_id" => "tbd_1094",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Gardiner",
"style" => "Debater Committed gardiner",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::LOYOLA => [
"name" => "Loyola",
"power" => Powers::PROTESTANT,
"style" => "Debater loyola",
"db_id" => "tbd_1095",
"debate_value" => 4,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Loyola",
"style" => "Debater Committed loyola",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::POLE => [
"name" => "Pole",
"power" => Powers::PROTESTANT,
"style" => "Debater pole",
"db_id" => "tbd_1096",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Pole",
"style" => "Debater Committed pole",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::TETZEL => [
"name" => "Tetzel",
"power" => Powers::PROTESTANT,
"style" => "Debater tetzel",
"db_id" => "tbd_1097",
"debate_value" => 1,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Tetzel",
"style" => "Debater Committed tetzel",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::BUCER => [
"name" => "Bucer",
"power" => Powers::PAPACY,
"style" => "Debater bucer",
"db_id" => "tbd_1098",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Bucer",
"style" => "Debater Committed bucer",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::BULLINGER => [
"name" => "Bullinger",
"power" => Powers::PAPACY,
"style" => "Debater bullinger",
"db_id" => "tbd_1099",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Bullinger",
"style" => "Debater Committed bullinger",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CALVIN => [
"name" => "Calvin",
"power" => Powers::PAPACY,
"style" => "Debater Ruler calvin",
"db_id" => "tbd_1100",
"debate_value" => 4,
"admin_rating" => 1,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::RULER],
"BACK" => [
"name" => "Calvin",
"style" => "Debater Committed calvin",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CARLSTADT => [
"name" => "Carlstadt",
"power" => Powers::PAPACY,
"style" => "Debater carlstadt",
"db_id" => "tbd_1101",
"debate_value" => 1,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Carlstadt",
"style" => "Debater Committed carlstadt",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::COP => [
"name" => "Cop",
"power" => Powers::PAPACY,
"style" => "Debater cop",
"db_id" => "tbd_1102",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Cop",
"style" => "Debater Committed cop",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::COVERDALE => [
"name" => "Coverdale",
"power" => Powers::PAPACY,
"style" => "Debater coverdale",
"db_id" => "tbd_1103",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Coverdale",
"style" => "Debater Committed coverdale",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::CRANMER => [
"name" => "Cranmer",
"power" => Powers::PAPACY,
"style" => "Debater cranmer",
"db_id" => "tbd_1104",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Cranmer",
"style" => "Debater Committed cranmer",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::FAREL => [
"name" => "Farel",
"power" => Powers::PAPACY,
"style" => "Debater farel",
"db_id" => "tbd_1105",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Farel",
"style" => "Debater Committed farel",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::KNOX => [
"name" => "Knox",
"power" => Powers::PAPACY,
"style" => "Debater knox",
"db_id" => "tbd_1106",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Knox",
"style" => "Debater Committed knox",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::LATIMER => [
"name" => "Latimer",
"power" => Powers::PAPACY,
"style" => "Debater latimer",
"db_id" => "tbd_1107",
"debate_value" => 1,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Latimer",
"style" => "Debater Committed latimer",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::LUTHER => [
"name" => "Luther",
"power" => Powers::PAPACY,
"style" => "Debater Ruler luther",
"db_id" => "tbd_1108",
"debate_value" => 4,
"admin_rating" => 2,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::RULER],
"BACK" => [
"name" => "Luther",
"style" => "Debater Committed luther",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::MELANCHTHON => [
"name" => "Melanchthon",
"power" => Powers::PAPACY,
"style" => "Debater melanchthon",
"db_id" => "tbd_1109",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Melanchthon",
"style" => "Debater Committed melanchthon",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::OEKOLAMPADIUS => [
"name" => "Oekolampadius",
"power" => Powers::PAPACY,
"style" => "Debater oekolampadius",
"db_id" => "tbd_1110",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Oekolampadius",
"style" => "Debater Committed oekolampadius",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::OLIVETAN => [
"name" => "Olivetan",
"power" => Powers::PAPACY,
"style" => "Debater olivetan",
"db_id" => "tbd_1111",
"debate_value" => 1,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Olivetan",
"style" => "Debater Committed olivetan",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::TYNDALE => [
"name" => "Tyndale",
"power" => Powers::PAPACY,
"style" => "Debater tyndale",
"db_id" => "tbd_1112",
"debate_value" => 2,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Tyndale",
"style" => "Debater Committed tyndale",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::WISHART => [
"name" => "Wishart",
"power" => Powers::PAPACY,
"style" => "Debater wishart",
"db_id" => "tbd_1113",
"debate_value" => 1,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Wishart",
"style" => "Debater Committed wishart",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::ZWINGLI => [
"name" => "Zwingli",
"power" => Powers::PAPACY,
"style" => "Debater zwingli",
"db_id" => "tbd_1114",
"debate_value" => 3,
"types" => [
  tokenTypeIDs::DEBATER],
"BACK" => [
"name" => "Zwingli",
"style" => "Debater Committed zwingli",
"types" => [
  tokenTypeIDs::DEBATER,
  tokenTypeIDs::COMMITTED]
]
],
TokenIDs::ENGLISH_EXPLORATION => [
"name" => "English Exploration Underway",
"power" => Powers::ENGLAND,
"style" => "Exploration Charted english_exploration",
"db_id" => "tbd_1115",
"types" => [
  tokenTypeIDs::EXPLORATION,
  tokenTypeIDs::CHARTED],
"BACK" => [
"name" => "English Exploration",
"style" => "Exploration english_exploration",
"types" => [
  tokenTypeIDs::EXPLORATION]
]
],
TokenIDs::FRENCH_EXPLORATION => [
"name" => "French Exploration Underway",
"power" => Powers::FRANCE,
"style" => "Exploration Charted french_exploration",
"db_id" => "tbd_1116",
"types" => [
  tokenTypeIDs::EXPLORATION,
  tokenTypeIDs::CHARTED],
"BACK" => [
"name" => "French Exploratinon",
"style" => "Exploration french_exploration",
"types" => [
  tokenTypeIDs::EXPLORATION]
]
],
TokenIDs::HAPSBURG_EXPLORATION => [
"name" => "Hapsburg Exploration Underway",
"power" => Powers::HAPSBURG,
"style" => "Exploration Charted hapsburg_exploration",
"db_id" => "tbd_1117",
"types" => [
  tokenTypeIDs::EXPLORATION,
  tokenTypeIDs::CHARTED],
"BACK" => [
"name" => "Hapsburg Exploration",
"style" => "Exploration hapsburg_exploration",
"types" => [
  tokenTypeIDs::EXPLORATION]
]
],
TokenIDs::CABOT_ENG => [
"name" => "Cabot English",
"power" => Powers::ENGLAND,
"style" => "Explorer cabot_eng",
"db_id" => "tbd_1118",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "English Explorer",
"style" => "Explorer Unknown cabot_eng",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::CABOT_FRE => [
"name" => "Cabot French",
"power" => Powers::FRANCE,
"style" => "Explorer cabot_fre",
"db_id" => "tbd_1119",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "French Explorer",
"style" => "Explorer Unknown cabot_fre",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::CABOT_HAP => [
"name" => "Cabot Hapsburg",
"power" => Powers::HAPSBURG,
"style" => "Explorer cabot_hap",
"db_id" => "tbd_1120",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "Hapsburg Explorer",
"style" => "Explorer Unknown cabot_hap",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::CARTIER => [
"name" => "Cartier",
"power" => Powers::FRANCE,
"style" => "Explorer cartier",
"db_id" => "tbd_1121",
"explorer_value" => 3,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "French Explorer",
"style" => "Explorer Unknown cartier",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::CHANCELLOR => [
"name" => "Chancellor",
"power" => Powers::ENGLAND,
"style" => "Explorer chancellor",
"db_id" => "tbd_1122",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "English Explorer",
"style" => "Explorer Unknown chancellor",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::DE_VACA => [
"name" => "De Vaca",
"power" => Powers::HAPSBURG,
"style" => "Explorer de_vaca",
"db_id" => "tbd_1123",
"explorer_value" => 0,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "Hapsburg Explorer",
"style" => "Explorer Unknown de_vaca",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::DE_SOTO => [
"name" => "De Soto",
"power" => Powers::HAPSBURG,
"style" => "Explorer de_soto",
"db_id" => "tbd_1124",
"explorer_value" => 2,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "Hapsburg Explorer",
"style" => "Explorer Unknown de_soto",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::LEON => [
"name" => "Leon",
"power" => Powers::HAPSBURG,
"style" => "Explorer leon",
"db_id" => "tbd_1125",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "Hapsburg Explorer",
"style" => "Explorer Unknown leon",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::MAGELLAN => [
"name" => "Magellan",
"power" => Powers::HAPSBURG,
"style" => "Explorer magellan",
"db_id" => "tbd_1126",
"explorer_value" => 4,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "Hapsburg Explorer",
"style" => "Explorer Unknown magellan",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::NARVAEZ => [
"name" => "Narvaez",
"power" => Powers::HAPSBURG,
"style" => "Explorer narvaez",
"db_id" => "tbd_1127",
"explorer_value" => -1,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "Hapsburg Explorer",
"style" => "Explorer Unknown narvaez",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::ORELLANA => [
"name" => "Orellana",
"power" => Powers::HAPSBURG,
"style" => "Explorer orellana",
"db_id" => "tbd_1128",
"explorer_value" => 3,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "Hapsburg Explorer",
"style" => "Explorer Unknown orellana",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::ROBERVAL => [
"name" => "Roberval",
"power" => Powers::FRANCE,
"style" => "Explorer roberval",
"db_id" => "tbd_1129",
"explorer_value" => 0,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "French Explorer",
"style" => "Explorer Unknown roberval",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::RUT => [
"name" => "Rut",
"power" => Powers::ENGLAND,
"style" => "Explorer rut",
"db_id" => "tbd_1130",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "English Explorer",
"style" => "Explorer Unknown rut",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::VERRAZANO => [
"name" => "Verrazano",
"power" => Powers::FRANCE,
"style" => "Explorer verrazano",
"db_id" => "tbd_1131",
"explorer_value" => 2,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "French Explorer",
"style" => "Explorer Unknown verrazano",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::WILLOUGHBY => [
"name" => "Willoughby",
"power" => Powers::ENGLAND,
"style" => "Explorer willoughby",
"db_id" => "tbd_1132",
"explorer_value" => 0,
"types" => [
  tokenTypeIDs::EXPLORER],
"BACK" => [
"name" => "English Explorer",
"style" => "Explorer Unknown willoughby",
"types" => [
  tokenTypeIDs::EXPLORER,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::CHARLESBOURG => [
"name" => "Charlesbourg",
"power" => Powers::FRANCE,
"style" => "Colony charlesbourg",
"db_id" => "tbd_1133",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::CUBA => [
"name" => "Cuba",
"power" => Powers::HAPSBURG,
"style" => "Colony cuba",
"db_id" => "tbd_1134",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::HISPANIOLA => [
"name" => "Hispaniola",
"power" => Powers::HAPSBURG,
"style" => "Colony hispaniola",
"db_id" => "tbd_1135",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::JAMESTOWN => [
"name" => "Jamestown",
"power" => Powers::ENGLAND,
"style" => "Colony jamestown",
"db_id" => "tbd_1136",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::MONTREAL => [
"name" => "Montreal",
"power" => Powers::FRANCE,
"style" => "Colony montreal",
"db_id" => "tbd_1137",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::POTOSI => [
"name" => "Potosi Silver Mines",
"power" => Powers::OTHER,
"style" => "Colony potosi",
"db_id" => "tbd_1138",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::PUERTO_RICO => [
"name" => "Puerto Rico",
"power" => Powers::HAPSBURG,
"style" => "Colony puerto_rico",
"db_id" => "tbd_1139",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::ROANOKE => [
"name" => "Roanoke",
"power" => Powers::ENGLAND,
"style" => "Colony roanoke",
"db_id" => "tbd_1140",
"types" => [
  tokenTypeIDs::COLONY]
],
TokenIDs::HAPSBURG_CONQUEST => [
"name" => "Hapsburg Conquest Underway",
"power" => Powers::HAPSBURG,
"style" => "Conquest hapsburg_conquest",
"db_id" => "tbd_1141",
"types" => [
  tokenTypeIDs::CONQUEST]
],
TokenIDs::ENGLISH_CONQUEST => [
"name" => "English Conquest",
"power" => Powers::ENGLAND,
"style" => "Conquistador english_conquest",
"db_id" => "tbd_1142_{INDEX}",
"explorer_value" => 0,
"types" => [
  tokenTypeIDs::CONQUISTADOR]
],
TokenIDs::FRENCH_CONQUEST => [
"name" => "French Conquest",
"power" => Powers::FRANCE,
"style" => "Conquistador french_conquest",
"db_id" => "tbd_1143_{INDEX}",
"explorer_value" => 0,
"types" => [
  tokenTypeIDs::CONQUISTADOR]
],
TokenIDs::CORDOVA => [
"name" => "Cordova",
"power" => Powers::HAPSBURG,
"style" => "Conquistador cordova",
"db_id" => "tbd_1144",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::CONQUISTADOR],
"BACK" => [
"name" => "Hapsburg Conqueror",
"style" => "Conquistador Unknown cordova",
"types" => [
  tokenTypeIDs::CONQUISTADOR,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::CORONADO => [
"name" => "Coronado",
"power" => Powers::HAPSBURG,
"style" => "Conquistador coronado",
"db_id" => "tbd_1145",
"explorer_value" => 1,
"types" => [
  tokenTypeIDs::CONQUISTADOR],
"BACK" => [
"name" => "Hapsburg Conqueror",
"style" => "Conquistador Unknown coronado",
"types" => [
  tokenTypeIDs::CONQUISTADOR,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::CORTEZ => [
"name" => "Cortez",
"power" => Powers::HAPSBURG,
"style" => "Conquistador cortez",
"db_id" => "tbd_1146",
"explorer_value" => 4,
"types" => [
  tokenTypeIDs::CONQUISTADOR],
"BACK" => [
"name" => "Hapsburg Conqueror",
"style" => "Conquistador Unknown cortez",
"types" => [
  tokenTypeIDs::CONQUISTADOR,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::MONTEJO => [
"name" => "Montejo",
"power" => Powers::HAPSBURG,
"style" => "Conquistador montejo",
"db_id" => "tbd_1147",
"explorer_value" => 2,
"types" => [
  tokenTypeIDs::CONQUISTADOR],
"BACK" => [
"name" => "Hapsburg Conqueror",
"style" => "Conquistador Unknown montejo",
"types" => [
  tokenTypeIDs::CONQUISTADOR,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::PIZARRO => [
"name" => "Pizarro",
"power" => Powers::HAPSBURG,
"style" => "Conquistador pizarro",
"db_id" => "tbd_1148",
"explorer_value" => 3,
"types" => [
  tokenTypeIDs::CONQUISTADOR],
"BACK" => [
"name" => "Hapsburg Conqueror",
"style" => "Conquistador Unknown pizarro",
"types" => [
  tokenTypeIDs::CONQUISTADOR,
  tokenTypeIDs::UNKNOWN]
]
],
TokenIDs::ENGLISH_PROT_COUNTER => [
"name" => "English Home Protestant Spaces",
"power" => Powers::OTHER,
"style" => "Religious counter english_prot_counter",
"db_id" => "tbd_1149",
"types" => [
  tokenTypeIDs::RELIGIOUS,
  tokenTypeIDs::COUNTER]
],
TokenIDs::PROTESTANT_SPACES => [
"name" => "Protestant Spaces",
"power" => Powers::OTHER,
"style" => "Religious counter protestant_spaces",
"db_id" => "tbd_1150",
"types" => [
  tokenTypeIDs::RELIGIOUS,
  tokenTypeIDs::COUNTER]
],
TokenIDs::TURN => [
"name" => "Turn",
"power" => Powers::OTHER,
"style" => "Turn_marker turn",
"db_id" => "tbd_1151",
"types" => [
  tokenTypeIDs::TURN_MARKER]
],
TokenIDs::MINUS_ONE_CARD => [
"name" => "-1 Card",
"power" => Powers::OTHER,
"style" => "Cards_marker minus_one_card",
"db_id" => "tbd_1152_{INDEX}",
"types" => [
  tokenTypeIDs::CARDS_MARKER]
],
TokenIDs::GREAT_LAKES_1VP => [
"name" => "Great Lakes 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker great_lakes_1vp",
"db_id" => "tbd_1153",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::MISSISSIPPI_RIVER_1VP => [
"name" => "Mississippi River 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker mississippi_river_1vp",
"db_id" => "tbd_1154",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::ST_LAWRENCE_RIVER_1VP => [
"name" => "Saint Lawrence River 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker st_lawrence_river_1vp",
"db_id" => "tbd_1155",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::AMAZON_RIVER_2VP => [
"name" => "Amazon River 2 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker amazon_river_2vp",
"db_id" => "tbd_1156",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::PACIFIC_STRAIT_1VP => [
"name" => "Pacific Strait 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker pacific_strait_1vp",
"db_id" => "tbd_1157",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::CIRCUMNAVIGATION_3VP => [
"name" => "Circumnavigation 3 VP",
"power" => Powers::OTHER,
"style" => "VP_marker circumnavigation_3vp",
"db_id" => "tbd_1158",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::MAYA_1VP => [
"name" => "Maya 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker maya_1vp",
"db_id" => "tbd_1159",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::AZTECS_2VP => [
"name" => "Aztecs 2 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker aztecs_2vp",
"db_id" => "tbd_1160",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::INCA_2VP => [
"name" => "Inca 2 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker inca_2vp",
"db_id" => "inca_2vp",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::BIBLE_ENG_1VP => [
"name" => "Bible English Translation 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker bible_eng_1vp",
"db_id" => "bible_eng_1vp",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::BIBLE_FRE_1VP => [
"name" => "Bible French Translation 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker bible_fre_1vp",
"db_id" => "bible_fre_1vp",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::BIBLE_GER_1VP => [
"name" => "Bible German Translation 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker bible_ger_1vp",
"db_id" => "bible_ger_1vp",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::CHATEAUX_VP => [
"name" => "Chateaux VP's",
"power" => Powers::OTHER,
"style" => "VP_marker chateaux_vp",
"db_id" => "tbd_1165",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::PIRACY_VP => [
"name" => "Piracy VP's",
"power" => Powers::OTHER,
"style" => "VP_marker piracy_vp",
"db_id" => "tbd_1166",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::ST_PETERS_VP => [
"name" => "Saint Peter's VP's",
"power" => Powers::OTHER,
"style" => "VP_marker st_peters_vp",
"db_id" => "tbd_1167",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::COPERNICUS_1VP => [
"name" => "Copernicus 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker copernicus_1vp",
"db_id" => "tbd_1168",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::COPERNICUS_2VP => [
"name" => "Copernicus 2 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker copernicus_2vp",
"db_id" => "tbd_1169",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::EDWARD_5VP => [
"name" => "Edward VI 5 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker edward_5vp",
"db_id" => "tbd_1170",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::ELIZABETH_2VP => [
"name" => "Elizabeth 2 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker elizabeth_2vp",
"db_id" => "tbd_1171",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::GONZAGA_1VP => [
"name" => "Giulia Gonzaga 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker gonzaga_1vp",
"db_id" => "tbd_1172",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::SERVETUS_1VP => [
"name" => "Servetus 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker servetus_1vp",
"db_id" => "tbd_1173",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::MASTER_OF_ITALY_1VP => [
"name" => "Master of Italy 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker master_of_italy_1vp",
"db_id" => "tbd_1174_{INDEX}",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::MASTER_OF_ITALY_2VP => [
"name" => "Master of Italy 2 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker master_of_italy_2vp",
"db_id" => "tbd_1175_{INDEX}",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::WAR_WINNER_1VP => [
"name" => "War Winner 1 VP",
"power" => Powers::OTHER,
"style" => "VP_marker war_winner_1vp",
"db_id" => "tbd_1176_{INDEX}",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::WAR_WINNER_2VP => [
"name" => "War Winner 2 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker war_winner_2vp",
"db_id" => "tbd_1177_{INDEX}",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::PHONYSCOTLAND_MINUS1 => [
"name" => "Phony War in Scotland -1 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker phonyscotland_minus1",
"db_id" => "tbd_1178",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::PHONYVENICE_MINUS1 => [
"name" => "Phony War in Venice - 1 VP's",
"power" => Powers::OTHER,
"style" => "VP_marker phonyvenice_minus1",
"db_id" => "tbd_1179",
"types" => [
  tokenTypeIDs::VP_MARKER]
],
TokenIDs::ANNE_BOLEYN => [
"name" => "Anne Boleyn",
"power" => Powers::ENGLAND,
"style" => "Wife anne_boleyn",
"db_id" => "tbd_1180",
"types" => [
  tokenTypeIDs::WIFE],
"BACK" => [
"name" => "Anne Boleyn",
"style" => "Wife Benefit anne_boleyn",
"types" => [
  tokenTypeIDs::WIFE,
  tokenTypeIDs::BENEFIT]
]
],
TokenIDs::ANNE_CLEVES => [
"name" => "Anne of Cleves",
"power" => Powers::ENGLAND,
"style" => "Wife anne_cleves",
"db_id" => "tbd_1181",
"types" => [
  tokenTypeIDs::WIFE],
"BACK" => [
"name" => "Anne of Cleves",
"style" => "Wife Benefit anne_cleves",
"types" => [
  tokenTypeIDs::WIFE,
  tokenTypeIDs::BENEFIT]
]
],
TokenIDs::CATHERINE_ARAGON => [
"name" => "Catherine of Aragon",
"power" => Powers::ENGLAND,
"style" => "Wife catherine_aragon",
"db_id" => "tbd_1182",
"types" => [
  tokenTypeIDs::WIFE],
"BACK" => [
"name" => "Catherine of Aragon",
"style" => "Wife Benefit catherine_aragon",
"types" => [
  tokenTypeIDs::WIFE,
  tokenTypeIDs::BENEFIT]
]
],
TokenIDs::JANE_SEYMOUR => [
"name" => "Jane Seymour",
"power" => Powers::ENGLAND,
"style" => "Wife jane_seymour",
"db_id" => "tbd_1183",
"types" => [
  tokenTypeIDs::WIFE],
"BACK" => [
"name" => "Jane Seymour",
"style" => "Wife Benefit jane_seymour",
"types" => [
  tokenTypeIDs::WIFE,
  tokenTypeIDs::BENEFIT]
]
],
TokenIDs::KATHERINE_PARR => [
"name" => "Katherine Parr",
"power" => Powers::ENGLAND,
"style" => "Wife katherine_parr",
"db_id" => "tbd_1184",
"types" => [
  tokenTypeIDs::WIFE],
"BACK" => [
"name" => "Katherine Parr",
"style" => "Wife Benefit katherine_parr",
"types" => [
  tokenTypeIDs::WIFE,
  tokenTypeIDs::BENEFIT]
]
],
TokenIDs::KATHRYN_HOWARD => [
"name" => "Kathryn Howard",
"power" => Powers::ENGLAND,
"style" => "Wife kathryn_howard",
"db_id" => "tbd_1185",
"types" => [
  tokenTypeIDs::WIFE],
"BACK" => [
"name" => "Kathryn Howard",
"style" => "Wife Benefit kathryn_howard",
"types" => [
  tokenTypeIDs::WIFE,
  tokenTypeIDs::BENEFIT]
]
],
TokenIDs::HENRY_MARITAL_STATUS => [
"name" => "Henry Marital Status",
"power" => Powers::ENGLAND,
"style" => "Wives Status henry_marital_status",
"db_id" => "tbd_1186",
"types" => [
  tokenTypeIDs::WIVES,
  tokenTypeIDs::STATUS]
],
TokenIDs::BIBLE_ENGLISH => [
"name" => "Bible English",
"power" => Powers::PROTESTANT,
"style" => "Translation bible_english",
"db_id" => "tbd_1187",
"types" => [
  tokenTypeIDs::TRANSLATION]
],
TokenIDs::BIBLE_FRENCH => [
"name" => "Bible French",
"power" => Powers::PROTESTANT,
"style" => "Translation bible_french",
"db_id" => "tbd_1188",
"types" => [
  tokenTypeIDs::TRANSLATION]
],
TokenIDs::BIBLE_GERMAN => [
"name" => "Bible German",
"power" => Powers::PROTESTANT,
"style" => "Translation bible_german",
"db_id" => "tbd_1189",
"types" => [
  tokenTypeIDs::TRANSLATION]
],
TokenIDs::NEW_TESTAMENT_ENGLISH => [
"name" => "New Testament English",
"power" => Powers::PROTESTANT,
"style" => "Translation new_testament_english",
"db_id" => "tbd_1190",
"types" => [
  tokenTypeIDs::TRANSLATION]
],
TokenIDs::NEW_TESTAMENT_FRENCH => [
"name" => "New Testament French",
"power" => Powers::PROTESTANT,
"style" => "Translation new_testament_french",
"db_id" => "tbd_1191",
"types" => [
  tokenTypeIDs::TRANSLATION]
],
TokenIDs::NEW_TESTAMENT_GERMAN => [
"name" => "New Testament German",
"power" => Powers::PROTESTANT,
"style" => "Translation new_testament_german",
"db_id" => "tbd_1192",
"types" => [
  tokenTypeIDs::TRANSLATION]
],
TokenIDs::ST_PETERS_CP => [
"name" => "Saint Peter's CP Status",
"power" => Powers::PAPACY,
"style" => "Saint_Peters st_peters_cp",
"db_id" => "tbd_1193",
"types" => [
  tokenTypeIDs::SAINT_PETERS]
],
TokenIDs::AUGSBURG_CONFESSION => [
"name" => "Augsburg Confession Active",
"power" => Powers::PROTESTANT,
"style" => "Event_reminder augsburg_confession",
"db_id" => "tbd_1194",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::PRINTING_PRESS => [
"name" => "Printing Press Active",
"power" => Powers::PROTESTANT,
"style" => "Event_reminder printing_press",
"db_id" => "tbd_1195",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::COLONIAL_GOVERNOR => [
"name" => "Colonial Governor",
"power" => Powers::OTHER,
"style" => "Event_reminder colonial_governor",
"db_id" => "tbd_1196_{INDEX}",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::GALLEONS => [
"name" => "Galleons",
"power" => Powers::OTHER,
"style" => "Event_reminder galleons",
"db_id" => "tbd_1197_{INDEX}",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::PLANTATIONS => [
"name" => "Plantations",
"power" => Powers::OTHER,
"style" => "Event_reminder plantations",
"db_id" => "tbd_1198_{INDEX}",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::PIRACY => [
"name" => "Piracy Marker",
"power" => Powers::OTTOMAN,
"style" => "Event_reminder piracy",
"db_id" => "tbd_1199_{INDEX}",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::NATIVE_UPRISING => [
"name" => "Native Uprising",
"power" => Powers::OTHER,
"style" => "Event_reminder native_uprising",
"db_id" => "tbd_1200_{INDEX}",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::RAIDER_ENGLISH => [
"name" => "English Huguenot Raider",
"power" => Powers::ENGLAND,
"style" => "Event_reminder raider_english",
"db_id" => "tbd_1201",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::RAIDER_FRENCH => [
"name" => "French Huguenot Raider",
"power" => Powers::FRANCE,
"style" => "Event_reminder raider_french",
"db_id" => "tbd_1202",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::RAIDER_PROTESTANT => [
"name" => "Protestant Huguenot Raider",
"power" => Powers::PROTESTANT,
"style" => "Event_reminder raider_protestant",
"db_id" => "tbd_1203",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::MERCATOR_MAP => [
"name" => "Mercator's Map",
"power" => Powers::OTHER,
"style" => "Event_reminder mercator_map",
"db_id" => "tbd_1204",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::SMALLPOX => [
"name" => "Smallpox",
"power" => Powers::OTHER,
"style" => "Event_reminder smallpox",
"db_id" => "tbd_1205",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::THOMAS_MORE => [
"name" => "Thomas More",
"power" => Powers::OTHER,
"style" => "Event_reminder thomas_more",
"db_id" => "tbd_1206",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::WARTBURG => [
"name" => "Wartburg",
"power" => Powers::PROTESTANT,
"style" => "Event_reminder wartburg",
"db_id" => "tbd_1207",
"types" => [
  tokenTypeIDs::EVENT_REMINDER]
],
TokenIDs::EXCOMMUNICATED => [
"name" => "Excommunicated",
"power" => Powers::PAPACY,
"style" => "Excommunion excommunicated",
"db_id" => "tbd_1208_{INDEX}",
"types" => [
  tokenTypeIDs::EXCOMMUNION]
],
TokenIDs::FORTRESS => [
"name" => "Fortress",
"power" => Powers::OTHER,
"style" => "Fortress_marker fortress",
"db_id" => "tbd_1209_{INDEX}",
"types" => [
  tokenTypeIDs::FORTRESS_MARKER]
],
TokenIDs::PIRATE_HAVEN => [
"name" => "Pirate Haven",
"power" => Powers::OTTOMAN,
"style" => "PirateHaven pirate_haven",
"db_id" => "tbd_1210_{INDEX}",
"types" => [
  tokenTypeIDs::PIRATEHAVEN]
],
TokenIDs::JESUIT_UNIVERSITY => [
"name" => "Jesuit University",
"power" => Powers::PAPACY,
"style" => "University jesuit_university",
"db_id" => "tbd_1211_{INDEX}",
"types" => [
  tokenTypeIDs::UNIVERSITY]
],
TokenIDs::LEOX => [
"name" => "Leo X",
"power" => Powers::PAPACY,
"style" => "Ruler leox",
"db_id" => "tbd_1212",
"admin_rating" => 0,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::RULER]
],
TokenIDs::CLEMENTVII => [
"name" => "Celement VII",
"power" => Powers::PAPACY,
"style" => "Ruler clementvii",
"db_id" => "tbd_1213",
"admin_rating" => 1,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::RULER]
],
TokenIDs::PAULIII => [
"name" => "Paul III",
"power" => Powers::PAPACY,
"style" => "Ruler pauliii",
"db_id" => "tbd_1214",
"admin_rating" => 1,
"card_bonus" => 1,
"types" => [
  tokenTypeIDs::RULER]
],
TokenIDs::EDWARDVI => [
"name" => "Edward VI",
"power" => Powers::ENGLAND,
"style" => "Ruler edwardvi",
"db_id" => "tbd_1215",
"admin_rating" => 1,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::RULER]
],
TokenIDs::MARYI => [
"name" => "Mary I",
"power" => Powers::ENGLAND,
"style" => "Ruler maryi",
"db_id" => "tbd_1216",
"admin_rating" => 1,
"card_bonus" => 0,
"types" => [
  tokenTypeIDs::RULER]
],
TokenIDs::JULIUSIII => [
"name" => "Julius III",
"power" => Powers::PAPACY,
"style" => "Ruler juliusiii",
"db_id" => "tbd_1217",
"admin_rating" => 0,
"card_bonus" => 1,
"types" => [
  tokenTypeIDs::RULER]
],
TokenIDs::ELIZABETHI => [
"name" => "Elizabeth I",
"power" => Powers::ENGLAND,
"style" => "Ruler elizabethi",
"db_id" => "tbd_1218",
"admin_rating" => 2,
"card_bonus" => 1,
"types" => [
  tokenTypeIDs::RULER]
]
];

$this->starting_token_counts = [
TokenIDs::ENGLAND_KEY => 9,
TokenIDs::FRANCE_KEY => 11,
TokenIDs::HAPSBURG_KEY => 14,
TokenIDs::OTTOMAN_KEY => 11,
TokenIDs::INDEPENDENT_KEY => 18,
TokenIDs::PAPACY_KEY => 7,
TokenIDs::ENGLAND_HEX => 100,
TokenIDs::FRANCE_HEX => 100,
TokenIDs::HAPSBURG_HEX => 100,
TokenIDs::INDEPENDENT_HEX => 31,
TokenIDs::OTTOMAN_HEX => 100,
TokenIDs::PAPACY_HEX => 100,
TokenIDs::PROTESTANT_HEX => 100,
TokenIDs::ENGLAND_1UNIT => 9,
TokenIDs::ENGLAND_2UNIT => 5,
TokenIDs::ENGLAND_4UNIT => 2,
TokenIDs::ENGLAND_6UNIT => 1,
TokenIDs::FRANCE_1UNIT => 10,
TokenIDs::FRANCE_2UNIT => 4,
TokenIDs::FRANCE_4UNIT => 3,
TokenIDs::FRANCE_6UNIT => 1,
TokenIDs::GENOA_1UNIT => 2,
TokenIDs::HAPSBURG_1UNIT => 12,
TokenIDs::HAPSBURG_2UNIT => 7,
TokenIDs::HAPSBURG_4UNIT => 4,
TokenIDs::HAPSBURG_6UNIT => 1,
TokenIDs::HUNGARY_1UNIT => 3,
TokenIDs::HUNGARY_4UNIT => 1,
TokenIDs::INDEPENDENT_1UNIT => 6,
TokenIDs::KNIGHTS_1UNIT => 1,
TokenIDs::OTTOMAN_1UNIT => 11,
TokenIDs::OTTOMAN_2UNIT => 7,
TokenIDs::OTTOMAN_4UNIT => 4,
TokenIDs::OTTOMAN_6UNIT => 1,
TokenIDs::PAPACY_1UNIT => 7,
TokenIDs::PAPACY_2UNIT => 4,
TokenIDs::PAPACY_4UNIT => 2,
TokenIDs::PROTESTANT_1UNIT => 8,
TokenIDs::PROTESTANT_2UNIT => 5,
TokenIDs::PROTESTANT_4UNIT => 2,
TokenIDs::SCOTLAND_1UNIT => 3,
TokenIDs::VENICE_1UNIT => 4,
TokenIDs::BRANDON => 1,
TokenIDs::CHARLES_V => 1,
TokenIDs::DUDLEY => 1,
TokenIDs::DUKE_ALVA => 1,
TokenIDs::FERDINAND => 1,
TokenIDs::FRANCIS_I => 1,
TokenIDs::HENRY_II => 1,
TokenIDs::HENRY_VIII => 1,
TokenIDs::IBRAHIM => 1,
TokenIDs::JOHN_FREDERICK => 1,
TokenIDs::MAURICE_OF_SAXONY => 1,
TokenIDs::MONTMORENCY => 1,
TokenIDs::PHILIP_HESSE => 1,
TokenIDs::RENEGADE => 1,
TokenIDs::SULEIMAN => 1,
TokenIDs::ENGLISH_SQUADRON => 5,
TokenIDs::FRENCH_SQUADRON => 5,
TokenIDs::GENOESE_SQAUADRON => 1,
TokenIDs::HAPSBURG_SQUADRON => 6,
TokenIDs::OTTOMAN_SQUADRON => 9,
TokenIDs::PAPACY_SQUADRON => 2,
TokenIDs::SCOTTISH_SQUADRON => 1,
TokenIDs::VENETIAN_SQUADRON => 4,
TokenIDs::ANDREA_DORIA => 1,
TokenIDs::BARBAROSSA => 1,
TokenIDs::DRAGUT => 1,
TokenIDs::ALLIED => 18,
TokenIDs::AT_WAR => 30,
TokenIDs::UNREST => 100,
TokenIDs::VP_ENGLAND => 1,
TokenIDs::VP_FRANCE => 1,
TokenIDs::VP_HAPSBURG => 1,
TokenIDs::VP_OTTOMAN => 1,
TokenIDs::VP_PAPACY => 1,
TokenIDs::VP_PROTESTANT => 1,
TokenIDs::LOANED_ENGLAND => 28,
TokenIDs::LOANED_FRANCE => 28,
TokenIDs::LOANED_HAPSBURG => 27,
TokenIDs::LOANED_OTTOMAN => 22,
TokenIDs::LOANED_PAPACY => 22,
TokenIDs::CALVIN_REFORMER => 1,
TokenIDs::CRANMER_REFORMER => 1,
TokenIDs::LUTHER_REFORMER => 1,
TokenIDs::ZWINGLI_REFORMER => 1,
TokenIDs::ALEANDER => 1,
TokenIDs::CAJETAN => 1,
TokenIDs::CAMPEGGIO => 1,
TokenIDs::CANISIUS => 1,
TokenIDs::CARAFFA => 1,
TokenIDs::CONTARINI => 1,
TokenIDs::ECK => 1,
TokenIDs::FABER => 1,
TokenIDs::GARDINER => 1,
TokenIDs::LOYOLA => 1,
TokenIDs::POLE => 1,
TokenIDs::TETZEL => 1,
TokenIDs::BUCER => 1,
TokenIDs::BULLINGER => 1,
TokenIDs::CALVIN => 1,
TokenIDs::CARLSTADT => 1,
TokenIDs::COP => 1,
TokenIDs::COVERDALE => 1,
TokenIDs::CRANMER => 1,
TokenIDs::FAREL => 1,
TokenIDs::KNOX => 1,
TokenIDs::LATIMER => 1,
TokenIDs::LUTHER => 1,
TokenIDs::MELANCHTHON => 1,
TokenIDs::OEKOLAMPADIUS => 1,
TokenIDs::OLIVETAN => 1,
TokenIDs::TYNDALE => 1,
TokenIDs::WISHART => 1,
TokenIDs::ZWINGLI => 1,
TokenIDs::ENGLISH_EXPLORATION => 1,
TokenIDs::FRENCH_EXPLORATION => 1,
TokenIDs::HAPSBURG_EXPLORATION => 1,
TokenIDs::CABOT_ENG => 1,
TokenIDs::CABOT_FRE => 1,
TokenIDs::CABOT_HAP => 1,
TokenIDs::CARTIER => 1,
TokenIDs::CHANCELLOR => 1,
TokenIDs::DE_VACA => 1,
TokenIDs::DE_SOTO => 1,
TokenIDs::LEON => 1,
TokenIDs::MAGELLAN => 1,
TokenIDs::NARVAEZ => 1,
TokenIDs::ORELLANA => 1,
TokenIDs::ROBERVAL => 1,
TokenIDs::RUT => 1,
TokenIDs::VERRAZANO => 1,
TokenIDs::WILLOUGHBY => 1,
TokenIDs::CHARLESBOURG => 1,
TokenIDs::CUBA => 1,
TokenIDs::HISPANIOLA => 1,
TokenIDs::JAMESTOWN => 1,
TokenIDs::MONTREAL => 1,
TokenIDs::POTOSI => 1,
TokenIDs::PUERTO_RICO => 1,
TokenIDs::ROANOKE => 1,
TokenIDs::HAPSBURG_CONQUEST => 1,
TokenIDs::ENGLISH_CONQUEST => 2,
TokenIDs::FRENCH_CONQUEST => 2,
TokenIDs::CORDOVA => 1,
TokenIDs::CORONADO => 1,
TokenIDs::CORTEZ => 1,
TokenIDs::MONTEJO => 1,
TokenIDs::PIZARRO => 1,
TokenIDs::ENGLISH_PROT_COUNTER => 1,
TokenIDs::PROTESTANT_SPACES => 1,
TokenIDs::TURN => 1,
TokenIDs::MINUS_ONE_CARD => 7,
TokenIDs::GREAT_LAKES_1VP => 1,
TokenIDs::MISSISSIPPI_RIVER_1VP => 1,
TokenIDs::ST_LAWRENCE_RIVER_1VP => 1,
TokenIDs::AMAZON_RIVER_2VP => 1,
TokenIDs::PACIFIC_STRAIT_1VP => 1,
TokenIDs::CIRCUMNAVIGATION_3VP => 1,
TokenIDs::MAYA_1VP => 1,
TokenIDs::AZTECS_2VP => 1,
TokenIDs::INCA_2VP => 1,
TokenIDs::BIBLE_ENG_1VP => 1,
TokenIDs::BIBLE_FRE_1VP => 1,
TokenIDs::BIBLE_GER_1VP => 1,
TokenIDs::CHATEAUX_VP => 1,
TokenIDs::PIRACY_VP => 1,
TokenIDs::ST_PETERS_VP => 1,
TokenIDs::COPERNICUS_1VP => 1,
TokenIDs::COPERNICUS_2VP => 1,
TokenIDs::EDWARD_5VP => 1,
TokenIDs::ELIZABETH_2VP => 1,
TokenIDs::GONZAGA_1VP => 1,
TokenIDs::SERVETUS_1VP => 1,
TokenIDs::MASTER_OF_ITALY_1VP => 9,
TokenIDs::MASTER_OF_ITALY_2VP => 9,
TokenIDs::WAR_WINNER_1VP => 100,
TokenIDs::WAR_WINNER_2VP => 100,
TokenIDs::PHONYSCOTLAND_MINUS1 => 1,
TokenIDs::PHONYVENICE_MINUS1 => 1,
TokenIDs::ANNE_BOLEYN => 1,
TokenIDs::ANNE_CLEVES => 1,
TokenIDs::CATHERINE_ARAGON => 1,
TokenIDs::JANE_SEYMOUR => 1,
TokenIDs::KATHERINE_PARR => 1,
TokenIDs::KATHRYN_HOWARD => 1,
TokenIDs::HENRY_MARITAL_STATUS => 1,
TokenIDs::BIBLE_ENGLISH => 1,
TokenIDs::BIBLE_FRENCH => 1,
TokenIDs::BIBLE_GERMAN => 1,
TokenIDs::NEW_TESTAMENT_ENGLISH => 1,
TokenIDs::NEW_TESTAMENT_FRENCH => 1,
TokenIDs::NEW_TESTAMENT_GERMAN => 1,
TokenIDs::ST_PETERS_CP => 1,
TokenIDs::AUGSBURG_CONFESSION => 1,
TokenIDs::PRINTING_PRESS => 1,
TokenIDs::COLONIAL_GOVERNOR => 3,
TokenIDs::GALLEONS => 3,
TokenIDs::PLANTATIONS => 3,
TokenIDs::PIRACY => 4,
TokenIDs::NATIVE_UPRISING => 3,
TokenIDs::RAIDER_ENGLISH => 1,
TokenIDs::RAIDER_FRENCH => 1,
TokenIDs::RAIDER_PROTESTANT => 1,
TokenIDs::MERCATOR_MAP => 1,
TokenIDs::SMALLPOX => 1,
TokenIDs::THOMAS_MORE => 1,
TokenIDs::WARTBURG => 1,
TokenIDs::EXCOMMUNICATED => 7,
TokenIDs::FORTRESS => 9,
TokenIDs::PIRATE_HAVEN => 2,
TokenIDs::JESUIT_UNIVERSITY => 53,
TokenIDs::LEOX => 1,
TokenIDs::CLEMENTVII => 1,
TokenIDs::PAULIII => 1,
TokenIDs::EDWARDVI => 1,
TokenIDs::MARYI => 1,
TokenIDs::JULIUSIII => 1,
TokenIDs::ELIZABETHI => 1
];

$this->board_locations = [
locationIDs::TURN_TRACK_1 => [
"x" => 3862,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_2 => [
"x" => 3995,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_3 => [
"x" => 4129,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_4 => [
"x" => 4262,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_5 => [
"x" => 4396,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_6 => [
"x" => 4529,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_7 => [
"x" => 4663,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_8 => [
"x" => 4796,
"y" => 3095,
"board" => "map"
],
locationIDs::TURN_TRACK_9 => [
"x" => 4930,
"y" => 3095,
"board" => "map"
],
locationIDs::DIPLO_OTT_HAP => [
"x" => 4240,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_OTT_ENG => [
"x" => 4330,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_OTT_FRA => [
"x" => 4420,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_OTT_PAP => [
"x" => 4510,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_OTT_PRO => [
"x" => 4600,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_OTT_GEN => [
"x" => 4690,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_OTT_HUN => [
"x" => 4780,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_OTT_VEN => [
"x" => 4960,
"y" => 289,
"board" => "map"
],
locationIDs::DIPLO_HAP_ENG => [
"x" => 4330,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_HAP_FRA => [
"x" => 4420,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_HAP_PAP => [
"x" => 4510,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_HAP_PRO => [
"x" => 4600,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_HAP_GEN => [
"x" => 4690,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_HAP_HUN => [
"x" => 4780,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_HAP_SCO => [
"x" => 4870,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_HAP_VEN => [
"x" => 4960,
"y" => 380,
"board" => "map"
],
locationIDs::DIPLO_ENG_FRA => [
"x" => 4420,
"y" => 470,
"board" => "map"
],
locationIDs::DIPLO_ENG_PAP => [
"x" => 4510,
"y" => 470,
"board" => "map"
],
locationIDs::DIPLO_ENG_PRO => [
"x" => 4600,
"y" => 470,
"board" => "map"
],
locationIDs::DIPLO_ENG_GEN => [
"x" => 4690,
"y" => 470,
"board" => "map"
],
locationIDs::DIPLO_ENG_SCO => [
"x" => 4870,
"y" => 470,
"board" => "map"
],
locationIDs::DIPLO_FRA_PAP => [
"x" => 4510,
"y" => 560,
"board" => "map"
],
locationIDs::DIPLO_FRA_PRO => [
"x" => 4600,
"y" => 560,
"board" => "map"
],
locationIDs::DIPLO_FRA_GEN => [
"x" => 4690,
"y" => 560,
"board" => "map"
],
locationIDs::DIPLO_FRA_SCO => [
"x" => 4870,
"y" => 560,
"board" => "map"
],
locationIDs::DIPLO_FRA_VEN => [
"x" => 4960,
"y" => 560,
"board" => "map"
],
locationIDs::DIPLO_PAP_PRO => [
"x" => 4600,
"y" => 650,
"board" => "map"
],
locationIDs::DIPLO_PAP_GEN => [
"x" => 4690,
"y" => 650,
"board" => "map"
],
locationIDs::DIPLO_PAP_VEN => [
"x" => 4960,
"y" => 650,
"board" => "map"
],
locationIDs::DIPLO_PRO_GEN => [
"x" => 4690,
"y" => 740,
"board" => "map"
],
locationIDs::DIPLO_PRO_VEN => [
"x" => 4960,
"y" => 740,
"board" => "map"
],
locationIDs::VICTORY_TRACK_0 => [
"x" => 2144,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_1 => [
"x" => 2258,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_2 => [
"x" => 2372,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_3 => [
"x" => 2486,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_4 => [
"x" => 2600,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_5 => [
"x" => 2714,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_6 => [
"x" => 2828,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_7 => [
"x" => 2942,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_8 => [
"x" => 3056,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_9 => [
"x" => 3172,
"y" => 3035,
"board" => "map"
],
locationIDs::VICTORY_TRACK_10 => [
"x" => 1004,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_11 => [
"x" => 1118,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_12 => [
"x" => 1232,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_13 => [
"x" => 1346,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_14 => [
"x" => 1460,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_15 => [
"x" => 1574,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_16 => [
"x" => 1688,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_17 => [
"x" => 1802,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_18 => [
"x" => 1918,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_19 => [
"x" => 2032,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_20 => [
"x" => 2146,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_21 => [
"x" => 2260,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_22 => [
"x" => 2374,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_23 => [
"x" => 2488,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_24 => [
"x" => 2602,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_25 => [
"x" => 2716,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_26 => [
"x" => 2830,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_27 => [
"x" => 2944,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_28 => [
"x" => 3057,
"y" => 3149,
"board" => "map"
],
locationIDs::VICTORY_TRACK_29 => [
"x" => 3172,
"y" => 3149,
"board" => "map"
],
locationIDs::ST_LAWRENCE_RIVER => [
"x" => 636,
"y" => 2010,
"board" => "map"
],
locationIDs::GREAT_LAKES => [
"x" => 402,
"y" => 2030,
"board" => "map"
],
locationIDs::MISSISSIPI_RIVER => [
"x" => 398,
"y" => 2197,
"board" => "map"
],
locationIDs::AZTEC => [
"x" => 291,
"y" => 2383,
"board" => "map"
],
locationIDs::MAYA => [
"x" => 424,
"y" => 2424,
"board" => "map"
],
locationIDs::AMAZON_RIVER => [
"x" => 792,
"y" => 2659,
"board" => "map"
],
locationIDs::INCA => [
"x" => 647,
"y" => 2783,
"board" => "map"
],
locationIDs::PACIFIC_STRAIT => [
"x" => 606,
"y" => 3119,
"board" => "map"
],
locationIDs::CIRCUMNAVIGATION => [
"x" => 249,
"y" => 2820,
"board" => "map"
],
locationIDs::COLONY_ENG_1 => [
"x" => 176,
"y" => 1132,
"board" => "map"
],
locationIDs::COLONY_ENG_2 => [
"x" => 176,
"y" => 1244,
"board" => "map"
],
locationIDs::COLONY_FRA_1 => [
"x" => 176,
"y" => 1354,
"board" => "map"
],
locationIDs::COLONY_FRA_2 => [
"x" => 176,
"y" => 1467,
"board" => "map"
],
locationIDs::COLONY_HAP_1 => [
"x" => 176,
"y" => 1580,
"board" => "map"
],
locationIDs::COLONY_HAP_2 => [
"x" => 176,
"y" => 1691,
"board" => "map"
],
locationIDs::COLONY_HAP_3 => [
"x" => 176,
"y" => 1804,
"board" => "map"
],
locationIDs::ELECTORATE_DISPLAY_AUG => [
"x" => 3495,
"y" => 311,
"board" => "map"
],
locationIDs::ELECTORATE_DISPLAY_TRI => [
"x" => 3627,
"y" => 311,
"board" => "map"
],
locationIDs::ELECTORATE_DISPLAY_COL => [
"x" => 3759,
"y" => 311,
"board" => "map"
],
locationIDs::ELECTORATE_DISPLAY_WIT => [
"x" => 3495,
"y" => 495,
"board" => "map"
],
locationIDs::ELECTORATE_DISPLAY_MAI => [
"x" => 3627,
"y" => 495,
"board" => "map"
],
locationIDs::ELECTORATE_DISPLAY_BRA => [
"x" => 3759,
"y" => 495,
"board" => "map"
],
locationIDs::CONQUEST_ENG_1 => [
"x" => 301,
"y" => 1132,
"board" => "map"
],
locationIDs::CONQUEST_ENG_2 => [
"x" => 301,
"y" => 1244,
"board" => "map"
],
locationIDs::CONQUEST_FRA_1 => [
"x" => 301,
"y" => 1354,
"board" => "map"
],
locationIDs::CONQUEST_FRA_2 => [
"x" => 301,
"y" => 1467,
"board" => "map"
],
locationIDs::CONQUEST_HAP_1 => [
"x" => 301,
"y" => 1580,
"board" => "map"
],
locationIDs::CONQUEST_HAP_2 => [
"x" => 301,
"y" => 1691,
"board" => "map"
],
locationIDs::CONQUEST_HAP_3 => [
"x" => 301,
"y" => 1804,
"board" => "map"
],
locationIDs::CROSSING_ATLANTIC_1 => [
"x" => 800,
"y" => 2236,
"board" => "map"
],
locationIDs::CROSSING_ATLANTIC_2 => [
"x" => 950,
"y" => 2236,
"board" => "map"
],
locationIDs::CROSSING_ATLANTIC_3 => [
"x" => 800,
"y" => 2100,
"board" => "map"
],
locationIDs::CROSSING_ATLANTIC_4 => [
"x" => 950,
"y" => 2100,
"board" => "map"
],
locationIDs::CROSSING_ATLANTIC_5 => [
"x" => 800,
"y" => 2372,
"board" => "map"
],
locationIDs::CROSSING_ATLANTIC_6 => [
"x" => 950,
"y" => 2372,
"board" => "map"
],
locationIDs::PREGNANCY_CHART_1 => [
"x" => 4189,
"y" => 1386,
"board" => "map"
],
locationIDs::PREGNANCY_CHART_2 => [
"x" => 4189,
"y" => 1301,
"board" => "map"
],
locationIDs::PREGNANCY_CHART_3 => [
"x" => 4189,
"y" => 1216,
"board" => "map"
],
locationIDs::PREGNANCY_CHART_4 => [
"x" => 4189,
"y" => 1131,
"board" => "map"
],
locationIDs::PREGNANCY_CHART_5 => [
"x" => 4189,
"y" => 1046,
"board" => "map"
],
locationIDs::PREGNANCY_CHART_6 => [
"x" => 4189,
"y" => 928,
"board" => "map"
],
locationIDs::ENGLAND_KEY_1 => [
"x" => 105,
"y" => 605,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_2 => [
"x" => 217,
"y" => 605,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_3 => [
"x" => 330,
"y" => 605,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_4 => [
"x" => 442,
"y" => 605,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_5 => [
"x" => 555,
"y" => 605,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_6 => [
"x" => 105,
"y" => 711,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_7 => [
"x" => 217,
"y" => 711,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_8 => [
"x" => 330,
"y" => 711,
"board" => "powercards"
],
locationIDs::ENGLAND_KEY_9 => [
"x" => 442,
"y" => 711,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_1 => [
"x" => 109,
"y" => 1443,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_2 => [
"x" => 214,
"y" => 1443,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_3 => [
"x" => 319,
"y" => 1443,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_4 => [
"x" => 424,
"y" => 1443,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_5 => [
"x" => 109,
"y" => 1545,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_6 => [
"x" => 214,
"y" => 1545,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_7 => [
"x" => 319,
"y" => 1545,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_8 => [
"x" => 424,
"y" => 1545,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_9 => [
"x" => 529,
"y" => 1545,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_10 => [
"x" => 634,
"y" => 1545,
"board" => "powercards"
],
locationIDs::FRANCE_KEY_11 => [
"x" => 739,
"y" => 1545,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_1 => [
"x" => 1375,
"y" => 497,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_2 => [
"x" => 1487,
"y" => 497,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_3 => [
"x" => 1600,
"y" => 497,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_4 => [
"x" => 1712,
"y" => 497,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_5 => [
"x" => 1825,
"y" => 497,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_6 => [
"x" => 1375,
"y" => 611,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_7 => [
"x" => 1487,
"y" => 611,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_8 => [
"x" => 1600,
"y" => 611,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_9 => [
"x" => 1712,
"y" => 611,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_10 => [
"x" => 1825,
"y" => 611,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_11 => [
"x" => 1375,
"y" => 725,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_12 => [
"x" => 1487,
"y" => 725,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_13 => [
"x" => 1600,
"y" => 725,
"board" => "powercards"
],
locationIDs::HAPSBURG_KEY_14 => [
"x" => 1712,
"y" => 725,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_1 => [
"x" => 1372,
"y" => 1437,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_2 => [
"x" => 1484,
"y" => 1437,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_3 => [
"x" => 1596,
"y" => 1437,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_4 => [
"x" => 1708,
"y" => 1437,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_5 => [
"x" => 1820,
"y" => 1437,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_6 => [
"x" => 1932,
"y" => 1437,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_7 => [
"x" => 1372,
"y" => 1547,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_8 => [
"x" => 1484,
"y" => 1547,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_9 => [
"x" => 1596,
"y" => 1547,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_10 => [
"x" => 1708,
"y" => 1547,
"board" => "powercards"
],
locationIDs::OTTOMAN_KEY_11 => [
"x" => 1820,
"y" => 1547,
"board" => "powercards"
],
locationIDs::PAPACY_KEY_1 => [
"x" => 2642,
"y" => 1551,
"board" => "powercards"
],
locationIDs::PAPACY_KEY_2 => [
"x" => 2755,
"y" => 1551,
"board" => "powercards"
],
locationIDs::PAPACY_KEY_3 => [
"x" => 2868,
"y" => 1551,
"board" => "powercards"
],
locationIDs::PAPACY_KEY_4 => [
"x" => 2981,
"y" => 1551,
"board" => "powercards"
],
locationIDs::PAPACY_KEY_5 => [
"x" => 3094,
"y" => 1551,
"board" => "powercards"
],
locationIDs::PAPACY_KEY_6 => [
"x" => 3207,
"y" => 1551,
"board" => "powercards"
],
locationIDs::PAPACY_KEY_7 => [
"x" => 3320,
"y" => 1551,
"board" => "powercards"
],
locationIDs::ENGLAND_PRISON => [
"x" => 837,
"y" => 361,
"board" => "powercards"
],
locationIDs::FRANCE_PRISON => [
"x" => 813,
"y" => 1127,
"board" => "powercards"
],
locationIDs::HAPSBURG_PRISON => [
"x" => 1977,
"y" => 457,
"board" => "powercards"
],
locationIDs::OTTOMAN_PRISON => [
"x" => 2013,
"y" => 1225,
"board" => "powercards"
],
locationIDs::PAPACY_PRISON => [
"x" => 3269,
"y" => 1269,
"board" => "powercards"
],
locationIDs::PROTESTANT_PRISON => [
"x" => 3325,
"y" => 377,
"board" => "powercards"
],
locationIDs::OTTOMAN_MINUS1CARD => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::OTTOMAN_MINUS1CARD2 => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::HAPSBURG_MINUS1CARD => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::HAPSBURG_MINUS1CARD2 => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::FRANCE_MINUSONECARD => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::FRANCE_MINUSONECARD2 => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::ENGLAND_MINUSONECARD => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::ENGLAND_MINUSONECARD2 => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::PAPACY_MINUSONECARD => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::PAPACY_MINUSONECARD2 => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::PROTESTANT_MINUSONECARD => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::PROTESTANT_MINUSONECARD2 => [
"x" => 0,
"y" => 0,
"board" => "powercards"
],
locationIDs::ENG_VP_TOKEN_1 => [
"x" => 933,
"y" => 721,
"board" => "powercards"
],
locationIDs::ENG_VP_TOKEN_2 => [
"x" => 1033,
"y" => 721,
"board" => "powercards"
],
locationIDs::ENG_VP_TOKEN_3 => [
"x" => 1133,
"y" => 721,
"board" => "powercards"
],
locationIDs::ENG_VP_TOKEN_4 => [
"x" => 933,
"y" => 647,
"board" => "powercards"
],
locationIDs::ENG_VP_TOKEN_5 => [
"x" => 1033,
"y" => 647,
"board" => "powercards"
],
locationIDs::ENG_VP_TOKEN_6 => [
"x" => 1133,
"y" => 647,
"board" => "powercards"
],
locationIDs::FRA_VP_TOKEN_1 => [
"x" => 933,
"y" => 1544,
"board" => "powercards"
],
locationIDs::FRA_VP_TOKEN_2 => [
"x" => 1033,
"y" => 1544,
"board" => "powercards"
],
locationIDs::FRA_VP_TOKEN_3 => [
"x" => 1133,
"y" => 1544,
"board" => "powercards"
],
locationIDs::FRA_VP_TOKEN_4 => [
"x" => 933,
"y" => 1470,
"board" => "powercards"
],
locationIDs::FRA_VP_TOKEN_5 => [
"x" => 1033,
"y" => 1470,
"board" => "powercards"
],
locationIDs::FRA_VP_TOKEN_6 => [
"x" => 1133,
"y" => 1470,
"board" => "powercards"
],
locationIDs::HAP_VP_TOKEN_1 => [
"x" => 2203,
"y" => 721,
"board" => "powercards"
],
locationIDs::HAP_VP_TOKEN_2 => [
"x" => 2303,
"y" => 721,
"board" => "powercards"
],
locationIDs::HAP_VP_TOKEN_3 => [
"x" => 2403,
"y" => 721,
"board" => "powercards"
],
locationIDs::HAP_VP_TOKEN_4 => [
"x" => 2203,
"y" => 647,
"board" => "powercards"
],
locationIDs::HAP_VP_TOKEN_5 => [
"x" => 2303,
"y" => 647,
"board" => "powercards"
],
locationIDs::HAP_VP_TOKEN_6 => [
"x" => 2403,
"y" => 647,
"board" => "powercards"
],
locationIDs::PAP_VP_TOKEN_1 => [
"x" => 3475,
"y" => 1544,
"board" => "powercards"
],
locationIDs::PAP_VP_TOKEN_2 => [
"x" => 3575,
"y" => 1544,
"board" => "powercards"
],
locationIDs::PAP_VP_TOKEN_3 => [
"x" => 3675,
"y" => 1544,
"board" => "powercards"
],
locationIDs::PAP_VP_TOKEN_4 => [
"x" => 3475,
"y" => 1470,
"board" => "powercards"
],
locationIDs::PAP_VP_TOKEN_5 => [
"x" => 3575,
"y" => 1470,
"board" => "powercards"
],
locationIDs::PAP_VP_TOKEN_6 => [
"x" => 3675,
"y" => 1470,
"board" => "powercards"
],
locationIDs::PRO_VP_TOKEN_1 => [
"x" => 3475,
"y" => 721,
"board" => "powercards"
],
locationIDs::PRO_VP_TOKEN_2 => [
"x" => 3575,
"y" => 721,
"board" => "powercards"
],
locationIDs::PRO_VP_TOKEN_3 => [
"x" => 3675,
"y" => 721,
"board" => "powercards"
],
locationIDs::PRO_VP_TOKEN_4 => [
"x" => 3475,
"y" => 647,
"board" => "powercards"
],
locationIDs::PRO_VP_TOKEN_5 => [
"x" => 3575,
"y" => 647,
"board" => "powercards"
],
locationIDs::PRO_VP_TOKEN_6 => [
"x" => 3675,
"y" => 647,
"board" => "powercards"
],
locationIDs::OTT_VP_TOKEN_1 => [
"x" => 2203,
"y" => 1544,
"board" => "powercards"
],
locationIDs::OTT_VP_TOKEN_2 => [
"x" => 2303,
"y" => 1544,
"board" => "powercards"
],
locationIDs::OTT_VP_TOKEN_3 => [
"x" => 2403,
"y" => 1544,
"board" => "powercards"
],
locationIDs::OTT_VP_TOKEN_4 => [
"x" => 2203,
"y" => 1470,
"board" => "powercards"
],
locationIDs::OTT_VP_TOKEN_5 => [
"x" => 2303,
"y" => 1470,
"board" => "powercards"
],
locationIDs::OTT_VP_TOKEN_6 => [
"x" => 2403,
"y" => 1470,
"board" => "powercards"
],
locationIDs::NT_TRANSLATION_0 => [
"x" => 2636,
"y" => 505,
"board" => "powercards"
],
locationIDs::NT_TRANSLATION_1 => [
"x" => 2730,
"y" => 505,
"board" => "powercards"
],
locationIDs::NT_TRANSLATION_2 => [
"x" => 2823,
"y" => 505,
"board" => "powercards"
],
locationIDs::NT_TRANSLATION_3 => [
"x" => 2917,
"y" => 505,
"board" => "powercards"
],
locationIDs::NT_TRANSLATION_4 => [
"x" => 3011,
"y" => 505,
"board" => "powercards"
],
locationIDs::NT_TRANSLATION_5 => [
"x" => 3105,
"y" => 505,
"board" => "powercards"
],
locationIDs::NT_TRANSLATION_6 => [
"x" => 3198,
"y" => 505,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_0 => [
"x" => 2635,
"y" => 641,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_1 => [
"x" => 2729,
"y" => 641,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_2 => [
"x" => 2823,
"y" => 641,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_3 => [
"x" => 2917,
"y" => 641,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_4 => [
"x" => 3011,
"y" => 641,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_5 => [
"x" => 3105,
"y" => 641,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_6 => [
"x" => 2635,
"y" => 735,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_7 => [
"x" => 2729,
"y" => 735,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_8 => [
"x" => 2823,
"y" => 735,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_9 => [
"x" => 2917,
"y" => 735,
"board" => "powercards"
],
locationIDs::BIBLE_TRANSLATION_10 => [
"x" => 3011,
"y" => 735,
"board" => "powercards"
],
locationIDs::CHATEAUX_0 => [
"x" => 484,
"y" => 1336,
"board" => "powercards"
],
locationIDs::CHATEAUX_1 => [
"x" => 572,
"y" => 1336,
"board" => "powercards"
],
locationIDs::CHATEAUX_2 => [
"x" => 661,
"y" => 1336,
"board" => "powercards"
],
locationIDs::CHATEAUX_3 => [
"x" => 750,
"y" => 1336,
"board" => "powercards"
],
locationIDs::CHATEAUX_4 => [
"x" => 572,
"y" => 1423,
"board" => "powercards"
],
locationIDs::CHATEAUX_5 => [
"x" => 661,
"y" => 1423,
"board" => "powercards"
],
locationIDs::CHATEAUX_6 => [
"x" => 750,
"y" => 1423,
"board" => "powercards"
],
locationIDs::PIRACY_0 => [
"x" => 1457,
"y" => 1209,
"board" => "powercards"
],
locationIDs::PIRACY_1 => [
"x" => 1551,
"y" => 1209,
"board" => "powercards"
],
locationIDs::PIRACY_2 => [
"x" => 1645,
"y" => 1209,
"board" => "powercards"
],
locationIDs::PIRACY_3 => [
"x" => 1739,
"y" => 1209,
"board" => "powercards"
],
locationIDs::PIRACY_4 => [
"x" => 1833,
"y" => 1209,
"board" => "powercards"
],
locationIDs::PIRACY_5 => [
"x" => 1363,
"y" => 1302,
"board" => "powercards"
],
locationIDs::PIRACY_6 => [
"x" => 1457,
"y" => 1302,
"board" => "powercards"
],
locationIDs::PIRACY_7 => [
"x" => 1551,
"y" => 1302,
"board" => "powercards"
],
locationIDs::PIRACY_8 => [
"x" => 1645,
"y" => 1302,
"board" => "powercards"
],
locationIDs::PIRACY_9 => [
"x" => 1739,
"y" => 1302,
"board" => "powercards"
],
locationIDs::PIRACY_10 => [
"x" => 1833,
"y" => 1302,
"board" => "powercards"
],
locationIDs::MARITAL_STATUS_1 => [
"x" => 105,
"y" => 458,
"board" => "powercards"
],
locationIDs::MARITAL_STATUS_2 => [
"x" => 210,
"y" => 458,
"board" => "powercards"
],
locationIDs::MARITAL_STATUS_3 => [
"x" => 315,
"y" => 458,
"board" => "powercards"
],
locationIDs::MARITAL_STATUS_4 => [
"x" => 420,
"y" => 458,
"board" => "powercards"
],
locationIDs::MARITAL_STATUS_5 => [
"x" => 525,
"y" => 458,
"board" => "powercards"
],
locationIDs::MARITAL_STATUS_6 => [
"x" => 630,
"y" => 458,
"board" => "powercards"
],
locationIDs::MARITAL_STATUS_7 => [
"x" => 735,
"y" => 458,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_CP_0 => [
"x" => 2636,
"y" => 1317,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_CP_1 => [
"x" => 2731,
"y" => 1317,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_CP_2 => [
"x" => 2826,
"y" => 1317,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_CP_3 => [
"x" => 2919,
"y" => 1317,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_CP_4 => [
"x" => 3013,
"y" => 1317,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_CP_5 => [
"x" => 3106,
"y" => 1317,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_VP_0 => [
"x" => 2636,
"y" => 1410,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_VP_1 => [
"x" => 2731,
"y" => 1410,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_VP_2 => [
"x" => 2826,
"y" => 1410,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_VP_3 => [
"x" => 2919,
"y" => 1410,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_VP_4 => [
"x" => 3013,
"y" => 1410,
"board" => "powercards"
],
locationIDs::SAINT_PETERS_VP_5 => [
"x" => 3106,
"y" => 1410,
"board" => "powercards"
],
locationIDs::PROT_EVENT_REMINDER_1 => [
"x" => 2929,
"y" => 69,
"board" => "powercards"
],
locationIDs::PROT_EVENT_REMINDER_2 => [
"x" => 3079,
"y" => 69,
"board" => "powercards"
],
locationIDs::EXCOMMUNICATED_LUTHER => [
"x" => 2815,
"y" => 925,
"board" => "powercards"
],
locationIDs::EXCOMMUNICATED_ZWINGLI => [
"x" => 2898,
"y" => 925,
"board" => "powercards"
],
locationIDs::EXCOMMUNICATED_CRANMER => [
"x" => 2981,
"y" => 925,
"board" => "powercards"
],
locationIDs::EXCOMMUNICATED_CALVIN => [
"x" => 3064,
"y" => 925,
"board" => "powercards"
],
locationIDs::EXCOMMUNICATED_HENRYVIII => [
"x" => 3147,
"y" => 925,
"board" => "powercards"
],
locationIDs::EXCOMMUNICATED_FRANCISI => [
"x" => 3230,
"y" => 925,
"board" => "powercards"
],
locationIDs::EXCOMMUNICATED_CHARLESV => [
"x" => 3313,
"y" => 925,
"board" => "powercards"
],
locationIDs::ENGLAND_LEADER => [
"x" => 1029,
"y" => 313,
"board" => "powercards"
],
locationIDs::HAPSBURG_LEADER => [
"x" => 2297,
"y" => 313,
"board" => "powercards"
],
locationIDs::PROTESTANT_LEADER => [
"x" => 3568,
"y" => 313,
"board" => "powercards"
],
locationIDs::FRANCE_LEADER => [
"x" => 1029,
"y" => 1151,
"board" => "powercards"
],
locationIDs::OTTOMAN_LEADER => [
"x" => 2297,
"y" => 1151,
"board" => "powercards"
],
locationIDs::PAPACY_LEADER => [
"x" => 3568,
"y" => 1151,
"board" => "powercards"
],
locationIDs::PROTESTANT_SPACES_0 => [
"x" => 135,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_1 => [
"x" => 235,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_2 => [
"x" => 334,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_3 => [
"x" => 434,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_4 => [
"x" => 534,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_5 => [
"x" => 634,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_6 => [
"x" => 734,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_7 => [
"x" => 833,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_8 => [
"x" => 933,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_9 => [
"x" => 1033,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_10 => [
"x" => 1133,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_11 => [
"x" => 1233,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_12 => [
"x" => 1331,
"y" => 683,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_13 => [
"x" => 135,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_14 => [
"x" => 235,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_15 => [
"x" => 334,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_16 => [
"x" => 434,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_17 => [
"x" => 534,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_18 => [
"x" => 634,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_19 => [
"x" => 734,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_20 => [
"x" => 833,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_21 => [
"x" => 933,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_22 => [
"x" => 1033,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_23 => [
"x" => 1133,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_24 => [
"x" => 1233,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_25 => [
"x" => 1331,
"y" => 795,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_26 => [
"x" => 135,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_27 => [
"x" => 235,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_28 => [
"x" => 334,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_29 => [
"x" => 434,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_30 => [
"x" => 534,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_31 => [
"x" => 634,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_32 => [
"x" => 734,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_33 => [
"x" => 833,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_34 => [
"x" => 933,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_35 => [
"x" => 1033,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_36 => [
"x" => 1133,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_37 => [
"x" => 1233,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_38 => [
"x" => 1331,
"y" => 907,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_39 => [
"x" => 135,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_40 => [
"x" => 235,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_41 => [
"x" => 334,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_42 => [
"x" => 434,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_43 => [
"x" => 534,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_44 => [
"x" => 634,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_45 => [
"x" => 734,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_46 => [
"x" => 833,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_47 => [
"x" => 933,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_48 => [
"x" => 1033,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_49 => [
"x" => 1133,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::PROTESTANT_SPACES_50 => [
"x" => 1233,
"y" => 1019,
"board" => "religiousstruggle"
],
locationIDs::CURRENT_DEBATER_PAP => [
"x" => 854,
"y" => 386,
"board" => "religiousstruggle"
],
locationIDs::CURRENT_DEBATER_PRO => [
"x" => 976,
"y" => 386,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_1 => [
"x" => 321,
"y" => 187,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_2 => [
"x" => 441,
"y" => 187,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_3 => [
"x" => 561,
"y" => 187,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_4 => [
"x" => 681,
"y" => 187,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_5 => [
"x" => 801,
"y" => 187,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_6 => [
"x" => 921,
"y" => 187,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_7 => [
"x" => 321,
"y" => 347,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_8 => [
"x" => 441,
"y" => 347,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_9 => [
"x" => 561,
"y" => 347,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_10 => [
"x" => 681,
"y" => 347,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_11 => [
"x" => 801,
"y" => 347,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_POPE_12 => [
"x" => 921,
"y" => 347,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_GER_1 => [
"x" => 119,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_GER_2 => [
"x" => 235,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_GER_3 => [
"x" => 351,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_GER_4 => [
"x" => 119,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_GER_5 => [
"x" => 197,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_GER_6 => [
"x" => 274,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_GER_7 => [
"x" => 351,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_ENG_1 => [
"x" => 761,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_ENG_2 => [
"x" => 878,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_ENG_3 => [
"x" => 995,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_ENG_4 => [
"x" => 761,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_ENG_5 => [
"x" => 878,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_ENG_6 => [
"x" => 995,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_FRE_1 => [
"x" => 482,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_FRE_2 => [
"x" => 622,
"y" => 549,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_FRE_3 => [
"x" => 482,
"y" => 439,
"board" => "religiousstruggle"
],
locationIDs::DEBATER_FRE_4 => [
"x" => 622,
"y" => 439,
"board" => "religiousstruggle"
]
];

$this->cards = [
CardIDs::JANISSARIES => [
"class_name" => "Janissaries",
"name" => "Janissaries",
"type" => CardTypes::HOME_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::HOLY_ROMAN_EMPEROR => [
"class_name" => "HolyRomanEmperor",
"name" => "Holy Roman Emperor",
"type" => CardTypes::HOME_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SIX_WIVES_OF_HENRY_VIII => [
"class_name" => "SixWives",
"name" => "Six Wives of Henry VIII",
"type" => CardTypes::HOME_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::PATRON_OF_THE_ARTS => [
"class_name" => "PatronArts",
"name" => "Patron of the Arts",
"type" => CardTypes::HOME_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::PAPAL_BULL => [
"class_name" => "PapalBull",
"name" => "Papal Bull",
"type" => CardTypes::HOME_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::LEIPZIG_DEBATE => [
"class_name" => "LeipzigDebate",
"name" => "Leipzig Debate",
"type" => CardTypes::HOME_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::HERE_I_STAND => [
"class_name" => "HereIStand",
"name" => "Here I Stand",
"type" => CardTypes::HOME_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::LUTHER_95_THESES => [
"class_name" => "LutherTheses",
"name" => "Luther's 95 Theses",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 0,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::BARBARY_PIRATES => [
"class_name" => "BarbaryPirates",
"name" => "Barbary Pirates",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::CLEMENT_VII => [
"class_name" => "ClementVII",
"name" => "Clement VII",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::DEFENDER_OF_THE_FAITH => [
"class_name" => "DefenderFaith",
"name" => "Defender of the Faith",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::MASTER_OF_ITALY => [
"class_name" => "MasterItaly",
"name" => "Master of Italy",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SCHMALKALDIC_LEAGUE => [
"class_name" => "SchmalkaldicLeague",
"name" => "Schmalkaldic League",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Special",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::PAUL_III => [
"class_name" => "PaulIII",
"name" => "Paul III",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::SOCIETY_OF_JESUS => [
"class_name" => "SocietyJesus",
"name" => "Society of Jesus",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 5,
"scenario" => 1517
],
CardIDs::CALVIN => [
"class_name" => "Calvin",
"name" => "Calvin",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => 6,
"scenario" => 1517
],
CardIDs::COUNCIL_OF_TRENT => [
"class_name" => "CouncilTrent",
"name" => "Council of Trent",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 6,
"scenario" => 1517
],
CardIDs::DRAGUT => [
"class_name" => "Dragut",
"name" => "Dragut",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 6,
"scenario" => 1517
],
CardIDs::EDWARD_VI => [
"class_name" => "EdwardVI",
"name" => "Edward VI",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => "Variable",
"scenario" => 1517
],
CardIDs::HENRY_II => [
"class_name" => "HenryII",
"name" => "Henry II",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => 6,
"scenario" => 1517
],
CardIDs::MARY_I => [
"class_name" => "MaryI",
"name" => "Mary I",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => "Variable",
"scenario" => 1517
],
CardIDs::JULIUS_III => [
"class_name" => "JuliusIII",
"name" => "Julius III",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => 7,
"scenario" => 1517
],
CardIDs::ELIZABETH_I => [
"class_name" => "ElizabethI",
"name" => "Elizabeth I",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Leader",
"turn_added" => "Variable",
"scenario" => 1517
],
CardIDs::ARQUEBUSIERS => [
"class_name" => "Arquebusiers",
"name" => "Arquebusiers",
"type" => CardTypes::COMBAT_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::FIELD_ARTILLERY => [
"class_name" => "FieldArtillery",
"name" => "Field Artillery",
"type" => CardTypes::COMBAT_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::MERCENARIES_BRIBED => [
"class_name" => "MercenariesBribed",
"name" => "Mercenaries Bribed",
"type" => CardTypes::COMBAT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::MERCENARIES_GROW_RESTLESS => [
"class_name" => "MercenariesGrowRestless",
"name" => "Mercenaries Grow Restless",
"type" => CardTypes::COMBAT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SIEGE_MINING => [
"class_name" => "SiegeMining",
"name" => "Siege Mining",
"type" => CardTypes::COMBAT_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SURPRISE_ATTACK => [
"class_name" => "SurpriseAttack",
"name" => "Surprise Attack",
"type" => CardTypes::COMBAT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::TERCIOS => [
"class_name" => "Tercios",
"name" => "Tercios",
"type" => CardTypes::COMBAT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::FOUL_WEATHER => [
"class_name" => "FoulWeather",
"name" => "Foul Weather",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::GOUT => [
"class_name" => "Gout",
"name" => "Gout",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::LANDSKNECHTS => [
"class_name" => "Landsknechts",
"name" => "Landsknechts",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::PROFESSIONAL_ROWERS => [
"class_name" => "ProfessionalRowers",
"name" => "Professional Rowers",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SIEGE_ARTILLERY => [
"class_name" => "SiegeArtillery",
"name" => "Siege Artillery",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SWISS_MERCENARIES => [
"class_name" => "SwissMercenaries",
"name" => "Swiss Mercenaries",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::THE_WARTBURG => [
"class_name" => "Wartburg",
"name" => "The Wartburg",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::HALLEY_COMET => [
"class_name" => "HalleyComet",
"name" => "Halley's Comet",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::AUGSBURG_CONFESSION => [
"class_name" => "AugsburgConfession",
"name" => "Augsburg Confession",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "Yes",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::MACHIAVELLI_THE_PRINCE => [
"class_name" => "Machiavelli",
"name" => "Machiavelli: The Prince",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::MARBURG_COLLOQUY => [
"class_name" => "MarburgColloquy",
"name" => "Marburg Colloquy",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "Yes",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::ROXELANA => [
"class_name" => "Roxelana",
"name" => "Roxelana",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::ZWINGLI_DONS_ARMOR => [
"class_name" => "ZwingliDonsArmor",
"name" => "Zwingli Dons Armor",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::AFFAIR_OF_THE_PLACARDS => [
"class_name" => "AffairPlacards",
"name" => "Affair of the Placards",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::CALVIN_EXPELLED => [
"class_name" => "CalvinExpelled",
"name" => "Calvin Expelled",
"type" => CardTypes::EVENT_CARD,
"cp" => 1,
"remove" => "Yes",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::CALVIN_INSTITUTES => [
"class_name" => "CalvinInstitutes",
"name" => "Calvin's Institutes",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "Yes",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::COPERNICUS => [
"class_name" => "Copernicus",
"name" => "Copernicus",
"type" => CardTypes::EVENT_CARD,
"cp" => 6,
"remove" => "Yes",
"turn_added" => 5,
"scenario" => 1517
],
CardIDs::GALLEONS => [
"class_name" => "Galleons",
"name" => "Galleons",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::HUGUENOT_RAIDERS => [
"class_name" => "HuguenotRaiders",
"name" => "Huguenot Raiders",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::MERCATORMAP => [
"class_name" => "MercatorMap",
"name" => "Mercator's Map",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::MICHAEL_SERVETUS => [
"class_name" => "MichaelServetus",
"name" => "Michael Servetus",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "Yes",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::MICHELANGELO => [
"class_name" => "Michelangelo",
"name" => "Michelangelo",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "Yes",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::PLANTATIONS => [
"class_name" => "Plantations",
"name" => "Plantations",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::POTOSI_SILVER_MINES => [
"class_name" => "PotosiSilverMines",
"name" => "Potosi Silver Mines",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::JESUIT_EDUCATION => [
"class_name" => "JesuitEducation",
"name" => "Jesuit Education",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 5,
"scenario" => 1517
],
CardIDs::PAPAL_INQUISITION => [
"class_name" => "PapalInquisition",
"name" => "Papal Inquisition",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 5,
"scenario" => 1517
],
CardIDs::PHILIP_OF_HESSE_BIGAMY => [
"class_name" => "PhilipHesseBigamy",
"name" => "Philip of Hesse's Bigamy",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "Yes",
"turn_added" => 5,
"scenario" => 1517
],
CardIDs::SPANISH_INQUISITION => [
"class_name" => "SpanishInquisition",
"name" => "Spanish Inquisition",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 5,
"scenario" => 1517
],
CardIDs::LADY_JANE_GREY => [
"class_name" => "LadyJaneGrey",
"name" => "Lady Jane Grey",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 6,
"scenario" => 1517
],
CardIDs::MAURICE_OF_SAXONY => [
"class_name" => "MauriceSaxony",
"name" => "Maurice of Saxony",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 6,
"scenario" => 1517
],
CardIDs::MARY_DEFIES_COUNCIL => [
"class_name" => "MaryDefiesCouncil",
"name" => "Mary Defies Council",
"type" => CardTypes::EVENT_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 7,
"scenario" => 1517
],
CardIDs::BOOK_OF_COMMON_PRAYER => [
"class_name" => "BookCommonPrayer",
"name" => "Book of Common Prayer",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => "Variable",
"scenario" => 1517
],
CardIDs::DISSOLUTION_OF_THE_MONASTERIES => [
"class_name" => "DissolutionMonasteries",
"name" => "Dissolution of the Monasteries",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "Yes",
"turn_added" => "Variable",
"scenario" => 1517
],
CardIDs::PILGRIMAGE_OF_GRACE => [
"class_name" => "PilgrimageGrace",
"name" => "Pilgrimage of Grace",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => "Variable",
"scenario" => 1517
],
CardIDs::A_MIGHTY_FORTRESS => [
"class_name" => "MightyFortress",
"name" => "A Mighty Fortress",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::AKINJI_RAIDERS => [
"class_name" => "AkinjiRaiders",
"name" => "Akinji Raiders",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::ANABAPTISTS => [
"class_name" => "Anabptists",
"name" => "Anabaptists",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::ANDREA_DORIA => [
"class_name" => "AndreaDoria",
"name" => "Andrea Doria",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::AULD_ALLIANCE => [
"class_name" => "AuldAlliance",
"name" => "Auld Alliance",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::CHARLES_BOURBON => [
"class_name" => "CharlesBourbon",
"name" => "Charles Bourbon",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::CITY_STATE_REBELS => [
"class_name" => "CityStateRebels",
"name" => "City State Rebels",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::CLOTH_PRICES_FLUCTUATE => [
"class_name" => "ClothPricesFluctuate",
"name" => "Cloth Prices Fluctuate",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::DIPLOMATIC_MARRIAGE => [
"class_name" => "DiplomaticMarriage",
"name" => "Diplomatic Marriage",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::DIPLOMATIC_OVERTURE => [
"class_name" => "DiplomaticOverture",
"name" => "Diplomatic Overture",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::ERASMUS => [
"class_name" => "Erasmus",
"name" => "Erasmus",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::FOREIGN_RECRUITS => [
"class_name" => "ForeignRecruits",
"name" => "Foreign Recruits",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::FOUNTAIN_OF_YOUTH => [
"class_name" => "FountainYouth",
"name" => "Fountain of Youth",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::FREDERICK_THE_WISE => [
"class_name" => "FrederickWise",
"name" => "Frederick the Wise",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::FUGGERS => [
"class_name" => "Fuggers",
"name" => "Fuggers",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::GABELLE_REVOLT => [
"class_name" => "GabelleRevolt",
"name" => "Gabelle Revolt",
"type" => CardTypes::EVENT_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::INDULGENCE_VENDOR => [
"class_name" => "IndulgenceVendor",
"name" => "Indulgence Vendor",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::JANISSARIES_REBEL => [
"class_name" => "JanissariesRebel",
"name" => "Janissaries Rebel",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::JOHN_ZAPOLYA => [
"class_name" => "JohnZapolya",
"name" => "John Zapolya",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::JULIA_GONZAGA => [
"class_name" => "JuliaGonzaga",
"name" => "Julia Gonzaga",
"type" => CardTypes::EVENT_CARD,
"cp" => 1,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::KATHERINA_BORA => [
"class_name" => "KatherinaBora",
"name" => "Katherina Bora",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::KNIGHTS_OF_ST_JOHN => [
"class_name" => "KnightsStJohn",
"name" => "Knights of St. John",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::MERCENARIES_DEMAND_PAY => [
"class_name" => "MercenariesDemandPay",
"name" => "Mercenaries Demand Pay",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::PEASANTS_WAR => [
"class_name" => "PesantsWar",
"name" => "Peasants' War",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::PIRATE_HAVEN => [
"class_name" => "PirateHaven",
"name" => "Pirate Haven",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::PRINTING_PRESS => [
"class_name" => "PrintingPress",
"name" => "Printing Press",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::RANSOM => [
"class_name" => "Ransom",
"name" => "Ransom",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::REVOLT_IN_EGYPT => [
"class_name" => "RevoltEgypt",
"name" => "Revolt in Egypt",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::REVOLT_IN_IRELAND => [
"class_name" => "RevoltIreland",
"name" => "Revolt in Ireland",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::REVOLT_OF_THE_COMMUNEROS => [
"class_name" => "RevoltCommuneros",
"name" => "Revolt of the Communeros",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SACK_OF_ROME => [
"class_name" => "SackRome",
"name" => "Sack of Rome",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "Special",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SALE_OF_MOLUCCAS => [
"class_name" => "SaleMoluccas",
"name" => "Sale of Moluccas",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SCOTS_RAID => [
"class_name" => "ScotsRaid",
"name" => "Scots Raid",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::SEARCH_FOR_CIBOLA => [
"class_name" => "SearchCibola",
"name" => "Search for Cibola",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SEBASTIAN_CABOT => [
"class_name" => "SebastianCabot",
"name" => "Sebastian Cabot",
"type" => CardTypes::EVENT_CARD,
"cp" => 1,
"remove" => "Special",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SHIPBUILDING => [
"class_name" => "Shipbuilding",
"name" => "Shipbuilding",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SMALLPOX => [
"class_name" => "Smallpox",
"name" => "Smallpox",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::SPRING_PREPARATIONS => [
"class_name" => "SpringPreparations",
"name" => "Spring Preparations",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::THREAT_TO_POWER => [
"class_name" => "ThreatPower",
"name" => "Threat to Power",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::TRACE_ITALIENNE => [
"class_name" => "TraceItalienne",
"name" => "Trace Italienne",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::TREACHERY => [
"class_name" => "Treachery",
"name" => "Treachery!",
"type" => CardTypes::EVENT_CARD,
"cp" => 5,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::UNPAID_MERCENARIES => [
"class_name" => "UnpaidMercenaries",
"name" => "Unpaid Mercenaries",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::UNSANITARY_CAMP => [
"class_name" => "UnsanitaryCamp",
"name" => "Unsanitary Camp",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::VENETIAN_ALLIANCE => [
"class_name" => "VenetianAlliance",
"name" => "Venetian Alliance",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::VENETIAN_INFORMANT => [
"class_name" => "VenetianInformant",
"name" => "Venetian Informant",
"type" => CardTypes::EVENT_CARD,
"cp" => 1,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::WAR_IN_PERSIA => [
"class_name" => "WarPersia",
"name" => "War in Persia",
"type" => CardTypes::EVENT_CARD,
"cp" => 4,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::COLONIAL_GOVERNOR_NATIVE_UPRISING => [
"class_name" => "ColonialGovernor",
"name" => "Colonial Governor/Native Uprising",
"type" => CardTypes::EVENT_CARD,
"cp" => 2,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::THOMAS_MORE => [
"class_name" => "ThomasMore",
"name" => "Thomas More",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 1,
"scenario" => 1517
],
CardIDs::IMPERIAL_CORONATION => [
"class_name" => "ImperialCoronation",
"name" => "Imperial Coronation",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Special",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::LA_FORET_EMBASSY_IN_ISTANBUL => [
"class_name" => "ForetEmbassy",
"name" => "La Forêt's Embassy in Istanbul",
"type" => CardTypes::MANDATORY_CARD,
"cp" => 2,
"remove" => "Special",
"turn_added" => 3,
"scenario" => 1517
],
CardIDs::THOMAS_CROMWELL => [
"class_name" => "ThomasCromwell",
"name" => "Thomas Cromwell",
"type" => CardTypes::RESPONSE_CARD,
"cp" => 3,
"remove" => "Special",
"turn_added" => 4,
"scenario" => 1517
],
CardIDs::ROUGH_WOOING => [
"class_name" => "RoughWooing",
"name" => "Rough Wooing",
"type" => CardTypes::EVENT_CARD,
"cp" => 3,
"remove" => "No",
"turn_added" => 5,
"scenario" => 1517
],
CardIDs::DIP_ANDREA_DORIA => [
"class_name" => "DipAndreaDoria",
"name" => "Andrea Doria",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_FRENCH_CONSTABLE_INVADES => [
"class_name" => "DipFrenchConstable",
"name" => "French Constable Invades",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_CORSAIR_RAID => [
"class_name" => "DipCorsairRaid",
"name" => "Corsair Raid",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_DIPLOMATIC_MARRIAGE => [
"class_name" => "DipDiplomaticMarriage",
"name" => "Diplomatic Marriage",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_DIPLOMATIC_PRESSURE => [
"class_name" => "DipDiplomaticPressure",
"name" => "Diplomatic Pressure",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_DIPLOMATIC_FRENCH_INVASION => [
"class_name" => "DipFrenchInvasion",
"name" => "French Invasion",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_HENRY_PETITIONS_FOR_DIVORCE => [
"class_name" => "DipHenryPetitions",
"name" => "Henry Petitions for Divorce",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "Yes",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_KNIGHTS_OF_ST_JOHN => [
"class_name" => "DipKnightsStJohn",
"name" => "Knights of St. John",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_PLAGUE => [
"class_name" => "DipPlague",
"name" => "Plague",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_SHIPBUILDING => [
"class_name" => "DipShipbuilding",
"name" => "Shipbuilding",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_SPANISH_INVASION => [
"class_name" => "DipSpanishInvasion",
"name" => "Spanish Invasion",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_VENETIAN_ALLIANCE => [
"class_name" => "DipVenetianAlliance",
"name" => "Venetian Alliance",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => 1,
"scenario" => "2-player variant"
],
CardIDs::DIP_AUSTRIAN_INVASION => [
"class_name" => "DipAustrianInvasion",
"name" => "Austrian Invasion",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => "Turn after SL",
"scenario" => "2-player variant"
],
CardIDs::DIP_IMPERIAL_INVASION => [
"class_name" => "DipImperialInvasion",
"name" => "Imperial Invasion",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => "Turn after SL",
"scenario" => "2-player variant"
],
CardIDs::DIP_MACHIAVELLI => [
"class_name" => "DipMachiavelli",
"name" => "Machiavelli",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => "Turn after SL",
"scenario" => "2-player variant"
],
CardIDs::DIP_OTTOMAN_INVASION => [
"class_name" => "DipOttomanInvasion",
"name" => "Ottoman Invasion",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => "Turn after SL",
"scenario" => "2-player variant"
],
CardIDs::DIP_SECRET_PROTESTANT_CIRCLE => [
"class_name" => "DipSecretProtestant",
"name" => "Secret Protestant Circle",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => "Turn after SL",
"scenario" => "2-player variant"
],
CardIDs::DIP_SIEGE_OF_VIENNA => [
"class_name" => "DipSiegeVienna",
"name" => "Siege of Vienna",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => "Turn after SL",
"scenario" => "2-player variant"
],
CardIDs::DIP_SPANISH_INQUISITION => [
"class_name" => "DipSpanishInquisition",
"name" => "Spanish Inquisition",
"type" => CardTypes::DIPLOMACY_CARD,
"cp" => 0,
"remove" => "No",
"turn_added" => "Turn after SL",
"scenario" => "2-player variant"
]
];

$this->seazones = [
SeazoneIds::BALTIC_SEA => [
"x" => 0,
"y" => 0,
"name" => "Baltic Sea",
"connections" => [
  SeazoneIds::NORTH_SEA],
"id" => SeazoneIds::BALTIC_SEA,
"harbours" => []
],
SeazoneIds::NORTH_SEA => [
"x" => 0,
"y" => 0,
"name" => "North Sea",
"connections" => [
  SeazoneIds::BALTIC_SEA,
  SeazoneIds::IRISH_SEA,
  SeazoneIds::ENGLISH_CHANNEL],
"id" => SeazoneIds::NORTH_SEA,
"harbours" => []
],
SeazoneIds::IRISH_SEA => [
"x" => 0,
"y" => 0,
"name" => "Irish Sea",
"connections" => [
  SeazoneIds::NORTH_SEA,
  SeazoneIds::ENGLISH_CHANNEL,
  SeazoneIds::BAY_OF_BISCAY],
"id" => SeazoneIds::IRISH_SEA,
"harbours" => []
],
SeazoneIds::ENGLISH_CHANNEL => [
"x" => 0,
"y" => 0,
"name" => "English Channel",
"connections" => [
  SeazoneIds::NORTH_SEA,
  SeazoneIds::IRISH_SEA,
  SeazoneIds::BAY_OF_BISCAY],
"id" => SeazoneIds::ENGLISH_CHANNEL,
"harbours" => []
],
SeazoneIds::BAY_OF_BISCAY => [
"x" => 0,
"y" => 0,
"name" => "Bay of Biscay",
"connections" => [
  SeazoneIds::IRISH_SEA,
  SeazoneIds::ENGLISH_CHANNEL,
  SeazoneIds::ATLANTIC_OCEAN],
"id" => SeazoneIds::BAY_OF_BISCAY,
"harbours" => []
],
SeazoneIds::ATLANTIC_OCEAN => [
"x" => 0,
"y" => 0,
"name" => "Atlantic Ocean",
"connections" => [
  SeazoneIds::BAY_OF_BISCAY],
"id" => SeazoneIds::ATLANTIC_OCEAN,
"harbours" => []
],
SeazoneIds::GULF_OF_LYON => [
"x" => 0,
"y" => 0,
"name" => "Gulf of Lyon",
"connections" => [
  SeazoneIds::BARBARY_COAST,
  SeazoneIds::TYRRHENIAN_SEA],
"id" => SeazoneIds::GULF_OF_LYON,
"harbours" => []
],
SeazoneIds::BARBARY_COAST => [
"x" => 0,
"y" => 0,
"name" => "Barbary Coast",
"connections" => [
  SeazoneIds::GULF_OF_LYON,
  SeazoneIds::TYRRHENIAN_SEA,
  SeazoneIds::IONIAN_SEA,
  SeazoneIds::NORTH_AFRICAN_COAST],
"id" => SeazoneIds::BARBARY_COAST,
"harbours" => []
],
SeazoneIds::TYRRHENIAN_SEA => [
"x" => 0,
"y" => 0,
"name" => "Tyrrhenian Sea",
"connections" => [
  SeazoneIds::GULF_OF_LYON,
  SeazoneIds::BARBARY_COAST],
"id" => SeazoneIds::TYRRHENIAN_SEA,
"harbours" => []
],
SeazoneIds::IONIAN_SEA => [
"x" => 0,
"y" => 0,
"name" => "Ionian Sea",
"connections" => [
  SeazoneIds::ADRIATIC_SEA,
  SeazoneIds::BARBARY_COAST,
  SeazoneIds::NORTH_AFRICAN_COAST,
  SeazoneIds::AEGEAN_SEA],
"id" => SeazoneIds::IONIAN_SEA,
"harbours" => []
],
SeazoneIds::ADRIATIC_SEA => [
"x" => 0,
"y" => 0,
"name" => "Adriatic Sea",
"connections" => [
  SeazoneIds::IONIAN_SEA],
"id" => SeazoneIds::ADRIATIC_SEA,
"harbours" => []
],
SeazoneIds::NORTH_AFRICAN_COAST => [
"x" => 0,
"y" => 0,
"name" => "North African Coast",
"connections" => [
  SeazoneIds::BARBARY_COAST,
  SeazoneIds::IONIAN_SEA,
  SeazoneIds::AEGEAN_SEA],
"id" => SeazoneIds::NORTH_AFRICAN_COAST,
"harbours" => []
],
SeazoneIds::AEGEAN_SEA => [
"x" => 0,
"y" => 0,
"name" => "Aegean Sea",
"connections" => [
  SeazoneIds::BLACK_SEA,
  SeazoneIds::IONIAN_SEA,
  SeazoneIds::NORTH_AFRICAN_COAST],
"id" => SeazoneIds::AEGEAN_SEA,
"harbours" => []
],
SeazoneIds::BLACK_SEA => [
"x" => 0,
"y" => 0,
"name" => "Black Sea",
"connections" => [
  SeazoneIds::AEGEAN_SEA],
"id" => SeazoneIds::BLACK_SEA,
"harbours" => []
]
];