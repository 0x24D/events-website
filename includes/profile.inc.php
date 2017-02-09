<?php
$profileSQL = "SELECT * FROM users WHERE id = :id;";
$profileStmt = $pdo->prepare($profileSQL);
$profileStmt->bindParam(':id', $_SESSION['userID'], PDO::PARAM_INT);
$profileStmt->execute();
$profileRow = $profileStmt->fetchObject();
?>

<h2>User Profile</h2>

<h3>Hello <?php echo $profileRow->firstName; ?> !</h3>

<p>Your account details are:<br>
Account ID: <?php echo $profileRow->id;?><br>
Account group: <?php if ($profileRow->userGroup == '2'){echo 'Administrator';} else {echo 'Standard User';}?><br>
Name: <?php echo $profileRow->firstName;?> <?php echo $profileRow->lastName; ?><br>
Email address: <?php echo $profileRow->emailAddress;?></p>
