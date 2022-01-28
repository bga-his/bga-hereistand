define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.actionbuttons', null, {
    onUpdateActivityPickCard(args, status){
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
    },

    onUpdateActivityImpulseActions(args, status){
      this.addPrimaryActionButton('move_in_clear', _('Move (1 - 2CP)'), 'onMoveClick');
      this.addPrimaryActionButton('unit_construction', _('Unit Construction (1 - 2CP)'), 'onUnitConstructionClick');
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
    },
  });
});