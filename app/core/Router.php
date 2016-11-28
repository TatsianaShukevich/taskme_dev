<?php

namespace App\Core;

use App\Core\ServiceLocator;


class Router
{

//comment
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
            $controller_name = ucfirst($routes[1]);
        }

        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        $controller_name = $namespace . $controller_name . 'Controller';
        $action_name = $action_name . '_action';
        $controller = $serviceLocator->get($controller_name);

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
