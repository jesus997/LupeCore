<?php
namespace Jess\Messenger;

/**
* Controller Messenger
*/
class ControllerManager {
	public $VIEWS_VARS = [];

	function __construct() {
		global $config, $auth;
		$this->VIEWS_VARS['config'] = $config;
		$this->VIEWS_VARS['auth'] = $auth;
	}

	public function view($view, $vars=[]) {
		if(file_exists(__DIR__."/../../views/".$view.".php")) {
			$vars = array_merge($vars, $this->VIEWS_VARS);
			extract($vars);
			include __DIR__."/../../views/".$view.".php";
			return;
		}
		trigger_error("The view you are trying to access does not exist.");
	}

	public function redirect($name) {
		header('Location: '.$name);
		die();
	}

	private function params($method = 'GET', $name=false) {
		$params = $method === 'GET' ? $_GET : $_POST;
		if(!$name) {
			return $params;
		} else {
			if( array_key_exists($name, $params) ) {
				return $params[$name];
			}
		}
		return 'undefined';
	}

	public function get_params($name=false, $default = false) {
		$p = $this->params('GET', $name);
		if($p==="undefined") {
			return $default;
		}
		return $p;
	}

	public function post_params($name=false, $default = false) {
		$p = $this->params('POST', $name);
		if($p==="undefined") {
			return $default;
		}
		return $p;
	}
}