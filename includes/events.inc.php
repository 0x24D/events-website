<?php
$countrysql= "SELECT distinct country FROM cities";
$areasql= "SELECT distinct area FROM cities where country = :country";
$citysql= "SELECT distinct city FROM cities where area = :area";
?>
<form action="index.php" method='post'>
<select name="country">
<option value"country" selected>Select a country</option>
<?php
foreach($pdo->query($countrysql) as $row) {
    echo"<option value=\"{$row['country']}\">{$row['country']}</option>";
}
?>
</select>

<!--<select name="area" disabled>
<option value"area" selected>Select an area</option>
<?php
foreach($pdo->query($areasql) as $row) {
    echo"<option value={$row['area']}>{$row['area']}</option>";
}
?>
</select>
<select name="city"disabled>
<option value"city" selected>Select a city</option>
<?php
foreach($pdo->query($citysql) as $row) {
    echo"<option value={$row['city']}>{$row['city']}</option>";
}
?>
</select> -->
<input type="submit" name="search" value="Search">
</form>
<?php
$selectedcountry = $_POST["country"];
echo"Selected country: $selectedcountry" ?>
