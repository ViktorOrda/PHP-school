<?php

class Queue
{
    private $head = 0;
    private $tail = 0;
    private $storage = [];

    public function add($value)
    {
        $this->storage[$this->tail++] = $value;
    }

    public function remove()
    {
        if($this->isEmpty()) {
            exit('Queue is empty!');
        }
        $result = $this->storage[$this->head++];
        if($this->head >= $this->tail) {
            $this->head = $this->tail = 0;
        }
        return $result;
    }

    public function isEmpty()
    {
        return $this->head === $this->tail;
    }

    public function getFirst()
    {
        if ($this->isEmpty()) {
            exit('Queue is empty!');
        }
        return $this->storage[$this->head];
    }
}

class Stack
{
    private $queue1, $queue2;
    private $size = 0;
    public function __construct()
    {
        $this->queue1 = new Queue();
        $this->queue2 = new Queue();
    }

    public function add($value) 
    {
        $this->queue2->add($value);
        ++$this->size;
        while (!$this->queue1->isEmpty()) {
            $this->queue2->add($this->queue1->remove());
        }

        $temp = new Queue();
        $this->queue1 = $temp;
        $this->queue1 = $this->queue2;
        $this->queue2 = $temp;
    }
    public function remove() 
    {
        if ($this->isEmpty()) {
            exit('Stack is empty!');
        }
        --$this->size;
        return $this->queue1->remove();
    }

    public function isEmpty()
    {
        return $this->size === 0;
    }
    public function getLast() 
    {
        if ($this->isEmpty()) {
            exit('Stack is empty!');
        }
        return $this->queue1->getFirst();
    }
}
