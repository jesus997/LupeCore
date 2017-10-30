<?php
namespace Jess\Messenger;

/**
* Config File
*/
class ConfigManager {
	private $VER = '0.1';
	private $CONFIG = [];

	function __construct() {
		$this->CONFIG = include_once(__DIR__."/../config.php");
	}

	public function version() {
		return $this->VER;
	}

	// Funcion recursiva para obtener el valor de la configuracion
	private function array_get_by_key($array, $key, $value = null) {
		if(strpos($key, '.') !== false) {
			list($index, $key) = explode('.', $key, 2);
			if (!isset($array[$index])) return $value;

			if(strlen($key) > 0)
				return $this->array_get_by_key($array[$index], $key, $value);

			$old = $array[$index];
			if ($value !== null) $array[$index] = $value;
			return $old;
		}
		
		if(!isset($array[$key]) || empty($array[$key])) return $value;
		return $array[$key];
	}

	public function get($key=false, $default=false) {
		if(!empty($key)) {
			return $this->array_get_by_key($this->CONFIG, $key, $default);
		}
		return $this->CONFIG;
	}
}