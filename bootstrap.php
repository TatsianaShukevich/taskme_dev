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

$queryBilderService = $serviceLocator->get('\App\Service\QueryBilderService');



//register models
$serviceLocator->addClass('\App\Model\MainModel', array($queryBilderService));
$serviceLocator->addClass('\App\Model\TaskModel', array($queryBilderService));

$mainModel = $serviceLocator->get('\App\Model\MainModel');
$taskModel = $serviceLocator->get('\App\Model\TaskModel');

//register views
$serviceLocator->addClass('\App\View\MainView', array($serviceLocator));
$serviceLocator->addClass('\App\View\TaskView', array($serviceLocator));

$mainView = $serviceLocator->get('\App\View\MainView');
$taskView = $serviceLocator->get('\App\View\TaskView');

//register controllers
$serviceLocator->addClass('\App\Controller\MainController', array($serviceLocator, $mainModel, $mainView));
$serviceLocator->addClass('\App\Controller\TaskController', array($serviceLocator, $taskModel, $taskView));



Router::go($serviceLocator);
