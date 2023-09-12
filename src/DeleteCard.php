<?php

require_once 'src/Models/PlayerCardModel.php';
?>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this card?");
    }
</script>
<?php

function DisplayDataforCardDelete(array $allCards)
{
    $output = '';

    foreach ($allCards as $card) {
        if ($card->Deleted == 0) {
            $output .=
                "<li>{$card->id}</li>
            <li>{$card->PlayerName}</li>
            <li>{$card->Club}</li>
            <li>{$card->PositionName}</li>
            <form class='DeleteCardForm' action='RemoveCardPage.php' method='POST'>
            <input type='hidden' name='card_id' value='{$card->id}'>
            <input type='submit' name='delete' value='Delete' onclick='return confirmDelete()'>
            </form>
            ";
        }
    }

    return $output;
}

function DeleteCard($id)
{
    $db = new PDO('mysql:host=db; dbname=Collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $playerCards = new PlayerCardModel($db);
    $playerCards->changeActivationStatus($id, 1);
}
if (isset($_POST['delete'])) {
    $cardId = $_POST['card_id'];
    DeleteCard($cardId);
}
