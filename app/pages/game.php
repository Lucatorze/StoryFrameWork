<?php
include_once __DIR__.'/../Controller/roomCreator.php';
include_once __DIR__.'/../Controller/doorController.php';
include_once __DIR__.'/../Controller/formController.php';
include_once __DIR__.'/../config/init.php';
    include (__DIR__.'/includes/header.php');
?>

<div class="jumbotron">
    <h2><?php echo $room->getLocation() ?></h2>
    <br>
    <div class="well">
        <p><?php echo $room->getDescription()." ".$room->getInfo() ?></p>
    </div>
</div>


<div class="row marketing">
        <ul>
            <?php
            if ($room->getBoolEnd() == "no" || $session->get('bool') == "yes" || $session->get('bool') == "no"){
                doors($xml, $chapter, $game, $room, $listRoom);
            } ?>
        </ul>

    <div class="info">
        <?php
            if ($session->get('bool') != "yes" && $room->getBoolEnd() == "yes"){
                echo "<div class=\"alert alert-success\" align='center' role=\"alert\">You have won<br><a href='/'>Quit</a></div>";
            }elseif($session->get('bool') == "yes" && $room->getBoolEnd() == "yes"){
                $session->set('life', $session->get('life')-1);
                if ($session->get('life') > 0){
                    echo "<div class=\"alert alert-warning\" role=\"alert\">On entering the room, you notice that it is dark and that you see nothing. In trying to move forward, you drop furniture and break the decoration.<br>",
                         "You should probably remove your cloak. You have lost but you have ".$session->get('life'). " life</div>";
                }else{
                    echo "<div class=\"alert alert-danger\" align='center' role=\"alert\">You have lost<br><a href='/game/".$game."/1'>Restart</a> - <a href='/'>Quit</a></div>";
                }
            }elseif ($room->geboolEvent() == "yes"){
                if ($session->get('bool') == "yes") {
                    echo "<div class=\"well\" align='center'>Want to put your cloak on the hook or on the floor ?<br><br>";
                    ?>

                    <form action="<?php $_SERVER['PATH_INFO']; ?>" method="post">
                        <select id="event" name="event">
                            <option selected disabled>Choose on the list</option>
                            <option value="hook">On the hook</option>
                            <option value="floor">On the floor</option>
                        </select>
                        <input type="submit">
                    </form>
    </div>
        <?php
                }else{
                    echo "<div class=\"alert alert-info\" align='center' role=\"alert\">Your cloak is on the ".$session->get('bool')."</div>";
                }
                }
        ?>
    </div>
</div>

</body>
</html>
