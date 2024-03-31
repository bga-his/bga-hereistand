define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.board', null, {

    setupBoard() {
      for(let token_id in this.gamedatas.tokens){
        console.log("token_id=" + token_id);
        let token = this.gamedatas.tokens[token_id];
        console.log("token=" + token);
        if(token.board != 'supply'){
          this.place('tplToken', token, `${token.location_type}_${token.location_id}`);// This somehow includes tokens on player boards.
        }
      }
      for(const space_node of dojo.query('.space')){
        const space_id = space_node.id.split('_')[1];
        this.place('tplSpaceSelector', space_id, space_node);//invisible, used to select spaces (e.g. to build untis), I guess?
      }
    },

    tplToken(token){
      console.log("Board.tplToken("+token+")");
      return `
        <div id="${token.id}" class="token ${token.style} ${token.flipped}" data-name="${token.name}">
        </div>
      `;
    },

    tplSpaceSelector(space_id){
      return `
        <div id="spaceselector_${space_id}" class="space-selector">
        </div>
      `;

    },
  });
});
