<?php
include('conn.inc.php');
include('includes/conn.inc.php');
$deleteSQL = 'SELECT * FROM cities WHERE id = '.$_POST['id'].';';
$deleteStmt = $pdo->query($deleteSQL);
$deleteRow =$deleteStmt->fetchObject();
 ?>
<h2>Delete Page</h2>
<form action="/events/includes/deleteProcess.inc.php" method="POST">
    <input type="text" name="deleteCMSID" id="deleteCMSID" value=<?php echo $deleteRow->id;?> hidden>
    <label for="deleteCMSCity">City: </label>
    <input type="text" name="deleteCMSCity" id="deleteCMSCity" value="<?php echo str_replace('_', ' ',$deleteRow->city);?>" disabled><br>
    <label for="deleteCMSArea">Area: </label>
    <input type="text" name="deleteCMSArea" id="deleteCMSArea" value="<?php echo str_replace('_', ' ',$deleteRow->area);?>" disabled><br>
    <label for="deleteCMSCountry">Country: </label>
    <input type="text" name="deleteCMSCountry" id="deleteCMSCountry" value="<?php echo str_replace('_', ' ',$deleteRow->country);?>" disabled><br>
    <label for="deleteCMSLatitude">Latitude: </label>
    <input type="text" name="deleteCMSLatitude" id="deleteCMSLatitude" value="<?php echo $deleteRow->latitude;?>" disabled><br>
    <label for="deleteCMSLongitude">Longitude: </label>
    <input type="text" name="deleteCMSLongitude" id="deleteCMSLongitude" value="<?php echo $deleteRow->longitude;?>" disabled><br>
    <input type="submit" name="deleteCMSSubmit" id="deleteCMSSubmit" value="Delete">
</form>
