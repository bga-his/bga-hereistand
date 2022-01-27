define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.board', null, {

    titleCase(string){
      if(string.length == 1){
        return string.toUpperCase();
      }
      if(string.length == 0){
        return string;
      }
      return string.substr(0, 1).toUpperCase() + string.substr(1);
    },

    getStyle(token){
      if(token.type == 'SCM'){
        return `${this.titleCase(token.faction)}_key`
      }
      if(token.type == 'regular'){
        // do something else
      }
      return 'Placeholder';
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
