<?php

use App\Controllers\HomeController;
use Src\App;
use Whoops\Run;

use function Http\Response\send;
use GuzzleHttp\Psr7\ServerRequest;
use Src\Core\Router\Router;
use Whoops\Handler\PrettyPageHandler;

include "../vendor/autoload.php";
define("DOCUMENT_ROOT", dirname(__DIR__));
define("PUBLIC", __DIR__);


$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();

$app = new App("../config/config.php");


$router = $app->getContainer()->get(Router::class);
$router->resolve("GET", "/heel", [HomeController::class, 'index'], 'd');

$response = $app->run(ServerRequest::fromGlobals());
send($response);
