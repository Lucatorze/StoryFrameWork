<?php
$game = $request->get('storie', $storie);
$chapter = ($request->get('room', $room)-1);
$story = __DIR__.'\..\..\web\Ressources\story\\'.$game.'.xml';
unset($_SESSION['currentRoom']);

if (file_exists($story)) {
    $xml = simplexml_load_file($story);
    $roomAccess = $xml->room[$chapter];

    $boolName = (String)$xml->boolName;
    $endLostMsg = (String)$xml->endLostMsg;
    $eventMsg = (String)$xml->event->msg;

    if(!$session->get('bool')){
        $session->set('bool', (string)$xml->bool);
    }

    $listRoom = [];
    if (count($listRoom) == 0){
        for($i=0; $i<sizeof($xml->room);$i++){
            $listRoom[(String)$xml->room[$i]->title] = $i+1;
        }
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

    $_SESSION['currentRoom'] = create((string)$roomAccess->title, (string)$roomAccess->location, (string)$roomAccess->description,
                               $north, $south, $east, $west, (string)$roomAccess->info, (string)$roomAccess->boolEnd, (string)$roomAccess->boolEvent);
    $room = $_SESSION['currentRoom'];

    if(!$session->get('life')){
        $session->set('life', 3);
    }

} else {
    exit('Echec lors de l\'ouverture du l\'histoire ');
}