<?php

use App\Controllers\HomeController;

return [
    "VIEWS_PATH" => dirname(__DIR__) . DIRECTORY_SEPARATOR . "views",
    "ASSETS_PATH" => dirname(__DIR__) . DIRECTORY_SEPARATOR . "public",
    "CONTROLLERS_ROUTES" => [
        HomeController::class
    ]
];