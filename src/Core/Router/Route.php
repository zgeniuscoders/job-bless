<?php

namespace Src\Core\Router;

use Src\Core\Router\Exceptions\ClassException;

/**
 * Permet de representer une route
 */
class Route
{

    public function __construct(private string $method, private string $uri, private $callback, private string $name)
    {
    }

    public function getCallback()
    {
        if (is_callable($this->callback)) {
            return $this->callback;
        } else if (
            class_exists($this->callback[0])
            && method_exists($this->callback[0], $this->callback[1])
        ) {
            $controller = new $this->callback[0]();
            $method = $this->callback[1];
            return [$controller, $method];
        }
        throw new ClassException("Class or Method Doesn't exist...");
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getParams()
    {
        return [];
    }

    /**
     * Permet de tester si une route match
     * @param string $url
     * @return boolean
     */
    public function match(string $url): bool
    {
        if ($url != $this->uri) {
            return false;
        }

        return true;
    }
}
