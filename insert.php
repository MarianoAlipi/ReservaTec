<?php
$con=mysqli_connect("localhost","root","","AMS");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"INSERT INTO `rentas` (`id`, `idSalon`, `fechaInicio`, `fechaFinal`, `userID`) VALUES (123,5,'2019-11-26T12:00:00','2019-11-26T13:00:00',7)");

mysqli_fetch_array($result);

header("Location: misReservas.php"); 

?>