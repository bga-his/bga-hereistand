define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.notifications', null, {
    notif_playCardCP(args){
      const card_id = `card_${args.args.card.id}`;
      this.fadeOutAndDestroy(card_id);
    },

    notif_moveFormation(args){
      const dest = `city_${args.args.city.id}`;
      const formation = args.args.formation;
      const from_id = `city_${args.args.from_id}`;
      for(let token of formation){
        this.slide(token, dest, {scale: this.scalingFactor, phantomEnd: true});
      }
    },

    notif_buyUnit(args){
      const dest = `city_${args.args.city.id}`;
      const token = args.args.token;
      this.place('tplToken', token, dest);
    },
  });
});
