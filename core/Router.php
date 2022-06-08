<?php

namespace app\core;

class Router
{
    protected array $routes = [];

    public function __construct(public Request $request)
    {
    }

    public function get(string $path, \Closure $callback): \Closure
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? null;
        if (!$callback) {
            echo "Not Found";
            exit;
        }
        echo call_user_func($callback);
    }
}