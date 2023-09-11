<?php

function displayCollectionDataList(array $allCards)
{
    $output = '';

    foreach ($allCards as $card) {
        $output .=
            "<li>{$card->id}</li>
            <li>{$card->PlayerName}</li>
            <li>{$card->Club}</li>
            <li>{$card->PositionName}</li>
            <li>{$card->Defence}</li>
            <li>{$card->Control}</li>
            <li>{$card->Attack}</li>
            <li>{$card->Total}</li>
            ";
    }

    return $output;  
}
