<?php
session_start();
require 'db.php';

$result = mysqli_query($mysqli, "SELECT igraci.id, Ime,Prezime, Game_tag, tim FROM igraci JOIN timovi ON igraci.FK_Team = timovi.id ORDER by tim, ime ASC");
//$result = mysqli_query($mysqli, "SELECT * FROM igraci");
?>

<html>
<head>	
	<title>Dodavanje igraca</title>
</head>

<body>
<a href="create.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Ime</td>
		<td>Prezime</td>
		<td>Game tag</td>
		<td>Team</td>
		<td colspan="2">Actions</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['Ime']."</td>";
		echo "<td>".$res['Prezime']."</td>";
		echo "<td>".$res['Game_tag']."</td>";	
		echo "<td>".$res['tim']."</td>";
		echo "<td><a href=\"update.php?id=$res[id]\">Update</a></td>";
		echo "<td><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Želite li izbrisati ovog igrača?')\">Delete</a></td>";		
				
	}
	?>
	</table>
	
<a href="index.php">Home</a>
</body>
</html>
