<?php

namespace app\models;

use app\core\Model;

class UserModel extends Model
{
    public string $name;
    public string $email;
    public string $password;

    public function table(): string
    {
        return 'users';
    }

    public function create(): bool|\PDOException
    {
        try {
            $tableName = $this->table();
            $this->database->query("INSERT INTO $tableName (name, email, password) VALUES (:name, :email, :password)");
            $this->database->execute(
                ['name' => $this->name, 'email' => $this->email, 'password' => $this->hashPassword()]
            );
            return true;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    private function hashPassword(): string
    {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function matchPassword($password, $dbPass)
    {
        if (password_verify($password, $dbPass)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
    }
}