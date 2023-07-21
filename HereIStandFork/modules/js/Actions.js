define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistandfork.actions', null, {
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

    onRegularUnitBuildClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actBuyUnit', {unit_type: 0});
    },

    onMercUnitBuildClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actBuyUnit', {unit_type: 1});
    },

    onNavalUnitBuildClick(evt){
      dojo.stopEvent(evt);
      this.takeAction('actBuyUnit', {unit_type: 2});
    },

    onPlayEventClick(evt){
      dojo.stopEvent(evt);
      console.log("onPlayEventClick")
      this.takeAction('actPlayCard', {cardId: this.selectedCardId, asEvent: true});
    },

    onPlayCPClick(evt){
      dojo.stopEvent(evt);
      console.log("onPlayCPClick")
      this.takeAction('actPlayCard', {cardId: this.selectedCardId, asEvent: false});
    },

    onCardClick(evt, _this){
      dojo.stopEvent(evt);
      const cardId = evt.currentTarget.id.split('_')[1];
      dojo.toggleClass(evt.currentTarget.id, 'selected');
      if(_this.selectedCardId == cardId){
        _this.selectedCardId = null;
        dojo.destroy('play_event');
        dojo.destroy('play_cp');
      } else {
        _this.selectedCardId = cardId;
        debug("onCardClick.addPrimaryActionButton")
        _this.addPrimaryActionButton('play_event', _('Play Event'), 'onPlayEventClick');
        _this.addPrimaryActionButton('play_cp', _('Play for CP'), 'onPlayCPClick');
      }
    },

    onUnitClick(evt, _this){
      dojo.stopEvent(evt);
      const unit_id = evt.currentTarget.id;
      const index = _this.selectedFormation.indexOf(unit_id);
      dojo.toggleClass(unit_id, 'selected');
      if(index >= 0){
        _this.selectedFormation.splice(index, 1);
      } else {
        _this.selectedFormation.push(unit_id);
      }
    },

    onDeclareFormationClick(evt){
      dojo.stopEvent(evt);
      const id_str = this.selectedFormation.join(' ');
      this.takeAction('actDeclareFormation', {token_ids: id_str});
    },

    onDestinationClick(evt, _this){
      dojo.stopEvent(evt);
      const city_id = evt.currentTarget.id.split('_')[1];
      _this.takeAction('actPickCity', {city_id: city_id});
    },

    onDeclareCasualtiesClick(evt){
      dojo.stopEvent(evt);
      const id_str = this.selectedFormation.join(' ');
      this.takeAction('actDeclareCasualties', {token_ids: id_str});
    }, 

    /*
    * Make an AJAX call with automatic lock
    */
    takeAction(action, data, check = true, checkLock = true) {
      if (check && !this.checkAction(action)) return false;
      if (!check && checkLock && !this.checkLock()) return false;
    
      data = data || {};
      if (data.lock === undefined) {
        data.lock = true;
      } else if (data.lock === false) {
        delete data.lock;
      }
      return new Promise((resolve, reject) => {
        this.ajaxcall(
          '/' + this.game_name + '/' + this.game_name + '/' + action + '.html',
          data,
          this,
          (data) => resolve(data),
          (isError, message, code) => {
            if (isError) reject(message, code);
          },
        );
      });
    },
  });
});
