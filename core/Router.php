<?php

namespace app\core;

class Router
{
    protected array $routes = [];

    public function __construct(public Request $request, public Response $response)
    {
    }

    public function get(string $path, array $callback): array
    {
        return $this->routes['get'][$path] = $callback;
    }


    public function post(string $path, array $callback): array
    {
        return $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? null;
        if (!$callback) {
            $this->response->setStatusCode(404);
            Template::renderPage('_404');
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback, $this->request);
    }
}