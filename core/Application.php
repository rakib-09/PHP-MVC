<?php

namespace app\core;


class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $database;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database();
    }

    public function run()
    {
        echo $this->router->resolve();
    }

}