<?php
$sql= "SELECT city, area, country FROM cities";
foreach($pdo->query($sql) as $row) {
    echo "<tr>";
    echo "<td>{$row['city']}</td>";
    echo "<td>{$row['area']}</td>";
    echo "<td>{$row['country']}</td>";
    echo "</tr>";
}
