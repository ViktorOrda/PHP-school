<?php

$argc !== 2 ? exit('Error! You\'ve not entered size') : $count = $argv[1];
if ($count % 2 === 0) {
    exit('Error! Size should be odd number!');
} 

$start = $end = ceil($count/2);
for ($i = 1; $i <= $count ; $i++) {
    for ($j = 1; $j <= $count; $j++) {
        echo ($j >= $start && $j <= $end) ?  "*" : " " ;
    }
    if ($i < ceil($count/2)) {
        $start--;
        $end++;
    }
    else {
        $start++;
        $end--;
    }
    echo ($i < $count) ? PHP_EOL : null;    
}
