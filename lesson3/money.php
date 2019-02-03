<?php

$money = array
    (
    array(500,0),
    array(200,0),
    array(100,0),
    array(50,0),
    array(20,0),
    array(10,0),
    array(5,0),
    array(2,0),
    array(1,0),
    );

function checkInput()
{
    global $argc, $argv;
    if ($argc < 2 || !is_numeric($argv[1])) {
        exit('Oops! Incorrect argument value - numeric expected!' . PHP_EOL);
    }
}

function calculate($value, $counter = 0)
{
    global $money;
    $banknotes = intdiv($value, $money[$counter][0]);
    $remainder = $value % $money[$counter][0];
    $money[$counter][1] = $banknotes;
    $counter++;
    
    if ($remainder > 0) {
        calculate($remainder,$counter);
    }
}

function printResult()
{
    global $money;
    for ($i = 0; $i<count($money); $i++) {
        if ($money[$i][1] != 0 ) {
            echo $money[$i][0] . ': ' . $money[$i][1] . PHP_EOL;
        }
    }
}

checkInput();
calculate($argv[1]);
printResult();
