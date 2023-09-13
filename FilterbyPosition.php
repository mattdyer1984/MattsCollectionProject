<?php
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<form style='margin-left:25px;' method='GET' action='index.php' id='positionFilter'>
    <select name='id' id='Position'>
        <option value='' <?php echo ($id == '' ? 'selected' : ''); ?>>All Positions</option>
        <option value='1' <?php echo ($id == '1' ? 'selected' : ''); ?>>Goalkeeper</option>
        <option value='2' <?php echo ($id == '2' ? 'selected' : ''); ?>>Defender</option>
        <option value='3' <?php echo ($id == '3' ? 'selected' : ''); ?>>Midfielder</option>
        <option value='4' <?php echo ($id == '4' ? 'selected' : ''); ?>>Forward</option>
    </select>
    <input type="submit" value="Submit">
</form>