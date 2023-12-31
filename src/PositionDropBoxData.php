<?php

require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php';

function PositionData(PlayerCard $card, PlayerCardModel $positionsData)
{
    $positions = $positionsData->getPositionData();

    $options = '';
    foreach ($positions as $position) {
        $selected = ($card->PositionName == $position['PositionName']) ? 'selected' : '';
        $options .= "<option value='{$position['id']}' $selected>{$position['PositionName']}</option>";
    }
    return $options;
}
