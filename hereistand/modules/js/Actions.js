define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.actions', null, {
    onPassClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actPass');
    },

    onUndoClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actUndo');
    },

    onMoveClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actMove');

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

    onUnitClick(evt){
      dojo.stopEvent(evt);
      const unit_id = evt.currentTarget.id;
      const index = this.selectedFormation.indexOf(unit_id);
      dojo.toggleClass(unit_id, 'selected');
      if(index >= 0){
        this.selectedFormation.splice(index, 1);
      } else {
        this.selectedFormation.push(unit_id);
      }
      console.log(this.selectedFormation);
    },

    onDeclareFormationClick(evt){
      dojo.stopEvent(evt);
      const id_str = this.selectedFormation.join(',');
      this.takeAction('actDeclareFormation', {token_ids: id_str});
    },

    onDestinationClick(evt){
      dojo.stopEvent(evt);
      const city_id = evt.currentTarget.id.split('_')[1];
      this.takeAction('actDeclareDestination', {city_id: city_id});
    },
  });
});
