<?php
$game = $request->get('storie', $storie);
$chapter = ($request->get('room', $room)-1);
$story = __DIR__.'\..\..\web\Ressources\story\\'.$game;
unset($_SESSION['currentRoom']);

if (file_exists($story)) {
    $xml = simplexml_load_file($story);
    $roomAccess = $xml->room[$chapter];
    if (!isset($_SESSION['life'])){
        $_SESSION['life'] = 3;
    }

    if(!isset($_SESSION['bool'])){
        $_SESSION['bool'] = $xml->bool;
    }

    $listRoom = [];
    if (!isset($_SESSION['listRoom'])){
        for($i=0; $i<sizeof($xml->room);$i++){
            $listRoom[(String)$xml->room[$i]->title] = $i+1;
        }
        $_SESSION['listRoom'] = $listRoom;
    }

    if ($roomAccess->doors->north){
        $north = $roomAccess->doors->north;
    }else{
        $north = " ";
    }
    if ($roomAccess->doors->south){
        $south = $roomAccess->doors->south;
    }else{
        $south = " ";
    }
    if ($roomAccess->doors->east){
        $east = $roomAccess->doors->east;
    }else{
        $east = " ";
    }
    if ($roomAccess->doors->west){
        $west = $roomAccess->doors->west;
    }else{
        $west = " ";
    }
    $_SESSION['currentRoom'] = create($roomAccess->title, $roomAccess->location, $roomAccess->description, $north, $south, $east, $west, $roomAccess->info, $roomAccess->boolEnd);
    $room = $_SESSION['currentRoom'];


} else {
    exit('Echec lors de l\'ouverture du l\'histoire ');
}