<?php

require_once __DIR__ . '/auto.php';

class Truck extends Automobile
{
    private $capacity;

    public function getCapacity()
    {
        return $this->capacity;
    }
    public function setCapacity($value)
    {
        $this->capacity = $value;
    }

    public function printInfo()
    {
        parent::printInfo();
        echo 'Capacity: ' . $this->capacity . PHP_EOL;
    }
}