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
            if ($this->checkEmailExist($this->email)) {
                echo 'Email already Exists';
                exit();
            }
            $tableName = $this->table();
            $this->password = $this->hashPassword();
            $this->database->query(
                "INSERT INTO $tableName (name, email, password) VALUES (:name, :email, :password)"
            )->execute(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);
            return true;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function loginUser(string $email, string $password)
    {
        $tableName = $this->table();
        $this->database->query("SELECT * FROM $tableName where email=:email")->execute(['email' => $email]);
        $user = $this->database->single();
        if (!$user || !$this->matchPassword($password, $user->password)) {
            echo "Invalid Credentials";
            exit;
        }
        return "Login Successful!";
    }

    private function hashPassword(): string
    {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }

    private function matchPassword($password, $dbPass): bool
    {
        if (password_verify($password, $dbPass)) {
            return true;
        }

        return false;
    }

    private function checkEmailExist($email): bool
    {
        $table = $this->table();
        $data = $this->database->query("SELECT id, email from $table where email=:email")->single(['email' => $email]);

        return (bool)$data;
    }
}