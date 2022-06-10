<?php

namespace app\models;

use app\core\Model;

class UserModel extends Model
{
    public string $name;
    public string $email;
    public string $password;
    public string $passwordConfirmation;
}