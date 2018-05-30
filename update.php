<?php
// including the database connection file
include_once("db.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$ime = mysqli_real_escape_string($mysqli, $_POST['ime']);
	$prezime = mysqli_real_escape_string($mysqli, $_POST['prezime']);
	$gametag = mysqli_real_escape_string($mysqli, $_POST['gametag']);	
	
	// checking empty fields
	if(empty($ime) || empty($prezime) || empty($gametag)) {	
			
		if(empty($ime)) {
			echo "<font color='red'>Polje 'Ime' je prazno.</font><br/>";
		}
		
		if(empty($prezime)) {
			echo "<font color='red'>Polje 'Prezime' je prazno.</font><br/>";
		}
		
		if(empty($gametag)) {
			echo "<font color='red'>Polje 'Gametag' je prazno.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE igraci SET Ime='$ime',Prezime='$prezime',Game_tag='$gametag' WHERE id=$id");
		
		//redirectig to the display page
		header("Location: crud.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM igraci WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$ime = $res['Ime'];
	$prezime = $res['Prezime'];
	$gametag = $res['Game_tag'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Početna</a>
	<br/><br/>
	<a href="crud.php">Prethodna</a>
	<br/><br/><br/>
	
	<form name="form1" method="post" action="update.php">
		<table border="0">
			<tr> 
				<td>Ime</td>
				<td><input type="text" name="name" value="<?php echo $ime;?>"></td>
			</tr>
			<tr> 
				<td>Prezime</td>
				<td><input type="text" name="age" value="<?php echo $prezime;?>"></td>
			</tr>
			<tr> 
				<td>Gametag</td>
				<td><input type="text" name="email" value="<?php echo $gametag;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
