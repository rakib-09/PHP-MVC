<?php

if (!function_exists('root_path')) {
    function root_path(): string
    {
        return dirname(__DIR__);
    }
}