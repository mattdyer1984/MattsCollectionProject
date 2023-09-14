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
require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php';
$db = DatabaseConnection();
$playerCards = new PlayerCardModel($db);

if (isset($_GET['player1']) && isset($_GET['player2'])) {
    $player1Id = $_GET['player1'];
    $player2Id = $_GET['player2'];
}

 $player1 = $playerCards->getPlayerCardById($_GET['player1']);
 $player2 = $playerCards->getPlayerCardById($_GET['player2']);

?>
<div class='compareContainer'>
    <ul class=leftPlayer>
<?php
foreach($player1 as $item) {
    echo "<li>$item</li>";

}
?>
    </ul>
    <ul class=rightPlayer>
<?php

 foreach($player2 as $item) {
    echo "<li>$item</li>";
 }

?>
</ul>
 </div>