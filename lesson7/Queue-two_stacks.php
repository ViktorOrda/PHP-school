<?php

class Stack
{
    private $storage = [];
    private $top = 0;

    public function add($value)
    {
        $this->storage[$this->top++] = $value;
    }

    public function isEmpty()
    {
        return $this->top === 0;
    }

    public function remove()
    {
        if ($this->isEmpty()) {
            exit('Stack is empty!');
        }
        return $this->storage[--$this->top];
    }
}

class Queue
{
    private $stack1, $stack2;

    public function __construct()
    {
        $this->stack1 = new Stack(); 
        $this->stack2 = new Stack();
    }

    public function add($value)
    {
        $this->stack1->add($value);
    }

    public function remove()
    {
        if ($this->stack1->isEmpty() && $this->stack2->isEmpty()) {
            exit('Queue is empty!');
        } elseif ($this->stack2->isEmpty()) {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->add($this->stack1->remove());
            }
        }
        return $this->stack2->remove();
    }
}