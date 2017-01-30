<?php

    function doors($xml, $chapter, $game, $room, $listRoom){
        echo '<div class="btn-group btn-group-justified" role="group" aria-label="...">';

        foreach ($xml->room[$chapter]->doors as $value){

            if ($room->getDoorsNorth() && $room->getDoorsNorth() == $value->north){
                echo "<div class=\"btn-group\" role=\"group\">
                         <a class=\"btn btn-default\" href='/game/".$game."/".$listRoom[strtolower((String)$value->north)]."'>North door : ".$value->north."</a>
                         </div>";
            }
            if ($room->getDoorsSouth() && $room->getDoorsSouth() == $value->south){
                echo "<div class=\"btn-group\" role=\"group\">
                         <a class=\"btn btn-default\" href='/game/".$game."/".$listRoom[strtolower((String)$value->south)]."'>South door : ".$value->south."</a>
                      </div>";
            }
            if ($room->getDoorsEast() && $room->getDoorsEast() == $value->east){
                echo "<div class=\"btn-group\" role=\"group\">
                         <a class=\"btn btn-default\" href='/game/".$game."/".$listRoom[strtolower((String)$value->east)]."'>East door : ".$value->east."</a>
                         </div>";
            }
            if ($room->getDoorsWest() && $room->getDoorsWest() == $value->west){
                echo "<div class=\"btn-group\" role=\"group\">
                         <a class=\"btn btn-default\" href='/game/".$game."/".$listRoom[strtolower((String)$value->west)]."'>West door : ".$value->west."</a>
                         </div>";
            }
        }
        echo "</div>";
    }
