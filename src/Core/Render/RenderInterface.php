<?php

namespace Legacy\Legacy\Core\Render;


interface RenderInterface
{
    public function render(string $path, array $data = []);
}
