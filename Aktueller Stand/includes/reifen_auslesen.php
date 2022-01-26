<?php 

//Aufbau der Datenbankverbindung
require 'connection.php';

echo "<h4>Alle Reifensaetze</h4>";


//Direktes ausführen des SQL-Befehls
$erg=$con->query("SELECT * FROM reifen")
    or die($con->error);
//Hier wird zunächst gezählt wie viele Datensätze vorhanden sind
if ($erg->num_rows)
{
    echo "<p>Reifensaetze vorhanden: ";
    echo $erg->num_rows;

}


//Hier werden die einzelnen Datensätze ausgegeben
$datensatz = $erg->fetch_all(MYSQLI_ASSOC );
echo "<pre>";
print_r($datensatz);
echo "</pre>";


echo '<a href="../mitarbeiter.html">Zurueck zur Eingabe</a>';

$erg->free();
$con->close();

?>
