<?php require_once('sessions.inc.php');
echo '<input type="submit" class="homePageButton" name="eventsButton" id="eventsButton" value="Events"><br>';
if (isset($_SESSION['login'])) {
    if (isset($_SESSION['admin'])){
        echo '<input type="submit" name="adminButton" id="adminButton" value="CMS">';
    }
    echo '<input type="submit" name="profileButton" id="profileButton" value="Profile">';
}
else {
    echo '<label for="registrationButton">Don\'t have an account? Register here: </label><br>';
    echo '<input type="submit" class="homePageButton" name="registrationButton" id="registrationButton" value="Register">';
}
?>
