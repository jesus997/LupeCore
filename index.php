<?php
include_once(__DIR__.'/core/autoload.php');

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (\Phroute\Phroute\Exception\HttpRouteNotFoundException $e) {
	$response = $dispatcher->dispatch("GET", "/404.html");
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

if( is_array($response) || is_object($response)) {
	print_r($response);
} else if ( is_string($response) ) {
	echo $response;
}