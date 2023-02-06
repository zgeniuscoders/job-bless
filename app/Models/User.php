<?php

namespace App\Models;

use Src\Model;

class User extends Model
{

    protected string $table = "users";

    private string $username;
    private string $email;
    private string $profile;
    private string $description;
}
