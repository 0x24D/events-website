<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('includes/skiddle.inc.php');
$json_url = $eventsEndpoint.'?api_key='.$apiKey;
// echo $eventsEndpoint;
// echo '?api_key=';
// echo $apiKey;
// $headers = array();
// $headers[] = 'Content-type: application/json';
// $headers[] = 'X-HTTP-Method-Override: GET';
// echo $headers;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $json_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array($headers));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json',
    'X-HTTP-Method-Override: GET'
));
curl_setopt($ch, CURLOPT_HEADER, 0);
// Getting jSON result string
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
<th>Country</th>
<th>Date</th>
<th>Open</th>
<th>Last entry</th>
<th>Close</th>
</tr>
<br/>
<?php
  for ($i=0; $i < 20; $i++) { //20 records by default
      ?>
      <tr>
      <td><?php echo $json['results'][$i]['eventname']?></td>
      <td><?php echo $json['results'][$i]['venue']['name']?></td>
      <td><?php echo $json['results'][$i]['venue']['address']?></td>
      <td><?php echo $json['results'][$i]['venue']['town']?></td>
      <td><?php echo $json['results'][$i]['venue']['postcode']?></td>
      <td><?php echo $json['results'][$i]['venue']['country']?></td>
      <td><?php echo $json['results'][$i]['date']?></td>
      <td><?php echo $json['results'][$i]['openingtimes']['doorsopen']?></td>
      <td><?php echo $json['results'][$i]['openingtimes']['lastentry']?></td>
      <td><?php echo $json['results'][$i]['openingtimes']['doorsclose']?></td>
  </tr>
  <br/>
      <?php
  }
  ?>
<?php
}
?>
