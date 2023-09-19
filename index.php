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
    require_once 'src/Entities/PlayerCard.php';
    require_once 'src/Models/PlayerCardModel.php';
    require_once 'src/displayCollectionDataList.php';
    require_once 'src/DatabaseConnection.php';
    require_once 'FilterSearch.php';

    $db = DatabaseConnection();
    $playerCards = new PlayerCardModel($db);
    $id = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $search = '';
    if (isset($_GET['Search'])) {
        $search = $_GET['Search'];
    }

    $order = '';
    if (isset($_GET['Order'])) {
        $order = $_GET['Order'];
    }

    $allCards = $playerCards->SearchTool(0, $order, $search, $id);


    ?>
</head>

<body>
<div class="displayList">
    <p style='text-align:center; font-size:22px; font-weight:600;'> Click on the players name to edit their details</p>
    <ul class='playersTable'>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=id">Player ID</a>
        </strong>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=PlayerName">Player Name</a>
        </strong>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=Club">Club</a>
        </strong>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=Position">Player Position</a>
        </strong>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=Defence">Defence Score</a>
        </strong>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=Control">Control Score</a>
        </strong>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=Attack">Attack Score</a>
        </strong>
        <strong>
        <a href="Index.php?Search=<?php echo $search;?>&id=<?php echo $id;?>&Order=Total">Total Score</a>
        </strong>
        <?php
        echo displayCollectionDataList($allCards);
        ?>
    </ul>
</div>
    <div class='messages'>
    <?php
        if (isset($_GET['error'])) {
            echo $_GET['error'];
        } elseif (isset($_GET['message'])) {
            echo $_GET['message'];
        };
        ?>
    </div>
</body>

</html>