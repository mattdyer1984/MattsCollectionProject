<?php

require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php';
require_once 'src/CompareDropBoxData.php';



function PlayerDropDownData(PlayerCardModel $model)                 
{
    $players = $model->getAllCards(0);                                          // gets all cards from the player model

    $options = '<option value="" disabled selected hidden>Choose Player</option>';      //sets Choose player to the default value in the drop down box so what is showed before its clicked
    foreach ($players as $player) {                                                     //disabled makes it not an active option so cannot be selected
        $options .= "<option value='{$player->id}'> {$player->PlayerName}</option><hr>";            //hidden means when you click the drop down it disappears
    }
    return $options;                                                                                    // then for each card that gets returned it creates an item on the drop down list.
}