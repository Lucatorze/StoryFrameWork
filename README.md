# StoryFrameWork


# Story

CloackOfDarkness


The Foyer of the Opera House is where the game begins. This empty room has doors to the south and west, also an unusable exit to the north. There is nobody else around.
The Bar lies south of the Foyer, and is initially unlit. Trying to do anything other than return northwards results in a warning message about disturbing things in the dark.
On the wall of the Cloakroom, to the west of the Foyer, is fixed a small brass hook.
Taking an inventory of possessions reveals that the player is wearing a black velvet cloak which, upon examination, is found to be light-absorbent. The player can drop the cloak on the floor of the Cloakroom or, better, put it on the hook.
Returning to the Bar without the cloak reveals that the room is now lit. A message is scratched in the sawdust on the floor.
The message reads either "You have won" or "You have lost", depending on how much it was disturbed by the player while the room was dark.
The act of reading the message ends the game.


ISIS Prohibited

The entrance is where the game begins. This empty room has doors to the south and west, also an unusable exit to the north. There is nobody else around. The Chicha lies south of the entrance, and is initially unlit. Trying to do anything other than return northwards results in a warning message about disturbing things in the dark. On the wall of the Furniture Room, to the west of the entrance, is fixed a arms rack. Taking an inventory of possessions reveals that the player have a AK-47 which stop the player to use a hookah. The player can drop the AK-47 on the floor of the Furniture Room or, better, put it on the arms rack. Returning to the Chicha Bar without the AK-47, the player can now consume. A message is scratched in the sawdust on the floor. The message reads either "You have won" or "You have lost", depending on how much it was disturbed by the player while the room was prohibited with guns. The act of reading the message ends the game.

# Install

Git clone the repository, and composer install
Point the Virtual Host on web/Index.php

# app/Controller/doorController.php

function doors :

Multiple choice of doors destinations, North, South, East, West


# app/Controller/gameController.php


Description/Story of rooms according the multiple choices.


# app/Controller/roomCreator.php


function create :

This function set differents arguments of the story with the XML file


# app/class/Room.php


Class of Room Creator


# app/config/init.php

In


# app/config/routing.php




# app/pages/game.php




# app/pages/home.php




# web/index.php




# web/home.php




