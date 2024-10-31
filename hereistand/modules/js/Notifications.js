define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.notifications', null, {

    notif_createToken(args){
      console.log(`notif_createToken: ${args.args.token_add} at location ${args.args.dest}`);
      this.place('tplToken', args.args.token_add, args.args.dest);
    },

    notif_moveToken(args){
      console.log(`notif_moveToken: ${args.args.tokenId} at location ${args.args.dest}`);
      this.slide(args.args.tokenId, args.args.dest, {scale: this.scalingFactor, phantomEnd: true});
      
    },

    notif_moveTokens(args){
      console.log(`notif_moveTokens: ${args.args.tokenIds} at location ${args.args.dest}`);
      for(const tokenId of args.args.tokenIds){
        this.slide(tokenId, args.args.dest, {scale: this.scalingFactor, phantomEnd: true});
      }
    },

    notif_createAndMoveToken(args){
      console.log(`notif_createAndMoveToken: ${args.args.token_add} create at location ${args.args.addLocation} and move to ${args.args.dest}`);
      let token_add = args.args.token_add;
      this.place('tplToken', token_add, args.args.addLocation);
      this.slide(token_add.id, args.args.dest, {scale: this.scalingFactor, phantomEnd: true});
    },

    notif_destroyToken(args){
      console.log(`notif_destroyToken: ${args.args.tokenId}`);
      this.fadeOutAndDestroy(args.args.tokenId);
    },

    notif_moveAndDestroyToken(args){
      console.log(`notif_moveAndDestroyToken: destroy ${args.args.tokenId} at location ${args.args.dest}`);
      this.slide(args.args.tokenId, args.args.dest, {destroy: true, scale: this.scalingFactor, phantomEnd: true});
    },

    notif_message(args){
      console.log(`notif_message with args ${args.args}`);
    },

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
      const formation = args.args.formation;

      dest = `space_${args.args.to_id}`;
      if(args.args.to_id >= 6000){
        dest = `seazone_${args.args.to_id}`;
      }
      for(let tokenId of formation){
        console.log("Notifications::notif_moveFormation(token="+tokenId+", dest="+dest+")");
        this.slide(tokenId, dest, {scale: this.scalingFactor, phantomEnd: true});
      }
    },

    notif_moveLeader(args){
      var dest = ``;
      if(args.args.to_id < 4000){
        dest = `space_${args.args.to_id}`;
      }else{
        //prision
        dest = `power_card_location_${args.args.to_id}`;
      }

      const tokenId = args.args.leader;
      if(args.args.from_id == null){
        start = `space_${args.args.from_id}`;
      }else{
        start = `player_board_${args.args.player_id}`;
        //this.place('tplToken', tokenId, start); // I think place takes a tokone, not a token ID.
      }
      console.log("Notifications::notif_moveLeader(token.id="+tokenId+", dest="+dest+")");
      this.slide(tokenId, dest, {scale: this.scalingFactor, phantomEnd: true});
    },

    notif_buyUnit(args){
      // place token on space
      console.log("Notifications::notif_buyUnit");
      const start = `player_board_${args.args.player_id}`;
      const dest = `space_${args.args.space.id}`;
      const token = args.args.token;
      this.place('tplToken', token, start);
      this.slide(token.id, dest, {scale: this.scalingFactor, phantomEnd: true});
    },

    notif_buyNavalUnit(args){
      console.log("Notifications::notif_buyNavalUnit");
      const start = `player_board_${args.args.player_id}`;
      const dest = `space_${args.args.space.id}`;
      const token = args.args.token;
      this.place('tplToken', token, start);
      this.slide(token.id, dest, {scale: this.scalingFactor, phantomEnd: true});
    },

    notif_destroyUnit(args){
      const dest = `player_board_${args.args.player_id}`;
      const token = args.args.token;
      this.slide(token.id, dest, {destroy: true, scale: this.scalingFactor, phantomEnd: true});
    },



    notif_setReligion(args){
      console.log("Notifications::setReligion: args.args = " + JSON.stringify(args.args));
      if(args.args.token_weg != null){
        console.log("destroy existing token");
        this.fadeOutAndDestroy(args.args.token_weg.id);
      }
      if(args.args.token_add != null){
        console.log("place new token.")
        this.place('tplToken', args.args.token_add, `space_${args.args.spaceID}`);
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

    notif_addUnrest(args){
      this.place('tplToken', args.args.token_add, `space_${args.args.spaceID}`);
    },

    notif_removeUnrest(args){
      this.fadeOutAndDestroy(args.args.unrestTokenID);
    },

    notif_addLeader(args){
      const start = `player_board_${args.args.player_id}`;
      const dest = `space_${args.args.spaceId}`;
      const token = args.args.token;
      this.place('tplToken', token, start);
      this.slide(token.id, dest, {scale: this.scalingFactor, phantomEnd: true});
    },
  });
});
