<?php
require 'Game.php';
require 'Person.php';

$player1Name = $argv[1];
$player1Coins = $argv[2];

$player2Name = $argv[3];
$player2Coins = $argv[4];

if ($player1Coins > 0 && $player2Coins > 0) {
    $game = new Game(new Person($player1Name, $player1Coins), new Person($player2Name, $player2Coins));
    $game->start();
} else {
    echo 'Введите колчисетво монет, большее 0';
}

