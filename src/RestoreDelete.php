<?php


require_once 'src/Models/PlayerCardModel.php';
require_once 'src/DatabaseConnection.php'
?>
<script>
    function confirmRestore() {
        return confirm("Are you sure you want to restore this card?");
    }
</script>
<?php

function RestoreCard(int $id, $db)
{
    $playerCards = new PlayerCardModel($db);
    $playerCards->changeActivationStatus($id);
}
if (isset($_POST['Restore'])) {
    $cardId = $_POST['card_id'];
    $db = DatabaseConnection();
    RestoreCard($cardId, $db);
}
