<?php
namespace Jess\Messenger;

/**
* Manejo del inicio de sesion
*/
class Auth {

	function __construct() {
		if( !isset($_SESSION['auth']) ) {
			$_SESSION['auth'] = false;
		}
	}

	public function login($user_data = []) {
		$_SESSION['auth'] = $user_data;
	}

	public function logout() {
		if( $this->check() ) {
			$_SESSION['auth'] = false;
		}
	}

	public function check() {
		return (isset($_SESSION['auth']) && !empty($_SESSION['auth']));
	}

	public function user() {
		if( $this->check() ) {
			return $_SESSION['auth'];
		}
		return array(
			'username' => 'undefined',
			'name' => 'undefined',
			'email' => 'undefined'
		);
	}

	public function get($field) {
		if( $this->check() ) {
			if(is_array($_SESSION['auth']) && $array_key_exists($field, $_SESSION['auth'])) {
				return $_SESSION['auth'][$field];
			}
		}
		return 'undefined';
	}
}