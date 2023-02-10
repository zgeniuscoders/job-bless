<?php

namespace Src;

use App\Controllers\HomeController;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Src\Core\Middlewares\DispatcherMiddleware;
use Src\Core\Middlewares\Exceptions\MiddlewareException;

class App implements RequestHandlerInterface
{

    /**
     * @var array
     */
    private array $middlewares;

    private int $index = 0;

    private $container;

    private $modules = [
        HomeController::class
    ];

    private string $frameworkConfig = __DIR__ . DIRECTORY_SEPARATOR . "Config" . DIRECTORY_SEPARATOR . "config.php";


    public function __construct(private string $configPath)
    {
        $this->addMiddleware();
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $middleware = $this->getMiddlewares();
        if (is_null($middleware)) {
            throw new MiddlewareException("No route matche this middleware");
        } elseif ($middleware instanceof MiddlewareInterface) {
            return $middleware->process($request, $this);
        }
    }


    public function getMiddlewares()
    {
        if (array_key_exists($this->index, $this->middlewares)) {
            $middleware = $this->container->get($this->middlewares[$this->index]);
            $this->index++;
            return $middleware;
        }
        return null;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        if ($this->container === null) {
            $builder = new ContainerBuilder();
            $builder->useAutowiring(true);
            $builder->addDefinitions($this->frameworkConfig);
            $builder->addDefinitions($this->configPath);
            $this->container = $builder->build();
        }
        return $this->container;
    }

    public function addMiddleware(){
        foreach ($this->getContainer()->get('MIDDLEWARES') as $middleware)
        {
            $this->middlewares[] = $middleware;
        }
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        foreach ($this->modules as $module) {
            $this->getContainer()->get($module);
        }
        return $this->handle($request);
    }
}
