define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.board', null, {

    setupBoard() {
      for(let token_id in this.gamedatas.tokens){
        print("token_id=" + token_id);
        let token = this.gamedatas.tokens[token_id];
        print("token=" + token);
        if(token.board != 'supply'){
          this.place('tplToken', token, `${token.location_type}_${token.location_id}`);// This somehow includes tokens on player boards.
        }
      }
      for(const city_node of dojo.query('.city')){
        const city_id = city_node.id.split('_')[1];
        this.place('tplCitySelector', city_id, city_node);//invisible, used to select citys (e.g. to build untis), I guess?
      }
    },

    tplToken(token){
      print("Board.tplToken("+token+")")
      return `
        <div id="${token.id}" class="token ${token.style} ${token.flipped}" data-name="${token.name}">
        </div>
      `;
    },

    tplCitySelector(city_id){
      return `
        <div id="cityselector_${city_id}" class="city-selector">
        </div>
      `;

    },
  });
});
