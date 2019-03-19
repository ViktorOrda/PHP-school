<?php

class Automobile
{
    private $vendor; //here comes incapsulation
    private $model; 
    private $yearOfManufacture;
    private $VINcode;

    public function getVendor() 
    {
        return $this->vendor;
    }
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    public function getmodel()
    {
        return $this->model;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getYear()
    {
        return $this->yearOfManufacture;
    }
    public function setYear(int $year)
    {
        $this->yearOfManufacture = $year;
    }

    public function getCode()
    {
        return $this->VINcode;
    }
    public function setCode($code)
    {
        $this->VINcode = $code;
    }

    public function printInfo()
    {
        echo 'Vendor: ' . $this->vendor . PHP_EOL;
        echo 'Model: ' . $this->model  . PHP_EOL;
        echo 'YearOfManufacture: ' . $this->yearOfManufacture . PHP_EOL;
        echo 'VINCode: ' . $this->VINcode . PHP_EOL;
    }
}