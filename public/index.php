<?php

use app\controllers\AuthController;
use app\controllers\ContactController;
use app\controllers\HomeController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';

$app = new Application();

$app->router->get('/', [HomeController::class, 'index']);

$app->router->get('/contact', [ContactController::class, 'index']);

$app->router->post('/contact', [ContactController::class, 'create']);

$app->router->get('/register', [AuthController::class, 'index']);

$app->router->post('/register', [AuthController::class, 'create']);

$app->router->get('/login', [AuthController::class, 'loginView']);

$app->router->post('/login', [AuthController::class, 'login']);


$app->run();