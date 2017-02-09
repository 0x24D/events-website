<?php
//sql
require_once('includes/conn.inc.php');
$sql = 'SELECT latitude, longitude FROM cities WHERE city ="' . $_POST['city'] .'" && area ="' . $_POST['area'] . '" && country ="' . $_POST['country'] . '";';
$stmt = $pdo->query($sql);
$row =$stmt->fetchObject();
$latitude = '&latitude='.$row->latitude;
$longitude = '&longitude='.$row->longitude;
//php functions
function setDateStyle($date){
    return (date("Y-m-d",strtotime($date)));
}
function setCheckboxValue($checkbox){
    if ($checkbox == 'true') {
        return '1';
    }
    else {
        return '0';
    }
}
function checkEmptyPostValue($value){
    if ((empty($_POST[$value])) || $_POST[$value] == 'base') {
        return true;
    }
    else {
        return false;
    }
}
//json
require_once('includes/skiddle.inc.php');
$radius='';
$limit='';
$order='';
$eventCode='';
$minDate='';
$maxDate='';
if (!checkEmptyPostValue('radius')) {
    $radius = '&radius='.$_POST['radius'];
}
if (!checkEmptyPostValue('limit')) {
    $limit = '&limit='.$_POST['records'];
}
if (!checkEmptyPostValue('order')) {
    $order = '&order='.$_POST['order'];
}
if (!checkEmptyPostValue('eventCode')) {
    $eventCode = '&eventcode='.$_POST['eventCode'];
}
if (!checkEmptyPostValue('minDate')) {
    $minDate = '&minDate='.setDateStyle($_POST['minDate']);
}
if (!checkEmptyPostValue('maxDate')) {
    $maxDate = '&maxDate='.setDateStyle($_POST['maxDate']);
}
$specialFeatured = '&specialFeatured='.setCheckboxValue($_POST['recommended']);
$ticketsAvailable = '&ticketsavailable='.setCheckboxValue($_POST['tickets']);
$under18 = '&under18='.setCheckboxValue($_POST['over18']);
$json_url = $eventsEndpoint.$apiKey.$latitude.$longitude.$radius.$limit.$order.$eventCode.$minDate.$maxDate.$specialFeatured.$ticketsAvailable.$under18;
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
    for ($i=0; $i < $_POST['records']; $i++) {
        if(!empty($json['results'][$i])){
            ?>
            <p>
                Event: <?php echo $json['results'][$i]['eventname']?><br>
                Venue: <?php echo $json['results'][$i]['venue']['name']?><br>
                Address: <?php echo $json['results'][$i]['venue']['address']?>
                Town: <?php echo $json['results'][$i]['venue']['town']?>
                Postcode: <?php echo strtoupper($json['results'][$i]['venue']['postcode'])?><br>
                Date: <?php echo date("d-m-Y", strtotime($json['results'][$i]['date'])); ?><br>
                Doors open: <?php echo date("H:i", strtotime($json['results'][$i]['openingtimes']['doorsopen']))?>
                Last entry: <?php echo date("H:i", strtotime($json['results'][$i]['openingtimes']['lastentry']))?>
                Doors close: <?php echo date("H:i", strtotime($json['results'][$i]['openingtimes']['doorsclose']))?><br>
                <a href="<?php echo $eventsEndpoint.$json['results'][$i]['id'].'/'.$apiKey?>">Details</a> <!-- remove if not completing -->
            </p>
            <br/>
            <?php
        }
        elseif ($i == 0) {
            ?><p>No events found.</p><?php
        }
    }
}
?>
