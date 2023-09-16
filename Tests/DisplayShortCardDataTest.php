<?php

require_once 'src/DisplayShortCardData.php';
require_once 'src/Entities/PlayerCard.php';


use PHPUnit\Framework\TestCase;

class DisplayShortCardDataTest extends TestCase
{
    public function test_displayShortCardData()
    {
        $allCards = [
            new PlayerCard(1, 'Player 1', 'Club1', 'Defender', 90, 95, 90, 275, 0),
            new PlayerCard(2, 'Player 2', 'Club2', 'Midfield', 85, 88, 43, 216, 0),
        ];
        $expectedOutput = "
        <li>1<hr></li>
        <li>Player 1<hr></li>
        <li>Club1<hr></li>
        <li>Defender<hr></li>
        <form class='DeleteCardForm' action=RemoveCardPage.php method='POST'>
            <input type='hidden' name='card_id' value='1'>
            <input type='submit' name='' value='' onclick='return confirm()'>
        </form>
        <li>2<hr></li>
        <li>Player 2<hr></li>
        <li>Club2<hr></li>
        <li>Midfield<hr></li>
        <form class='DeleteCardForm' action=RemoveCardPage.php method='POST'>
            <input type='hidden' name='card_id' value='2'>
            <input type='submit' name='' value='' onclick='return confirm()'>
        </form>
    ";

    $actualOutput = displayShortCardData($allCards, 'RemoveCardPage.php');
    ;
        $expectedOutput = str_replace(["\n", "\r", ' '], '', $expectedOutput);
        $actualOutput = str_replace(["\n", "\r", ' '], '', $actualOutput);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testDisplayShortCardDataWithNoCards()
    {
        $allCards = [];

        $expectedOutput = 'No cards to display';

        $this->assertSame($expectedOutput, displayShortCardData($allCards, 'RemoveCardPage.php'));
    }
}
