<?php
include_once __DIR__.'/../Controller/roomCreator.php';
include_once __DIR__.'/../Controller/doorController.php';
include_once __DIR__.'/../Controller/formController.php';
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
            <?php
            if ($room->getBoolEnd() == "no" || $session->get('bool') == "yes" || $session->get('bool') == "no"){
                doors($xml, $chapter, $game, $room, $listRoom);
            } ?>
        </ul>
    </div>

    <div class="info">
        <?php
            if ($session->get('bool') != "yes" && $room->getBoolEnd() == "yes"){
                echo "You have won<br><a href='/'>Quit</a>";
            }elseif($session->get('bool') == "yes" && $room->getBoolEnd() == "yes"){
                $session->set('life', $session->get('life')-1);
                if ($session->get('life') > 0){
                    echo "On entering the room, you notice that it is dark and that you see nothing. In trying to move forward, you drop furniture and break the decoration.<br>",
                         "You should probably remove your cloak. You have lost but you have ".$session->get('life'). " life";
                }else{
                    echo "You have lost<br><a href='/game/".$game."/1'>Restart</a> - <a href='/'>Quit</a>";
                }
            }elseif ($room->geboolEvent() == "yes"){
                if ($session->get('bool') == "yes") {
                    echo "Want to put your cloak on the hook or on the floor ?<br><br>";
                    ?>

                    <form action="<?php $_SERVER['PATH_INFO']; ?>" method="post">
                        <select id="event" name="event">
                            <option>Choose on the list</option>
                            <option value="hook">On the hook</option>
                            <option value="floor">On the floor</option>
                        </select>
                        <input type="submit">
                    </form>
        <?php
                }else{
                    echo "Your cloak is on the ".$session->get('bool')."<br><br>";
                }
                }
        ?>
    </div>
</div>

</body>
</html>
