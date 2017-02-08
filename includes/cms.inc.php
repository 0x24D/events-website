<?php
require('includes/conn.inc.php');
$sql = 'SELECT DISTINCT country FROM cities';
$stmt = $pdo->prepare($sql);
$stmt->execute();?>
<h2>CMS</h2>
<table>
    <th>
        <tr>
            <th>Country</th>
            <th>Add</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>View</th>
        </tr>
    </th>
    <?php
    while($row = $stmt->fetchObject()){?>
            <tr>
            <td><?php echo str_replace('_', ' ',$row->country);?></td>
            <td><a href="#">Add</a></td>
            <td><a href="#">Edit</a></td>
            <td><a href="#">Delete</a></td>
            <td><a href="#">View</a></td>
            </tr>
                <?php
    }
    ?>
</table>
