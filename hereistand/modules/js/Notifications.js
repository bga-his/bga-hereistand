define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.notifications', null, {
    //TODO rename to "discard Card"
    //TODO doesnt get called.
    notif_playCardCP(args){
      const card_id = `card_${args.args.card.id}`;
      this.fadeOutAndDestroy(card_id);
    },
    notif_discardCard(args){
      const card_id = `card_${args.args.card.id}`;
      this.fadeOutAndDestroy(card_id);
    },

    notif_moveFormation(args){
      const dest = `space_${args.args.space.id}`;
      const formation = args.args.formation;
      for(let token of formation){
        this.slide(token, dest, {scale: this.scalingFactor, phantomEnd: true});
      }
    },

    notif_setPoliticalControl(args){
      console.log("Notifications::notif_setPoliticalControl");
      let token_weg = args.args.token_weg;
      let token_add = args.args.token_add;
      let type = args.args.type;

      if(token_weg != null){
        if(type=="hex"){
          //slide to player panel and destroy
          this.slide(token_weg.id, `player_board_${args.args.player_id_weg}`, {destroy: true, scale: this.scalingFactor, phantomEnd: true});
        }else if (type=="scm"){
          //slide to correct location on power card.
          this.slide(token_weg.id, "location_"+args.args.scmLocation, {destroy: false, scale: this.scalingFactor, phantomEnd: true});
        }else{
          console.log("invalid token type: " + type);
        }
      }
      
      //slide added token (if existing) to place.
      if(token_add != null){
        if(type=="hex"){
          //create image of hex control marker near player panel
          this.place('tplToken', token_add, `player_board_${args.args.player_id_add}`); //add token at player overview (to the right side of the screen, where the currnet player, time, ... is displayed)
        }
        
        //sliede control token to place
        this.slide(token_add.id, `space_${args.args.spaceID}`, {scale: this.scalingFactor, phantomEnd: true});

        if(type == "scm" && token_add["flipped"] != ""){
          // if scm: token already exist on power card, but might need to be flipped.
          this.fadeOutAndDestroy(token_add.id);
          this.place('tplToken', token_add, `space_${args.args.spaceID}`);
        }
      }
      
    },

    notif_setReligion(args){
      console.log("Notifications::setReligion");
      //this.fadeOutAndDestroy(args.args.token_weg);
      //this.place('tplToken', args.args.token_add, `supply_other`);
    },

    notif_buyUnit(args){
      // place token on space
      console.log("Notifications::notif_buyUnit");
      const start = `player_board_${args.args.player_id}`;
      const dest = `space_${args.args.space.id}`;
      const token = args.args.token;
      console.log("Notifications::notif_buyUnit: place(token="+token+", start="+start+")");
      this.place('tplToken', token, start);
      console.log("Notifications::notif_buyUnit: slide(token.id="+token.id+", dest="+dest+")");
      this.slide(token.id, dest, {scale: this.scalingFactor, phantomEnd: true});
    },

    notif_destroyUnits(args){
      const dest = `player_board_${args.args.player_id}`;
      const tokens = args.args.tokens;
      for(let token_id in tokens){
        let token = tokens[token_id];
        this.slide(token.id, dest, {destroy: true, scale: this.scalingFactor, phantomEnd: true});
      }
    },
  });
});
