<?php

require_once 'src/PositionDropBoxData.php';

function displayEditableCard(PlayerCard $card, PlayerCardModel $positionsData)
{
    $postionOptions = PositionData($card, $positionsData);

    return
        "<img src='images/{$card->id}.png' class=editImg />
        <div class='editContainer'>
        <form class='editForm' action='EditDataFunction.php?id={$card->id}' method='POST'>
        <p>Player Details</p>
        <p>New Player Details</p>
        <p>{$card->PlayerName}</p>
        <input type='text' value='{$card->PlayerName}' minlength='5' maxlength='100' name='newName'/>
        <p>{$card->Club}</p>
        <input type='text' value='{$card->Club}' minlength='5' maxlength='100' name='newClub'/>
        <p>{$card->PositionName}</p>
        <select name='Position' id='Position'>" .
        $postionOptions
        . "</select>
        <p>{$card->Defence}</p>
        <input type='number'min='0' value='{$card->Defence}' max='100' name='newDefence'/>
        <p>{$card->Control}</p>
        <input type='number'min='0' value='{$card->Control}' max='100' name='newControl'/>
        <p>{$card->Attack}</p>
        <input type='number'min='0' value='{$card->Attack}' max='100' name='newAttack'/>
        <div></div>
        <input style='margin-top:10px; width: 120px; padding:15px; justify-self:end;' type='submit' name='submit'/>
        </div>
        ";
}
