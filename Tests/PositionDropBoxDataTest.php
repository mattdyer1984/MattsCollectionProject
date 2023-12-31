<?php

require_once 'src/PositionDropBoxData.php';
require_once 'src/Entities/PlayerCard.php';


use PHPUnit\Framework\TestCase;

class PositionDropBoxDataTest extends TestCase
{
    public function test_PositionData()
    {
        $playerCardModelMock = $this->createMock(PlayerCardModel::class);
        $playerCardModelMock->method('getPositionData')->willReturn([[
            "id"=> 1,
            "PositionName"=>"Goalkeeper"
        ],
        [
            "id"=> 2, 
            "PositionName"=> "Defender",
        ],
        [
            "id" => 3,
            "PositionName"=> "Midfielder"],
        [
            "id" => 4,
            "PositionName"=> "Forward"
        ]]);

        $card = new PlayerCard(1, 'Player 1', 'Club1', 'Defender', 90, 95, 90, 275, 0);
              
            $expectedOutput ="
            <option value='1'>Goalkeeper</option>
            <option value='2' selected>Defender</option>
            <option value='3'>Midfielder</option>
            <option value='4'>Forward</option>";

            $actualOutput = PositionData($card, $playerCardModelMock);
            $expectedOutput = str_replace(["\n", "\r", ' '], '', $expectedOutput);
            $actualOutput = str_replace(["\n", "\r", ' '], '', $actualOutput);

        $this->assertEquals($expectedOutput, $actualOutput);
    }
}
