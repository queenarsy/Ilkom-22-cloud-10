<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('Auth/login'); // arahkan ke view login
    }
}
