<?php

require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php';

function PositionData(PlayerCard $card, PlayerCardModel $positionsData)
{
    $positions = $positionsData->getPositionData();

    $options = '';
    foreach ($positions as $position) {
        $selected = ($card->PositionName == $position['PositionName']) ? 'selected' : '';          //this makes the position of the selected player the pre selected option from the drop down box
        $options .= "<option value='{$position['id']}' $selected>{$position['PositionName']}</option>";         //and saves it to a variable to use in the drop down options
    }
    return $options;
}
