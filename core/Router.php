<?php

namespace app\core;

class Router
{
    protected array $routes = [];

    public function __construct(public Request $request)
    {
    }

    public function get(string $path, \Closure|string $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? null;
        if (!$callback) {
            return "Not Found";

        }
        if (is_string($callback)) {
            return $this->renderPage($callback);
        }
        return call_user_func($callback);
    }

    private function renderPage(string $view): string
    {
        $layout = $this->renderLayout();
        $view = $this->renderView($view);
        return str_replace('{{content}}', $view, $layout);
    }

    private function renderLayout(): string
    {
        ob_start();
        include_once root_path().'/views/layouts/main.php';
        return ob_get_clean();
    }

    private function renderView(string $view): string
    {
        ob_start();
        include_once root_path()."/views/$view.php";
        return ob_get_clean();
    }
}