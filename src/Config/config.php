<?php

use Src\Core\Middlewares\BadRequestMethodMiddleware;
use Src\Core\Router\Router;

use function DI\create;
use Src\Core\Middlewares\DispatcherMiddleware;
use Src\Core\Middlewares\NotFoundMiddleware;
use Src\Core\Middlewares\RouterMiddleware;
use Src\Core\Middlewares\TrainingSlashMiddleware;

return [

    "MIDDLEWARES" => [
        TrainingSlashMiddleware::class,
        BadRequestMethodMiddleware::class,
        RouterMiddleware::class,
        DispatcherMiddleware::class,
        NotFoundMiddleware::class,
    ],

    Router::class => create(),

];
