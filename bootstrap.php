<?php
use \App\Core\Router;
use \App\Core\Autoloader;
use \App\Core\ErrorCatcher;
use \App\Core\Config;
use App\Core\ServiceLocator;
use \App\Core\DbConnector;

include_once 'app/core/Autoloader.php';
//include_once 'app/core/ErrorCatcher.php';



$autoloader = new Autoloader;
$autoloader->register();

$error_catcher = new ErrorCatcher();
$error_catcher->registerErrorHandler();
$error_catcher->registerExeptionHandler();

$configs = new Config();
$configs->parseIni();


$dbConnector = new DbConnector();
$serviceLocator = new ServiceLocator();
$serviceLocator->addClass('\App\Service\QueryBilderService', array($dbConnector->getPDO("mysql:host=localhost;dbname=taskme", "root")));




Router::go($serviceLocator);
