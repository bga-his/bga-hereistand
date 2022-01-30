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

$machinestates = [
	// The initial state. Please do not modify.
	ST_GAME_SETUP => [
		'name' => 'gameSetup',
		'description' => '',
		'type' => 'manager',
		'action' => 'stGameSetup',
		'transitions' => ['' => ST_PICK_CARD],
	],

	ST_PICK_CARD => [
		'name' => 'pickCard',
		'description' => clienttranslate('${actplayer} must play a card or pass'),
		'descriptionmyturn' => clienttranslate('${you} must play a card or pass'),
		'type' => 'activeplayer',
		'possibleactions' => ['actPlayCard', 'actPass'],
		'transitions' => ['playCP' => ST_IMPULSE_ACTIONS, 'pass' => ST_NEXT_PLAYER],
	],

	ST_IMPULSE_ACTIONS => [
		'name' => 'impulseActions',
		'description' => clienttranslate('${actplayer} must take actions with ${remainingCP}CP'),
		'descriptionmyturn' => clienttranslate('${you} must take actions with ${remainingCP}CP'),
		'type' => 'activeplayer',
		'args' => 'argImpulseActions',
		'possibleactions' => ['actMove', 'actPass', 'actBuyUnit'],
		'transitions' => ['pass' => ST_NEXT_PLAYER, 'move' => ST_DECLARE_FORMATION, 'buy' => ST_BUY_UNIT],
	],

	ST_DECLARE_FORMATION => [
		'name' => 'declareFormation',
		'description' => clienttranslate('${actplayer} must declare formation'),
		'descriptionmyturn' => clienttranslate('${you} must declare formation'),
		'type' => 'activeplayer',
		'args' => 'argDeclareFormation',
		'possibleactions' => ['actDeclareFormation', 'actUndo'],
		'transitions' => ['declare' => ST_DECLARE_DESTINATION, 'undo' => ST_IMPULSE_ACTIONS],
	],

	ST_DECLARE_DESTINATION => [
		'name' => 'declareDestination',
		'description' => clienttranslate('${actplayer} must declare destination'),
		'descriptionmyturn' => clienttranslate('${you} must declare destination'),
		'type' => 'activeplayer',
		'args' => 'argDeclareDestination',
		'possibleactions' => ['actPickCity', 'actUndo'],
		'transitions' => ['declare' => ST_FIND_MOVEMENT_RESPONSES, 'undo' => ST_IMPULSE_ACTIONS],
	],

	ST_FIND_MOVEMENT_RESPONSES => [
		'name' => 'findMovementResponses',
		'description' => clienttranslate('Finding movement responses...'),
		'type' => 'manager',
		'action' => 'stFindMovementResponses',
		'transitions' => ['found' => ST_MOVEMENT_RESPONSE, 'none' => ST_FIND_INTERCEPTIONS],
	],

	ST_FIND_INTERCEPTIONS => [
		'name' => 'findInterceptions',
		'description' => clienttranslate('Finding possible interceptions...'),
		'type' => 'manager',
		'action' => 'stFindInterceptions',
		'transitions' => ['found' => ST_INTERCEPT_INTENT, 'none' => ST_MOVE_FORMATION],
	],

	ST_INTERCEPT_INTENT => [
		'name' => 'interceptIntent',
		'description' => clienttranslate('${actplayer} may pick formation to intercept'),
		'descriptionmyturn' => clienttranslate('${you} may pick formatin to intercept'),
		'type' => 'activeplayer',
		'args' => 'argInterceptIntent',
		'possibleactions' => ['actDeclareIntercept', 'actPass'],
		'transitions' => ['declare' => ST_ROLL_INTERCEPTION, 'pass' => ST_FIND_INTERCEPTIONS],
	],

	ST_ROLL_INTERCEPTION => [
		'name' => 'rollInterception',
		'description' => clienttranslate('Attempting interception...'),
		'type' => 'manager',
		'action' => 'stRollInterception',
		'transitions' => ['done' => ST_INTERCEPT_INTENT],
	],

	ST_MOVE_FORMATION => [
		'name' => 'moveFormation',
		'description' => clienttranslate('Moving formation...'),
		'type' => 'manager',
		'action' => 'stMoveFormation',
		'transitions' => ['interception' => ST_FIND_BATTLE, 'done' => ST_FIND_AVOID],
	],

	ST_FIND_AVOID => [
		'name' => 'findAvoid',
		'description' => clienttranslate('Finding possible avoid battles...'),
		'type' => 'manager',
		'action' => 'stFindAvoid',
		'transitions' => ['found' => ST_AVOID_INTENT, 'none' => ST_FIND_WITHDRAW],
	],

	ST_AVOID_INTENT => [
		'name' => 'avoidIntent',
		'description' => clienttranslate('${actplayer} may pick formation to avoid'),
		'descriptionmyturn' => clienttranslate('${you} may pick formatin to avoid'),
		'type' => 'activeplayer',
		'args' => 'argDeclareAvoid',
		'possibleactions' => ['actDeclareAvoid', 'actPass'],
		'transitions' => ['declare' => ST_DECLARE_AVOID_DESTINATION, 'pass' => ST_FIND_AVOID],
	],

	ST_DECLARE_AVOID_DESTINATION => [
		'name' => 'declareAvoidDestination',
		'description' => clienttranslate('${actplayer} must declare destination'),
		'descriptionmyturn' => clienttranslate('${you} must declare destination'),
		'type' => 'activeplayer',
		'args' => 'argDeclareAvoidDestination',
		'possibleactions' => ['actDeclareDestination'],
		'transitions' => ['declare' => ST_ROLL_AVOID],
	],

	ST_ROLL_AVOID => [
		'name' => 'rollAvoid',
		'description' => clienttranslate('Attempting to avoid battle...'),
		'type' => 'manager',
		'action' => 'stRollAvoid',
		'transitions' => ['done' => ST_AVOID_INTENT],
	],

	ST_FIND_WITHDRAW => [
		'name' => 'findWithdraw',
		'description' => clienttranslate('Finding possible withdraws...'),
		'type' => 'manager',
		'action' => 'stFindWithdraw',
		'transitions' => ['found' => ST_WITHDRAW_INTENT, 'none' => ST_FIND_BATTLE],
	],

	ST_WITHDRAW_INTENT => [
		'name' => 'withdrawIntent',
		'description' => clienttranslate('${actplayer} may withdraw into fortress'),
		'descriptionmyturn' => clienttranslate('${you} may withdraw into fortress'),
		'type' => 'activeplayer',
		'args' => 'argWithdrawIntent',
		'possibleactions' => ['actWithdraw', 'actPass'],
		'transitions' => ['withdraw' => ST_FIND_SIEGE, 'pass' => ST_FIND_BATTLE],
	],

	ST_FIND_BATTLE => [
		'name' => 'findBattle',
		'description' => clienttranslate('Finding possible field battle...'),
		'type' => 'manager',
		'action' => 'stFindBattle',
		'transitions' => ['found' => ST_FIELD_BATTLE, 'none' => ST_IMPULSE_ACTIONS, 'more' => ST_IMPULSE_ACTIONS],
	],

	ST_FIELD_BATTLE => [
		'name' => 'fieldBattle',
		'description' => clienttranslate('Starting field battle...'),
		'type' => 'manager',
		'action' => 'stFieldBattle',
		'transitions' => ['next' => ST_FIND_FIELD_BATTLE_RESPONSES],
	],

	ST_FIND_FIELD_BATTLE_RESPONSES => [
		'name' => 'findFieldBattleResponses',
		'description' => clienttranslate('Finding field battle responses...'),
		'type' => 'manager',
		'action' => 'stFindFieldBattleResponses',
		'transitions' => ['found' => ST_FIELD_BATTLE_RESPONSE, 'none' => ST_FIELD_BATTLE_DICE],
	],

	ST_FIELD_BATTLE_DICE => [
		'name' => 'fieldBattleDice',
		'description' => clienttranslate('Declaring field battle dice...'),
		'type' => 'manager',
		'action' => 'stFieldBattleDice',
		'transitions' => ['next' => ST_FIELD_BATTLE_CARD],
	],

	ST_FIELD_BATTLE_CARD => [
		'name' => 'fieldBattleCard',
		'description' => clienttranslate('field battle cards...'),
		'type' => 'manager',
		'action' => 'stFieldBattleCard',
		'transitions' => ['attacker' => ST_PLAY_FIELD_BATTLE_CARD, 'defender' => ST_ROLL_FIELD_BATTLE_DICE],
	],

	ST_PLAY_FIELD_BATTLE_CARD => [
		'name' => 'playFieldBattleCard',
		'description' => clienttranslate('${actplayer} may play battle card'),
		'descriptionmyturn' => clienttranslate('${you} may play battle card'),
		'type' => 'activeplayer',
		'args' => 'argFieldBattleCard',
		'possibleactions' => ['actPlayCard', 'actPass'],
		'transitions' => ['play' => ST_PLAY_FIELD_BATTLE_CARD, 'pass' => ST_FIELD_BATTLE_CARD],
	],

	ST_ROLL_FIELD_BATTLE_DICE => [
		'name' => 'fieldBattleDice',
		'description' => clienttranslate('Declaring field battle dice...'),
		'type' => 'manager',
		'action' => 'stRollFieldBattleDice',
		'transitions' => ['janissaries' => ST_PLAY_JANISSARIES, 'next' => ST_DECLARE_FIELD_BATTLE_WINNER],
	],

	ST_PLAY_JANISSARIES => [
		'name' => 'playJanissaries',
		'description' => clienttranslate('${actplayer} may play Janissaries'),
		'descriptionmyturn' => clienttranslate('${you} may play Janissaries'),
		'type' => 'activeplayer',
		'args' => 'argPlayJanissaries',
		'possibleactions' => ['actPlayCard'],
		'transitions' => ['next' => ST_DECLARE_FIELD_BATTLE_WINNER],
	],

	ST_DECLARE_FIELD_BATTLE_WINNER => [
		'name' => 'declareFieldBattleWinner',
		'description' => clienttranslate('Declaring field battle winner...'),
		'type' => 'manager',
		'action' => 'stDeclareFieldBattleWinner',
		'transitions' => ['next' => ST_FIELD_BATTLE_CASUALTIES],
	],

	ST_FIELD_BATTLE_CASUALTIES => [
		'name' => 'fieldBattleCasualties',
		'description' => clienttranslate('Field battle casualties...'),
		'type' => 'manager',
		'action' => 'stFieldBattleCasualties',
		'transitions' => ['start' => ST_TAKE_FIELD_BATTLE_CASUALTIES, 'none' => ST_FIELD_BATTLE_CAPTURE_LEADERS],
	],

	ST_TAKE_FIELD_BATTLE_CASUALTIES => [
		'name' => 'takeFieldBattleCasualties',
		'description' => clienttranslate('Players must take casualties'),
		'descriptionmyturn' => clienttranslate('${you} must take ${casualties} casualties'),
		'type' => 'multipleactiveplayer',
		'args' => 'argTakeFieldBattleCasualties',
		'possibleactions' => ['actTakeCasualties'],
		'transitions' => ['done' => ST_FIELD_BATTLE_CAPTURE_LEADERS],
	],

	ST_FIELD_BATTLE_CAPTURE_LEADERS => [
		'name' => 'fieldBattleCaptureLeaders',
		'description' => clienttranslate('Field battle capture leaders...'),
		'type' => 'manager',
		'action' => 'stFieldBattleCaptureLeaders',
		'transitions' => ['next' => ST_FIELD_BATTLE_RETREATS],
	],

	ST_FIELD_BATTLE_RETREATS => [
		'name' => 'fieldBattleRetreats',
		'description' => clienttranslate('Field battle retreats...'),
		'type' => 'manager',
		'action' => 'stFieldBattleRetreats',
		'transitions' => ['fortress' => ST_FIELD_BATTLE_RETREATS, 'found' => ST_DECLARE_RETREAT_DESTINATION, 'none' => ST_FIND_SIEGE],
	],

	ST_DECLARE_RETREAT_DESTINATION => [
		'name' => 'declareRetreatDestination',
		'description' => clienttranslate('${actplayer} must declare retreat destination'),
		'descriptionmyturn' => clienttranslate('${you} must declare retreat destination'),
		'type' => 'activeplayer',
		'args' => 'argDeclareRetreatDestination',
		'possibleactions' => ['actDeclareDestination'],
		'transitions' => ['next' => ST_FIELD_BATTLE_RETREATS],
	],

	ST_FIND_SIEGE => [
		'name' => 'findSiege',
		'description' => clienttranslate('Checking for siege...'),
		'type' => 'manager',
		'action' => 'stFindSiege',
		'transitions' => ['next' => ST_CONCLUDE_FIELD_BATTLE, 'retreat' => ST_DECLARE_RETREAT_DESTINATION],
	],

	ST_CONCLUDE_FIELD_BATTLE => [
		'name' => 'concludeFieldBattle',
		'description' => clienttranslate('Concluding field battle...'),
		'type' => 'manager',
		'action' => 'stConcludeFieldBattle',
		'transitions' => ['more' => ST_IMPULSE_ACTIONS, 'done' => ST_NEXT_PLAYER],
	],

	ST_MOVEMENT_RESPONSE => [
		'name' => 'responseMovement',
		'description' => clienttranslate('${actplayer} may play response'),
		'descriptionmyturn' => clienttranslate('${you} may play response'),
		'type' => 'activeplayer',
		'args' => 'argResponseMovement',
		'possibleactions' => ['actPlayCard'],
		'transitions' => ['next' => ST_FIND_INTERCEPTIONS],
	],

	ST_FIELD_BATTLE_RESPONSE => [
		'name' => 'fieldBattleResponse',
		'description' => clienttranslate('${actplayer} may play response'),
		'descriptionmyturn' => clienttranslate('${you} may play response'),
		'type' => 'activeplayer',
		'args' => 'argResponseFieldBattle',
		'possibleactions' => ['actPlayCard'],
		'transitions' => ['next' => ST_FIELD_BATTLE_DICE],
	],

	ST_NEXT_PLAYER => [
		'name' => 'nextPlayer',
		'description' => 'End a players impulse and move to next',
		'type' => 'manager',
		'action' => 'stNextPlayer',
		'transitions' => ['nextPlayer' => ST_PICK_CARD],
	],

	ST_BUY_UNIT => [
		'name' => 'buyUnit',
		'description' => clienttranslate('${actplayer} must select location to construct unit'),
		'descriptionmyturn' => clienttranslate('${you} must select location to construct unit'),
		'type' => 'activeplayer',
		'args' => 'argBuyUnit',
		'possibleactions' => ['actPickCity', 'actUndo'],
		'transitions' => ['buy' => ST_IMPULSE_ACTIONS, 'undo' => ST_IMPULSE_ACTIONS, 'next' => ST_NEXT_PLAYER],
	],

	// Final state.
	// Please do not modify (and do not overload action/args methods).
	ST_END_GAME => [
		'name' => 'gameEnd',
		'description' => clienttranslate('End of game'),
		'type' => 'manager',
		'action' => 'stGameEnd',
		'args' => 'argGameEnd',
	],
];
