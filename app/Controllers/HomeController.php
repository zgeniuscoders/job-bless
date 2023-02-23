<?php


namespace App\Controllers;

use Legacy\Legacy\Core\Render\Php\PhpRender;
use Legacy\Legacy\Core\Router\Router;

class HomeController extends Controller
{
    public function __construct(private Router $route,private PhpRender $render)
    {
        $route->resolve("GET","/home",[$this, "index"],"f");
    }

    public function index(): string
    {
        return $this->render->render("index");
    }
}
