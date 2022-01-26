<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Aufbauen der Verbindung mit der Datenbank. Falls diese Fehlschlägt erscheint die Fehlermeldung

$con = new Mysqli("localhost", "root","","management");
if ($con->connect_error){
    echo ("Verbindung fehlgeschlagen".$con->connect_error);
    exit();
}

$con->set_charset("utf8mb4");
//$con->close();

?> 