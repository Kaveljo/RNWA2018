<?php
session_start();
require 'db.php';
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
        <div class="search-space">    
			<a href="search.php" class="button">Search info about teams and players</a>
			<form method="post" action="" > 
				<input type="text" class="searchfield" name="srcField" placeholder="Input team name to find out results"></input>
				<input type="submit" class="srcBtn" name="trazi" value="Search"></input>
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
							<thead><tr class="tournament-header" ><td colspan="3">Match information</td></tr></thead>
							<tbody>
								<tr>
									<td class="tournament-game" style="font-weight:bold">Team A</td>
									<td class="tournament-game game-result" style="font-weight:bold">Result</td>
									<td class="tournament-game" style="font-weight:bold">Team B</td>
								</tr>
					<?php
						//search for team
						$qry = "SELECT * FROM timovi WHERE tim='$pojam'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
							while($row = mysqli_fetch_array($result)):
								$keyParticipant=$row['id'];
							endwhile;
						
						//search for duel
						$sql = mysqli_query($mysqli,"SELECT * FROM duel WHERE FK_Team1='$keyParticipant' or FK_Team2='$keyParticipant'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM duel WHERE FK_Team1='$keyParticipant' or FK_Team2='$keyParticipant'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
									$team1=$row['FK_Team1'];
									$team2=$row['FK_Team2'];
									$keyMatch=$row['id'];
								endwhile;
						
						
						// get the table out
						
						//team 1
						$sql = mysqli_query($mysqli,"SELECT * FROM timovi WHERE id='$team1'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM timovi WHERE id='$team1'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
								?>
								<tr><td class="tournament-game inform"><?php echo $row['tim'];?></td>
								<?php
								endwhile;
						}
						
						//result
						$sql = mysqli_query($mysqli,"SELECT * FROM mecevi WHERE FK_Duel='$keyMatch'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM mecevi WHERE FK_Duel='$keyMatch'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
								?>
								<td class="tournament-game game-result"><?php echo $row['rezultat'];?></td>
								<?php
								endwhile;
						}
						
						//team 2
						$sql = mysqli_query($mysqli,"SELECT * FROM timovi WHERE id='$team2'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM timovi WHERE id='$team2'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
								?>
								<td class="tournament-game inform"><?php echo $row['tim'];?></td></tr>
								<?php
								endwhile;
						}
						}else{
							echo '<script language="javascript">';
							echo 'alert("That team is not playing!")';
							echo '</script>';
						}
					}else{
						$sql = mysqli_query($mysqli,"SELECT * FROM igraci WHERE Game_tag='$pojam'");
						if(mysqli_num_rows($sql)>0){
							?>
						<table class="results-table">
							<thead><tr class="tournament-header" ><td colspan="3">Match information</td></tr></thead>
							<tbody>
								<tr>
									<td class="tournament-game" style="font-weight:bold">Team A</td>
									<td class="tournament-game game-result" style="font-weight:bold">Result</td>
									<td class="tournament-game" style="font-weight:bold">Team B</td>
								</tr>
						<?php
						$qry = "SELECT * FROM igraci WHERE Game_tag='$pojam'";
						$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
							while($row = mysqli_fetch_array($result)):
								$keyTeam=$row['FK_Team'];
							endwhile;
						
						//search for duel
						$sql = mysqli_query($mysqli,"SELECT * FROM duel WHERE FK_Team1='$keyTeam' or FK_Team2='$keyTeam'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM duel WHERE FK_Team1='$keyTeam' or FK_Team2='$keyTeam'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
									$team1=$row['FK_Team1'];
									$team2=$row['FK_Team2'];
									$keyMatch=$row['id'];
								endwhile;
						
						
						// get the table out
						
						//team 1
						$sql = mysqli_query($mysqli,"SELECT * FROM timovi WHERE id='$team1'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM timovi WHERE id='$team1'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
								?>
								<tr><td class="tournament-game inform"><?php echo $row['tim'];?></td>
								<?php
								endwhile;
						}
						
						//result
						$sql = mysqli_query($mysqli,"SELECT * FROM mecevi WHERE FK_Duel='$keyMatch'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM mecevi WHERE FK_Duel='$keyMatch'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
								?>
								<td class="tournament-game game-result"><?php echo $row['rezultat'];?></td>
								<?php
								endwhile;
						}
						
						//team 2
						$sql = mysqli_query($mysqli,"SELECT * FROM timovi WHERE id='$team2'");
						if(mysqli_num_rows($sql)>0){
							$qry = "SELECT * FROM timovi WHERE id='$team2'";
							$result = mysqli_query($mysqli,$qry)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):
								?>
								<td class="tournament-game inform"><?php echo $row['tim'];?></td></tr>
								<?php
								endwhile;
						}
						}else{
							echo '<script language="javascript">';
							echo 'alert("Team of that player is not playing!")';
							echo '</script>';
						}
											
					}
				}
			}	
			?>
		</div>
		
		<div>
			<a href="crud.php" class="srcBtn">Pregled postojećih igrača i dodavanje novih</a>
		</div>
		
		<script src="js/script.js"></script>
	</body>
</html>