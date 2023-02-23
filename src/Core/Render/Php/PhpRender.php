<?php

namespace Legacy\Legacy\Core\Render\Php;

use Legacy\Legacy\Core\Render\Exceptions\RenderException;
use Psr\Container\ContainerInterface;
use Legacy\Legacy\Core\Render\RenderInterface;

/**
 * permet de rendre une vue
 */
class PhpRender implements RenderInterface
{
    public function __construct(private ContainerInterface $container)
    {
    }

    /**
     * permet de rendre une vue
     * @param string $path
     * @param array $data
     * @return string
     */
    public function render(string $path, array $data = []): string
    {
        $viewPath = $this->container->get("VIEWS_PATH");
        $path = str_replace(".", DIRECTORY_SEPARATOR, $path) . ".php";
        $file = $viewPath . DIRECTORY_SEPARATOR . $path;

        if (file_exists($file)) {
            ob_start();
            extract($data);
            $render = $this;
            require_once $file;
            return ob_get_clean();
        }

        throw new RenderException("Views not found");
    }

    public function view(string $path)
    {
        $viewPath = $this->container->get("VIEWS_PATH");
        $path = str_replace(".", DIRECTORY_SEPARATOR, $path) . ".php";
        $render = $this;
        require $viewPath . DIRECTORY_SEPARATOR . $path;
    }

    public function asset(string $path)
    {
        echo $path;
    }
}
