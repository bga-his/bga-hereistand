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
 * states.inc.php
 *
 * hereistand game states description
 *
 */

 /*
 * Praefixe
 * ST_EVT_name: State for resolving event-card name
 * ST_CP_*: state for spending cp
 * ST_MOV_*: state for movement or reactions to movement, including field battles
 */

$machinestates = [
	// The initial state. Please do not modify.
	GameStates::ST_GAME_SETUP => [
		'name' => 'gameSetup',
		'description' => '',
		'type' => 'manager',
		'action' => 'stGameSetup',
		//'transitions' => ['' => ST_EVT_95THESES],
		'transitions' => ['' => GameStates::ST_PICK_CARD],
	],

	GameStates::ST_PICK_CARD => [
		'name' => 'pickCard',
		'description' => clienttranslate('${actplayer} must play a card or pass'),
		'descriptionmyturn' => clienttranslate('You must play a card or pass'),
		'type' => 'activeplayer',
		'possibleactions' => ['actPlayCard', 'actPass', 'actEvtJanissaries'], //TODO actEvt*
		'transitions' => ['playCP' => GameStates::ST_IMPULSE_ACTIONS, 'pass' => GameStates::ST_NEXT_PLAYER, 
		'playEvtJanissaries' => GameStates::ST_EVT_Janissaries, 'playHolyRoman' => GameStates::ST_EVT_HOLYROMAN, 'playSixWives' => GameStates::ST_EVT_SIXWIVESOFHENRY, 'playPatronOfArts' => GameStates::ST_EVT_PATRONOFARTS],
	],

	GameStates::ST_DISCARD => [
		'name' => 'evtJanissaries',
		'description' => clienttranslate('${actplayer} must discard one card.'),
		'descriptionmyturn' => clienttranslate('You must select what card to discard'),
		'type' => 'activeplayer',
		'possibleactions' => ['actDiscardCard'],
		'transitions' => ['PatronOfArts' => GameStates::ST_NEXT_PLAYER],
	],

	GameStates::ST_IMPULSE_ACTIONS => [
		'name' => 'impulseActions',
		'description' => clienttranslate('${actplayer} must take actions with ${remainingCP}CP'),
		'descriptionmyturn' => clienttranslate('You must take actions with ${remainingCP}CP'),
		'type' => 'activeplayer',
		'args' => 'argImpulseActions',
		'possibleactions' => ['actMove', 'actPass', 'actBuyUnit'],
		'transitions' => ['pass' => GameStates::ST_NEXT_PLAYER, 'move' => GameStates::ST_DECLARE_FORMATION, 'buy' => GameStates::ST_BUY_UNIT],
	],

	GameStates::ST_DECLARE_FORMATION => [
		'name' => 'declareFormation',
		'description' => clienttranslate('${actplayer} must declare formation'),
		'descriptionmyturn' => clienttranslate('You must declare formation'),
		'type' => 'activeplayer',
		'args' => 'argDeclareFormation',
		'possibleactions' => ['actDeclareFormation', 'actUndo'],
		'transitions' => ['declare' => GameStates::ST_DECLARE_DESTINATION, 'undo' => GameStates::ST_IMPULSE_ACTIONS],
	],

	GameStates::ST_DECLARE_DESTINATION => [
		'name' => 'declareDestination',
		'description' => clienttranslate('${actplayer} must declare destination'),
		'descriptionmyturn' => clienttranslate('You must declare destination'),
		'type' => 'activeplayer',
		'args' => 'argDeclareDestination',
		'possibleactions' => ['actPickCity', 'actUndo'],
		'transitions' => ['declare' => GameStates::ST_FIND_MOVEMENT_RESPONSES, 'undo' => GameStates::ST_IMPULSE_ACTIONS],
	],

	GameStates::ST_FIND_MOVEMENT_RESPONSES => [
		'name' => 'findMovementResponses',
		'description' => clienttranslate('Finding movement responses...'),
		'type' => 'manager',
		'action' => 'stFindMovementResponses',
		'transitions' => ['found' => GameStates::ST_MOVEMENT_RESPONSE, 'none' => GameStates::ST_FIND_INTERCEPTIONS],
	],

	GameStates::ST_FIND_INTERCEPTIONS => [
		'name' => 'findInterceptions',
		'description' => clienttranslate('Finding possible interceptions...'),
		'type' => 'manager',
		'action' => 'stFindInterceptions',
		'transitions' => ['found' => GameStates::ST_INTERCEPT_INTENT, 'none' => GameStates::ST_MOVE_FORMATION],
	],

	GameStates::ST_INTERCEPT_INTENT => [
		'name' => 'interceptIntent',
		'description' => clienttranslate('${actplayer} may pick formation to intercept'),
		'descriptionmyturn' => clienttranslate('You may pick formatin to intercept'),
		'type' => 'activeplayer',
		'args' => 'argInterceptIntent',
		'possibleactions' => ['actDeclareIntercept', 'actPass'],
		'transitions' => ['declare' => GameStates::ST_ROLL_INTERCEPTION, 'pass' => GameStates::ST_FIND_INTERCEPTIONS],
	],

	GameStates::ST_ROLL_INTERCEPTION => [
		'name' => 'rollInterception',
		'description' => clienttranslate('Attempting interception...'),
		'type' => 'manager',
		'action' => 'stRollInterception',
		'transitions' => ['done' => GameStates::ST_INTERCEPT_INTENT],
	],

	GameStates::ST_MOVE_FORMATION => [
		'name' => 'moveFormation',
		'description' => clienttranslate('Moving formation...'),
		'type' => 'manager',
		'action' => 'stMoveFormation',
		'transitions' => ['interception' => GameStates::ST_FIND_BATTLE, 'done' => GameStates::ST_FIND_AVOID],
	],

	GameStates::ST_FIND_AVOID => [
		'name' => 'findAvoid',
		'description' => clienttranslate('Finding possible avoid battles...'),
		'type' => 'manager',
		'action' => 'stFindAvoid',
		'transitions' => ['found' => GameStates::ST_AVOID_INTENT, 'none' => GameStates::ST_FIND_WITHDRAW],
	],

	GameStates::ST_AVOID_INTENT => [
		'name' => 'avoidIntent',
		'description' => clienttranslate('${actplayer} may pick formation to avoid'),
		'descriptionmyturn' => clienttranslate('You may pick formatin to avoid'),
		'type' => 'activeplayer',
		'args' => 'argDeclareAvoid',
		'possibleactions' => ['actDeclareAvoid', 'actPass'],
		'transitions' => ['declare' => GameStates::ST_DECLARE_AVOID_DESTINATION, 'pass' => GameStates::ST_FIND_AVOID],
	],

	GameStates::ST_DECLARE_AVOID_DESTINATION => [
		'name' => 'declareAvoidDestination',
		'description' => clienttranslate('${actplayer} must declare destination'),
		'descriptionmyturn' => clienttranslate('You must declare destination'),
		'type' => 'activeplayer',
		'args' => 'argDeclareAvoidDestination',
		'possibleactions' => ['actDeclareDestination'],
		'transitions' => ['declare' => GameStates::ST_ROLL_AVOID],
	],

	GameStates::ST_ROLL_AVOID => [
		'name' => 'rollAvoid',
		'description' => clienttranslate('Attempting to avoid battle...'),
		'type' => 'manager',
		'action' => 'stRollAvoid',
		'transitions' => ['done' => GameStates::ST_AVOID_INTENT],
	],

	GameStates::ST_FIND_WITHDRAW => [
		'name' => 'findWithdraw',
		'description' => clienttranslate('Finding possible withdraws...'),
		'type' => 'manager',
		'action' => 'stFindWithdraw',
		'transitions' => ['found' => GameStates::ST_WITHDRAW_INTENT, 'none' => GameStates::ST_FIND_BATTLE],
	],

	GameStates::ST_WITHDRAW_INTENT => [
		'name' => 'withdrawIntent',
		'description' => clienttranslate('${actplayer} may withdraw into fortress'),
		'descriptionmyturn' => clienttranslate('You may withdraw into fortress'),
		'type' => 'activeplayer',
		'args' => 'argWithdrawIntent',
		'possibleactions' => ['actWithdraw', 'actPass'],
		'transitions' => ['withdraw' => GameStates::ST_FIND_SIEGE, 'pass' => GameStates::ST_FIND_BATTLE],
	],

	GameStates::ST_FIND_BATTLE => [
		'name' => 'findBattle',
		'description' => clienttranslate('Finding possible field battle...'),
		'type' => 'manager',
		'action' => 'stFindBattle',
		'transitions' => ['found' => GameStates::ST_FIELD_BATTLE, 'none' => GameStates::ST_IMPULSE_ACTIONS, 'more' => GameStates::ST_IMPULSE_ACTIONS],
	],

	GameStates::ST_FIELD_BATTLE => [
		'name' => 'fieldBattle',
		'description' => clienttranslate('Starting field battle...'),
		'type' => 'manager',
		'action' => 'stFieldBattle',
		'transitions' => ['next' => GameStates::ST_FIND_FIELD_BATTLE_RESPONSES],
	],

	GameStates::ST_FIND_FIELD_BATTLE_RESPONSES => [
		'name' => 'findFieldBattleResponses',
		'description' => clienttranslate('Finding field battle responses...'),
		'type' => 'manager',
		'action' => 'stFindFieldBattleResponses',
		'transitions' => ['found' => GameStates::ST_FIELD_BATTLE_RESPONSE, 'none' => GameStates::ST_FIELD_BATTLE_DICE],
	],

	GameStates::ST_FIELD_BATTLE_DICE => [
		'name' => 'fieldBattleDice',
		'description' => clienttranslate('Declaring field battle dice...'),
		'type' => 'manager',
		'action' => 'stFieldBattleDice',
		'transitions' => ['next' => GameStates::ST_FIELD_BATTLE_CARD],
	],

	GameStates::ST_FIELD_BATTLE_CARD => [
		'name' => 'fieldBattleCard',
		'description' => clienttranslate('field battle cards...'),
		'type' => 'manager',
		'action' => 'stFieldBattleCard',
		'transitions' => ['attacker' => GameStates::ST_PLAY_FIELD_BATTLE_CARD, 'defender' => GameStates::ST_ROLL_FIELD_BATTLE_DICE],
	],

	GameStates::ST_PLAY_FIELD_BATTLE_CARD => [
		'name' => 'playFieldBattleCard',
		'description' => clienttranslate('${actplayer} may play battle card'),
		'descriptionmyturn' => clienttranslate('You may play battle card'),
		'type' => 'activeplayer',
		'args' => 'argFieldBattleCard',
		'possibleactions' => ['actPlayCard', 'actPass'],
		'transitions' => ['play' => GameStates::ST_PLAY_FIELD_BATTLE_CARD, 'pass' => GameStates::ST_FIELD_BATTLE_CARD],
	],

	GameStates::ST_ROLL_FIELD_BATTLE_DICE => [
		'name' => 'fieldBattleDice',
		'description' => clienttranslate('Declaring field battle dice...'),
		'type' => 'manager',
		'action' => 'stRollFieldBattleDice',
		'transitions' => ['janissaries' => GameStates::ST_PLAY_JANISSARIES, 'next' => GameStates::ST_DECLARE_FIELD_BATTLE_WINNER],
	],

	GameStates::ST_PLAY_JANISSARIES => [  // As Reaction, right?
		'name' => 'playJanissaries',
		'description' => clienttranslate('${actplayer} may play Janissaries'),
		'descriptionmyturn' => clienttranslate('You may play Janissaries'),
		'type' => 'activeplayer',
		'args' => 'argPlayJanissaries',
		'possibleactions' => ['actPlayCard'],
		'transitions' => ['next' => GameStates::ST_DECLARE_FIELD_BATTLE_WINNER],
	],

	GameStates::ST_DECLARE_FIELD_BATTLE_WINNER => [
		'name' => 'declareFieldBattleWinner',
		'description' => clienttranslate('Declaring field battle winner...'),
		'type' => 'manager',
		'action' => 'stDeclareFieldBattleWinner',
		'transitions' => ['next' => GameStates::ST_FIELD_BATTLE_CASUALTIES],
	],

	GameStates::ST_FIELD_BATTLE_CASUALTIES => [
		'name' => 'fieldBattleCasualties',
		'description' => clienttranslate('Field battle casualties...'),
		'type' => 'manager',
		'action' => 'stFieldBattleCasualties',
		'transitions' => ['start' => GameStates::ST_TAKE_FIELD_BATTLE_CASUALTIES, 'none' => GameStates::ST_FIELD_BATTLE_CAPTURE_LEADERS],
	],

	GameStates::ST_TAKE_FIELD_BATTLE_CASUALTIES => [
		'name' => 'takeFieldBattleCasualties',
		'description' => clienttranslate('Players must take casualties'),
		'descriptionmyturn' => clienttranslate('You must take ${casualties} casualties'),
		'type' => 'multipleactiveplayer',
		'args' => 'argTakeFieldBattleCasualties',
		'possibleactions' => ['actDeclareCasualties'],
		'transitions' => ['done' => GameStates::ST_FIELD_BATTLE_CAPTURE_LEADERS],
	],

	GameStates::ST_FIELD_BATTLE_CAPTURE_LEADERS => [
		'name' => 'fieldBattleCaptureLeaders',
		'description' => clienttranslate('Field battle capture leaders...'),
		'type' => 'manager',
		'action' => 'stFieldBattleCaptureLeaders',
		'transitions' => ['next' => GameStates::ST_FIELD_BATTLE_RETREATS],
	],

	GameStates::ST_FIELD_BATTLE_RETREATS => [
		'name' => 'fieldBattleRetreats',
		'description' => clienttranslate('Field battle retreats...'),
		'type' => 'manager',
		'action' => 'stFieldBattleRetreats',
		'transitions' => ['fortress' => GameStates::ST_FIELD_BATTLE_RETREATS, 'found' => GameStates::ST_DECLARE_RETREAT_DESTINATION, 'none' => GameStates::ST_FIND_SIEGE],
	],

	GameStates::ST_DECLARE_RETREAT_DESTINATION => [
		'name' => 'declareRetreatDestination',
		'description' => clienttranslate('${actplayer} must declare retreat destination'),
		'descriptionmyturn' => clienttranslate('You must declare retreat destination'),
		'type' => 'activeplayer',
		'args' => 'argDeclareRetreatDestination',
		'possibleactions' => ['actDeclareDestination'],
		'transitions' => ['next' => GameStates::ST_FIELD_BATTLE_RETREATS],
	],

	GameStates::ST_FIND_SIEGE => [
		'name' => 'findSiege',
		'description' => clienttranslate('Checking for siege...'),
		'type' => 'manager',
		'action' => 'stFindSiege',
		'transitions' => ['next' => GameStates::ST_CONCLUDE_FIELD_BATTLE, 'retreat' => GameStates::ST_DECLARE_RETREAT_DESTINATION],
	],

	GameStates::ST_CONCLUDE_FIELD_BATTLE => [
		'name' => 'concludeFieldBattle',
		'description' => clienttranslate('Concluding field battle...'),
		'type' => 'manager',
		'action' => 'stConcludeFieldBattle',
		'transitions' => ['more' => GameStates::ST_IMPULSE_ACTIONS, 'done' => GameStates::ST_NEXT_PLAYER],
	],

	GameStates::ST_MOVEMENT_RESPONSE => [
		'name' => 'responseMovement',
		'description' => clienttranslate('${actplayer} may play response'),
		'descriptionmyturn' => clienttranslate('You may play response'),
		'type' => 'activeplayer',
		'args' => 'argResponseMovement',
		'possibleactions' => ['actPlayCard'],
		'transitions' => ['next' => GameStates::ST_FIND_INTERCEPTIONS],
	],

	GameStates::ST_FIELD_BATTLE_RESPONSE => [
		'name' => 'fieldBattleResponse',
		'description' => clienttranslate('${actplayer} may play response'),
		'descriptionmyturn' => clienttranslate('You may play response'),
		'type' => 'activeplayer',
		'args' => 'argResponseFieldBattle',
		'possibleactions' => ['actPlayCard'],
		'transitions' => ['next' => GameStates::ST_FIELD_BATTLE_DICE],
	],

	GameStates::ST_NEXT_PLAYER => [
		'name' => 'nextPlayer',
		'description' => 'End a players impulse and move to next',
		'type' => 'manager',
		'action' => 'stNextPlayer',//TODO check for empty hand
		'transitions' => ['nextPlayer' => GameStates::ST_PICK_CARD],
	],

	GameStates::ST_BUY_UNIT => [
		'name' => 'buyUnit',
		'description' => clienttranslate('${actplayer} must select location to construct unit'),
		'descriptionmyturn' => clienttranslate('You must select location to construct unit'),
		'type' => 'activeplayer',
		'args' => 'argBuyUnit',
		'possibleactions' => ['actPickCity', 'actUndo'],
		'transitions' => ['buy' => GameStates::ST_IMPULSE_ACTIONS, 'undo' => GameStates::ST_IMPULSE_ACTIONS, 'next' => GameStates::ST_NEXT_PLAYER],
	],

	GameStates::ST_CP_REFORMATION_ATTEMPS => [//TODO store languge Zone(any, notset, ger, eng, frenche, ...), number of Reformation attemps, 95Theses active, Printing press active, Marburg Colloquium active and whos winning Ties somewhere
		'name' => 'reformationAttems',
		'description' => clienttranslate('${actplayer} must select city for reformation attempt'),
		'descriptionmyturn' => clienttranslate('You must select city for reformation attempt'),
		'type' => 'activeplayer',
		'possibleactions' => ['actPickCity', 'actUndo'],
		'transitions' => ['a' => GameStates::ST_IMPULSE_ACTIONS, 'b' => GameStates::ST_CP_REFORMATION_ATTEMPS],
	],

	GameStates::ST_EVT_Janissaries =>[
		'name' => 'evtJanissaries',
		'description' => clienttranslate('${actplayer} (Ottoman) must select location to construct Janissaires (4 Regulars)'),
		'descriptionmyturn' => clienttranslate('You must select location to construct Janissaires (4 Regulars)'),
		'type' => 'activeplayer',
		'args' => 'argEvtJanissaries',
		'possibleactions' => ['actPickCity', 'actUndo'],
		'transitions' => ['undo' => GameStates::ST_PICK_CARD, 'resolve' => GameStates::ST_NEXT_PLAYER],
	],

	GameStates::ST_EVT_HOLYROMAN =>[
		'name' => 'evtHolyRoman',
		'description' => clienttranslate('${actplayer} (Hapsburg) must select location to move Charles V to'),
		'descriptionmyturn' => clienttranslate('You must select location to move Charles V to'),
		'type' => 'activeplayer',
		'args' => 'argHolyRoman',
		'possibleactions' => ['actPickCity', 'actUndo'],
		'transitions' => ['undo' => GameStates::ST_PICK_CARD, 'move_Charles' => GameStates::ST_IMPULSE_ACTIONS],
	],

	GameStates::ST_EVT_SIXWIVESOFHENRY=>[
		'name' => 'evtSixWives',
		'description' => clienttranslate('${actplayer} (England) must select if to make Love or war.'),
		'descriptionmyturn' => clienttranslate('You must select if to make Love or war.'),
		'type' => 'activeplayer',
		'args' => 'argSixWives',
		'possibleactions' => ['actEvtSixWivesWar', 'actEvtSixWviesMary', 'actUndo'],
		'transitions' => ['undo' => GameStates::ST_PICK_CARD, 'make_love' => GameStates::ST_NEXT_PLAYER, 'make_war' => GameStates::ST_IMPULSE_ACTIONS, 'make_war_scotland' => GameStates::ST_EVT_SixWIVES_FRANCE_INTERVENTION],
	],

	GameStates::ST_EVT_SixWIVES_FRANCE_INTERVENTION=>[
		'name' => 'evtSixWivesFranceIntervention',
		'description' => clienttranslate('${actplayer} (France) may intervene against the English dow on Scotland.'),
		'description' => clienttranslate('$You may intervene against the English dow on Scotland.'),
		'type' => 'activeplayer',
		'possibleactions' => ['actEvtSixWivesWarFranceIntervention'],
		'transitions' => ['do_franceIntervention' => GameStates::ST_IMPULSE_ACTIONS, 'dont_franceIntervention' => GameStates::ST_IMPULSE_ACTIONS],//english impulse actions with 5 CP in any case.
	],

	GameStates::ST_EVT_PATRONOFARTS =>[
		'name' => 'evtPatronOfArts',
		'description' => clienttranslate('${actplayer} (France) rolls on the Chatteaux table'),
		'descriptionmyturn' => clienttranslate('You roll on the Chatteaux table'),
		'type' => 'activeplayer',
		'args' => 'argPatronOfArts',
		'possibleactions' => ['actRollChatteaux', 'actUndo'],
		'transitions' => ['undo' => GameStates::ST_PICK_CARD, 'rollChatteaux' => GameStates::ST_NEXT_PLAYER, 'discard' => GameStates::ST_DISCARD],
	],

	GameStates::ST_EVT_PAPAL_BULL =>[
		'name' => 'evtPapalBull',
		'description' => clienttranslate('${actplayer} (Papacy) may excuminicate someone'),
		'descriptionmyturn' => clienttranslate('You may excomuncate someone'),
		'type' => 'activeplayer',
		'args' => 'argPapalBull',
		'possibleactions' => ['actExcomunicateReformer', 'actExcumicateLeader', 'actUndo'],
		'transitions' => ['undo' => GameStates::ST_PICK_CARD, 'rollChatteaux' => GameStates::ST_NEXT_PLAYER],
	],

	// Final state.
	// Please do not modify (and do not overload action/args methods).
	GameStates::ST_END_GAME => [
		'name' => 'gameEnd',
		'description' => clienttranslate('End of game'),
		'type' => 'manager',
		'action' => 'stGameEnd',
		'args' => 'argGameEnd',
	],
];
