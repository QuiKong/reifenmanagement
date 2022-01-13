<?php 

$session = $_POST['session'];
$time = $_POST['time']; 
$driver = $_POST['driver']; 
$menge= $_POST['menge']; 
$info= $_POST['info'];

require 'connection.php';

$sql = "INSERT INTO sprit (Session, Zeit, Fahrer, Menge, Info) VALUES ('$session', '$time', '$driver', '$menge','$info')";

$ergebnis = $con->query($sql)
or die($con->error);

echo "Tankvorgang erfolgreich eingegeben";

mysqli_close($con);

echo '<br><br>';

echo '<a href="../mitarbeiter.php">Zurueck zur Eingabe</a>';

?>
