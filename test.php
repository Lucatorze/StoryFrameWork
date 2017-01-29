<?php
function indexTest(){
    $_GET['name'] = "bloublou";

    ob_start();
    include("index.php");

    $content = ob_get_clean();

    //var_dump($content == "Bonjour bloublou");

    return $content == "Bonjour bloublou";

}

indexTest();