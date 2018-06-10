<?php
require_once('lib/nusoap.php');

if ( isset( $_POST['submit'] ) ) {
$team = $_POST['team'];	
$c = new soapclient('http://localhost/RNWA2018/webService/server.php');
$data = $c->call('getData',
array('symbol' => $team));

if($data == NULL){
	echo "NULL<br>";
}

echo "Igrači odabranog tima:<br> $data";
echo "<br>";
//print_r($data);
}
 
?>

