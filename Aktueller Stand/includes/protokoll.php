<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.html");
    exit;
}
?>
<h4>Protokoll</h4>
<table class="table">
  <tbody>
   <tr>
     <td>Nr</td>
     <td>Bezeichnung</td>
     <td>Datum</td> 
     <td>Uhrzeit</td>
     <td>Spez</td>
     <td>Session</td>     
     <td>Kaltdruck</td>
      <td>bei Temp</td>      
      <td>Bleedkalt</td>
      <td>Temperatur</td>
      <td> Dauer</td>
      <td> Start</td>
      <td> Fertig</td>
      <td> Bleed in Blankt</td>
   </tr>

<?php
include 'connection.php';

$stmt = "SELECT * FROM reifen";
$result = $con->query($stmt);

if($result->num_rows > 0){
  
  while( $row = $result->fetch_assoc()){
?>


   <tr>
     <td id="nr"><?php echo $row['ReifenID'];?></td>
     <td id="Reifenbezeichnung"><?php echo $row['Reifenart'];?></td>
     <td id="Datum"><?php echo $row['Datum'];?></td> 
     <td id="Uhrzeit"><?php echo $row['Zeit'];?></td>
     <td id="Spez"><?php echo $row['Spezifikation'];?></td>
     <td id="Session"><?php echo $row['Session'];?></td>
      <td id="Kaltdruck">
        <table><tr>
          <td id="lv">vl: <?php echo $row['Kaltdruck_vl'];?> - </td>
          <td id="rv">    vr: <?php echo $row['Kaltdruck_vr'];?></td>
        </tr>
        <tr>
          <td id="lh">hl: <?php echo $row['Kaltdruck_hl'];?> - </td>
          <td id="rh">   hr: <?php echo $row['Kaltdruck_hr'];?></td>
        </tr>
      </table>
      </td>

      <td id="beiTemp"><?php echo $row['TempAbholung'];?>°C</td>
      
      <td id="Bleedkalt">
        <table><tr>
          <td id="lv"> vl: <?php echo $row['bleed_vl'];?> - </td>
          <td id="rv"> vr: <?php echo $row['bleed_vr'];?></td>
        </tr>
        <tr>
          <td id="lh"> hl: <?php echo $row['bleed_hl'];?> - </td>
          <td id="rh"> hr: <?php echo $row['bleed_hr'];?></td>
        </tr>
      </table>
      </td>
     <td id="Temperatur"><?php echo $row['Zieltemp'];?>°C</td>
     <td id="Dauer"><?php echo $row['Dauer'];?> </td>
     <td id="Start"><?php echo $row['Start'];?> </td>
     <td id="Fertig"> <?php echo $row['Fertig'];?></td>
     <td id="Bleed_in_Blankt"> ?? </td>
   </tr>
   <?php
  }
} 
?>

 
</table>
</tbody>


<h4>Wetterwerte</h4> 

      <table class="table">

        <tr>

           <td>Tag</td>            
           <td>Uhrzeit</td>        
           <td>Luft</td>              
           <td>Strecke</td>           
           <td> Streckenverhältnisse</td>
      
        </tr>

<?php
include 'connection.php';

$stmt2 = "SELECT * FROM wetter";
$result2 = $con->query($stmt2);

if($result2->num_rows > 0){
  
  while( $row2 = $result2->fetch_assoc()){
?>
        <tr>

          <td id="Tag"><?php echo $row2['Datum'];?></td>            
           <td id="Uhrzeit"><?php echo $row2['Zeit'];?></td>        
           <td id="Luft"><?php echo $row2['LuftTemp'];?>°C</td>              
           <td id="Strecke"><?php echo $row2['StreckenTemp'];?>°C</td>           
           <td id="Streckenverhältnisse"><?php echo $row2['Streckenverhaeltnisse'];?> </td>
     
       </tr>
       <?php
  }
}
?> 
        </table>


        <br>
         <!-- Tankhistorie anzeigen lassen -->           
          <h4>Tankhistorie</h4>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Session</td>
            <td>Uhrzeit</td>
            <td>Fahrer</td>
            <td>Menge in Liter</td> 
            <td>Bemerkung</td> 
      </tr>



    

<?php 
require 'includes/connection.php';


$sql = "SELECT * FROM sprit";
$result = $con->query($sql);


if ($result->num_rows > 0){
    
    while ($row = $result->fetch_assoc()){
    ?>    
        <tr>
            <td id="ID"><?php echo $row['VorgangsID'];?></td>
            <td id="Session"><?php echo $row['Session'];?></td>
            <td id="Uhrzeit"><?php echo $row['Zeit'];?></td>
            <td id="Fahrer"><?php echo $row['Fahrer'];?></td>
            <td id="Menge"><?php echo $row['Menge'];?></td>
            <td id="Bemerkung"><?php echo $row['Info'];?></td>
        </tr>
    <?php
    }
}
?> 
        
        
        </table>