<?php
//including the database connection file
include("db.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM igraci WHERE id=$id");

//redirecting to the display page
header("Location:crud.php");
?>

