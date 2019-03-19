<?php

require_once __DIR__ . '/auto.php';

class Car extends Automobile //here comes inheritance
{
    private $configuration;

    public function getConfiguration()
    {
        return $this->configuration;
    }

    public function setConfiguration($value)
    {
        $this->configuration = $value;
    }

    public function printInfo()
    {
        parent::printInfo();
        echo 'Configuration: ' . $this->configuration . PHP_EOL;
    }
}
