<?php

require_once 'src/displayCollectionDataList.php';
require_once 'src/Entities/PlayerCard.php';


use PHPUnit\Framework\TestCase;

class DisplayCollectionDataListTest extends TestCase
{
    public function test_displayCollectionDataList()
    {
        $allCards = [
            new PlayerCard(1, 'Player 1', 'Club1', 'Defender', 90, 95, 90, 275, 0),
            new PlayerCard(2, 'Player 2', 'Club2', 'Midfield', 85, 88, 43, 216, 0),
        ];


        $expectedOutput =
            "<li>1<hr></li>
        <li><ahref='EditCard.php?id=1'>Player1</a><hr></li>
        <li>Club1<hr></li>
        <li>Defender<hr></li>
        <li>90<hr></li>
        <li>95<hr></li>
        <li>90<hr></li>
        <li>275<hr></li>
        <li>2<hr></li>
        <li><ahref='EditCard.php?id=2'>Player2</a><hr></li>
        <li>Club2<hr></li>
        <li>Midfield<hr></li>
        <li>85<hr></li>
        <li>88<hr></li>
        <li>43<hr></li>
        <li>216<hr></li>";


        $actualOutput = displayCollectionDataList($allCards);
        $expectedOutput = str_replace(["\n", "\r", ' '], '', $expectedOutput);
        $actualOutput = str_replace(["\n", "\r", ' '], '', $actualOutput);

        $this->assertEquals($expectedOutput, $actualOutput);
    }
}
