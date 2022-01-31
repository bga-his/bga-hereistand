sass hereistand/hereistand.scss hereistand/hereistandt.css
mv hereistand/hereistand.action.php hereistand/hereistandt.action.php
mv hereistand/hereistand.view.php hereistand/hereistandt.view.php
mv hereistand/hereistand.game.php hereistand/hereistandt.game.php
mv hereistand/hereistand_hereistand.tpl hereistand/hereistandt_hereistandt.tpl
mv hereistand/hereistand.js hereistand/hereistandt.js
gsed -i "s/action_hereistand/action_hereistandt/g" hereistand/hereistandt.action.php
gsed -i "s/hereistand_hereistand/hereistandt_hereistandt/g" hereistand/hereistandt.action.php
gsed -i "s/hereistand/hereistandt/g" hereistand/hereistandt.game.php
gsed -i "s/action_hereistand/action_hereistandt/g" hereistand/hereistandt.view.php
gsed -i "s/hereistand_hereistand/hereistandt_hereistandt/g" hereistand/hereistandt.view.php
gsed -i "s/bgagame.hereistand/bgagame.hereistandt/" hereistand/hereistandt.js
gsed -i "s/hereistand/hereistandt/" hereistand/modules/php/Core/Game.php
gsed -i "s/game_version_hereistand/game_version_hereistandt/" hereistand/version.php 
lftp sftp://========@1.studio.boardgamearena.com/ -e "mirror --reverse --parallel=10 --delete hereistand/ hereistandt/; exit" 
rm hereistand/hereistandt.css
rm hereistand/hereistandt.css.map
mv hereistand/hereistandt.action.php hereistand/hereistand.action.php
mv hereistand/hereistandt.view.php hereistand/hereistand.view.php
mv hereistand/hereistandt.game.php hereistand/hereistand.game.php
mv hereistand/hereistandt_hereistandt.tpl hereistand/hereistand_hereistand.tpl
mv hereistand/hereistandt.js hereistand/hereistand.js
gsed -i "s/action_hereistandt/action_hereistand/g" hereistand/hereistand.action.php
gsed -i "s/hereistandt_hereistandt/hereistand_hereistand/g" hereistand/hereistand.action.php
gsed -i "s/hereistandt/hereistand/g" hereistand/hereistand.game.php
gsed -i "s/action_hereistandt/action_hereistand/g" hereistand/hereistand.view.php
gsed -i "s/hereistandt_hereistandt/hereistand_hereistand/g" hereistand/hereistand.view.php
gsed -i "s/bgagame.hereistandt/bgagame.hereistand/" hereistand/hereistand.js
gsed -i "s/hereistandt/hereistand/" hereistand/modules/php/Core/Game.php
gsed -i "s/game_version_hereistandt/game_version_hereistand/" hereistand/version.php 
