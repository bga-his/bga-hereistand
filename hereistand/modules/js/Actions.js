define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.actions', null, {
    onPassClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actPass');
    },

    onMoveInClearClick(evt){

    },
  });
});
