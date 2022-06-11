<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\UserModel;

class AuthController extends Controller
{
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        return $this->render('register');
    }

    public function create(Request $request)
    {
        extract($request->getBody(), EXTR_OVERWRITE);

        if ($password !== $passwordConfirmation) {
            return "Password doesn't match";
        }
        $this->model->loadData($request->getBody());
        return $this->model->create();
    }

    public function loginView()
    {
        return $this->render('login');
    }

    public function login(Request $request)
    {
        extract($request->getBody(), EXTR_OVERWRITE);
        if (!$password || !$email) {
            return "invalid Credentials";
        }

        return $this->model->loginUser($email, $password);
    }
}