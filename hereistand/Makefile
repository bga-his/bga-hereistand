PROJECT_NAME=hereistand
PROJECT_ALT=hereistandt


# set the default action to something non-destructive and fast
default: test

# compile the css from the sass scripts
build:
	sass ${PROJECT_NAME}/${PROJECT_NAME}.scss ${PROJECT_NAME}/${PROJECT_NAME}.css

# use lftp to push the project to BGA studio
# must have variable $BGA_SFTP_LOGIN set on your dev machine
push: build
	lftp sftp://${BGA_SFTP_LOGIN}@1.studio.boardgamearena.com/ -e "mirror --reverse --parallel=10 ${PROJECT_NAME}/ ${PROJECT_NAME}/; exit" 

# perform a mass in-place rename of assets and push project to secondary BGA studio project
alt:
	sass ${PROJECT_NAME}/${PROJECT_NAME}.scss ${PROJECT_NAME}/${PROJECT_ALT}.css
	mv ${PROJECT_NAME}/${PROJECT_NAME}.action.php ${PROJECT_NAME}/${PROJECT_ALT}.action.php
	mv ${PROJECT_NAME}/${PROJECT_NAME}.view.php ${PROJECT_NAME}/${PROJECT_ALT}.view.php
	mv ${PROJECT_NAME}/${PROJECT_NAME}.game.php ${PROJECT_NAME}/${PROJECT_ALT}.game.php
	mv ${PROJECT_NAME}/${PROJECT_NAME}_${PROJECT_NAME}.tpl ${PROJECT_NAME}/${PROJECT_ALT}_${PROJECT_ALT}.tpl
	mv ${PROJECT_NAME}/${PROJECT_NAME}.js ${PROJECT_NAME}/${PROJECT_ALT}.js
	gsed -i "s/action_${PROJECT_NAME}/action_${PROJECT_ALT}/g" ${PROJECT_NAME}/${PROJECT_ALT}.action.php
	gsed -i "s/${PROJECT_NAME}_${PROJECT_NAME}/${PROJECT_ALT}_${PROJECT_ALT}/g" ${PROJECT_NAME}/${PROJECT_ALT}.action.php
	gsed -i "s/${PROJECT_NAME}/${PROJECT_ALT}/g" ${PROJECT_NAME}/${PROJECT_ALT}.game.php
	gsed -i "s/action_${PROJECT_NAME}/action_${PROJECT_ALT}/g" ${PROJECT_NAME}/${PROJECT_ALT}.view.php
	gsed -i "s/${PROJECT_NAME}_${PROJECT_NAME}/${PROJECT_ALT}_${PROJECT_ALT}/g" ${PROJECT_NAME}/${PROJECT_ALT}.view.php
	gsed -i "s/bgagame.${PROJECT_NAME}/bgagame.${PROJECT_ALT}/" ${PROJECT_NAME}/${PROJECT_ALT}.js
	gsed -i "s/${PROJECT_NAME}/${PROJECT_ALT}/" ${PROJECT_NAME}/modules/php/Core/Game.php
	gsed -i "s/game_version_${PROJECT_NAME}/game_version_${PROJECT_ALT}/" ${PROJECT_NAME}/version.php 
	lftp sftp://${BGA_SFTP_LOGIN}@1.studio.boardgamearena.com/ -e "mirror --reverse --parallel=10 ${PROJECT_NAME}/ ${PROJECT_ALT}/; exit" 
	rm ${PROJECT_NAME}/${PROJECT_ALT}.css
	rm ${PROJECT_NAME}/${PROJECT_ALT}.css.map
	mv ${PROJECT_NAME}/${PROJECT_ALT}.action.php ${PROJECT_NAME}/${PROJECT_NAME}.action.php
	mv ${PROJECT_NAME}/${PROJECT_ALT}.view.php ${PROJECT_NAME}/${PROJECT_NAME}.view.php
	mv ${PROJECT_NAME}/${PROJECT_ALT}.game.php ${PROJECT_NAME}/${PROJECT_NAME}.game.php
	mv ${PROJECT_NAME}/${PROJECT_ALT}_${PROJECT_ALT}.tpl ${PROJECT_NAME}/${PROJECT_NAME}_${PROJECT_NAME}.tpl
	mv ${PROJECT_NAME}/${PROJECT_ALT}.js ${PROJECT_NAME}/${PROJECT_NAME}.js
	gsed -i "s/action_${PROJECT_ALT}/action_${PROJECT_NAME}/g" ${PROJECT_NAME}/${PROJECT_NAME}.action.php
	gsed -i "s/${PROJECT_ALT}_${PROJECT_ALT}/${PROJECT_NAME}_${PROJECT_NAME}/g" ${PROJECT_NAME}/${PROJECT_NAME}.action.php
	gsed -i "s/${PROJECT_ALT}/${PROJECT_NAME}/g" ${PROJECT_NAME}/${PROJECT_NAME}.game.php
	gsed -i "s/action_${PROJECT_ALT}/action_${PROJECT_NAME}/g" ${PROJECT_NAME}/${PROJECT_NAME}.view.php
	gsed -i "s/${PROJECT_ALT}_${PROJECT_ALT}/${PROJECT_NAME}_${PROJECT_NAME}/g" ${PROJECT_NAME}/${PROJECT_NAME}.view.php
	gsed -i "s/bgagame.${PROJECT_ALT}/bgagame.${PROJECT_NAME}/" ${PROJECT_NAME}/${PROJECT_NAME}.js
	gsed -i "s/${PROJECT_ALT}/${PROJECT_NAME}/" ${PROJECT_NAME}/modules/php/Core/Game.php
	gsed -i "s/game_version_${PROJECT_ALT}/game_version_${PROJECT_NAME}/" ${PROJECT_NAME}/version.php 


test: setup
	./phpab -o autoload.php ${PROJECT_NAME}
	./phpunit --bootstrap autoload.php ${PROJECT_NAME}
	@date

# download php testing utilities locally if they are missing
setup:
ifeq (,$(wildcard ./phpunit))
	wget -O phpunit https://phar.phpunit.de/phpunit-9.phar
	chmod +x phpunit
endif
ifeq (,$(wildcard ./phpab))
	wget -O phpab https://github.com/theseer/Autoload/releases/download/1.27.1/phpab-1.27.1.phar
	chmod +x phpab
endif
