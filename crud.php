<?php
session_start();

require 'db.php';

$result = mysqli_query($mysqli, "SELECT igraci.id, Ime,Prezime, Game_tag, tim FROM igraci JOIN timovi ON igraci.FK_Team = timovi.id ORDER by tim, ime ASC");
//$result = mysqli_query($mysqli, "SELECT * FROM igraci");
?>

<html>
<head>	
	
	<title>Pregled igrača</title>
	<meta charset="UTF-8">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="remake.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	
</head>

<body>
<a class="srcBtn button" href="create.html">Dodaj novog igraca</a>
<a class="srcBtn button" href="home.php">Početna</a>

	<table width='80%' border=0 class="results-table">

	<tr bgcolor='#CCCCCC' >
		<td class="tournament-header">Ime</td>
		<td class="tournament-header">Prezime</td>
		<td class="tournament-header">Game tag</td>
		<td class="tournament-header">Team</td>
		<td colspan="2" class="tournament-header">Actions</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td class='tournament-game'>".$res['Ime']."</td>";
		echo "<td class='tournament-game'>".$res['Prezime']."</td>";
		echo "<td class='tournament-game'>".$res['Game_tag']."</td>";	
		echo "<td class='tournament-game'>".$res['tim']."</td>";
		echo "<td class='tournament-game'><a href=\"update.php?id=$res[id]\">Update</a></td>";
		echo "<td class='tournament-game'><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Želite li izbrisati ovog igrača?')\">Delete</a></td>";		
				
	}
	?>
	</table>
	
</body>
</html>
