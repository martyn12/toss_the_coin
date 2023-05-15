<?php


class Person
{
    public $name;
    public $coins;

    public function __construct($name, $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }

    public function win(Person $player)
    {
        $this->coins++;
        $player->coins--;
    }

    public function balance()
    {
        return $this->coins;
    }
}