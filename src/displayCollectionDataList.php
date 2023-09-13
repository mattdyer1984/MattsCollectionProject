<?php

function displayCollectionDataList(array $allCards)
{
  $output = '';

  if($allCards == []){
    echo "<div></div>
          <p>No Matching Cards</p>";
  }
  foreach ($allCards as $card) {
    $output .=
      "<li>{$card->id}</li>
            <li><a href='EditCard.php?id={$card->id}'>{$card->PlayerName}</a></li>
            <li>{$card->Club}</li>
            <li>{$card->PositionName}</li>
            <li>{$card->Defence}</li>
            <li>{$card->Control}</li>
            <li>{$card->Attack}</li>
            <li>{$card->Total}</li>
            ";
  }

  return $output;
}
