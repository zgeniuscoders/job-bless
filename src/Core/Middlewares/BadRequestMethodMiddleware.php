<?php


namespace Src\Core\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Src\Core\Middlewares\Exceptions\BadRequestMethodException;
use Src\Core\Router\Route;

class BadRequestMethodMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // $route = $request->getAttribute(Route::class);
        // if ($route->getMethod() != $request->getMethod()) {
        //     throw new BadRequestMethodException("Can't resolve this route with this method");
        // }
        return $handler->handle($request);
    }
}
