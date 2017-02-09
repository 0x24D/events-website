<?php
require_once('conn.inc.php');
$addProcessSQL = "INSERT INTO cities(city, area, country, latitude, longitude) VALUES (:city, :area, :country, :latitude, :longitude)";
$addProcessStmt = $pdo->prepare($addProcessSQL);
$addProcessStmt->bindParam(':city', str_replace(' ', '_',$_POST['addCMSCity']), PDO::PARAM_STR);
$addProcessStmt->bindParam(':area', str_replace(' ', '_',$_POST['addCMSArea']), PDO::PARAM_STR);
$addProcessStmt->bindParam(':country', str_replace(' ', '_',$_POST['addCMSCountry']), PDO::PARAM_STR);
$addProcessStmt->bindParam(':latitude', $_POST['addCMSLatitude'], PDO::PARAM_STR);
$addProcessStmt->bindParam(':longitude', $_POST['addCMSLongitude'], PDO::PARAM_STR);
$addProcessStmt->execute();
header('Location: ../index.php#addCMSSection');
?>
