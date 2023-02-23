<?php

namespace App\Models;

use Legacy\Legacy\Core\Model;

class User extends Model
{
    protected string $table = "users";
    public string $email;
    public string $username;
    public string $password;
    public string $profile;
    public string $createdAt;
    public string $description;
}
