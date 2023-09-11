<?php
require_once 'src/Models/PlayerCardModel.php';

$db = new PDO('mysql:host=db; dbname=Collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    $PlayerName = $_POST['PlayerName'];
    $Club = $_POST['Club'];
    $Position = $_POST['Position'];
    $Defence = $_POST['Defence'];
    $Control = $_POST['Control'];
    $Attack = $_POST['Attack'];
    
    
   

    $Player = new PlayerCardModel($db);
    $newPlayer = $Player->addNewCard($PlayerName, $Club,$Position, 
    $Defence, $Control, $Attack); 
    header('Location: index.php?message=New+Card+Added'); 
    

} else {header('Location: AddNewCardForm.php?error=Unable+To+Add+Card');
}
