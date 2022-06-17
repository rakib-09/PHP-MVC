<?php

if (!function_exists('root_path')) {
    function root_path(): string
    {
        return dirname(__DIR__);
    }
}

if (!function_exists('redirect')) {
    function redirect(string $location): string
    {
        header("Location: $location");
        exit();
    }
}