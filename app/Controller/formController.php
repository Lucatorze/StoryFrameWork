<?php

if(isset($_POST['event'])){
    $session->set('bool', $_POST['event']);
}