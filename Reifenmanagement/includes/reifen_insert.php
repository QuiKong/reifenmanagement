<?php 

//Hier werden die Werte die in der Eingabemaske eingegeben werden, als Variablen zwischengespeichert.

$reifensatz = $_POST['reifensatz'];
$bezeichnung = $_POST['bezeichnung']; 
$date = $_POST['date']; 
$time = $_POST['time']; 
$spez = $_POST['spez']; 
$session = $_POST['session'];

$kaltdruck_vl = $_POST['kaltdruck_vl'];
$kaltdruck_hl = $_POST['kaltdruck_hl'];
$kaltdruck_vr = $_POST['kaltdruck_vr'];
$kaltdruck_hr = $_POST['kaltdruck_hr'];

$zieldruck_vl = $_POST['zieldruck_vl'];
$zieldruck_hl = $_POST['zieldruck_hl'];
$zieldruck_vr = $_POST['zieldruck_vr'];
$zieldruck_hr = $_POST['zieldruck_hr'];

$bei_temp = $_POST['bei_temp'];
$temp = $_POST['temp'];
$dauer = $_POST['dauer'];
$start = $_POST['start'];
$fertig = $_POST['fertig'];

$bleed_vl = $_POST['bleed_vl'];
$bleed_hl = $_POST['bleed_hl'];
$bleed_vr = $_POST['bleed_vr'];
$bleed_hr = $_POST['bleed_hr'];



require 'connection.php'; //Referenz auf die Connection damit die Datenbankverbindung aufgebaut wird.


//Erstellen des SQL Ausdruck. Dieser wird in $SQL gespeichert. 

$sql = "INSERT INTO reifen (Reifensatz, Bezeichnung, Datum, Zeit, Spezifikation, Session, Kaltdruck_vl, Kaltdruck_hl, Kaltdruck_vr, Kaltdruck_hr, TempAbholung, Zieldruck_vl, Zieldruck_hl, Zieldruck_vr, Zieldruck_hr, Zieltemp, Start, Dauer, Fertig, bleed_vl, bleed_hl, bleed_vr, bleed_hr) VALUES 
('$reifensatz','$bezeichnung','$date','$time','$spez','$session','$kaltdruck_vl','$kaltdruck_hl','$kaltdruck_vr','$kaltdruck_hr','$bei_temp','$zieldruck_vl','$zieldruck_hl','$zieldruck_vr','$zieldruck_hr','$temp','$start','$dauer','$fertig','$bleed_vl','$bleed_hl','$bleed_vr','$bleed_hr')";


//Ausführen des SQL-Befehls. Bei Erfolg kommt die untenstehende Meldung. Ansonsten eine Fehlermeldung.
$ergebnis = $con->query($sql)
or die($con->error);

echo "Reifensatz hinzugefügt";

//Die Datenbankverbindung wird wieder getrennt.

mysqli_close($con);
echo '<br>';
echo '<a href="../mitarbeiter.html">Zurueck zur Eingabe</a>';

?>