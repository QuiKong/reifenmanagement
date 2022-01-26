<table class="table">
    <tr>
        <td>Reifensatz</td>
        <td>Art</td>
        <td>Spezifikation</td>
        <td>Position</td>
        <td>Kaltdruck</td>
        <td>TempAbholung</td>
        <td>Zieldruck</td>
        <td>Zieltemperatur</td>
    </tr>

  <?php
    include './includes/connection.php';

    $stmt2 = "SELECT * FROM reifen2";
    $result2 = $con->query($stmt2);

    if($result2->num_rows > 0){
  
    while( $row2 = $result2->fetch_assoc()){
  ?>

    <tr>
      <td id="Reifensatz"><?php echo $row2['Reifensatz'];?></td>
      <td id="Art"><?php echo $row2['Art'];?></td>
      <td id="Spezifikation"><?php echo $row2['Spezifikation'];?></td>
      <td id="Position"><?php echo $row2['Position'];?></td>
      <td id="Kaltdruck"><?php echo $row2['Kaltdruck'];?>Bar</td>
      <td id="TempAbholung"><?php echo $row2['Tempabholung'];?>°C</td>
      <td id="Zieldruck"><?php echo $row2['Zieldruck'];?>Bar</td>
      <td id="Zieltemperatur"><?php echo $row2['Zieltemperatur'];?><°C/td>
  </tr>
  <?php
  }
}
?> 
</table>
<h5>Wollen sie das Bestellen bestätigen ?</h5> 
<label for="ja">ja</label> <input type="radio" id="ja" name="timer_activated" value="ja">
<label for="nein">nein</label> <input type="radio" id="nein" name="timer_not_activated" value="nein">
