<?php
require_once('sessions.inc.php');
if (isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-3600, '/events','localhost',0,1);
}
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
exit();
 ?>
