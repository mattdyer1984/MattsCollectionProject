<?php

readonly class PlayerCard {
    public int $id;
    public string $playerName;
    public string $club;
    public string $position;
    public int $defence;
    public int $control;
    public int $attack;
    public int $total;
    

    public function __construct(
        int $id,
        string $playerName,
        string $club,
        string $position,
        int $defence,
        int $control,
        int $attack,
        int $total,
        
    )
    {
        $this->id = $id;
        $this->playerName = $$playerName;
        $this->club = $club;
        $this->position = $position;
        $this->defence = $defence;
        $this->control = $control;
        $this->attack=$attack;
        $this->total = $total; 

    }

}