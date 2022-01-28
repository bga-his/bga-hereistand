define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.notifications', null, {
    notif_playCardCP(args){
      const card_id = `card_${args.args.card.id}`;
      this.fadeOutAndDestroy(card_id);
    },
  });
});
