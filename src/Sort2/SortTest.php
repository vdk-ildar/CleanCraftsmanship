<?php

namespace VdkIldar\CleanCraftsmanship\Sort2;

use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    public function testSorted()
    {
        $this->assertEquals([], $this->sort([]));
        $this->assertEquals([1], $this->sort([1]));
        $this->assertEquals([1, 2], $this->sort([1, 2]));
        $this->assertEquals([1, 2], $this->sort([2, 1]));
        $this->assertEquals([1, 2, 3], $this->sort([1, 2, 3]));
        $this->assertEquals([1, 2, 3], $this->sort([2, 1, 3]));
        $this->assertEquals([1, 2, 3], $this->sort([1, 3, 2]));
        $this->assertEquals([1, 2, 3], $this->sort([3, 2, 1]));
        $this->assertEquals([1, 2, 3, 4], $this->sort([1, 2, 3, 4]));
        $this->assertEquals([1, 2, 3, 4], $this->sort([2, 1, 3, 4]));
        $this->assertEquals([1, 2, 3, 4], $this->sort([4, 3, 2, 1]));
        $this->assertEquals([1, 1, 2, 3], $this->sort([1,3, 1, 2]));

        $this->assertEquals(
            [1, 1, 2, 3, 3, 3, 4, 5, 5, 5, 6, 7, 8, 9, 9, 9],
            $this->sort([3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5, 8, 9, 7, 9, 3])
        );
    }

    public function sort(array $list)
    {
        if (count($list) <= 1) {
            return $list;
        } else {
            $middle = $list[0];

            $middles = array_values(array_filter($list, function ($x) use ($middle) { return $x === $middle; }));
            $lessers = array_values(array_filter($list, function ($x) use ($middle) { return $x < $middle; }));
            $greaters = array_values(array_filter($list, function ($x) use ($middle) { return $x > $middle; }));

            return array_merge($this->sort($lessers), $middles, $this->sort($greaters));
        }
    }
}