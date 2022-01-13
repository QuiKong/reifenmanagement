<head>
    <link rel="stylesheet" href="/assets/pages.css">
    <link rel="stylesheet" href="/assets/statistics.css">
    <link rel="stylesheet" href="/assets/diagramm.css">
    <script type="text/javascript" src="/assets/script.js"></script>
</head>


<?php 
require 'connection.php';

$sql = "SELECT * FROM wetter";
if ($erg = $con->query($sql)) {
 	if ($erg->num_rows) {
		$ds_gesamt = $erg->num_rows;
		$erg->free();
	}
	if ($erg = $con->query($sql)) {
		while ($datensatz = $erg->fetch_object()) {
			$daten[] = $datensatz;
		}
	}
}

?>

<div data-role="main" class="ui-content">
<h4>Wetterdaten</h4>
    <table id="Wetterdaten" data-role="table" class="ui-responsive"
           data-mode="columntoggle" data-column-btn-text="Spalten" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Datum</th>
            <th>Uhrzeit</th>
            <th>Lufttemperatur</th>
            <th>Streckentemperatur</th>
            <th>Streckeverhaeltnisse</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($daten as $inhalt) {
        ?>
        <tr>
            <td><?php echo $inhalt->MessID; ?>
                </td>
            <td><?php echo date("d.m.Y", strtotime($inhalt->Datum)); ?>
                </td>
            <td><?php echo $inhalt->Zeit; ?>
                </td>
            <td><?php echo $inhalt->LuftTemp; ?>
                </td>    
            <td><?php echo $inhalt->StreckenTemp; ?>
                </td>    
            <td><?php echo $inhalt->Streckenverhaeltnisse; ?>
                </td>    
        </tr>
    <?php    
        }
?>
        </tbody>    
    </table>    
</div>

<br>
<br>
<a href="../mitarbeiter.php">Zurueck zur Eingabe</a>