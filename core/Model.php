<?php

namespace app\core;

abstract class Model
{
    public Database $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    abstract public function table(): string;

    public function loadData(array $data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}