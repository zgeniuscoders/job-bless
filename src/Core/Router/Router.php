<?php

namespace Legacy\Legacy\Core\Router;

use Psr\Http\Message\ServerRequestInterface;
use Legacy\Legacy\Router\Exception\NotFoundException;

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


    public function run(ServerRequestInterface $request)
    {
        foreach ($this->routes[$request->getMethod()] as $route) {
            $uri = $request->getUri()->getPath();
            if ($route->match($uri)) {
                return $route;
            }
        }
    }
}
