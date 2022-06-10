<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\ContactController;
use app\controllers\HomeController;
use app\core\Application;

$app = new Application();

$app->router->get('/', [HomeController::class, 'index']);

$app->router->get('/contact', [ContactController::class, 'index']);

$app->router->post('/contact', [ContactController::class, 'create']);

$app->run();