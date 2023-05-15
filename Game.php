<?php


class Game
{
    protected $player1;
    protected $player2;
    protected $flips = 1;

    public function __construct(Person $player1, Person $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function start()
    {
        echo <<<EOT
----------------------------------
Game start
Вероятность выигрыша: 
{$this->player1->name}: {$this->odds($this->player1)}%
{$this->player2->name}: {$this->odds($this->player2)}%

EOT;

        $this->play();
    }

    public function play()
    {
        while (true) {
            $this->flip() == 'Орел' ? $this->player1->win($this->player2) : $this->player2->win($this->player1);
            if ($this->player1->balance() == 0 || $this->player2->balance() == 0) {
                return $this->end();
            }
            $this->flips++;
        }
    }

    public function flip()
    {
        return rand(0, 1) ? 'Орел' : 'Решка';
    }

    public function odds(Person $player)
    {
        return round($player->coins / ($this->player1->coins + $this->player2->coins) * 100, 2);
    }

    public function winner()
    {
        return $this->player1->balance() > $this->player2->balance() ? $this->player1 : $this->player2;
    }

    public function end()
    {
        echo <<<EOT
----------------------------------
Game Over
{$this->player1->name}: {$this->player1->balance()}
{$this->player2->name}: {$this->player2->balance()}
Победил {$this->winner()->name} - банк : {$this->winner()->balance()}
Количество бросков: {$this->flips}
----------------------------------
EOT;
    }
}