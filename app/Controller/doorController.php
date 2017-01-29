<?php

    function doors($xml, $chapter, $game, $room){
        foreach ($xml->room[$chapter]->doors as $value){

            if ($room->getDoorsNorth() && $room->getDoorsNorth() == $value->north){
                echo "<li>North door : <a href='/game/".$game."/".$_SESSION['listRoom'][strtolower((String)$value->north)]."'>".$value->north."</a>";
            }
            if ($room->getDoorsSouth() && $room->getDoorsSouth() == $value->south){
                echo "<li>South door : <a href='/game/".$game."/".$_SESSION['listRoom'][strtolower((String)$value->south)]."'>".$value->south."</a>";
            }
            if ($room->getDoorsEast() && $room->getDoorsEast() == $value->east){
                echo "<li>East door : <a href='/game/".$game."/".$_SESSION['listRoom'][strtolower((String)$value->east)]."'>".$value->east."</a>";
            }
            if ($room->getDoorsWest() && $room->getDoorsWest() == $value->west){
                echo "<li>West door : <a href='/game/".$game."/".$_SESSION['listRoom'][strtolower((String)$value->west)]."'>".$value->west."</a>";
            }
        }
    }