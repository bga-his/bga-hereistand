define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.states', null, {
    onEnteringStatePickCard(args){
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
      this.selectedCardId = null;
      dojo.query('#player-hand .card-wrapper').forEach((node) => 
        this.onClick(node, this.onCardClick)
      );
    },

    onEnteringStateImpulseActions(args){
      this.addPrimaryActionButton('move_in_clear', _('Move (1 - 2CP)'), 'onMoveClick');
      this.addPrimaryActionButton('unit_construction', _('Unit Construction (1 - 2CP)'), 'onUnitConstructionClick');
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
        console.log(city_node);
        this.onClick(city_node, this.onDestinationClick);
      }
    },
  });
});
