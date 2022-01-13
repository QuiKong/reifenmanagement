<?php 
require 'connection.php';


$sql = "SELECT * FROM sprit";
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
<h4>Tankhistorie</h4>
    <table id="Tankhistorie" data-role="table" class="ui-responsive"
           data-mode="columntoggle" data-column-btn-text="Spalten" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Session</th>
            <th>Uhrzeit</th>
            <th>Fahrer</th>
            <th>Menge in Liter</th>
            <th>Bemerkung</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($daten as $inhalt) {
        ?>
        <tr>
            <td><?php echo $inhalt->VorgangsID; ?>
                </td>
            <td><?php echo $inhalt->Session; ?>
                </td>
            <td><?php echo $inhalt->Zeit; ?>
                </td>
            <td><?php echo $inhalt->Fahrer; ?>
                </td>    
            <td><?php echo $inhalt->Menge; ?>
                </td>    
            <td><?php echo $inhalt->Info; ?>
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













