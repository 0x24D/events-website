<?php
require_once('includes/sessions.inc.php');
require_once('includes/conn.inc.php');
if (isset($_SESSION['login'])) {
    $sql = "INSERT INTO memberComments (name, emailAddress, subject, message) VALUES (:cName, :cEmailAddress, :cSubject, :cMessage);";
}
else {
    $sql = "INSERT INTO guestComments (name, emailAddress, subject, message) VALUES (:cName, :cEmailAddress, :cSubject, :cMessage);";
}
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cName', str_replace(" ", "_", $_POST['contactName']), PDO::PARAM_STR);
$stmt->bindParam(':cEmailAddress', $_POST['contactEmail'], PDO::PARAM_STR);
$stmt->bindParam(':cSubject', str_replace(" ", "_", $_POST['contactSubject']), PDO::PARAM_STR);
$stmt->bindParam(':cMessage', str_replace(" ", "_", $_POST['contactMessage']), PDO::PARAM_STR);
$stmt->execute();
header('Location: index.php#contactPage');
 ?>
