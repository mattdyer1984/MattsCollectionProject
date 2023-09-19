<?php

function displayShortCardData(array $allCards, string $url)         //takes a url as an input to use in the form redirect
{
    $output = '';
    if (empty($allCards)) {
        return 'No cards to display';
    }
    foreach ($allCards as $card) {              //for each card displays id, name, club and position followed by a button to delete them
        $output .=                      // .= concatenates the html content of the variable $output
            "<li>{$card->id}<hr></li>
            <li>{$card->PlayerName}<hr></li>
            <li>{$card->Club}<hr></li>
            <li>{$card->PositionName}<hr></li>
            <form class='DeleteCardForm' action=$url method='POST'>
            <input type='hidden' name='card_id' value='{$card->id}'>
            <input type='submit' name='$_GET[id]' value='$_GET[id]' onclick='return confirm$_GET[id]()'>".        //on click call a JS function to confirm delete/restore depending on which is being done.
            "</form>
            ";
    }
    return $output;
}
