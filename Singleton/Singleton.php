<?php

class Passport
{
    private static $instance = null;

    public static function getPassport()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone() {}
    private function __construct() {}
    public function showInfo()
    {
        echo 'Hello, world!' . PHP_EOL;
    }
}

$s1 = Passport::getPassport();
$s1->showInfo();
