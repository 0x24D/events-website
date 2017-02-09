<?php
require_once('includes/conn.inc.php');
$reserveSQL = "INSERT INTO userReservations(userID, eventID, eventName, venueName, venueAddress, eventDate) VALUES (:userID, :eventID, :eventName, :venueName, :venueAddress, :eventDate)";
$reserveStmt = $pdo->prepare($reserveSQL);

require_once('includes/skiddle.inc.php');
$json_url = $eventsEndpoint.$_POST['eventID'].'/'.$apiKey.;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $json_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json',
    'X-HTTP-Method-Override: GET'
));
curl_setopt($ch, CURLOPT_HEADER, false);
$result =  curl_exec($ch);
if($result === false || curl_error($ch)) {
    curl_close($ch);
} else {
    curl_close($ch);
    $json = json_decode($result, true);
    $reserveStmt->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
    $reserveStmt->bindParam(':eventID', $_POST['eventID'], PDO::PARAM_INT);
    $reserveStmt->bindParam(':eventName', str_replace(' ', '_', $json['results'][0]['eventname']), PDO::PARAM_STR);
    $reserveStmt->bindParam(':venueName`', str_replace(' ', '_', $json['results'][0]['venue']['name']), PDO::PARAM_STR);
    $reserveStmt->bindParam(':venueAddress', str_replace(' ', '_', $json['results'][0]['venue']['address']), PDO::PARAM_STR);
    $reserveStmt->bindParam(':eventDate', $json['results'][0]['date'], PDO::PARAM_STR);
    $reserveStmt->execute();
    header('Location: ../index.php#profileSection');
}
