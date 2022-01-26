<?php 

//Hier werden die Werte die in der Eingabemaske eingegeben werden, als Variablen zwischengespeichert.

$mischung_vl = $_POST['mischung_vl'];
$mischung_hl = $_POST['mischung_hl'];
$mischung_vr = $_POST['mischung_vr'];
$mischung_hr = $_POST['mischung_hr'];


require 'connection.php'; //Referenz auf die Connection damit die Datenbankverbindung aufgebaut wird.


//Erstellen des SQL Ausdruck. Dieser wird in $SQL gespeichert. 

$sql = "INSERT INTO reifensatz (Mischung_vl,Mischung_hl,Mischung_vr,Mischung_hr) VALUES ('$mischung_vl','$mischung_hl','$mischung_vr','$mischung_hr')";


//Ausführen des SQL-Befehls. Bei Erfolg kommt die untenstehende Meldung. Ansonsten eine Fehlermeldung.
$ergebnis = $con->query($sql)
or die($con->error);

echo "Reifensatz hinzugefügt";

//Die Datenbankverbindung wird wieder getrennt.

mysqli_close($con);
echo '<br>';
echo '<a href="../mitarbeiter.php">Zurueck zur Eingabe</a>';

?>