<?php
include('conn.inc.php');
include('includes/conn.inc.php');
$emailAddress = $_POST['emailAddress'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
if ($password == $passwordConfirm) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(emailAddress, password, firstName, lastName) VALUES (:emailAddress, :password, :firstName, :lastName);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':emailAddress', $emailAddress, PDO::PARAM_STR);
    $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->execute();
    header('Location: ../index.php');
}
else {
    header('Location: ../index.php#registrationSection');
}
?>
