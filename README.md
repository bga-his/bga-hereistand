# bga-hereistand
Here I Stand for Board Game Arena

Working spreadsheet
https://docs.google.com/spreadsheets/d/1v-xicaLIc2KklrPOAwlzjpm2ePVhxbEzh3HbjKy4xNU

# Code Walkthrough

This is a rather complex game and so the initial design tried to make room for all of it with an complex design.

```
hereistand
  \img
    \svg - All tokens are currently just SVGs, 
  \misc
    \tests - A goal was to decouple all logic from the database to allow for test driven development on a local machine, tests are here
  \modules - The PHP and JS module system are heavily used, code is here
    \css - SASS is compiled into the main CSS file as part of the build process
    \js - Methods for showing Gamestate to client and setting clickables
      \hereistand.js includes all other .js files and defines the setup method
      \States.js add methods from action.js to html-objects (using the onClick-method in game.js)
      \Actions.js call takeAction method in game.js with string name of a ?hereistand.action.php method that should be ajax-called
      \game.js bunch of uitl-functions? Includes onEnteringState that calls the appropriate States.js function.
      \ Is this circular dependency realy neccesary? I fell it could be orderd better, but then again I havent even read all methods in there
        \ maybe move onEntering/leaving state to States.js and takeAction to Actions.js? And sort/praefix the files based on if they are used to setup the visuals (Board, Cards, Players, ?) or if they are to handle actions (game, States, Actions, game, ?)
    \php
      \Core - A few base classes for the game
      \Helpers - Utility classes, used elsewhere
      \Managers - Database managers for various objects
      \Models - Classes representing other game concepts
      \Notifications - All notifications sent back to client
      \States - Main logic for all state-based actions held here
      \?
        \hereistand.action.php entry point for ajax calls. calls hereistand.game.php methods
        \hereistand.game.php act* methods call the modules/php/Core/Actions.php method of the same name
        \Actions.php finaly actually does the action the user clicked on.
        \Modules/php/Core/Maneger/Tokens.php TODO
```
