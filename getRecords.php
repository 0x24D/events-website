<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//sql
require_once('includes/conn.inc.php');

$radius = $_POST['radius'];
$records = $_POST['records'];
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
?>
<tr>
<th>Event</th>
<th>Venue</th>
<th>Address</th>
<th>Town</th>
<th>Postcode</th>
<th>Date</th>
<th>Open</th>
<th>Last entry</th>
<th>Close</th>
</tr>
<br/>
<?php
  for ($i=0; $i < $_POST['records']; $i++) { //number of records from dropdown list
      ?>
      <tr>
      <td><?php echo $json['results'][$i]['eventname']?></td>
      <td><?php echo $json['results'][$i]['venue']['name']?></td>
      <td><?php echo $json['results'][$i]['venue']['address']?></td>
      <td><?php echo $json['results'][$i]['venue']['town']?></td>
      <td><?php echo strtoupper($json['results'][$i]['venue']['postcode'])?></td> //force uppercase
      <td><?php echo date("d-m-Y", strtotime($json['results'][$i]['date'])); ?></td> //change date format
      <td><?php echo $json['results'][$i]['openingtimes']['doorsopen']?></td>
      <td><?php echo $json['results'][$i]['openingtimes']['lastentry']?></td>
      <td><?php echo $json['results'][$i]['openingtimes']['doorsclose']?></td>
  </tr>
  <br/>
      <?php
  }
  ?>
  <tr>
      <?php
      for ($i=0; $i < $json['totalcount']; $i += $_POST['records']) {
          $page = 1;
          ?> <a href="#"> <?php echo $page; ?></a>
          <?php
          $page++;
      }
       ?>
  </tr>
<?php
}
?>
