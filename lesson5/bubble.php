<?php

$arr = [0, 5, 2, 4, 7, 1, 3, 2, 6];
$length = count($arr);

function bubbleSort(&$arr, $length)
{
    for ($i = 0; $i <= $length - 2; $i++) {
        for ($j = $length - 1; $j >= $i + 1; $j--) {
            if ($arr[$j] < $arr[$j-1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j-1];
                $arr[$j-1] = $temp;
            }
        }
    }
}

bubblesort($arr,$length);
echo json_encode($arr);
