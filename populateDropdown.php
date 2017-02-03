<?php
require_once("includes/conn.inc.php");
$currentDropdown = $_POST['current'];
$nextDropdown = $_POST['next'];
$selected = $_POST['selected'];
$areasql= "SELECT DISTINCT " . $nextDropdown . " FROM cities WHERE " . $currentDropdown . " = '" . $selected . "' ORDER BY " . $nextDropdown . ";";
?>
<select name="<?php echo $nextDropdown?>" id="<?php echo $nextDropdown?>">
    <option value="base" selected>-</option>
    <?php
foreach($pdo->query($areasql) as $row) {
    ?>
    <option value=<?php echo $row['area'];?>><?php echo $row['area'];?></option>
    <?php
}
?>
</select>
