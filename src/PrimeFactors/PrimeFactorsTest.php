<?php

namespace VdkIldar\CleanCraftsmanship\PrimeFactors;

use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    public function testFactorsOf()
    {
        $this->assertEquals([], $this->factorsOf(1));
        $this->assertEquals([2], $this->factorsOf(2));
        $this->assertEquals([3], $this->factorsOf(3));
        $this->assertEquals([5], $this->factorsOf(5));
        $this->assertEquals([2, 3], $this->factorsOf(6));
        $this->assertEquals([7], $this->factorsOf(7));
        $this->assertEquals([2, 2, 2], $this->factorsOf(8));
        $this->assertEquals([3, 3], $this->factorsOf(9));
        $this->assertEquals([2, 2, 2, 3], $this->factorsOf(24));
        $this->assertEquals([2, 2, 3, 3, 5, 7, 11], $this->factorsOf(13860));
    }

    private function factorsOf(int $n)
    {
        $factors = [];

        for ($divisor = 2; $n > 1; $divisor++) {
            for (; $n % $divisor === 0; $n = intdiv($n, $divisor)) {
                $factors[] = $divisor;
            }
        }

        return $factors;
    }
}