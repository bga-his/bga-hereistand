define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.players', null, {
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
        <div id="globalscore_${player.id}" class="globalscore">
          <div id="player_score_${player.id}" class="player_score">
            <span class="meeple echo c${player.color}"></span>
          </div>
        </div>
      `;
    },
  });
});
