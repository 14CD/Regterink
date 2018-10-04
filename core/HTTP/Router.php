<?php

include '../../Controllers/HomeController.php';

class Router
{
    protected $routes = [];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            $controllerInfo = explode("@", $this->routes[$uri]);
            try {
                $reflection = new ReflectionClass($controllerInfo[0]);
                if($reflection->hasMethod($controllerInfo[1])) {
                    return call_user_func_array($controllerInfo[0], array());
                }
            } catch (ReflectionException $exception) {
                return $exception->getMessage();
            }

        }

        throw new Exception('No route defined for this URI.');
    }
}