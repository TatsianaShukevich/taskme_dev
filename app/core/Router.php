<?php

namespace App\Core;

use App\Core\ServiceLocator;


class Router
{

//    static private $serviceLocator;
//
//    public function __construct(ServiceLocator $serviceLocator) {
//        self::$serviceLocator = $serviceLocator;
//    }

    /**
     * Parses URL...
     *
     */
    static function go(ServiceLocator $serviceLocator)
    {
        $controller_name = 'Main';
        $action_name = 'main';
        $namespace = '\\App\\Controller\\';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        $controller_name = $namespace . $controller_name . 'Controller';
        $action_name = $action_name . '_action';

        $controller = new $controller_name($serviceLocator);

        if(method_exists($controller, $action_name))
        {
            $controller->$action_name();
        }
        else
        {
            // exception
        }
    }

    public function getPath() {

    }
}
