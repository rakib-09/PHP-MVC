<?php

namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('home');
    }
}