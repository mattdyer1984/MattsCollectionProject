<?php

require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php';
require_once 'src/CompareDropBoxData.php';



function PlayerDropDownData(PlayerCardModel $model)
{
    $players = $model->getAllCards(0);

    $options = '<option>Players</option>';
    foreach ($players as $player) {
        $options .= "<option value='{$player->id}'> {$player->PlayerName}</option><hr>";
    }
    return $options;
}