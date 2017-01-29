<?php

$pageDir = __DIR__."/../pages/";
use Symfony\Component\Routing\Route;

$routes->add('bonjour', new Route('/bonjour/{name}'), array('name' => 'inconnu'));
$routes->add('home', new Route('/'));

$routes->add('game', new Route('/game/{storie}/{room}'), array('storie' => 'inconnu', 'room' => '1'));
