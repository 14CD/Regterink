<?php

require_once __DIR__ . '/../bootstrap.php';

class Router
{
    protected $routes = [];
    private $methods = [];
    private $middleware = [];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function define($routes, $method)
    {
        $this->routes = $routes;
        $this->methods = [$routes[0] => $method];
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            switch($this->methods[$uri]) {
                case "GET":

            }
            if(array_key_exists($uri, $this->methods))
                if($this->methods[$uri] == "GET") {

                }


            $controllerInfo = explode("@", $this->routes[$uri]);
            try {
//                $reflection = new ReflectionClass($controllerInfo[0]);
//                if($reflection->hasMethod($controllerInfo[1])) {
//
//                }
                $reflectionMethod = new ReflectionMethod($controllerInfo[0], $controllerInfo[1]);
                $reflectionMethod->invoke(new $controllerInfo[0]);
            } catch (ReflectionException $exception) {
                return $exception->getMessage();
            }
        }
        return new Exception('No route defined for this URI.');
    }
}