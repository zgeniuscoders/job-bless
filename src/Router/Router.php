<?php

namespace Src\Router;

use Src\Router\Exception\BadRequestMethodException;
use Src\Router\Exception\NotFoundException;

class Router
{

    private $routes;

    /**
     * @param string $method
     * @param string $uri
     * @param callable|array $callback
     * @param string $name
     * @return void
     */
    public function resolve(string $method, string $uri, callable|array $callback, string $name)
    {
        $route = new Route($method, $uri, $callback, $name);
        $this->routes[$method][] = $route;
        return $this;
    }


    public function run()
    {
        if (!isset($this->routes[$_SERVER["REQUEST_METHOD"]])) {
            throw new BadRequestMethodException('The request method doesn\'t exist');
        }

        foreach ($this->routes[$_SERVER["REQUEST_METHOD"]] as $route) {

            if ($route->match($_GET["uri"])) {
                return $route->call();
            }
        }

        throw new NotFoundException("404");
    }
}
