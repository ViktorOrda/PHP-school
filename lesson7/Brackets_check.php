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

    public function getLast()
    {
        if ($this->isEmpty()) {
            exit('Stack is empty!');
        }
        return $this->storage[$this->top - 1];
    }
}

function readData($input)
{
    $validBrackets = ['(', ')', '[', ']', '{', '}', '<', '>'];
    $elements = new Stack();

    foreach (str_split($input) as $char) {
        if (in_array($char, $validBrackets)) {
            $elements->add($char);
        } else {
            exit("Error! Input string contains non-bracket character!" . PHP_EOL);
        }
    }
    return $elements;
}

function validate(&$expression)
{
    $bracketsCounters = [
        'round' => 0,
        'curly' => 0,
        'square' => 0,
        'angle' => 0
    ];

    while (!$expression->isEmpty()) {
        switch ($expression->remove()) {
            case ')':
                $bracketsCounters['round']++;
                break;
            case '(':
                $bracketsCounters['round']--;
                break;
            case '}':
                $bracketsCounters['curly']++;
                break;
            case '{':
                $bracketsCounters['curly']--;
                break;
            case ']':
                $bracketsCounters['square']++;
                break;
            case '[':
                $bracketsCounters['square']--;
                break;
            case '>':
                $bracketsCounters['angle']++;
                break;
            case '<':
                $bracketsCounters['angle']--;
                break;
        }
        if (in_array(-1, $bracketsCounters, true)) {
            return false;
        }
    }
    foreach ($bracketsCounters as $bracketType => $count) {
        if ($count !== 0) {
            return false;
        }
    }
    return true;
}

if ($argc < 2) {
    exit('Error! You\'ve not entered value!');
}
$expression = readData($argv[1]);
validate($expression);