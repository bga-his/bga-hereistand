define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistandfork.states', null, {
    onEnteringStatePickCard(args){
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
      this.selectedCardId = null;
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
        this.onClick(city_node, this.onDestinationClick);
      }
    },

    onEnteringStateTakeFieldBattleCasualties(args){
      this.addPrimaryActionButton('declare_casualties', _('Declare Casulaties'), 'onDeclareCasualtiesClick');
      this.selectedFormation = [];
      for(const token_id in args.tokens){
        this.onClick(token_id, this.onUnitClick);
      }
    },
  });
});
