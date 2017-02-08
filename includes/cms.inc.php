<?php
require('includes/conn.inc.php');
$sql = 'SELECT * FROM cities';
$stmt = $pdo->prepare($sql);
$stmt->execute();?>
<h2>Content Management System</h2>
<table>
    <th>
        <tr>
            <th>Country</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>View</th>
            <th><a href="#" id="addCMSLink">Add</a></th>
        </tr>
    </th>
    <?php
    while($row = $stmt->fetchObject()){?>
    <tr>
    <td><?php echo str_replace('_', ' ', $row->city).','.str_replace('_', ' ', $row->area).','.str_replace('_', ' ', $row->country);?></td>
    <td><a href="#" id="editCMSLink" value=".<?php echo $row->id; ?>.">Edit</a></td>
    <td><a href="#" id="deleteCMSLink" value=".<?php echo $row->id; ?>.">Delete</a></td>
    <td><a href="#" id="viewCMSLink" value=".<?php echo $row->id; ?>.">View</a></td>
    </tr>
<?php}
    ?>
</table>
