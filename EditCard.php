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
    require_once 'src/DisplayEditableData.php';

    $db = DatabaseConnection();
    $playerCards = new PlayerCardModel($db);
    $card = $playerCards->getPlayerCardById($_GET['id']);
    echo displayEditableCard($card, $playerCards);

    ?>

    </body>