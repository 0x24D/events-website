<?php require_once('sessions.inc.php'); ?>
<?php if (isset($_SESSION['admin'])){
echo '<input type="submit" name="adminButton" id="adminButton" value="CMS">';
}?>
<input type="submit" name="profileButton" id="profileButton" value="Profile">
<form action="includes/logout.inc.php" method="post">
<input type="submit" name="logout" id="logout" value="Logout">
</form>
