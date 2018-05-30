<html>
<head>
	<title>Dodavanje igraca</title>
</head>

<body>
<?php
//including the database connection file
include_once("db.php");

if(isset($_POST['Submit'])) {	
	$ime = mysqli_real_escape_string($mysqli, $_POST['ime']);
	$prezime = mysqli_real_escape_string($mysqli, $_POST['prezime']);
	$gametag = mysqli_real_escape_string($mysqli, $_POST['gametag']);
	$team = mysqli_real_escape_string($mysqli, $_POST['team']);
		
	// checking empty fields
	if(empty($ime) || empty($prezime) || empty($gametag) | empty($team)) {
				
		if(empty($ime)) {
			echo "<font color='red'>Polje 'Ime' je prazno.</font><br/>";
		}
		
		if(empty($prezime)) {
			echo "<font color='red'>Polje 'Prezime' je prazno.</font><br/>";
		}
		
		if(empty($gametag)) {
			echo "<font color='red'>Polje 'Gametag' je prazno.</font><br/>";
		}
		if(empty($team)) {
			echo "<font color='red'>Polje 'Team' je prazno.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		//$result = mysqli_query($mysqli, "INSERT INTO igraci(Ime,Prezime,Game_tag) VALUES('$ime','$prezime','$gametag')");		
	
			$check=mysqli_query($mysqli," SELECT * FROM igraci WHERE Game_tag  ='$gametag' ");
			$checkrows=mysqli_num_rows($check);

			if($checkrows>0) {
				echo "Igrač sa tim game tagom vec postoji!";
				echo "<br/><a href='create.html'>Vrati se natrag</a>";
			}
			else {  

					mysqli_begin_transaction($mysqli);
					mysqli_query($mysqli, "INSERT INTO timovi (tim) VALUES('$team')");
					mysqli_query($mysqli, "SET @idt = (SELECT id FROM timovi ORDER BY id DESC LIMIT 1)");
					mysqli_query($mysqli, "INSERT INTO igraci (FK_Team, Ime, Prezime, Game_tag) VALUES(@idt, '$ime', '$prezime', '$gametag')");
					mysqli_commit($mysqli);
					mysqli_close($mysqli);
		
					echo "Igrac: $ime $prezime, $gametag, $team<br/>";
					echo "<font color='green'>Igrač uspješno dodan.";
					echo "<br/><a href='crud.php'>Pogledaj rezultat</a>";
			}
	}
}
?>
</body>
</html>
