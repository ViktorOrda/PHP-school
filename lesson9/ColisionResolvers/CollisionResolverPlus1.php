<?php

require_once __DIR__ . '/CollisionResolverInterface.php';

class ResolveCollisionsPlus1 implements ResolverInterface
{
    public function resolve($index, $hranilishche, $size)
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if ($j >= $size) {
                if ($flag) {
                    throw Exception('Our table is full');
                }

                $j = 0;
                $flag = true;
            }

            if (isset($hranilishche[$j]) && !empty($hranilishche[$j])) {
                continue;
            } else {
                return $j;
            }
        }
    }

    public function find($value,$index, $hranilishche, $size)
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if ($j >= $size) {
                if ($flag) {
                    throw new Exception('There is no such element in the hashtable!');
                }
                $j = 0;
                $flag = true;
            }
            if (array_key_exists($j, $hranilishche) && $hranilishche[$j]===$value) {
                return $j;
            } else {
                continue;
            }
        }
    }
}