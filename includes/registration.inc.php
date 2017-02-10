<h2>Registration page</h2>
<form action="includes/checkRegistration.inc.php" method="post">
    <label for="firstName">First name: </label><br>
    <input type="text" name="firstName" id="firstName" placeholder="First Name"><br>
    <label for="lastName">Surname: </label><br>
    <input type="text" name="lastName" id="lastName" placeholder="Surname"><br>
    <label for="emailAddress">Email address: </label><br>
    <input type="text" name="emailAddress" id="emailAddress" placeholder="Email Address"><br>
    <label for="password">Password: </label><br>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <label for="passwordConfirm">Password confirmation: </label><br>
    <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Password confirmation"><br>
    <input type="submit" name="userRegisterButton" id="userRegisterButton" value="Register">
</form>
