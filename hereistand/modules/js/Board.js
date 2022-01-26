define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.board', null, {

    setupBoard() {
      this.place('tplPlayerHand', this.gamedatas.board, 'main-container');
      this.place('tplNode', null, 'map');
    },

    tplBoard(board) {
      return `
        <div id='board'>
          <div id='map'>
          </div>
        </div>
      `;
    },

    tplNode(node){
      return `
        <div id="map_node_WIT" class="map_node city" style="top:210px;left:149px;">
        </div>
      `;
    },
  });
});
