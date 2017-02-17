<?php
require_once('sessions.inc.php');
require_once('conn.inc.php');
$sql = "SELECT * FROM users WHERE emailAddress = :emailAddress;";
$stmt = $pdo->prepare($sql);
$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];
$stmt->bindParam(':emailAddress', $emailAddress, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['login'] = 1;
        $_SESSION['userID'] = $row['id'];
        if ($row['userGroup'] == '2') {
            $_SESSION['admin'] = 1;
        }
    }
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>
