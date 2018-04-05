<?php

namespace src;

use src\Player;

class TicTacToe {

    private $players = [];

    private $pointsNbToWin;
    private $ticTacToeTab = [];
    private $turn = 1;
    private $endOfGame = false;
    private $winner = 'No winner';

    // in the constructor, we intialize the Players and ticTacToeTab
    public function __construct($rowsNb, $columnsNb, $pointsNbToWin, $playersNb) {
        $this->pointsNbToWin = $pointsNbToWin;
        $this->playersNb = $playersNb;
        for($i = 1; $i <= $playersNb; $i++) {
            $this->players[$i] = new Player($rowsNb, $columnsNb);
        }
        for($i = 0; $i < $rowsNb; $i++) {
            for($j = 0; $j < $columnsNb; $j++) {
                $this->ticTacToeTab[$i][$j] = 0;
            }
        }
        $this->rowsNb = $rowsNb;
        $this->columnsNb = $columnsNb;
    }

    /**
     * @return string
     */
    public function getSchema() {
        $schema = "";
        for($j = 0; $j < count($this->ticTacToeTab[0]); $j++) {
            $line = "";
            for($i = 0; $i < count($this->ticTacToeTab); $i++) {
                $line = trim($line . " " . $this->ticTacToeTab[$i][$j]);
            }
            $schema = trim($schema . "\n" . $line);
        }
        return $schema;
    }

    public function printPlayersScores() {
        foreach($this->players as $key => $player) {
            echo 'Score player '.$key. ' :';
            print_r($player->getScore());
        }
    }

    public function playerScores($position) {
        // no score if end of game
        if(!$this->endOfGame) {
            list($x, $y) = explode(' ', $position);
            if($x < 0 || $x >= $this->columnsNb || $y < 0 || $y >= $this->rowsNb)  {
                echo "This is not a correct position, player ".$this->turn." please replay !";
            } else if($this->ticTacToeTab[$x][$y] === 0) {
                $this->ticTacToeTab[$x][$y] = $this->turn;
                $this->players[$this->turn]->setScore($x, $y);
                if($this->players[$this->turn]->getCurrentPointMaxScore($x, $y) >= $this->pointsNbToWin) {
                    $this->setWinner('Player '.$this->turn);
                    $this->endOfGame = true;
                } else {
                    $this->changePlayer();
                }
            } else {
                echo "\nYou cannot play this move, because the cell is already occupied. Player ".$this->turn." please replay !\n";
            }
        }
    }

    public function changePlayer() {
        if($this->turn >= $this->playersNb) {
            $this->turn = 1;
        } else {
            $this->turn += 1;
        }
    }

    public function getWinner() {
        return $this->winner;
    }

    private function setWinner($winner) {
        $this->winner = $winner;
    }

    /**
     * @return void
     */
    public function printTicTacToeTab() {
        echo $this->getSchema();
    }
}
