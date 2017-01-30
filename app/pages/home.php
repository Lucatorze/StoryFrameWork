<?php
    include (__DIR__.'/includes/header.php');
?>
<div class="jumbotron">
    <h1>List of story</h1>
    <p class="lead">
        <?php

        $session->clear();
        session_destroy();
        $files = glob(__DIR__.'/../../web/Ressources/story/*.*');

        foreach($files as $file) {
            $file = pathinfo($file);
            echo "- <a href='/game/".$file['filename']."/1'>".$file['filename']."</a><br>";
        }

        ?>
    </p>
</div>

<footer class="footer">
    <p>&copy; 2016 StoryFrameWork.</p>
</footer>


        </div>

    </div>

</div>

</body>
</html>