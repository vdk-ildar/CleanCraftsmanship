<?php
namespace VdkIldar\CleanCraftsmanship\Stack;


use VdkIldar\CleanCraftsmanship\Stack\Exception\UnderflowException;

class Stack
{
    private bool $empty = true;
    private int $size = 0;
    private array $elements = [];

    public function isEmpty()
    {
        return $this->size === 0;
    }

    public function push($element)
    {
        $this->size++;
        $this->elements[] = $element;
    }

    public function pop()
    {
        if ($this->getSize() === 0) {
            throw new UnderflowException();
        }
        $this->size--;

        return array_pop($this->elements);
    }

    public function getSize()
    {
        return $this->size;
    }
}