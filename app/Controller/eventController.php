<?php

function life($lifes){
    $life = new Life();
    $life->setLife($lifes);

    return $life;
}