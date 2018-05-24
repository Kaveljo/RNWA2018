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
        <div class="menu">
            <div class="frame">   
                <table class="menu-list">
                    <thead class="menu-list-head">
                        <tr>
                            <td style="aling:center">ESPORTS</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="game-name">
                                <button id="home" class="nav-btn" onclick="esport(this.id)">Home</button>
                            </td>
                        </tr>
						<?php	$sql = "SELECT * FROM esport ";
							$result = mysqli_query($mysqli,$sql)or die(mysqli_error());
								while($row = mysqli_fetch_array($result)):?>
							 <tr>
                                <td class="game-name">
                                    <button id="<?php echo $row['Ime_Esporta']; ?>" class="nav-btn" onclick="esport(this.id)"><?php echo $row['Ime_Esporta']; ?></button>
                                </td>
							</tr>
						<?php 
						endwhile;
						?>
                    </tbody>
                </table> 
			</div>
        </div>
        <div class ="results">
                <div class="phone-btn" onclick="openNav()">
                    <span style="font-size:30px;cursor:pointer"  class>&#9776; ESPORTS</span>
                </div>
                <div id="myNav" class="overlay">
                        <span class="closebtn" onclick="closeNav()">&times;</span>
                            <div class="overlay-content">
                                <span phoneId="home" onclick="phone_menu(this.getAttribute('phoneId'))">Home</span>
                                <?php	$sql = "SELECT * FROM esport ";
									$result = mysqli_query($mysqli,$sql)or die(mysqli_error());
										while($row = mysqli_fetch_array($result)):?>
											<span phoneId="<?php echo $row['Ime_Esporta']; ?>" onclick="phone_menu(this.getAttribute('phoneId'))"><?php echo $row['Ime_Esporta']; ?></span>
								<?php 
								endwhile;
						?>
                            </div>
                    </div>
				<a href="search.php" class="button">Search</a>
                <table class="results-table League Of Legends">
                        <thead>
                            <tr class="tournament-header">
                                <td class="tournament-logo"><img src="css/images/lol.png" class="esports-logo"></td>
                                <td class="tournament-name" colspan="4">NA LCS 2018 Arizona</td>
                                <td class="game-date">06-04-2018</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tournament-game">
                                <td class="game-start-time">13:00</td>
                                <td class="game-status">Finished</td>
                                <td class="game-home-team">EnVyUs</td>
                                <td class="game-result">3:1</td>
                                <td class="game-away-team">Virtus.Pro</td>
                                <td class="game-round">Quater-final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">16:00</td>
                                    <td class="game-status">Finished</td>
                                    <td class="game-home-team">FaZe</td>
                                    <td class="game-result">0:3</td>
                                    <td class="game-away-team">G2 eSports</td>
                                    <td class="game-round">Quater-final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">19:00</td>
                                    <td class="game-status">Playing</td>
                                    <td class="game-home-team">Newbee</td>
                                    <td class="game-result">1:1</td>
                                    <td class="game-away-team">Team Liquid</td>
                                    <td class="game-round">Quater-final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">22:00</td>
                                    <td class="game-status"></td>
                                    <td class="game-home-team">G Force</td>
                                    <td class="game-result">:</td>
                                    <td class="game-away-team">KlikTech</td>
                                    <td class="game-round">Quater-final</td>
                            </tr>
                        </tbody>
                </table>

                <table class="results-table League Of Legends">
                        <thead>
                            <tr class="tournament-header">
                                <td class="tournament-logo league"><img src="css/images/lol.png" class="esports-logo"></td>
                                <td class="tournament-name" colspan="4">NA LCS 2018 Texas</td>
                                <td class="game-date">06-04-2018</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tournament-game">
                                <td class="game-start-time">12:30</td>
                                <td class="game-status">Finished</td>
                                <td class="game-home-team">OpTic</td>
                                <td class="game-result">3:2</td>
                                <td class="game-away-team">EDward</td>
                                <td class="game-round">Semi-Final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">15:30</td>
                                    <td class="game-status">Finished</td>
                                    <td class="game-home-team">Vici Gaming</td>
                                    <td class="game-result">3:0</td>
                                    <td class="game-away-team">Heroic</td>
                                    <td class="game-round">Semi-Final</td>
                            </tr>
                        </tbody>
                </table>

                <table class="results-table CSGO">
                        <thead>
                            <tr class="tournament-header">
                                <td class="tournament-logo"><img src="css/images/csgo.png" class="esports-logo"></td>
                                <td class="tournament-name" colspan="4">EU LCS 2018 Moscow</td>
                                <td class="game-date">06-04-2018</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tournament-game">
                                <td class="game-start-time">16:00</td>
                                <td class="game-status">Finished</td>
                                <td class="game-home-team">Team Liquid</td>
                                <td class="game-result">2:1</td>
                                <td class="game-away-team">Virtus.Pro</td>
                                <td class="game-round">Quater-final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">16:00</td>
                                    <td class="game-status">Finished</td>
                                    <td class="game-home-team">G Force</td>
                                    <td class="game-result">0:2</td>
                                    <td class="game-away-team">Newbee</td>
                                    <td class="game-round">Quater-final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">19:00</td>
                                    <td class="game-status">Playing</td>
                                    <td class="game-home-team">G2 eSports</td>
                                    <td class="game-result">1:1</td>
                                    <td class="game-away-team">EnVyUs</td>
                                    <td class="game-round">Quater-final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">19:00</td>
                                    <td class="game-status"></td>
                                    <td class="game-home-team">FaZe</td>
                                    <td class="game-result">0:1</td>
                                    <td class="game-away-team">KlikTech</td>
                                    <td class="game-round">Quater-final</td>
                            </tr>
                        </tbody>
                </table>

                <table class="results-table dota2">
                        <thead>
                            <tr class="tournament-header">
                                <td class="tournament-logo"><img src="css/images/dota2.png" class="esports-logo"></td>
                                <td class="tournament-name" colspan="4">EU OLU 2018 London</td>
                                <td class="game-date">06-04-2018</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tournament-game">
                                <td class="game-start-time">12:00</td>
                                <td class="game-status">Finished</td>
                                <td class="game-home-team">Evil Geniuses</td>
                                <td class="game-result">2:3</td>
                                <td class="game-away-team">Virtus.Pro</td>
                                <td class="game-round">Round 1</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">12:00</td>
                                    <td class="game-status">Finished</td>
                                    <td class="game-home-team">G Force</td>
                                    <td class="game-result">3:2</td>
                                    <td class="game-away-team">LGD Gaming</td>
                                    <td class="game-round">Round 1</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">15:00</td>
                                    <td class="game-status">Finished</td>
                                    <td class="game-home-team">G2 eSports</td>
                                    <td class="game-result">3:0</td>
                                    <td class="game-away-team">Newbee</td>
                                    <td class="game-round">Round 1</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">15:00</td>
                                    <td class="game-status">Finished</td>
                                    <td class="game-home-team">FaZe</td>
                                    <td class="game-result">3:1</td>
                                    <td class="game-away-team">EnVyUs</td>
                                    <td class="game-round">Round 1</td>
                            </tr>

                            <tr class="tournament-game">
                                <td class="game-start-time">18:00</td>
                                <td class="game-status">Playing</td>
                                <td class="game-home-team">Team Liquid</td>
                                <td class="game-result">0:1</td>
                                <td class="game-away-team">Vici Gaming</td>
                                <td class="game-round">Round 1</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">18:00</td>
                                    <td class="game-status">Playing</td>
                                    <td class="game-home-team">Na'Vi</td>
                                    <td class="game-result">0:2</td>
                                    <td class="game-away-team">Cloud9</td>
                                    <td class="game-round">Round 1</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">21:00</td>
                                    <td class="game-status"></td>
                                    <td class="game-home-team">Digital Chaos</td>
                                    <td class="game-result">:</td>
                                    <td class="game-away-team">MVP</td>
                                    <td class="game-round">Round 1</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">21:00</td>
                                    <td class="game-status"></td>
                                    <td class="game-home-team">Team DK</td>
                                    <td class="game-result">:</td>
                                    <td class="game-away-team">Fnatic</td>
                                    <td class="game-round">Round 1</td>
                            </tr>
                        </tbody>
                </table>

                <table class="results-table hs">
                        <thead>
                            <tr class="tournament-header">
                                <td class="tournament-logo league"><img src="css/images/hs.png" class="esports-logo"></td>
                                <td class="tournament-name" colspan="4">Asia Tour 2018 Tokyo</td>
                                <td class="game-date">06-04-2018</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tournament-game">
                                <td class="game-start-time">12:30</td>
                                <td class="game-status">Finished</td>
                                <td class="game-home-team">OpTic</td>
                                <td class="game-result">3:2</td>
                                <td class="game-away-team">EDward</td>
                                <td class="game-round">Semi-Final</td>
                            </tr>
                            <tr class="tournament-game">
                                    <td class="game-start-time">15:30</td>
                                    <td class="game-status">Finished</td>
                                    <td class="game-home-team">Vici Gaming</td>
                                    <td class="game-result">0:3</td>
                                    <td class="game-away-team">Heroic</td>
                                    <td class="game-round">Semi-Final</td>
                            </tr>
                        </tbody>
                </table>
            </div>
		<script src="js/script.js"></script>
	</body>
</html>