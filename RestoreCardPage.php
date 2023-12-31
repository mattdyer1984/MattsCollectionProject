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
    require_once 'src/RestoreDelete.php';
    require_once 'src/Entities/PlayerCard.php';
    require_once 'src/Models/PlayerCardModel.php';
    require_once 'src/DatabaseConnection.php';
    require_once 'src/DisplayShortCardData.php';


    $db = DatabaseConnection();
    $playerCards = new PlayerCardModel($db);
    $allCards = $playerCards->getAllCards(1);


    ?>
</head>

<body>
<div class='messages'>
        <?php
        if (isset($_GET['message'])) {
            echo $_GET['message'];
        }
        ?>
    </div>
    <div class='displayList'>
    <ul style='display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  list-style-type: none;'>
        <strong>
            <p>Player ID</p>
        </strong>
        <strong>
            <p>Player Name</p>
        </strong>
        <strong>
            <p>Players Club</p>
        </strong>
        <strong>
            <p>Players Position</p>
        </strong>
        <strong>
            <p>Restore Card</p>
        </strong>
        
        <?php
        echo DisplayShortCardData($allCards, "RestoreCardPage.php?id=Restore&message=Card+Successfully+Restored");

        ?>
    </ul>
</div>
   

</body>