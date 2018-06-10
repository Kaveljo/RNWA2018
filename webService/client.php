<?php

$conn = new mysqli('localhost', 'root', '', 'rezultati') 
or die ('Cannot connect to db');
	
	$html = "
	<head>
		<title>Timovi</title>
		<meta charset='UTF-8'>
		<link href='../css/style.css' rel='stylesheet' type='text/css' />
		<link href='../remake.css' rel='stylesheet' type='text/css' />
		<meta name='viewport' content='width=device-width, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0'>
	</head>
	";
	echo "$html";
	
    $result = $conn->query("SELECT id, tim FROM timovi ORDER BY tim");

    echo "<html>";
    echo "<body>";
	echo "<a class='srcBtn button' href='../home.php'>Početna</a>";
	echo "<form action='client.php' method='post'>";
    echo "<select name='team'>";
	echo "<option value='' selected hidden>Odaberite tim</option>";

    while ($row = $result->fetch_assoc()) {

                  unset($team);
                  $team = $row['tim'];
                  $id = $row['id']; 
                  echo '<option value="'.$id.'">'.$team.'</option>';

}

    echo "</select>&emsp;";
	echo "<input type='submit' name='submit' value='Pretraži'/>";
	echo "</form>";
    echo "</body>";
    echo "</html>";
?>


<?php
require_once('lib/nusoap.php');

if ( isset( $_POST['submit'] ) ) {
$team = $_POST['team'];	
$c = new soapclient('http://localhost/RNWA2018/webService/server.php');
$data = $c->call('getData',
array('symbol' => $team));

if($data == NULL){
	echo "<font color='red'>Taj tim nema upisanih igrača u bazi! </font><br>";
	}

	else{
	echo "<font style='font-weight: bold;'> Igrači odabranog tima:<br> $data</font>";
	echo "<br>";
	//print_r($data);
		}
}
 
?>

