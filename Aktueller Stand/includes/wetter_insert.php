<?php 

$date = $_POST['date']; 
$time = $_POST['time']; 
$air_temp = $_POST['air_temp']; 
$track_temp= $_POST['track_temp']; 
$track_conditions= $_POST['track_conditions'];

require 'connection.php';

$sql = "INSERT INTO wetter (Datum, Zeit, LuftTemp, StreckenTemp, Streckenverhaeltnisse) VALUES 
('$date','$time','$air_temp','$track_temp','$track_conditions')";

$ergebnis = $con->query($sql)
or die($con->error);

echo "Messung erfolgreich";

mysqli_close($con);

echo '<br>';

echo '<a href="../mitarbeiter.php">Zurueck zur Eingabe</a>';

?>
