<?php

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<form action="index.php?id=$id" method="GET">
    <input type="text" name="Search" id="Search" min="1" max="20"/>
    <input type="submit" name='submit' value="Submit" />
</form>