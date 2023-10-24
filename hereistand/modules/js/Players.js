define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistandfork.players', null, {
    // Utils to iterate over players array/object
    forEachPlayer(callback) {
      Object.values(this.gamedatas.players).forEach(callback);
    },

    getPlayerColor(pId) {
      return this.gamedatas.players[pId].color;
    },

    setupPlayers() {
      this.forEachPlayer((player) => {
        // setup gameboard
        this.place('tplPlayerScore', player, `player_board_${player.id}`);
      });
    },

    tplPlayerScore(player){
      return `
        <div id="player_faction_${player.id}" class="faction-wrap">
          <div class="faction faction_${player.power}"></div>
        </div>
      `;
    },
  });
});
