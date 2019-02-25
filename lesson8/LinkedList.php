<?php

require_once './SeparateNode.php';
class LinkedList
{
    private $head = null;

    public function append($value) 
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);

        if(!empty($this->head)) {
            $lastElement = $this->head;
            while (!empty($lastElement->getNext())) {
                $lastElement = $lastElement->getNext();
            }
            $lastElement->setNext($newElement);
            $newElement->setPrevious($lastElement);
        } else {
            $this->head = $newElement;
        }
    }
    public function prepend($value) 
    {
        $obj = new SeparateNode();
        $obj->setValue($value);

        $headObj = $this->head;
        $obj->setNext($headObj);
        $headObj->setPrevious($obj);
        $this->head = $obj;
    }
    public function deleteFromHead() 
    {
        if(empty($this->head)) {
            throw new RuntimeException('List is empty!');
        }
        $this->head = $this->head->getNext();
        $this->head->setPrevious(null);
    }

    public function deleteFromEnd() 
    {
        if(!empty($this->head)) {
            $lastElement = $this->head;
            $prev = null;
            while (!empty($lastElement->getNext())) {
                $prev = $lastElement;
                $lastElement = $lastElement->getNext();
            }
            $lastElement->setPrevious(null); 
            $prev->setNext(null);
        } else {
            throw new RuntimeException('List is empty!');
        }
    }

    public function search($value)
    {
        if(!empty($this->head)) {
            $currentElement = $this->head;
            while (!empty($currentElement->getNext())) {
                if ($currentElement->getValue() === $value) {
                    return $currentElement;
                }
                $currentElement = $currentElement->getNext();
            }
            return null;
        } else {
            throw new RuntimeException('List is empty!');
        }
    }

    public function deleteAt($at)
    {
        $elementToDelete = $this->search($at);
        if (is_null($elementToDelete)) {
            return;
        } else {
            if ($elementToDelete === $this->head) {
                $this->head = $elementToDelete->getNext();
                $elementToDelete->getNext()->setPrevious(null);
            } else {
                $elementToDelete->getPrevious()->setNext($elementToDelete->getNext());
                $elementToDelete->getNext()->setPrevious($elementToDelete->getPrevious());
            }
        }
    }
    
    public function insertAfterAt($value, $at)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);
        $elementToInsertAt = $this->search($at);
        if (is_null($elementToInsertAt)) {
            return;
        }   

        $newElement->setPrevious($elementToInsertAt);
        if (!is_null($elementToInsertAt->getNext())) {
            $newElement->setNext($elementToInsertAt->getNext());
            $elementToInsertAt->getNext()->setPrevious($newElement);
        } else {
            $newElement->setNext(null);
        }
        $elementToInsertAt->setNext($newElement); 
    }
    
    public function insertBeforeAt($value, $at)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);
        $elementToInsertAt = $this->search($at);
        if (is_null($elementToInsertAt)) {
            return;
        }

        $newElement->setNext($elementToInsertAt);
        if (!is_null($elementToInsertAt->getPrevious())) {
            $newElement->setPrevious($elementToInsertAt->getPrevious());
            $elementToInsertAt->getPrevious()->setNext($newElement);
        } else {
            $newElement->setPrevious(null);
            $this->head = $newElement;
        }
        $elementToInsertAt->setPrevious($newElement);
    }

    public function __toString()
    {
        $output = 'head->';
        if(!empty($this->head)) {
            $Element = $this->head;
            while (!empty($Element->getNext())) {
                $output .= $Element->getValue().'->';
                $Element = $Element->getNext();    
            }
            $output .= $Element->getValue();
            //$lastElement->setNext($newElement);
           // $newElement->setPrevious($lastElement);
           return $output.PHP_EOL;
        }
        return '';        
    }
}

$l = new LinkedList();
$l->append(1);
$l->append(2);
$l->append(3);
$l->append(4);
$l->prepend(5);
$l->insertBeforeAt(77,1);

echo $l;