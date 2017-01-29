<?php

$game = $request->get('storie', $storie);
$chapter = ($request->get('nb', $nb))-1;
$story = __DIR__.'\..\..\web\Ressources\story\\'.$game;

unset($_SESSION['currentRoom']);
if (file_exists($story)) {
    $xml = simplexml_load_file($story);

    if ($xml->room[$chapter]->doors->north != null){
        $north = $xml->room[$chapter]->doors->north;
    }else{
        $north = " ";
    }
    if ($xml->room[$chapter]->doors->south != null){
        $south = $xml->room[$chapter]->doors->south;
    }else{
        $south = " ";
    }
    if ($xml->room[$chapter]->doors->east != null){
        $east = $xml->room[$chapter]->doors->east;
    }else{
        $east = " ";
    }
    if ($xml->room[$chapter]->doors->west != null){
        $west = $xml->room[$chapter]->doors->west;
    }else{
        $west = " ";
    }
    $_SESSION['currentRoom'] = create($xml->room[$chapter]->title, $xml->room[$chapter]->location, $xml->room[$chapter]->description, $north, $south, $east, $west, $xml->room[$chapter]->info);
    $room = $_SESSION['currentRoom'];

    $_SESSION['cloak'] = $xml->cloak;

} else {
    exit('Echec lors de l\'ouverture du l\'histoire ');
}