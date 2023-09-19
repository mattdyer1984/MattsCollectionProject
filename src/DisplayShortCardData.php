<?php

function displayShortCardData(array $allCards, string $url)
{
    $output = '';
    if (empty($allCards)) {
        return 'No cards to display';
    }
    foreach ($allCards as $card) {
        $output .=
            "<li>{$card->id}<hr></li>
            <li>{$card->PlayerName}<hr></li>
            <li>{$card->Club}<hr></li>
            <li>{$card->PositionName}<hr></li>
            <form class='DeleteCardForm' action=$url method='POST'>
            <input type='hidden' name='card_id' value='{$card->id}'>
            <input type='submit' name='$_GET[id]' value='$_GET[id]' onclick='return confirm$_GET[id]()'>
            </form>
            ";
    }
    return $output;
}
