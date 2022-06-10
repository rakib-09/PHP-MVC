<?php

namespace app\core;

use PDO;

class Database
{
    public PDO $pdo;
    private string $dsn = DB_DSN;
    private string $user = DB_USER;
    private string $password = DB_PASS;

    public function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $this->pdo = new PDO($this->dsn, $this->user, $this->password, $options);
    }

}