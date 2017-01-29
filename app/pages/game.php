<?php
include_once __DIR__.'/../Controller/roomCreator.php';
include_once __DIR__.'/../Controller/doorController.php';
include_once __DIR__.'/../config/init.php';
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
        <?php echo $room->getDescription()." ".$room->getInfo() ?>
    </div>

    <div class="choice">
        <ul>
            <?php doors($xml, $chapter, $game, $room); ?>
        </ul>
    </div>

    <div class="info">
        <?php
            if ($_SESSION['bool'] == "no" && $room->getBoolEnd() == "yes"){

                echo "You have won";

            }elseif($_SESSION['bool'] == "yes" && $room->getBoolEnd() == "yes"){

                if ($_SESSION['life'] > 0){
                    echo "You have lost but you have ".$_SESSION['life']. " life";
                    $_SESSION['life'] = $_SESSION['life'] - 1;
                }else{
                    echo "You have lost<br><a href='/game/".$game."/1'>Restart</a> - <a href='/'>Quit</a>";
                    session_destroy();
                }
            }
        ?>
    </div>
</div>

</body>
</html>
