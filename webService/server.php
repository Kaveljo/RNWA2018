<?php

function getData($symbol) {
$conn=mysqli_connect('localhost','root','','rezultati');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$query = "SELECT Ime, Prezime, Game_tag FROM igraci WHERE FK_Team = '$symbol'";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)){
	$res .= $row['Ime']." ".$row['Prezime']." - ".$row['Game_tag']."<br>";
}

//$res = $row['Ime'].$row['Prezime'].$row['Game_tag'];
mysqli_close($conn);
return $res;
} 


require('lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('server', 'urn:esportTeams');

$server->register("getData",
array('symbol' => 'xsd:string'),
array('return' => 'xsd:string'),
'urn:esportTeams',
'urn:esportTeams#getData');

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)
? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?>
