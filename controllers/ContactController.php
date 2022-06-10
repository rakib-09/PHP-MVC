<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class ContactController extends Controller
{
    public function index()
    {
        return $this->render('contact');
    }

    public function create(Request $request)
    {
        $request->getBody();
    }
}