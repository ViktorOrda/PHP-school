<?php

use App\User;
use App\Employee;

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function($class) {
    $path = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        include $path;
    }
});

$u1 = new User();
$e1 = new Employee();

