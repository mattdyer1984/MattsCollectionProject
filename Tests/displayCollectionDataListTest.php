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
            "<li>1</li>
        <li><ahref='EditCard.php?id=1'>Player1</a></li>
        <li>Club1</li>
        <li>Defender</li>
        <li>90</li>
        <li>95</li>
        <li>90</li>
        <li>275</li>
        <li>2</li>
        <li><ahref='EditCard.php?id=2'>Player2</a></li>
        <li>Club2</li>
        <li>Midfield</li>
        <li>85</li>
        <li>88</li>
        <li>43</li>
        <li>216</li>";


        $actualOutput = displayCollectionDataList($allCards);
        $expectedOutput = str_replace(["\n", "\r", ' '], '', $expectedOutput);
        $actualOutput = str_replace(["\n", "\r", ' '], '', $actualOutput);

        $this->assertEquals($expectedOutput, $actualOutput);
    }
}
