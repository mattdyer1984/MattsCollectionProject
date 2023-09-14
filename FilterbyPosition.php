<?php
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$search = '';
if (isset($_GET['Search'])) {
    $search = $_GET['Search'];
}
?>
<div class=filterSearch>
<form method='GET' id='positionFilter'>
<select name='id' id='Position'>
    <option value='' <?php echo ($id == '' ? 'selected' : ''); ?>>All Positions</option>
    <option value='1' <?php echo ($id == '1' ? 'selected' : ''); ?>>Goalkeeper</option>
    <option value='2' <?php echo ($id == '2' ? 'selected' : ''); ?>>Defender</option>
    <option value='3' <?php echo ($id == '3' ? 'selected' : ''); ?>>Midfielder</option>
    <option value='4' <?php echo ($id == '4' ? 'selected' : ''); ?>>Forward</option>
</select>
<input type="hidden" name="Search" value="<?php echo htmlspecialchars($search); ?>"/>
<input type="submit" value="Submit">
</form>

<form method="GET">
<input type="text" name="Search" min="1" max="20" value="<?php echo htmlspecialchars($search); ?>"/>
<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"/>
<input type="submit" value="Search" />
</form>
</div>