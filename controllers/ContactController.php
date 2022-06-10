<?php

namespace app\controllers;

use app\core\Template;

class ContactController extends Controller
{
    public function index()
    {
        return $this->render('contact');
    }
}