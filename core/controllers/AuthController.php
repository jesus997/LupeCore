<?php
namespace Jess\Messenger;
use Jess\Messenger\ControllerManager;

/**
* Controlador de inicio se sesion
*/
class AuthController extends ControllerManager{
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		global $auth;
		if($auth->check()) {
			$this->redirect('/');
		}
		$data['page_name'] = 'Login';
		$data['file_name'] = 'login';
		$this->view('auth/base', $data);
	}

	public function login() {
		global $db, $auth;

		if($auth->check()) {
			$this->redirect('/');
		}

		$email = $this->post_params("email", false);
		$password = $this->post_params("password", false);

		if($email && $password) {
			$saved_password = $db->query("SELECT password FROM users WHERE email='".$email."'");
			if( is_array($saved_password['response']) && array_key_exists('password', $saved_password['response']) ) {
				if( password_verify($password, $saved_password['response']['password']) ) {
					$user = $db->query("SELECT * FROM users WHERE email='".$email."'");
					$auth->login($user['response']);

					$this->redirect('/');
				} else {
					$data['error'] = "Contraseña incorrecta.";
				}
			} else {
				$data['error'] = "El usuario no existe. <a class=\"toggle\" href=\"#\">¿Quieres registrarte?</a>";
			}
		} else {
			$data['error'] = "Todos los campos son requeridos.";
		}

		$data['page_name'] = 'Login error';
		$data['file_name'] = 'login';

		$this->view('auth/base', $data);
	}

	public function register() {
		return "Pagina de registro";
	}

	public function logout() {
		global $auth;
		$auth->logout();
		return "Sesion cerrada";
	}
}