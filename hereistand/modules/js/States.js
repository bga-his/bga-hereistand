define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.states', null, {
    
    onEnteringStatePickCard(args){
      debug("onEnteringStatePickCar: add this.onCardClick to cards on player hand.");
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');//TODO only show pass button when its allowed to pass
      this.selectedCardId = null;
      dojo.query('#player-hand .card-wrapper').forEach((node) => 
        this.onClick(node, this.onCardClick)
      );
    },

    onEnteringStateDiscard(args){
      this.addPrimaryActionButton('discard', _('Discard'), 'onDiscardClick');
    dojo.query('#player-hand .card-wrapper').forEach((node) => 
      this.onClick(node, this.onCardClick)
    );
    },

    onEnteringStateImpulseActions(args){
      this.addPrimaryActionButton('move_in_clear', _('Move (1 - 2CP)'), 'onMoveClick');
      this.addPrimaryActionButton('regular_unit_construction', _('Build Regular Unit (2CP)'), 'onRegularUnitBuildClick');
      this.addPrimaryActionButton('merc_unit_construction', _('Build Merc/Cav Unit (1CP)'), 'onMercUnitBuildClick');
      this.addPrimaryActionButton('naval_unit_construction', _('Build Naval Unit (2CP)'), 'onNavalUnitBuildClick');
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
    },

    onEnteringStateDeclareFormation(args){
      this.addPrimaryActionButton('declare_formation', _('Declare Formation'), 'onDeclareFormationClick');
      this.addPrimaryActionButton('undo', _('Undo'), 'onUndoClick');
      this.selectedFormation = [];
      dojo.query('.city .Military').forEach((node) =>
        this.onClick(node, this.onUnitClick)
      );
    },

    onEnteringStateDeclareDestination(args){
      this.addPrimaryActionButton('undo', _('Undo'), 'onUndoClick');
      for(const city_id of args.valid_city_ids){
        const city_node = dojo.byId(`cityselector_${city_id}`);
        this.onClick(city_node, this.onDestinationClick);
      }
    },

    onEnteringStateBuyUnit(args){
      this.addPrimaryActionButton('undo', _('Undo'), 'onUndoClick');
      for(const city_id of args.valid_city_ids){
        const city_node = dojo.byId(`cityselector_${city_id}`);
        this.onClick(city_node, this.onDestinationClick);//onClick is defined in game.js, onDestinationClick method in Actions.js
      }
    },

    onEnteringStateTakeFieldBattleCasualties(args){
      this.addPrimaryActionButton('declare_casualties', _('Declare Casulaties'), 'onDeclareCasualtiesClick');
      this.selectedFormation = [];
      for(const token_id in args.tokens){
        this.onClick(token_id, this.onUnitClick);
      }
    },

    onEnteringStateEvtJanissaries(args){
      this.addPrimaryActionButton('undo', _('Undo'), 'onUndoClick');
      for(const city_id of args.valid_city_ids){
        const city_node = dojo.byId(`cityselector_${city_id}`);
        this.onClick(city_node, this.onDestinationClick);
      }
    },

    onEnteringStateEvtHolyRoman(args){
      this.addPrimaryActionButton('move Charles V', _('onEvtHolyRomanMoveCharlesVClick'), 'onEvtHolyRomanMoveCharlesVClick');
      this.addPrimaryActionButton('move Charles V and Duke Of Alva', _('onEvtHolyRomaMoveCharlesVAndDukeClick'), 'onEvtHolyRomaMoveCharlesVAndDukeClick');
      this.addPrimaryActionButton('undo', _('Undo'), 'onUndoClick');
      for(const city_id of args.valid_city_ids){
        const city_node = dojo.byId(`cityselector_${city_id}`);
        this.onClick(city_node, this.onEvtHolyRomanDestClick);
      }
    },

    onEnteringStateEvtSixWives(args){
      if(args.can_declare_war_on_france){
        this.addPrimaryActionButton('Declare war on France', _('onEvtSixWivesWarFranceClick'), 'onEvtSixWivesWarFranceClick');
      }
      if(args.can_declare_war_on_hapsburg){
        this.addPrimaryActionButton('Declare war on Hapsburg', _('onEvtSixWivesWarHapsburgClick'), 'onEvtSixWivesWarHapsburgClick');
      }
      if(args.can_declare_war_on_scotland){
        this.addPrimaryActionButton('Declare war on Scotland', _('onEvtSixWivesWarScotlandClick'), 'onEvtSixWivesWarScotlandClick');
      }
      if(args.nextWive_name != ""){
        this.addPrimaryActionButton('Mary '+args.nextWive_name, _('onEvtSixWivesMaryClick'), 'onEvtSixWivesMaryClick')
      }
    },

    onEnteringStateEvtSixWivesFranceIntervention(args){
      this.addPrimaryActionButton("Interven on Scottish side.", _('onEvtSixWivesFranceInterventionDoClick'), 'onEvtSixWivesFranceInterventionDoClick');
      this.addPrimaryActionButton("do nothing.", _('onEvtSixWivesFranceInterventionDontClick'), 'onEvtSixWivesFranceInterventionDontClick');
    },

    onEnteringStateEvtPatronOfArts(args){
      this.addPrimaryActionButton("Roll with an " + args.modfier +" modfier", _('onEvtPatronOfArtsClick'), 'onEvtPatronOfArtsClick');
      this.addPrimaryActionButton('undo', _('Undo'), 'onUndoClick');
    },

  });
});
