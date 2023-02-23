<?php

namespace Legacy\Legacy\Core\Render\Php;

use Psr\Container\ContainerInterface;

class PhpRenderFactory
{

    public function __invoke(ContainerInterface $container)
    {
        return new PhpRender($container);
    }
}
