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
    require_once 'ComparePlayers.php';

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
        <ul class=rightPlayer>
            <img class='cardImg' src='images/<?php echo $player1->id ?>.png' />
            <li><strong>Name: </strong><?php echo $player1->PlayerName ?></li>
            <li><strong>Club: </strong><?php echo $player1->Club ?></li>
            <li><strong>Position: </strong><?php echo $player1->PositionName ?></li>
            <li><strong>Defence: </strong><?php echo $player1->Defence ?></li>
            <li><strong>Control:</strong><?php echo $player1->Control ?></li>
            <li><strong>Attack: </strong><?php echo $player1->Attack ?></li>
            <li><strong>Total: </strong><?php echo $player1->Total ?></li>
        </ul>
        <ul class=rightPlayer>
            <img class='cardImg' src='images/<?php echo $player2->id ?>.png' />
            <li><strong>Name: </strong><?php echo $player2->PlayerName ?></li>
            <li><strong>Club: </strong><?php echo $player2->Club ?></li>
            <li><strong>Position: </strong><?php echo $player2->PositionName ?></li>
            <li><strong>Defence: </strong><?php echo $player2->Defence ?></li>
            <li><strong>Control:</strong><?php echo $player2->Control ?></li>
            <li><strong>Attack: </strong><?php echo $player2->Attack ?></li>
            <li><strong>Total: </strong><?php echo $player2->Total ?></li>
        </ul>
    </div>