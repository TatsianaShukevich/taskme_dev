<?php

namespace app\core;

class Router
{
    /**
     * Parses URL...
     *
     */
    static function go()
    {
        $controller_name = 'Main';
        $action_name = 'main';
        $namespace = '\\app\\Controller\\';

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

        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            // exception
        }
    }
}
