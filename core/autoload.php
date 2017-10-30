<?php
namespace Jess\Messenger;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start PHP Session
session_start();

/**
 * Includes
 */
include_once(__DIR__."/../vendor/autoload.php");
include_once(__DIR__."/inc/ConfigManager.php");
include_once(__DIR__."/db/Connection.php");
include_once(__DIR__."/inc/Auth.php");
include_once(__DIR__."/inc/ControllerManager.php");

use Jess\Messenger\ConfigManager;
use Jess\Messenger\Auth;
use Jess\Messenger\DB;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$config = new ConfigManager();

/**
 * Conexion a la base de datos
 **/
$db = new DB();

/**
 * Autentificacion
 **/
$auth = new Auth();

/**
 * Auto carga de controladores
 */
function controller_autoload ($controller_name) {
	$file = $controller_name;
	if(strpos($controller_name, '\\') !== false) {
		$file = explode('\\', $controller_name);
		$file = $file[count($file)-1];
	}
	include_once(__DIR__ . "/controllers/" . $file . ".php");
}
spl_autoload_register("Jess\Messenger\controller_autoload");

/**
 * Sistema de rutas
 **/
$router = new RouteCollector();

include_once(__DIR__."/routes.php");