define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.states', null, {
    onEnteringStatePickCard(args){
      this.selectedCardId = null;
      dojo.query('#player-hand .card-wrapper').connect('onclick', this, 'onCardClick');
    },

    onEnteringStateImpulseActions(args){
      console.log(args);
    },
  });
});
