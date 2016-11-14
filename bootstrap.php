<?php
use \App\Core\Router;
use \App\Core\Autoloader;
use \App\Core\ErrorCatcher;
use \App\Core\Config;
use App\Core\ServiceLocator;

include_once 'app/core/Autoloader.php';
//include_once 'app/core/ErrorCatcher.php';



$autoloader = new Autoloader;
$autoloader->register();

$error_catcher = new ErrorCatcher();
$error_catcher->registerErrorHandler();
$error_catcher->registerExeptionHandler();

$configs = new Config();
$configs->parseIni();

$serviceLocator = new ServiceLocator();
$serviceLocator->addClass('DbConnectorService', array("mysql:host=localhost;dbname=taskme", "root"));




Router::go($serviceLocator);
