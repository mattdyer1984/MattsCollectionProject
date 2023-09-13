<?php

require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php';

if (isset($_POST['submit'])) {
    $PlayerName = $_POST['newName'];
    $Club = $_POST['newClub'];
    $Position = $_POST['Position'];
    $Defence = $_POST['newDefence'];
    $Control = $_POST['newControl'];
    $Attack = $_POST['newAttack'];
    $newPlayer = new PlayerCard(
        0,
        $PlayerName,
        $Club,
        $Position,
        $Defence,
        $Control,
        $Attack,
        0,
        0
    );

    $db = DatabaseConnection();
    $Player = new PlayerCardModel($db);
    $Player->updatePlayer($newPlayer, $_GET['id']);
    header('Location: index.php?message=Player+Card+Updated');
}
