<?php

include 'src/TicTacToe.php';
include 'src/Player.php';

use src\TicTacToe;

// new game 4*4, 4 points alignement to win, 2 players
$ticTacToe = new TicTacToe(4,4,4,2);

// player 1 plays
$ticTacToe->playerScores('0 0');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
sleep(1);
system("clear");


// player 2 plays
$ticTacToe->playerScores('2 0');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
sleep(1);
system("clear");

// player 1 plays
$ticTacToe->playerScores('1 1');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
sleep(1);
system("clear");

// player 2 plays
$ticTacToe->playerScores('2 1');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
sleep(1);
system("clear");

// player 1 plays
$ticTacToe->playerScores('2 2');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
sleep(1);
system("clear");

// player 2 plays
$ticTacToe->playerScores('2 2');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
sleep(1);
system("clear");

// player 2 replays
$ticTacToe->playerScores('3 0');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
sleep(1);
system("clear");

// player 1 plays and wins
$ticTacToe->playerScores('3 3');
$ticTacToe->printTicTacToeTab();
echo "\n";
print_r("Winner : ".$ticTacToe->getWinner());
