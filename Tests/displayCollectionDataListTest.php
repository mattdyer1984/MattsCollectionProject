<?php

require_once 'src/displayCollectionDataList.php';
require_once 'src/Entities/PlayerCard.php';


use PHPUnit\Framework\TestCase;

class displayCollectionDataListTest extends TestCase
{
    public function test_DisplayCollectionDataList()
    {
        $allCards = [
            new PlayerCard(1, 'Player 1', 'Club1', 'Defender', 90, 95, 90, 275),
            new PlayerCard(2, 'Player 2', 'Club2', 'Midfield', 85, 88, 43, 216),
        ];


        $expectedOutput =
            "<li>1</li>
        <li>Player 1</li>
        <li>Club1</li>
        <li>Defender</li>
        <li>90</li>
        <li>95</li>
        <li>90</li>
        <li>275</li>
        <li>2</li>
        <li>Player 2</li>
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
        $this->assertEquals($expectedOutput, $actualOutput);
    }
}
