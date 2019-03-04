<?php

class HashFunction
{
    //private $valueToHash;
    private $hashTableLength;

    /**
     * HashFunction constructor.
     * @param $valueToHash
     * @param $hashTableLength
     */
    public function __construct($hashTableLength)
    {
        //$this->valueToHash = $valueToHash;
        $this->hashTableLength = $hashTableLength;
    }

    public function __invoke($valueToHash)
    {
        $sumOfAsciiCodes = 0;

        for ($i = 0, $strLen = strlen($valueToHash); $i < $strLen; $i++) {
            $letter = $valueToHash[$i];
            $sumOfAsciiCodes += ord($letter);
        }
        return $sumOfAsciiCodes % $this->hashTableLength;
    }
}