<?php

use App\Actions\RegisterUser;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use Src\Router\Router;

include "../vendor/autoload.php";
define("DOCUMENT_ROOT", dirname(__DIR__));
define("PUBLIC", __DIR__);

$router = new Router();
$router->resolve("GET", "/", [HomeController::class, 'index'], "home")
    ->resolve("GET", "/login", [AuthController::class, "login"], "auth.login")
    ->resolve("POST", "/login", [AuthController::class, "login"], "auth")
    ->resolve("GET", "/register", [RegisterUser::class, "index"], "auth.register")
    ->resolve("POST", "/register", [RegisterUser::class, "create"], "auth.register.create");

$router->run();
