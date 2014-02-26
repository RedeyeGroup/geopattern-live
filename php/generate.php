<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('/', function (Request $request) use ($app) {

    $string = $request->query->get('string');
    $geopattern = new RedeyeVentures\GeoPattern\GeoPattern();
    $geopattern->setString($string);

    return $geopattern->toBase64();
});

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
});


$app->run();
