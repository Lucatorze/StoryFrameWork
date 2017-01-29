<?php

include_once __DIR__.'/../Controller/roomCreator.php';
include_once __DIR__.'/../Controller/gameController.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $room->getName() ?></title>
</head>
<body>

<a href="/">Home</a>

<div class="story">

    <div class="narration">
        You are in <b><?php echo $room->getLocation() ?></b>.<br>
        <?php echo $room->getDescription() ?>. <?php echo $room->getInfo() ?>
    </div>

    <div class="choice">



    </div>
</div>
    <?php


    ?>
</body>
</html>
