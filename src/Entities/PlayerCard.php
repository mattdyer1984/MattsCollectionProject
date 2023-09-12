<?php

readonly class PlayerCard
{
    public ?int $id;
    public string $PlayerName;
    public string $Club;
    public string $PositionName;
    public int $Defence;
    public int $Control;
    public int $Attack;
    public ?int $Total;


    public function __construct(
        int $id,
        string $PlayerName,
        string $Club,
        string $PositionName,
        int $Defence,
        int $Control,
        int $Attack,
        int $Total,
    ) {
        $this->id = $id;
        $this->PlayerName = $PlayerName;
        $this->Club = $Club;
        $this->PositionName = $PositionName;
        $this->Defence = $Defence;
        $this->Control = $Control;
        $this->Attack = $Attack;
        $this->Total = $Total;
    }
}
