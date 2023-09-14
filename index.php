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
    require_once 'FilterbyPosition.php';

    $db = DatabaseConnection();
    $playerCards = new PlayerCardModel($db);
    $id = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $allCards = $playerCards->getAllCards(0, $id);


    ?>
</head>

<body>
    <p style='text-align:center; font-size:22px; font-weight:600;'> Click on the players name to edit their details</p>
    <ul class='playersTable'>
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
            <li>Players Defence Score</li>
        </strong>
        <strong>
            <li>Players Control Score</li>
        </strong>
        <strong>
            <li>Players Attack Score</li>
        </strong>
        <strong>
            <li>Players Total Score</li>
        </strong>

        <?php
        echo displayCollectionDataList($allCards);
        if (isset($_GET['error'])) {
            echo $_GET['error'];
        } elseif (isset($_GET['message'])) {
            echo $_GET['message'];
        };
        ?>
    </ul>
 
</body>

</html>