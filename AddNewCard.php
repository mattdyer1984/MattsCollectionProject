<?php

require_once 'src/Models/PlayerCardModel.php';

$db = new PDO('mysql:host=db; dbname=Collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $PlayerName = $_POST['PlayerName'];
    $Club = $_POST['Club'];
    $Position = $_POST['Position'];
    $Defence = $_POST['Defence'];
    $Control = $_POST['Control'];
    $Attack = $_POST['Attack'];
    $newPlayer = new PlayerCard(
        0, 
        $PlayerName,
        $Club,
        $Position,
        $Defence,
        $Control,
        $Attack,
        0 
    );

    $Player = new PlayerCardModel($db);
    $Player->addNewCard($newPlayer);
    header('Location: index.php?message=New+Card+Added');
}
