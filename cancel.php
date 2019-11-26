<?php
$con=mysqli_connect("localhost","root","","AMS");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"DELETE FROM `rentas` WHERE userID = 7;");

mysqli_fetch_array($result);

header("Location: misReservas.php"); 

?>