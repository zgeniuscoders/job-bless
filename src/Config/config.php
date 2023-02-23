<?php

use Psr\Container\ContainerInterface;
use Legacy\Legacy\Core\Middlewares\BadRequestMethodMiddleware;
use Legacy\Legacy\Core\Router\Router;

use function DI\create;
use function DI\factory;

use Legacy\Legacy\Core\Middlewares\DispatcherMiddleware;
use Legacy\Legacy\Core\Middlewares\NotFoundMiddleware;
use Legacy\Legacy\Core\Middlewares\RouterMiddleware;
use Legacy\Legacy\Core\Middlewares\TrainingSlashMiddleware;
use Legacy\Legacy\Core\Render\Php\PhpRender;
use Legacy\Legacy\Core\Render\Php\PhpRenderFactory;

return [

    "MIDDLEWARES" => [
        TrainingSlashMiddleware::class,
        BadRequestMethodMiddleware::class,
        RouterMiddleware::class,
        DispatcherMiddleware::class,
        NotFoundMiddleware::class,
    ],

    Router::class => create(),
    PhpRender::class => factory(PhpRenderFactory::class)

];
