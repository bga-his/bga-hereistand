define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistandfork.notifications', null, {
    notif_playCardCP(args){
      const card_id = `card_${args.args.card.id}`;
      this.fadeOutAndDestroy(card_id);
    },

    notif_moveFormation(args){
      const dest = `city_${args.args.city.id}`;
      const formation = args.args.formation;
      for(let token of formation){
        this.slide(token, dest, {scale: this.scalingFactor, phantomEnd: true});
      }
    },

    notif_buyUnit(args){
      // place token on city
      console.log("Notifications::notif_buyUnit");
      const start = `player_board_${args.args.player_id}`;
      const dest = `city_${args.args.city.id}`;
      const token = args.args.token;
      this.place('tplToken', token, start);
      console.log("Notifications::notif_buyUnit: token.id="+token.id+", dest="+dest)
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
