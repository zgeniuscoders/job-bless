<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use Src\Router\Router;

include "../vendor/autoload.php";
define("DOCUMENT_ROOT", dirname(__DIR__));

$router = new Router();
$router->resolve("GET", "/home", function () {
    echo "hello";
}, "home");

$router->resolve("GET", "/", [HomeController::class, 'index'], "home")
    ->resolve("GET", "/login", [AuthController::class, "login"], "auth.login")
    ->resolve("POST", "/login", [AuthController::class, "login"], "auth")
    ->resolve("GET", "/register", [AuthController::class, "login"], "auth.register");

$router->run();
