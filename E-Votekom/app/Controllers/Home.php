<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // mengembalikan login ke view
        return view('Login/login');
    }
}
