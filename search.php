<?php
require 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>esports Rezultati</title>
		<meta charset="UTF-8">
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="remake.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	</head>
	<body>
		<div class='search-space' method="post">
			<form method="post" action="" > 
				<input type="text" class="searchfield" name="srcField" placeholder="Type in team name or gamer's tag..."></input>
				<input type="submit" class="srcBtn" name="trazi" value="Search"></input>
				<a href="home.php" class="backBtn">Go Back</a>
			</form>
		</div>
		<div class="src-result">
			<?php
				if(isset($_POST['srcField'])){
					$pojam=$_POST['srcField'];
				}
				if(isset($_POST["trazi"])){
					$sql = mysqli_query($mysqli,"SELECT * FROM timovi WHERE tim='$pojam'");
					if(mysqli_num_rows($sql)>0){?>
						<table class="results-table">
							<thead><tr class="tournament-header" ><td colspan="2">Informacije o timu</td></tr></thead>
							<tbody>
					<?php
						$qry = "SELECT * FROM timovi WHERE tim='$pojam'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
							while($row = mysqli_fetch_array($result)):
								$keyMjesto=$row['FK_Mjesto'];
								$keyIgraci=$row['id'];
								?>
								<tr>
									<td class="tournament-game inform">Ime tima</td>
									<td class="tournament-game inform"><?php echo $pojam;?></td>
								</tr>
								<?php
							endwhile;
						
						$qry = "SELECT * FROM mjesto WHERE id='$keyMjesto'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
							while($row = mysqli_fetch_array($result)):
								?>
								<tr>
									<td class="tournament-game inform">Mjesto osnivanja</td>
									<td class="tournament-game inform"><?php echo $row['Drzava'],", ",$row['Grad'];?></td>
								</tr>
								<?php
							endwhile;
							
						$qry = "SELECT * FROM igraci WHERE FK_Team='$keyIgraci'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								?>
								<tr>
									<td class="tournament-game inform">Igraci</td><td class="tournament-game inform"><?php
									while($row = mysqli_fetch_array($result)):
										echo $row['Ime'],' "',$row['Game_tag'],'" ',$row['Prezime'];?><br><?php
									endwhile;
									?>
								</td>
							</tr>
							<?php
						
					}
						
					else{
						$sql = mysqli_query($mysqli,"SELECT * FROM igraci WHERE Game_tag='$pojam'");
						if(mysqli_num_rows($sql)>0){
							?>
						<table class="results-table">
							<thead><tr class="tournament-header" ><td colspan="2">Informacije o igracu</td></tr></thead>
							<tbody>
					<?php
						$qry = "SELECT * FROM igraci WHERE Game_tag='$pojam'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
							while($row = mysqli_fetch_array($result)):
								$keyMjesto=$row['FK_Mjesto'];
								$keyTeam=$row['FK_Team'];
								?>
								<tr>
									<td class="tournament-game inform">Ime igraca</td>
									<td class="tournament-game inform"><?php echo $row['Ime'],' "',$row['Game_tag'],'" ',$row['Prezime'];?></td>
								</tr>
								<?php
							endwhile;
						
						$qry = "SELECT * FROM mjesto WHERE id='$keyMjesto'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
							while($row = mysqli_fetch_array($result)):
								?>
								<tr>
									<td class="tournament-game inform">Mjesto podrijetla</td>
									<td class="tournament-game inform"><?php echo $row['Drzava'],", ",$row['Grad'];?></td>
								</tr>
								<?php
							endwhile;
							
							
						$qry = "SELECT * FROM timovi WHERE id='$keyTeam'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
							while($row = mysqli_fetch_array($result)):
								?>
								<tr>
									<td class="tournament-game inform">Igra za tim</td>
									<td class="tournament-game inform"><?php echo $row['tim'];?></td>
								</tr>
								<?php
							endwhile;
						}
						else{
							echo '<script language="javascript">';
							echo 'alert("Not existing data !")';
							echo '</script>';
						}
					}
				}
			?>
		</div>
	<script src="js/script.js"></script>
	</body>
</html>