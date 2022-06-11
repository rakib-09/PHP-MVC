<?php

namespace app\core;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private PDO $pdo;
    private PDOStatement $pdoStatement;
    private string $dsn = DB_DSN;
    private string $user = DB_USER;
    private string $password = DB_PASS;

    public function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query(string $sql): void
    {
        $this->pdoStatement = $this->pdo->prepare($sql);
    }

    public function execute(array|null $params = null): void
    {
        $this->pdoStatement->execute($params);
    }

    public function resultSet(): bool|array
    {
        $this->execute();
        return $this->pdoStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single()
    {
        $this->execute();
        return $this->pdoStatement->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(): int
    {
        return $this->pdoStatement->rowCount();
    }


}