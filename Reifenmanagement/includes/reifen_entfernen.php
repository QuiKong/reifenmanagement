<?php 

//Aufbauen der Verbindung
require 'connection.php';

//Zwischenspeichern der Variablen
$reifensatz=$_POST['reifensatz'];

//Erstellen des SQL-Befehls
$delete= "DELETE FROM reifen2 WHERE reifensatz ='$reifensatz'";

//Ausführen des SQL-Befehls
$erg=$con->query($delete)
    or die($con->error);
echo 'Datensatz gelöscht';



echo '<br>';
echo '<a href="../mitarbeiter.php">Zurueck zur Eingabe</a>';


$con->close();

?>