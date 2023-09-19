<?php

function displayCollectionDataList(array $allCards)
{
  $output = '';

  if ($allCards == []) {
    echo "<div></div>
          <p>No Matching Cards</p>";
  }
  foreach ($allCards as $card) {
    $output .=
      "<li>{$card->id}<hr></li>
            <li><a href='EditCard.php?id={$card->id}'>{$card->PlayerName}</a><hr></li>
            <li>{$card->Club}<hr></li>
            <li>{$card->PositionName}<hr></li>
            <li>{$card->Defence}<hr></li>
            <li>{$card->Control}<hr></li>
            <li>{$card->Attack}<hr></li>
            <li>{$card->Total}<hr></li>
            ";
  }

  return $output;
}
