<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Matt's EPL Card Collection</title>

    <meta name="description" content="Template HTML file">
    <meta name="author" content="iO Academy">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="icon" href="images/eplLogo.png" sizes="192x192">
    <link rel="shortcut icon" href="images/eplLogo.png">
    <link rel="apple-touch-icon" href="images/eplLogo.png">

    <script defer src="js/index.js"></script>
    <?php

require_once 'src/Navbar.php';
require_once 'src/DeleteCard.php';
require_once 'src/Entities/PlayerCard.php';
require_once 'src/Models/PlayerCardModel.php';


$db = new PDO('mysql:host=db; dbname=Collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$playerCards = new PlayerCardModel($db);
$allCards = $playerCards->getAllCards();

?>
</head>
<body>
<ul style='display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  list-style-type: none;'>
        <strong>
            <li>Player ID</li>
        </strong>
        <strong>
            <li>Player Name</li>
        </strong>
        <strong>
            <li>Players Club</li>
        </strong>
        <strong>
            <li>Players Position</li>
        </strong>
        <strong>
            <li>Delete Card</li>
        </strong>



<?php
echo DisplayDataforCardDelete($allCards);
?>
</ul>
</body>