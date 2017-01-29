<?php
session_start();
require_once (__DIR__ . "/../vendor/autoload.php");

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;


use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

require_once __DIR__."/../app/class/Room.php";

$request = Request::createFromGlobals();
$response = new Response();


$routes = new RouteCollection();
include (__DIR__."/../app/config/routing.php");

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try{

    $attributes = $matcher->match($request->getPathInfo());
    extract($attributes, EXTR_SKIP);

    ob_start();
    include sprintf($pageDir. "%s.php", $attributes["_route"]);

    $content = ob_get_clean();
    $response->setContent($content);

}catch (ResourceNotFoundException $e){
    $response->setStatusCode(404);
    $response->setContent("Oops nothing here ! ");
}catch (Exception $e){
    $response->setStatusCode(500);
    $response->setContent("Désolé, c'est cassé ! ");
}

$response->send();