<?php
$editSQL = 'SELECT * FROM cities WHERE id = '.$_POST['id'].';';
$editStmt = $pdo->query($editSQL);
$editRow =$editStmt->fetchObject();
 ?>
<h2>Edit Page</h2>
<form action="/events/includes/editProcess.inc.php" method="POST">
    <input type="text" name="editCMSID" id="editCMSID" value=<?php echo $editRow->id;?> hidden>
    <label for="editCMSCity">City: </label>
    <input type="text" name="editCMSCity" id="editCMSCity" value="<?php echo str_replace('_', ' ',$editRow->city);?>"><br>
    <label for="editCMSArea">Area: </label>
    <input type="text" name="editCMSArea" id="editCMSArea" value="<?php echo str_replace('_', ' ',$editRow->area);?>"><br>
    <label for="editCMSCountry">Country: </label>
    <input type="text" name="editCMSCountry" id="editCMSCountry" value="<?php echo str_replace('_', ' ',$editRow->country);?>"><br>
    <label for="editCMSLatitude">Latitude: </label>
    <input type="text" name="editCMSLatitude" id="editCMSLatitude" value=<?php echo $editRow->latitude;?>><br>
    <label for="editCMSLongitude">Longitude: </label>
    <input type="text" name="editCMSLongitude" id="editCMSLongitude" value=<?php echo $editRow->longitude;?>><br>
    <input type="submit" name="editCMSSubmit" id="editCMSSubmit" value="Edit">
</form>
