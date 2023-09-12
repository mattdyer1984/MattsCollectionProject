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
    ?>
    <form class="addCardForm" action="AddNewCard.php" method="POST" onsubmit="return validateForm()">
        <label for="PlayerName">PlayerName</label>
        <input type="text" name="PlayerName" id="PlayerName" minlength="3" maxlength="100"required />
        <label for="Club">Club</label>
        <input type="text" name="Club" id="Club" minlength="6" maxlength="100"required />
        <label for="Position">Position</label>
        <select name="Position" id="Position">
            <option value="1">Goalkeeper</option>
            <option value="2">Defender</option>
            <option value="3">Midfielder</option>
            <option value="4">Forward</option>
        </select>
        <label for="Defence">Defence Score (0 - 100)</label>
        <input type="number" name="Defence" id="Defence" min="1" max="100" required />
        <label for="Control">Control Score (0 - 100)</label>
        <input type="number" name="Control" id="Control" min="1" max="100" required />
        <label for="Attack">Attack Score (0 - 100)</label>
        <input type="number" name="Attack" id="Attack" min="1" max="100" required /><br>
        <input style="margin-top:20px" type="submit" name='submit' value="Register" />
    </form>