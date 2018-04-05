<?php

namespace Tests;

include 'src/TicTacToe.php';
include 'src/Player.php';

use src\TicTacToe;

use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    /**
     * @var TicTacToe
     */
    protected $ticTacToe;

    /**
     * @var TicTacToe
     */
    protected $ticTacToe2;

    protected function setUp()
    {
        $this->ticTacToe = new TicTacToe(3, 3, 3, 2);
        $this->ticTacToe2 = new TicTacToe(4, 4, 4, 2);
        $this->ticTacToe3 = new TicTacToe(5, 5, 4, 3);

    }

    public function testEmptyTicTacToeTab()
    {
        $this->assertSame("0 0 0\n0 0 0\n0 0 0", $this->ticTacToe->getSchema());
        $this->assertSame("0 0 0 0\n0 0 0 0\n0 0 0 0\n0 0 0 0", $this->ticTacToe2->getSchema());
        $this->assertSame("0 0 0 0 0\n0 0 0 0 0\n0 0 0 0 0\n0 0 0 0 0\n0 0 0 0 0", $this->ticTacToe3->getSchema());
    }

    public function testPlayerScores()
    {
        $this->ticTacToe->playerScores('0 0');
        $this->assertSame("1 0 0\n0 0 0\n0 0 0", $this->ticTacToe->getSchema());
        $this->ticTacToe->playerScores('1 0');
        $this->assertSame("1 2 0\n0 0 0\n0 0 0", $this->ticTacToe->getSchema());
        $this->ticTacToe->playerScores('0 1');
        $this->assertSame("1 2 0\n1 0 0\n0 0 0", $this->ticTacToe->getSchema());
        $this->ticTacToe->playerScores('1 1');
        $this->assertSame("1 2 0\n1 2 0\n0 0 0", $this->ticTacToe->getSchema());
        $this->ticTacToe->playerScores('0 2');
        $this->assertSame("1 2 0\n1 2 0\n1 0 0", $this->ticTacToe->getSchema());
        $this->ticTacToe->playerScores('1 2');
        $this->assertSame("1 2 0\n1 2 0\n1 0 0", $this->ticTacToe->getSchema());

        $this->ticTacToe2->playerScores('1 2');
        $this->assertSame("0 0 0 0\n0 0 0 0\n0 1 0 0\n0 0 0 0", $this->ticTacToe2->getSchema());
        $this->ticTacToe2->playerScores('1 0');
        $this->assertSame("0 2 0 0\n0 0 0 0\n0 1 0 0\n0 0 0 0", $this->ticTacToe2->getSchema());

        $this->ticTacToe3->playerScores('2 4');
        $this->assertSame("0 0 0 0 0\n0 0 0 0 0\n0 0 0 0 0\n0 0 0 0 0\n0 0 1 0 0", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('1 2');
        $this->assertSame("0 0 0 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 0 0 0 0\n0 0 1 0 0", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('2 0');
        $this->assertSame("0 0 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 0 0 0 0\n0 0 1 0 0", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('3 4');
        $this->assertSame("0 0 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 0 0 0 0\n0 0 1 1 0", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('1 3');
        $this->assertSame("0 0 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 2 0 0 0\n0 0 1 1 0", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('1 0');
        $this->assertSame("0 3 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 2 0 0 0\n0 0 1 1 0", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('4 4');
        $this->assertSame("0 3 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 2 0 0 0\n0 0 1 1 1", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('1 4');
        $this->assertSame("0 3 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 2 0 0 0\n0 2 1 1 1", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('0 0');
        $this->assertSame("3 3 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 2 0 0 0\n0 2 1 1 1", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('4 3');
        $this->assertSame("3 3 3 0 0\n0 0 0 0 0\n0 2 0 0 0\n0 2 0 0 1\n0 2 1 1 1", $this->ticTacToe3->getSchema());
        $this->ticTacToe3->playerScores('1 1');
        $this->assertSame("3 3 3 0 0\n0 2 0 0 0\n0 2 0 0 0\n0 2 0 0 1\n0 2 1 1 1", $this->ticTacToe3->getSchema());
        // A player already won so the schema will normally not change
        $this->ticTacToe3->playerScores('3 0');
        $this->assertSame("3 3 3 0 0\n0 2 0 0 0\n0 2 0 0 0\n0 2 0 0 1\n0 2 1 1 1", $this->ticTacToe3->getSchema());
    }

    public function testSameMoveThanOtherPlayer()
    {
        $this->ticTacToe->playerScores('0 0');
        $this->assertSame("1 0 0\n0 0 0\n0 0 0", $this->ticTacToe->getSchema());
        $this->ticTacToe->playerScores('0 0');
        $this->assertSame("1 0 0\n0 0 0\n0 0 0", $this->ticTacToe->getSchema());
        $this->ticTacToe->playerScores('1 1');
        $this->assertSame("1 0 0\n0 2 0\n0 0 0", $this->ticTacToe->getSchema());
    }
}