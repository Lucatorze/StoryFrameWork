<?php

function create($title, $location, $description, $north, $south, $east, $west, $info, $boolEnd, $boolEvent){

    $room = new Room();

    $room->setName($title);
    $room->setLocation($location);
    $room->setDescription($description);
    $room->setDoorsNorth($north);
    $room->setDoorsSouth($south);
    $room->setDoorsEast($east);
    $room->setDoorsWest($west);
    $room->setInfo($info);
    $room->setBoolEnd($boolEnd);
    $room->setboolEvent($boolEvent);

    return $room;
}


