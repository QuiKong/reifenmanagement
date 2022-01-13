<?php 

//Aufbau der Verbindung
require 'connection.php';


//Zwischenspeichern der Variable
$reifen_ID=$_POST['reifenID'];

//Erstellen und ausführen des SQL-Befehls. Das Ergebnis des Befehls wird in $erg gespeichert.
$suche= "SELECT * FROM reifen WHERE ReifenID ='$reifen_ID'";
$erg=$con->query($suche);

//Alle Daten welche zu $erg werden ausgegeben
$datensatz=$erg->fetch_assoc();
echo "<pre>";
print_r ($datensatz);
echo "</pre>";

echo '<a href="../reifensatz_bearbeiten.php"> Datensatz bearbeiten</a>';  //Funktioniert noch nicht

echo '<br>';
echo '<a href="../mitarbeiter.html">Zurueck zur Eingabe</a>';


?>