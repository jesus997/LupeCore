<?php
/**
 * Sistema de rutas
 * Docs: https://github.com/mrjgreen/phroute
 */

$router->filter('auth', function(){
	global $auth, $router;

	if(!$auth->check()) {
		header('Location: '.$router->route('login'));
	}
});


$router->get('404.html', ['Jess\Messenger\HomeController', 'error']);
$router->get(['/login', 'login'],  ['Jess\Messenger\AuthController', 'index']);
$router->post('/login',  ['Jess\Messenger\AuthController', 'login']);
$router->get(['/register', 'register'],  ['Jess\Messenger\AuthController', 'register']);

$router->group(['before' => 'auth'], function($router){
	$router->get(['/', 'home'],  ['Jess\Messenger\HomeController', 'index']);
	$router->get(['/logout', 'logout'],  ['Jess\Messenger\AuthController', 'logout']);
});