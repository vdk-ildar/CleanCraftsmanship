<?php

namespace VdkIldar\CleanCraftsmanship\Bowling\Tests;

use PHPUnit\Framework\TestCase;
use VdkIldar\CleanCraftsmanship\Bowling\Game;

class BowlingTest extends TestCase
{
    private Game $game;

    public function setUp(): void
    {
        $this->game = new Game();
    }

    public function testGutterGame()
    {
        $this->rollMany(20, 0);

        $this->assertEquals(0, $this->game->score());
    }

    public function testAllOnes()
    {
        $this->rollMany(20, 1);

        $this->assertEquals(20, $this->game->score());
    }

    public function testOneSpare()
    {
        $this->rollSpare();
        $this->game->roll(7);
        $this->rollMany(17, 0);

        $this->assertEquals(24, $this->game->score());
    }

    public function testOneStrike()
    {
        $this->rollStrike();
        $this->game->roll(2);
        $this->game->roll(3);
        $this->rollMany(16, 0);

        $this->assertEquals(20, $this->game->score());
    }

    public function testPerfectGame()
    {
        $this->rollMany(12, 10);
        $this->assertEquals(300, $this->game->score());
    }

    private function rollMany(int $n, int $pins)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->game->roll($pins);
        }
    }

    private function rollSpare()
    {
        $this->rollMany(2, 5);
    }

    private function rollStrike()
    {
        $this->game->roll(10);
    }
}