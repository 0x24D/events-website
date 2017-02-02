<?php
require_once("includes/conn.inc.php");
$countrysql= "SELECT DISTINCT country FROM cities ORDER BY country";
$areasql= "SELECT DISTINCT area FROM cities ORDER BY area";
$citysql= "SELECT DISTINCT city FROM cities ORDER BY city";
?>
<table>
    <tr>
        <th>Country</th>
        <th>Area</th>
        <th>City</th>
    </tr>
    <tr>
        <td>
            <select name="country" id="country">
                <option value="base" selected>Select a country</option>
                <?php
                foreach($pdo->query($countrysql) as $row) {
                    echo"<option value={$row['country']}>{$row['country']}</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <select name="area" id="area" disabled>
                <option value="base" selected>Select an area</option>
                <?php
                 foreach($pdo->query($areasql) as $row) {
                     echo"<option value={$row['area']}>{$row['area']}</option>";
                 }
                ?>
            </select>
        </td>
        <td>
            <select name="city" id="city" disabled>
                <option value="base" selected>Select a city</option>
                <?php
                foreach($pdo->query($citysql) as $row) {
                    echo"<option value={$row['city']}>{$row['city']}</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <input type="submit" name="search" id="search" class="fa" value="&#xf002;">
        </td>
    </tr>
</table>
