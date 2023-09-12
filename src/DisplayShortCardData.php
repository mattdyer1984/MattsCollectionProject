<?php


function DisplayShortCardData(array $allCards):array | string
{
    $output = '';

    foreach ($allCards as $card) {
        if ($card->Deleted == 0) {
            $output .=
                "<li>{$card->id}</li>
            <li>{$card->PlayerName}</li>
            <li>{$card->Club}</li>
            <li>{$card->PositionName}</li>
            <form class='DeleteCardForm' action='RemoveCardPage.php' method='POST'>
            <input type='hidden' name='card_id' value='{$card->id}'>
            <input type='submit' name='delete' value='Delete' onclick='return confirmDelete()'>
            </form>
            ";
        } 
    }

    return $output;
}
