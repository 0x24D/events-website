<?php
require_once('includes/conn.inc.php');
if ($_POST['current'] == "country") {
    $sql= "SELECT DISTINCT " . $_POST['next'] . " FROM cities WHERE " . $_POST['current'] . " = '" . $_POST['selected'] . "' ORDER BY " . $_POST['next'] . ";";
}
else {
    $sql= "SELECT DISTINCT " . $_POST['next'] . " FROM cities WHERE " . $_POST['current'] . " = '" . $_POST['selected'] . "' AND country = '" . $_POST['selectedCountry'] ."' ORDER BY " . $_POST['next'] . ";";
}
?>
 <select name="<?php echo $_POST['next']?>" id="<?php echo $_POST['next']?>">
    <option value="base" selected>-</option>
    <?php
foreach($pdo->query($sql) as $row) {
    ?>
    <option value=<?php echo $row[$_POST['next']];?>><?php echo str_replace('_', ' ', $row[$_POST['next']]);?></option>
    <?php
}
?>
</select>
