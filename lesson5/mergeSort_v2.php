<?php

$arr = [0, 5, 2, 4, 7, 1, 3, 2, 6];

function merge(&$arr, $left, $middle, $right) 
{
    $firstPart = $middle - $left + 1;
    $secondPart = $right - $middle;

    $leftSubArray = [];
    $rightSubArray = [];

    for ($i = 0; $i < $firstPart; $i++) {
        $leftSubArray[$i] = $arr[$left + $i];
    }
    for ($j = 0; $j < $secondPart; $j++) {
        $rightSubArray[$j] = $arr[$middle + $j +1];
    }

    $leftSubArray[$firstPart] = PHP_INT_MIN;
    $rightSubArray[$secondPart] = PHP_INT_MIN;
    $i = $j = 0;

    for ($k = $left; $k <= $right; $k++) {
        if ($leftSubArray[$i] > $rightSubArray[$j]) {
            $arr[$k] = $leftSubArray[$i];
            $i++;
        } else {
            $arr[$k] = $rightSubArray[$j];
            $j++;
        }
    } 
}

function mergeSort(&$arr, $left, $right) 
{
    if ($left < $right) {
        $middle = floor(($left + $right) / 2);
        mergeSort($arr, $left, $middle);
        mergeSort($arr, $middle +1 , $right);

        merge($arr, $left, $middle, $right);
    }
}

mergeSort($arr, 0, count($arr) - 1);
echo json_encode($arr);