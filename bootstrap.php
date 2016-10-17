<?php
use \app\core\Router;
use \app\core\Autoloader;
use \app\core\ErrorCatcher;

include_once 'app/core/Autoloader.php';
//include_once 'app/core/ErrorCatcher.php';



$autoloader = new Autoloader;
$autoloader->register();

$error_catcher = new ErrorCatcher();
$error_catcher->registerErrorHandler();
$error_catcher->registerExeptionHandler();

Router::go();
