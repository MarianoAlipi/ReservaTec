<?php
$con=mysqli_connect("localhost","root","","AMS");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
var_dump($_POST);

$building = 0;
$room = 0;
if (strlen($_POST["classroom"]) <= 6) { // It's not "CIAP-xxx".
	$building = substr($_POST["classroom"], 1, 1);
	$room = intval(substr($_POST["classroom"], 3));
} else { // It's CIAP.
	$building = "CIAP";
	$room = intval(substr($_POST["classroom"], 5));
}

$res = mysqli_query($con, "SELECT id FROM rooms WHERE edificio = " . $building . " AND numero = " . $room . ";");
$row = mysqli_fetch_array($res);
$startDate = $_POST["date"] . "T" . $_POST["time"] . ":00";
$startHours = intval(substr($startDate, 11, 2));
$startMins = intval(substr($startDate, 14, 2));

/*
2019-11-25T13:30:00
0123456789012345678
*/

$lengthHours = intval(substr($_POST["duration"], 0, 2));
$lengthMins = intval(substr($_POST["duration"], 3, 2));

$endHours = $startHours + $lengthHours;
$endMins = $startMins + $lengthMins;

if ($endMins >= 60) {
	$endMins = 0;
	$endHours++;
}

if ($endHours >= 24) {
	$endHours = 23;
	$endMins = 59;
}

$endDate = substr($startDate, 0, 11) . str_pad($endHours, 2, "0") . ":" . str_pad($endMins, 2, "0") . ":00";

$result = mysqli_query($con,"INSERT INTO `rentas` (`idSalon`, `fechaInicio`, `fechaFinal`, `userID`) VALUES (" . $row["id"] . ", '" . $startDate . "', '" . $endDate . "', 7)");

/*
if (!$result)
	echo mysqli_error($con);
else
	echo "Success";

echo "Start date: " . $startDate . "<br>";
echo "Start hours: " . $startHours . "<br>";
echo "Start mins: " . $startMins . "<br>";
echo "end date: " . $endDate . "<br>";
echo "end hours: " . $endHours . "<br>";
echo "end mins: " . $endMins . "<br>";
echo "length hours: " . $lengthHours . "<br>";
echo "length mins: " . $lengthMins . "<br>";
*/

//mysqli_fetch_array($result);

header("Location: misReservas.php"); 

?>