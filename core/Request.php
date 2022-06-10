<?php

namespace app\core;

class Request
{


    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        return explode('?', $path)[0];
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody(): array
    {
        $methods = [
            'get' => [
                'method' => $_GET,
                'input_type' => INPUT_GET
            ],
            'post' => [
                'method' => $_POST,
                'input_type' => INPUT_POST
            ]
        ];
        $requestMethod = $methods[$this->getMethod()];
        $body = [];
        foreach ($requestMethod['method'] as $key => $value) {
            $body[$key] = filter_input($requestMethod['input_type'], $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $body;
    }
}