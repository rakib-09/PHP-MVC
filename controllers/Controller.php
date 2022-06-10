<?php

namespace app\controllers;

use app\core\Template;

abstract class Controller
{
    public function render(string $view, array $params = [])
    {
        echo Template::renderPage($view);
    }
}