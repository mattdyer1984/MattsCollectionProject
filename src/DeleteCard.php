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
    $playerCards->changeActivationStatus($id, true);
}
if (isset($_POST['Delete'])) {
    $cardId = $_POST['card_id'];
    $db = DatabaseConnection();
    DeleteCard($cardId, $db);
}
