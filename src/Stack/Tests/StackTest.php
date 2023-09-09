<?php

namespace VdkIldar\CleanCraftsmanship\Stack\Tests;

use PHPUnit\Framework\TestCase;
use VdkIldar\CleanCraftsmanship\Stack\Exception\UnderflowException;
use VdkIldar\CleanCraftsmanship\Stack\Stack;

class StackTest extends TestCase
{
    private Stack $stack;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->stack = new Stack();
    }

    public function testCanCreateStack()
    {
        $this->assertTrue($this->stack->isEmpty());
    }

    public function testAfterOnePush__IsNotEmpty()
    {
        $this->stack->push(0);

        $this->assertFalse($this->stack->isEmpty());
        $this->assertEquals(1, $this->stack->getSize());
    }

    public function testAfterPushAndPop_isEmpty()
    {
        $this->stack->push(0);
        $this->stack->pop();

        $this->assertTrue($this->stack->isEmpty());
        $this->assertEquals(0, $this->stack->getSize());
    }

    public function testAfterTwoPush__SizeIsTwo()
    {
        $this->stack->push(0);
        $this->stack->push(1);

        $this->assertEquals(2, $this->stack->getSize());
    }

    public function testPoppingEmptyStack__throwUnderflowException()
    {
        $this->expectException(UnderflowException::class);
        $this->stack->pop();
    }

    public function testAfterPushsingX__willPopX()
    {
        $this->stack->push(99);

        $this->assertEquals(99, $this->stack->pop());

        $this->stack->push(88);

        $this->assertEquals(88, $this->stack->pop());
    }

    public function testAfterPushsingXandY__willPopXandY()
    {
        $this->stack->push(99);
        $this->stack->push(88);

        $this->assertEquals(88, $this->stack->pop());
        $this->assertEquals(99, $this->stack->pop());
    }
}