<?php

namespace App\Controllers;

class WelcomeController extends BaseController
{
    public function index()
    {
        return view('bienvenida'); //vista para la bienvenida cuando inicia sesion
    }
}