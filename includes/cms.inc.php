<?php
include('conn.inc.php');
include('includes/conn.inc.php');
$cmsSQL = 'SELECT * FROM cities;';
?>
<h2>Content Management System</h2>
<table>
    <tr>
        <th>Country</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>View</th>
        <th><a href="#addCMSSection" id="addCMSLink">Add New</a></th>
    </tr>
    <?php
    foreach ($pdo->query($cmsSQL) as $cmsRow) {?>
        <tr>
            <?php if ($cmsRow['country'] == 'England') {
                $area = $cmsRow['area'].',';
            }
            else {
                $area = '';
            }?>
            <td><?php echo str_replace('_', ' ', $cmsRow['city']).', '.str_replace('_', ' ', $area).' '.str_replace('_', ' ', $cmsRow['country']);?></td>
            <td><a href="#editCMSSection" class="editCMSLink" id=<?php echo 'edit'.$cmsRow['id'];?>>Edit</a></td>
            <td><a href="#deleteCMSSection" class="deleteCMSLink" id=<?php echo 'delete'.$cmsRow['id'];?>>Delete</a></td>
            <td><a href="#viewCMSSection" class="viewCMSLink" id=<?php echo 'view'.$cmsRow['id'];?>>View</a></td>
        </tr>
        <?php
    }
    ?>
</table>
