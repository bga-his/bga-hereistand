define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.board', null, {

    setupBoard() {
      for(let token_id in this.gamedatas.tokens){
        let token = this.gamedatas.tokens[token_id];
        console.log(token);
        if(token.board != 'board'){
          return;
        }
        if(token.location_type == 'city'){
          this.place('tplToken', token, `city_${token.location_name}`);
        }
      }
    },

    tplToken(token){
      return `
        <div id="token_${token.id}" class="token ${token.style}">
        </div>
      `;
    },
  });
});
