<?php

require_once __DIR__ .'/car.php';
require_once __DIR__ .'/truck.php';
require_once __DIR__ .'/catalog.php';


$c1 = new Car();
$c1->setVendor('BMW');
$c1->setModel('328i');
$c1->setYear(2016);
$c1->setCode('21345678912312313');
$c1->setConfiguration('Sport');

$t1 = new Truck();
$t1->setVendor('Volvo');
$t1->setModel('FH16');
$t1->setYear(2018);
$t1->setCode('34583489091202324');
$t1->setCapacity('35 tonns');

$myCatalog = new Catalog();
$myCatalog->addVehicle($c1); //polymorphism 
$myCatalog->addVehicle($t1);

$myCatalog->print();


