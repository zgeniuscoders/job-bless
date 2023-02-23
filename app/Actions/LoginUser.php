<?php

namespace App\Actions;

use App\Models\User;
use DateTime;
use Legacy\Legacy\Core\Hash;

class LoginUser
{

    public function index()
    {
        views("auth/login.php");
    }

    public function login()
    {
        $user = new User();
        $u = $user->where("email", $_POST["email"]);

        if ($u && Hash::verify($_POST["password"], $u->password)) {
            // header("Location: /");
            echo "fff";
            return;
        }

        // email or password incorect 
        echo "oupssssss";
        // header("Location: /");
    }
}
