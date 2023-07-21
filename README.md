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
    \js - Client
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

TODO
  \Active player and remaining CP should be stored in DB to be recoverd after reload?
    \CP is global, so it already is in DB?
  Implement action for every fucking event. Including Scots raid.
```
