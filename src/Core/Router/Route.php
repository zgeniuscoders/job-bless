<?php

namespace Legacy\Legacy\Core\Router;

use Legacy\Legacy\Core\Router\Exceptions\ClassException;

/**
 * Permet de representer une route
 */
class Route
{

    /**
     * @param string $method
     * @param string $uri
     * @param callback|array $callback
     * @param string $name
     */
    public function __construct(private string $method, private string $uri, private $callback, private string $name)
    {
    }

    /**
     * @return callback|array
     */
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

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri(): string
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
