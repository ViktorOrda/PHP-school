<?php

require_once __DIR__.'/HashFunction.php';
require_once __DIR__.'/HashTable.php';
require_once __DIR__.'/ColisionResolvers/CollisionResolverInterface.php';
require_once __DIR__.'/ColisionResolvers/CollisionResolverPlus1.php';

$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new ResolveCollisionsPlus1());

$string = "Ada";
$hashFunction = new HashFunction($hashTableLength);
$hashTable->write($hashFunction($string), $string);
$hashTable->write($hashFunction('daA11'), "daA11");
$hashTable->write($hashFunction('aAd'), "aAd");
var_dump($hashTable);

echo $hashTable->get($hashFunction('aAd'), 'aAd');
