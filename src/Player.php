<?php

namespace src;

class Player {

    private $score = array('rows'       => array(),
                           'columns'    => array(),
                           'diag_up'    => array(),
                           'diag_down'  => array());

    // we initialize the score with 0 for the columns, rows and diagonals
    public function __construct($rowsNb, $columnsNb) {
        for($i = 0; $i < $rowsNb; $i++) {
            $this->score['rows'][$i] = 0;
        }
        for($i = 0; $i < $columnsNb; $i++) {
            $this->score['columns'][$i] = 0;
        }
        for($i = - $columnsNb + 1; $i < $rowsNb; $i++) {
            $this->score['diag_up'][$i] = 0;
        }
        for($i = 0; $i < $rowsNb + $columnsNb - 1; $i++) {
            $this->score['diag_down'][$i] = 0;
        }
    }

    public function getScore() {
        return $this->score;
    }

    // set score for based on current player's position
    public function setScore($x, $y) {
        $this->score['columns'][$x] += 1;
        $this->score['rows'][$y] += 1;
        $this->score['diag_up'][$y - $x] += 1;
        $this->score['diag_down'][$y + $x] += 1;
    }

    // get max score on current player's position
    public function getCurrentPointMaxScore($x, $y) {
        return max($this->getCurrentColumnScore($x),
                    $this->getCurrentRowScore($y),
                     $this->getCurrentDiagUpScore($x, $y),
                      $this->getCurrentDiagDownScore($x, $y));
    }

    private function getCurrentColumnScore($x) {
        return $this->score['columns'][$x];
    }

    private function getCurrentRowScore($y) {
        return $this->score['rows'][$y];
    }

    private function getCurrentDiagUpScore($x, $y) {
        return $this->score['diag_up'][$y - $x];
    }

    private function getCurrentDiagDownScore($x, $y) {
        return $this->score['diag_down'][$y + $x];
    }
}
