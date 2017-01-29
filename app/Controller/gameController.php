<?php
$game = $request->get('storie', $storie);
$chapter = ($request->get('room', $room)-1);
$story = __DIR__.'\..\..\web\Ressources\story\\'.$game;
unset($_SESSION['currentRoom']);

if (file_exists($story)) {
    $xml = simplexml_load_file($story);

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

    if ($xml->room[$chapter]->doors->north){
        $north = $xml->room[$chapter]->doors->north;
    }else{
        $north = " ";
    }
    if ($xml->room[$chapter]->doors->south){
        $south = $xml->room[$chapter]->doors->south;
    }else{
        $south = " ";
    }
    if ($xml->room[$chapter]->doors->east){
        $east = $xml->room[$chapter]->doors->east;
    }else{
        $east = " ";
    }
    if ($xml->room[$chapter]->doors->west){
        $west = $xml->room[$chapter]->doors->west;
    }else{
        $west = " ";
    }
    $_SESSION['currentRoom'] = create($xml->room[$chapter]->title, $xml->room[$chapter]->location, $xml->room[$chapter]->description, $north, $south, $east, $west, $xml->room[$chapter]->info, $xml->room[$chapter]->boolEnd);
    $room = $_SESSION['currentRoom'];


} else {
    exit('Echec lors de l\'ouverture du l\'histoire ');
}