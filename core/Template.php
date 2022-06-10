<?php

namespace app\core;

class Template
{
    public static function renderPage(string $view, array $params = []): string
    {
        extract($params, EXTR_OVERWRITE);
        $layout = self::renderLayout();
        $view = self::renderView($view);
        return str_replace('{{content}}', $view, $layout);
    }

    private static function renderLayout(): string
    {
        ob_start();
        include_once root_path() . '/views/layouts/main.php';
        return ob_get_clean();
    }

    private static function renderView(string $view): string
    {
        ob_start();
        include_once root_path() . "/views/$view.php";
        return ob_get_clean();
    }

}