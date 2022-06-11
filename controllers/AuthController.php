<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\UserModel;

class AuthController extends Controller
{
    public function index()
    {
        return $this->render('register');
    }

    public function create(Request $request)
    {
        extract($request->getBody(), EXTR_OVERWRITE);
        $model = new UserModel();
        if ($password !== $passwordConfirmation) {
            return "Password doesn't match";
        }
        $model->loadData($request->getBody());
        return $model->create();
    }
}