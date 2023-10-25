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
      \States.js called whenever a new state is entered/left. Adds methods from action.js to html-objects (using the onClick-method in game.js)
      \Actions.js call takeAction method with string name of a hereistand.action.php method that should be ajax-called
      \game.js bunch of uitl-functions?
      \ Is this circular dependency realy neccesary? I fell it could be orderd better, but then again I havent even read all methods in there
        \ maybe sort/praefix the files based on if they are used to setup the visuals (Board, Cards, Players, ?) or if they are to handle actions (game, States, Actions, ?)
    \php
      \Core - A few base classes for the game
        \Actions change DB as State
        \Game
        \Globals
        \Notifications
        \Preferences
        \Stats
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
 Adding a new State:
   1. Add the States ID in php/constants.inc.php
   2. Add State to states.inc.php
   3. add args method in php/states/stateEnteringargs.php. Its name must match the 'args' => 'argStateName' of this State in states.inc.php
   4. Add the onEnteringState method in js/States.js (that recives the return value from the args method as argument). Its name gona match 'onEnteringState' + stateName.charAt(0).toUpperCase() + stateName.slice(1);
   5. Add the actions the player can take in that state to js/Actions.js as onXXXClick (the onEnteringState method adds these methods to gameelemts onClick method) The onXXClick method calls js/Actions tackeAction method, that ajaxcalls a hereistand.action.php method.
   6. Add the hereistand.action.php Method to call the php/Core/actions.php method
   7. Add the php/Core/actions.php method that finaly does the changes the player requested by clicking on the component last mention in step 4.
   6. Add transition to ST_PICKCARD that points to the States ID
   7. Add something in Cards that triggers that transition if its card is played as event.
   8. I forgott something, didnt I?
  
TODO
  \Active player and remaining CP should be stored in DB to be recoverd after reload?
    \CP is global, so it already is in DB?
  Implement action for every fucking event. Including Scots raid.