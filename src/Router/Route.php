<?php

namespace Src\Router;

use Src\Router\Exception\ClassException;

/**
 * Permet de representer une route
 */
class Route
{

    public function __construct(private string $method, private string $uri, private $callback, private string $name)
    {
    }

    /**
     * Permet de tester si une route match
     * @param string $url
     * @return boolean
     */
    public function match(string $url): bool
    {
        if ($url != trim($this->uri, "/")) {
            return false;
        }

        return true;
    }

    public function call()
    {
        if (is_callable($this->callback)) {
            call_user_func_array($this->callback, []);
        } else if (class_exists($this->callback[0]) && method_exists($this->callback[0], $this->callback[1])) {
            $controller = new $this->callback[0]();
            $method = $this->callback[1];
            call_user_func_array([$controller, $method], []);
        } else {
            throw new ClassException("the class called or the method called doesn't exist");
        }
    }
}
