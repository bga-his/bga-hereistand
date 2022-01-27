define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.board', null, {

    getStyle(token){
      return 'France_key';
    },

    setupBoard() {
      for(let token_id in this.gamedatas.tokens){
        let token = this.gamedatas.tokens[token_id];
        token.style = this.getStyle(token);
        if(token.location){
          this.place('tplToken', token, `city_${token.location}`);
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
