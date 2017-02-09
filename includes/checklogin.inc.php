<?php
require_once('sessions.inc.php');
require_once('conn.inc.php');
$sql = "SELECT emailAddress, password FROM users;";
if ($_POST['username'] == "admin" && $_POST['password'] == "letmein"){
    $_SESSION['login'] = 1;
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>
