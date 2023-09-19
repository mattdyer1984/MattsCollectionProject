<?php

require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php'
?>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this card?");
    }
</script>
<?php

function DeleteCard(int $id, $db)
{
    $playerCards = new PlayerCardModel($db);
    $playerCards->changeActivationStatus($id, true);        // Calls the changeactivationstatus function passing in the card id and the new value true which php changes to 1
}
if (isset($_POST['Delete'])) {                      // listens for when the delete button is clicked 
    $cardId = $_POST['card_id'];                    // gets the id for the card on the line that the delete button is clicked on
    $db = DatabaseConnection();
    DeleteCard($cardId, $db);                       // calls the above deleteCard function passing in the database connection and the card id
}
