<?php
use \app\core\Router;
use \app\core\Autoloader;

include_once 'app/core/Autoloader.php';

$autoloader = new Autoloader;
$autoloader->register();


Router::go();
