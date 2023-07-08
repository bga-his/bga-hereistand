define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistandfork.cards', null, {

    setupCards() {
      for(let card_id in this.gamedatas.hand){
        let card = this.gamedatas.hand[card_id];
        this.place('tplCard', card, `player-hand`);
      }
    },

    tplCard(card){
      return `
        <div id="card_${card.id}" class="card-wrapper">
          <div class="card ${card.class_name}"></div>
        </div>
      `;
    },
  });
});
