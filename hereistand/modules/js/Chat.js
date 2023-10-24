define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.chat', null, {

    setupChat() {
      
    },


  });
});

// Some stuff from Tisaac

// CREATE TABLE IF NOT EXISTS `guess` (
//   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
//   `player_id` int(11) NOT NULL,
//   `log_id` int(11) NOT NULL,
//   `guess` varchar(255),
//   `feedback` int(11),
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


//   public function newGuess() {
//     self::setAjaxMode();
//     $guess = self::getArg("guess", AT_base64, true );
//     $result = $this->game->newGuess($guess);
//     self::ajaxResponse();
//   }

//     newGuess(){
//     if(this.guess == "") return;

//     this.takeAction("newGuess", { guess: this.encode(this.guess) });
//     this.guess = "";
//   },
//   encode(str) {
//     return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,
//       function toSolidBytes(match, p1) {
//         return String.fromCharCode('0x' + p1);
//       })
//     );
//   },