<?php

function displayCollectionDataList(array $allCards)
{
  $output = '';

  if ($allCards == []) {                                  //if the function is called and the allcards array is 
    echo "<div></div>" .                                     //empty it will echo no matching cards in the second grid box
         "<p>No Matching Cards</p>";
  }
  foreach ($allCards as $card) {
    $output .=                                          //using the variable followed by .= makes it concatenate the html inside the variable
      "<li>{$card->id}<hr></li>
            <li><a href='EditCard.php?id={$card->id}'>{$card->PlayerName}</a><hr></li> ".     //turns the player name into link with the id of the card id
            "<li>{$card->Club}<hr></li>
            <li>{$card->PositionName}<hr></li>
            <li>{$card->Defence}<hr></li>
            <li>{$card->Control}<hr></li>
            <li>{$card->Attack}<hr></li>
            <li>{$card->Total}<hr></li>
            ";
  }

  return $output;
}
