define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.actionbuttons', null, {
    onUpdateActivityPickCard(args, status){
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
    },

    onUpdateActivityImpulseActions(args, status){
      this.addPrimaryActionButton('move_in_clear', _('Move (1 or 2CP)'), 'onMoveClick');
      this.addPrimaryActionButton('pass', _('Pass'), 'onPassClick');
    },
  });
});
