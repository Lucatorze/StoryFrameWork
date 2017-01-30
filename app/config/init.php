<?php
$game = $request->get('storie', $storie);
$chapter = ($request->get('room', $room)-1);
$story = __DIR__.'\..\..\web\Ressources\story\\'.$game.'.xml';
unset($_SESSION['currentRoom']);

if (file_exists($story)) {
    $xml = simplexml_load_file($story);
    $roomAccess = $xml->room[$chapter];

    if(!isset($_SESSION['bool'])){
        $_SESSION['bool'] = (string)$xml->bool;
    }

    $listRoom = [];
    if (!isset($_SESSION['listRoom'])){
        for($i=0; $i<sizeof($xml->room);$i++){
            $listRoom[(String)$xml->room[$i]->title] = $i+1;
        }
        $_SESSION['listRoom'] = $listRoom;
    }

    if ($roomAccess->doors->north){
        $north = (string)$roomAccess->doors->north;
    }else{
        $north = " ";
    }
    if ($roomAccess->doors->south){
        $south = (string)$roomAccess->doors->south;
    }else{
        $south = " ";
    }
    if ($roomAccess->doors->east){
        $east = (string)$roomAccess->doors->east;
    }else{
        $east = " ";
    }
    if ($roomAccess->doors->west){
        $west = (string)$roomAccess->doors->west;
    }else{
        $west = " ";
    }

    $_SESSION['currentRoom'] = create((string)$roomAccess->title, (string)$roomAccess->location, (string)$roomAccess->description, $north, $south, $east, $west, (string)$roomAccess->info, (string)$roomAccess->boolEnd);
    $room = $_SESSION['currentRoom'];


    if (!isset($_SESSION['life'])){
        var_dump("ok");
        $_SESSION['life'] = 3;
        $life = $_SESSION['life'];
    }


} else {
    exit('Echec lors de l\'ouverture du l\'histoire ');
}