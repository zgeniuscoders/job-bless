<?php

namespace App\Actions;

use App\Models\User;
use DateTime;
use Legacy\Legacy\Core\Hash;
use Legacy\Legacy\Core\Upload;

class RegisterUser
{

    public function index()
    {
        views("auth/register.php");
    }

    public function create()
    {
        $date = new DateTime();
        $user = new User();
        $user->create([
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => Hash::make($_POST["password"]),
            "profile" => Upload::upload("img", $_FILES["avatar"])
        ]);

        header("Location: /");
    }
}
