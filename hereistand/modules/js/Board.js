define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.board', null, {

    setupBoard() {
      for(let token_id in this.gamedatas.tokens){
        let token = this.gamedatas.tokens[token_id];
        if(token.board == 'board'){
          if(token.location_type == 'city'){
            this.place('tplToken', token, `city_${token.location_id}`);
          }
        }
      }
      for(const city_node of dojo.query('.city')){
        const city_id = city_node.id.split('_')[1];
        this.place('tplCitySelector', city_id, city_node);
      }
    },

    tplToken(token){
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
