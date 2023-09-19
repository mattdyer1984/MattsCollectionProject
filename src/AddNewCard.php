<?php

require_once 'Models/PlayerCardModel.php';
require_once 'Entities/PlayerCard.php';
require_once 'src/DatabaseConnection.php';

$db = DatabaseConnection();                         //creates a database connection

if (isset($_POST['submit'])) {                      //If isset in this case essentially means when the submit button is pressed.
    $PlayerName = $_POST['PlayerName'];
    $Club = $_POST['Club'];
    $Position = $_POST['Position'];
    $Defence = $_POST['Defence'];                       // This then pulls the data from the form PlayerName, Club etc are the names of the input boxes
    $Control = $_POST['Control'];
    $Attack = $_POST['Attack'];
$newPlayer = new PlayerCard(                            //Then instantiates a new player card using the value inputted from the form.
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

    $Player = new PlayerCardModel($db);                             //Instantiates the PLayer card model, as $player and calls the function 
    $Player->addNewCard($newPlayer);                                // to add a new player card with the new player card information from the form
    header('Location: /work/MattsCollectionProject/index.php?message=New+Card+Added');          // redirects to the home page with the message New Card Added
}
