define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.actionbuttons', null, {
    onUpdateActivityPickCard(args, status){
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
    },

    onUpdateActivityImpulseActions(args, status){
      this.addPrimaryActionButton('move_in_clear', _('Move in the Clear'), 'onMoveInClearClick');
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
    },
  });
});
