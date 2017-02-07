<?php
//sql
require_once('includes/conn.inc.php');
$sql = 'SELECT latitude, longitude FROM cities WHERE city ="' . $_POST['city'] .'" && area ="' . $_POST['area'] . '" && country ="' . $_POST['country'] . '";';
$stmt = $pdo->query($sql);
$row =$stmt->fetchObject();
$latitude = $row->latitude;
$longitude = $row->longitude;
//json
require_once('includes/skiddle.inc.php');
$json_url = $eventsEndpoint.'?api_key='.$apiKey.'&latitude='.$latitude.'&longitude='.$longitude.'&radius='.$_POST['radius'].'&limit='.$_POST['records'];
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
                Doors open: <?php echo $json['results'][$i]['openingtimes']['doorsopen']?>
                Last entry: <?php echo $json['results'][$i]['openingtimes']['lastentry']?>
                Doors close: <?php echo $json['results'][$i]['openingtimes']['doorsclose']?>
            </p>
            <br/>
            <?php
            elseif ($i == 0) {
                ?><p><?php echo 'No events found.' ?></p>
        <?php}
        }
    }?>

    <tr>
        <?php
        $page = 1;
        for ($i=0; $i < $json['totalcount']; $i += $_POST['records']) {
            ?> <a href="#"> <?php echo $page; ?></a>
            <?php
            $page++;
        }
        ?>
    </tr>
    <?php
}
?>
