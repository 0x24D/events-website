<?php
require_once('conn.inc.php');
$editProcessSQL = "DELETE FROM cities  WHERE id = :id";
$editProcessStmt = $pdo->prepare($editProcessSQL);
$editProcessStmt->bindParam(':id', $_POST['deleteCMSID'], PDO::PARAM_INT);
$editProcessStmt->execute();
header('Location: ../index.php#deleteCMSSection');
?>
