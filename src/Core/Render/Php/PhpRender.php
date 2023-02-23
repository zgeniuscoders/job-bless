<?php

namespace Legacy\Legacy\Core\Render\Php;

use Psr\Container\ContainerInterface;
use Legacy\Legacy\Core\Render\RenderInterface;


class PhpRender implements RenderInterface
{
    public function __construct(private ContainerInterface $container)
    {
        
    }

    public function render(string $path, array $data = [])
    {
        $viewPath = $this->container->get("VIEWS_PATH");
        ob_start();
        require $viewPath . DIRECTORY_SEPARATOR . $path + ".php";
        return ob_get_clean();
    }
}
