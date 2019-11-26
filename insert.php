<?php
$con=mysqli_connect("localhost","root","","AMS");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
var_dump($_POST);

$title = $_POST["title"];

$building = 0;
$room = 0;
if (strlen($_POST["classroom"]) <= 6) { // It's not "CIAP-xxx".
	$building = substr($_POST["classroom"], 1, 1);
	$room = intval(substr($_POST["classroom"], 3));
} else { // It's CIAP.
	$building = "CIAP";
	$room = intval(substr($_POST["classroom"], 5));
}

$res = mysqli_query($con, "SELECT id FROM rooms WHERE edificio = '" . $building . "' AND numero = " . $room . ";");
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
	$endMins -= 60;
	$endHours++;
}

if ($endHours >= 24) {
	$endHours = 23;
	$endMins = 59;
}


$endDate = substr($startDate, 0, 11) . str_pad($endHours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($endMins, 2, "0", STR_PAD_LEFT) . ":00";

$result = mysqli_query($con,"INSERT INTO `rentas` (`idSalon`, `title`, `fechaInicio`, `fechaFinal`, `userID`) VALUES (" . $row["id"] . ", '" . $title . "', '" . $startDate . "', '" . $endDate . "', 7)");


if (!$result)
	echo mysqli_error($con);
else
	echo "<br>Success.<br>";

echo "<br> Building: " . $building;
echo "<br> Classroom: " . $room;
echo "<br> Start date: " . $startDate;
echo "<br> Start hours: " . $startHours;
echo "<br> Start mins: " . $startMins;
echo "<br> End date: " . $endDate;
echo "<br> End hours: " . $endHours;
echo "<br> End mins: " . $endMins;
echo "<br> Length hours: " . $lengthHours;
echo "<br> Length mins: " . $lengthMins;


header("Location: misReservas.php");

?>