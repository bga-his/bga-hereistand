define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.actions', null, {
    onPassClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actPass');
    },

    onMoveClick(evt){
      dojo.stopEvent(evt);

    },

    onUnitConstructionClick(evt){
      dojo.stopEvent(evt);
    },

    onPlayEventClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actPlayCard', {cardId: this.selectedCardId, asEvent: true});
    },

    onPlayCPClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actPlayCard', {cardId: this.selectedCardId, asEvent: false});
    },

    onCardClick(evt){
      dojo.stopEvent(evt);
      const cardId = evt.currentTarget.id.split('_')[1];
      dojo.toggleClass(evt.currentTarget.id, 'selected');
      if(this.selectedCardId == cardId){
        this.selectedCardId = null;
        dojo.destroy('play_event');
        dojo.destroy('play_cp');
      } else {
        this.selectedCardId = cardId;
        this.addPrimaryActionButton('play_event', _('Play Event'), 'onPlayEventClick');
        this.addPrimaryActionButton('play_cp', _('Play for CP'), 'onPlayCPClick');
      }
    },
  });
});
