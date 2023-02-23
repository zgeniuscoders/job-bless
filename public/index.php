<?php

use App\Controllers\HomeController;
use Legacy\Legacy\MyApp;
use Whoops\Run;

use function Http\Response\send;
use GuzzleHttp\Psr7\ServerRequest;
use Legacy\Legacy\Core\Router\Router;
use Whoops\Handler\PrettyPageHandler;

include "../vendor/autoload.php";

$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();

$app = new MyApp("../config/config.php");
$response = $app->run(ServerRequest::fromGlobals());
send($response);
