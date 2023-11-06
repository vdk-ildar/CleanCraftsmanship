<?php

namespace VdkIldar\CleanCraftsmanship\Sort1;

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
        $this->assertEquals([1, 2, 3], $this->sort([2, 3, 1]));
        $this->assertEquals([1, 2, 3], $this->sort([3, 2, 1]));

        $this->assertEquals(
            [1, 1, 2, 3, 3, 3, 4, 5, 5, 5, 6, 7, 8, 9, 9, 9],
            $this->sort([3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5, 8, 9, 7, 9, 3])
        );
    }

    public function sort(array $list)
    {
        if (count($list) > 1) {
            for ($limit = count($list) - 1; $limit > 0; $limit--) {
                for ($firstIndex = 0; $firstIndex < $limit; $firstIndex++) {
                    $secondIndex = $firstIndex + 1;
                    if ($list[$firstIndex] > $list[$secondIndex]) {
                        $first = $list[$firstIndex];
                        $second = $list[$secondIndex];
                        $list[$firstIndex] = $second;
                        $list[$secondIndex] = $first;
                    }
                }
            }
        }

        return $list;
    }
}