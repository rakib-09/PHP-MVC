<?php

namespace app\core;

abstract class Controller
{
    public function render(string $view, array $params = [])
    {
        echo Template::renderPage($view);
    }
}