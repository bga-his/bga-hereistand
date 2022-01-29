define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.states', null, {
    onEnteringStatePickCard(args){
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
      this.selectedCardId = null;
      dojo.query('#player-hand .card-wrapper').connect('onclick', this, 'onCardClick');
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
      dojo.query('.city .Military').connect('onclick', this, 'onUnitClick');
    },

    onEnteringStateDeclareDestination(args){
      this.addPrimaryActionButton('undo', _('Undo'), 'onUndoClick');
      for(const city_id in args.valid_city_ids){
        const city_node = dojo.byId(`cityselector_${city_id}`);
        dojo.addClass(city_node, 'selectable');
        dojo.connect(city_node, 'onclick', this, 'onDestinationClick');
      }
    },
  });
});
