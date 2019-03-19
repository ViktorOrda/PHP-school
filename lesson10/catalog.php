<?php

class Catalog
{
    private $vehicles = [];

    public function addVehicle(Automobile $auto)
    {
        $this->vehicles[] = $auto;
    }

    public function print()
    {
        foreach ($this->vehicles as $vehicle) {
            $vehicle->printInfo();
            echo PHP_EOL;
        }
    }
}