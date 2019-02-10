<?php

if ($argc !== 2) {
    exit('Error! You\'ve not entered size');
}
$count = $argv[1];
for ($i = 1; $i <= $count ; $i++) {
    for ($j = 1; $j <= $count; $j++) {
        if ($i % 2 === 1) {
            echo $i*$count - ($count - $j) . "\t";
        } else {
            echo $i*$count - $j + 1 . "\t";
        }
    }
    echo ($i < $count) ? PHP_EOL . PHP_EOL : null;
}