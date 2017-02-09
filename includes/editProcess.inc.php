<?php
require_once('conn.inc.php');
$editProcessSQL = "UPDATE cities SET city = :city, area = :area, country = :country,  latitude = :latitude,  longitude = :longitude  WHERE id = :id";
$editProcessStmt = $pdo->prepare($editProcessSQL);
$editProcessStmt->bindParam(':city', str_replace(' ', '_',$_POST['editCMSCity']), PDO::PARAM_STR);
$editProcessStmt->bindParam(':area', str_replace(' ', '_',$_POST['editCMSArea']), PDO::PARAM_STR);
$editProcessStmt->bindParam(':country', str_replace(' ', '_',$_POST['editCMSCountry']), PDO::PARAM_STR);
$editProcessStmt->bindParam(':latitude', $_POST['editCMSLatitude'], PDO::PARAM_STR);
$editProcessStmt->bindParam(':longitude', $_POST['editCMSLongitude'], PDO::PARAM_STR);
$editProcessStmt->bindParam(':id', $_POST['editCMSID'], PDO::PARAM_INT);
$editProcessStmt->execute();
header('Location: ../index.php#editCMSSection');
?>
