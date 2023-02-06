<?php

namespace App\Controllers;

class AuthController extends Controller
{

    public function login()
    {
        views("auth/login.php");
    }

    public function register()
    {
        views("auth/register.php");
    }


    public function logout()
    {
    }
}
