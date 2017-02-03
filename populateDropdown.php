<?php
require_once("includes/conn.inc.php");
$currentDropdown = $_POST['current'];
$nextDropdown = $_POST['next'];
$selected = $_POST['selected'];
$selectedCountry = $_POST['selectedCountry'];
if ($currentDropdown == "country") {
    $sql= "SELECT DISTINCT " . $nextDropdown . " FROM cities WHERE " . $currentDropdown . " = '" . $selected . "' ORDER BY " . $nextDropdown . ";";
}
else {
    $sql= "SELECT DISTINCT " . $nextDropdown . " FROM cities WHERE " . $currentDropdown . " = '" . $selected . "' AND country = '" . $selectedCountry ."' ORDER BY " . $nextDropdown . ";";
}
?>
 <select name="<?php echo $nextDropdown?>" id="<?php echo $nextDropdown?>">
    <option value="base" selected>-</option>
    <?php
foreach($pdo->query($sql) as $row) {
    ?>
    <option value=<?php echo $row[$nextDropdown];?>><?php echo str_replace("_", " ", $row[$nextDropdown]);?></option>
    <?php
}
?>
</select>
