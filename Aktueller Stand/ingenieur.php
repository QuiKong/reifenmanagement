
<?php/*
include('./includes/auth_check.php');

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Ingenieur'){
  if($_SESSION['role'] == "Manager"){
    header('location: manager.php');
    exit;
  } else {
    header('location: mitarbeiter.php');
    exit;
  }
}

*/
?>









<!DOCTYPE html>
<html lang="de-DE">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/pages.css" />
        <link rel="stylesheet" href="assets/timer/timer.css" />
        <link rel="stylesheet" href="assets/statistics.css" />
        <script type="text/javascript" src="assets/script.js"></script>
    </head>

    <body>
        <div class="navbar">
            <input type="hidden" data-time="300" class="time-set" />
            <p class="time_left" id="timer_left">00:00</p>
            <p class="end_time"></p>
            <div class="menu">
                <a class="tablinks" onclick="opentab(event, 'Einstellung')">Einstellung </a>
                <a class="tablinks" onclick="window.location.href='login.html';"> Logout</a>
            </div>
        </div>



        <div class="tab">
            <img src="assets/lms_logo_retina.png" style="width: 220px; padding-bottom: 5px;" />
            <iframe style="max-width: 220px; border: none; max-height: 65px; background-color: transparent;" src="https://www.wetter.de/widget/mini/u1j9qt/L2RldXRzY2hsYW5kL3dldHRlci1rb2Vsbi0xODIyMDY3OS5odG1s/"> </iframe>
            <button class="tablinks active" onclick="opentab(event, 'Benachrichtigung')" id="defaultOpen">Benachrichtigung</button>
            <button class="tablinks" onclick="opentab(event, 'Neue Bestellung')">Neue Bestellung</button>
            <button class="tablinks" onclick="opentab(event, 'Reifendrucksberechnung')">Reifendrucksberechnung</button>
            <button class="tablinks" onclick="opentab(event, 'Statistik')">Statistik</button>
            <button class="tablinks" onclick="opentab(event, 'Protokoll')">Protokoll</button>
            <button class="tablinks" onclick="opentab(event, 'Rennwochenende')">Rennwochenende</button>
        </div>

        <!------------------- Benachrichtigung-------------------------------->

        <div id="Benachrichtigung" class="tabcontent" style="display: block;">
            <table class="table">
                <tr>
                    <td>Bestellung-NR <a onclick="opentab(event, 'Bestellung-NR')">####</a> ist schon bestellt. Abholung am 15/12/2021 um **:** Uhr möglich.</td>
                </tr>
            </table>
        </div>

        <!------------------- Neue Bestellung -------------------------------->

        <div id="Neue Bestellung" class="tabcontent" style="display: none;">
            <table class="table" id="firsttable">
                <tr>
                    <th>Reifenplatz</th>
                    <th>Reifenart</th>
                    <th>Mischung</th>
                    <th>Bezeichnung</th>
                    <th>Bearbeitungsvarianten</th>
                    <th>Kontingent</th>
                    <th></th>
                </tr>

                <tr class="ele-tr" id="tr_1">
                    <td>
                        <select id="Reifenplatz" name="Reifenplatz">
                            <option value="Vorne_Links">Vorne Links</option>
                            <option value="Vorne_Rechts">Vorne Rechts</option>
                            <option value="Hinten_Links">Hinten Links</option>
                            <option value="Hinten_Rechts">Hinten Rechts</option>
                        </select>
                    </td>

                    <td>
                        <select id="Reifenart" name="Reifenart">
                            <option value="Slicks">Slicks</option>
                            <option value="Inters">Inters</option>
                            <option value="Rain">Rain</option>
                        </select>
                    </td>

                    <td>
                        <select id="Mischung" name="Mischung">
                            <option value="Slicks_1"> Cold(H/E) </option>
                            <option value="Slicks_2"> Medium(G/D)</option>
                            <option value="Slicks_3"> Hot(I/F)</option>
                            <option value="Inters_1"> Intermediate(H+/E+)</option>
                            <option value="Rain_1"> Dry wet</option>
                            <option value="Rain_2"> Heavy wet</option>
                        </select>
                    </td>

                    <td>
                        <select id="Bezeichnung" name="Bezeichnung">
                            <option value="1xx">1xx</option>
                            <option value="2xx">2xx</option>
                            <option value="3xx">3xx</option>
                            <option value="4xx">4xx</option>
                            <option value="5xx">5xx</option>
                            <option value="7xx">7xx</option>
                        </select>
                    </td>

                    <td>
                        <select id="Bearbeitungsvarianten" name="Bearbeitungsvarianten">
                            <option value="text"></option>
                            <option value="Keine">Keine</option>
                            <option value="Siped">Siped</option>
                            <option value="Extra_grooved">Extra grooved</option>
                            <option value="Extra_grooved_siped">Extra grooved and siped</option>
                        </select>
                    </td>

                    <td><input type="number" /></td>
                    <td>
                        <span class="addBtn" id="addBtn">+</span>
                    </td>
                </tr>
            </table>
            <div class="abschickenBtn">
                <button type="submit" class="btn-block2" name="add" value="add">Bestellung abschicken</button>
            </div>
    

            <br/>
            <h3 class="txt-title">Vorherige Bestellungen</h3>

            <table class="table">
                <tbody>
                    <tr>
                        <td>BestellNr</td>
                        <td>Reifensatz</td>
                        <td>Datum</td>
                        <td>Zeit</td>
                        <td>Status</td>
                        <td>Zuständiger Mitarbeiter</td>
                    </tr>
                    
                    
                    
            <?php   
                include './includes/connection.php';
                $stmt2 ="SELECT * FROM bestellung WHERE Status != 1";
                $result2 =$con->query($stmt2);
                    
                    if($result2->num_rows > 0){
                        while ($row2 = $result2->fetch_assoc()){
            ?>                
                    <tr>
                    <td id="BestellNr"><?php echo $row2['BestellNr'];?></td>
                    <td id="Reifensatz"><?php echo $row2['Reifensatz'];?></td>
                    <td id="Datum"><?php echo date("d.m.Y", strtotime($row2['Datum']));?></td>
                    <td id="Zeit"><?php echo $row2['Zeit'];?></td>
                    <td id="Status"><?php echo $row2['Status'];?></td>
                    <td id="Mitarbeiter"><?php echo $row2['Mitarbeiter'];?></td>
                        
                   
                    </tr>        
                <?php            
                        }      
                    }
                ?>
                </tbody>
            </table>
        </div>

      <!----------------- Reifendrucksberechnung-------------------------------->

        <div id="Reifendrucksberechnung" class="tabcontent" style="display: none;">
            <h4 class="txt-title">Startpunktangaben</h4>
            <form name="felgentempeaturForm" class="felgentempeaturForm">
                <div class="rs width-40">
                    <div class="vorne">
                        <div class="form-group">
                            <input type="number" name="coldtp1" id="coldtp1" placeholder="Vorne Links" />
                        </div>
                        <div class="form-group">
                            <input type="number" name="coldtp3" id="coldtp3" placeholder="Hinten Links" />
                        </div>
                    </div>

                    <input type="button" value="Kaltdruck Berechnen" class="btn-block2" onclick="startpunktangaben()" />

                    <div class="hinter">
                        <div class="form-group">
                            <input type="number" name="coldtp2" id="coldtp2" placeholder="Vorne Rechts" />
                        </div>
                        <div class="form-group">
                            <input type="number" name="coldtp4" id="coldtp4" placeholder="Hinten Rechts" />
                        </div>
                    </div>
                </div>
                <img src="assets/images/auto.png" class="width-20" />

                <table class="table width-40">
                    <thead>
                        <tr>
                            <td>Lufttemperatur</td>
                            <td>Streckentemperatur</td>
    
                        </tr></thead>
                        <tbody>
                        <tr>
                            <td id="airtemp">0</td>
                            <td id="tracktemp">0</td>
                            <input type="hidden" id="tgemessen" value="30" />
                        </tr>
                    </tbody>
                </table>
            </form>

            <div class="tables">
                <!-- Tabelle fuer Grundwerte u. Berechnung Reifendruck -->

                <table class="table width-40">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Reifendruck</td>
                            <td></td>
                            <td>Reifendruck</td>
                        </tr></thead><tbody>
                        <tr>
                            <td>LV</td>
                            <td id="reifendruck1">0.00</td>
                            <td>RV</td>
                            <td id="reifendruck2">0.00</td>
                        </tr>

                        <tr>
                            <td>LH</td>
                            <td id="reifendruck3">0.00</td>
                            <td>RH</td>
                            <td id="reifendruck4">0.00</td>
                        </tr>
                    </tbody>
                </table>



                <table class="table width-33">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Reifendruck angepasst</td>
                            <td></td>
                            <td>Reifendruck angepasst</td>
                        </tr></thead><tbody>
                        <tr>
                            <td>LV</td>
                            <td id="Reifendruck_angepasst1">0.00</td>
                            <td>RV</td>
                            <td id="Reifendruck_angepasst2">0.00</td>
                        </tr>

                        <tr>
                            <td>LH</td>
                            <td id="Reifendruck_angepasst3">0.00</td>
                            <td>RH</td>
                            <td id="Reifendruck_angepasst4">0.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="tables">
                <table class="table width-40 mrt-20">
                    <thead>
                        <tr>
                            <td>Anpasskonstante</td>
                            <td>Anpassungswert</td>
                            <td></td>
                        </tr></thead><tbody>
                        <tr>
                            <td><input type="number" id="anpasskonstante" /></td>
                            <td id="panpassungStecke">0.00</td>
                            <input type="hidden" id="tstrecke" value="40" />
                            <input type="hidden" id="tstreckevorgabe" value="10" />
                            <td><input type="button" value="Streckeanpassung Berechnen" class="btn-block2" onclick="streckeanpassung()" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="table width-40 mrt-20">
                <thead>
                    <tr>
                        <td>Bleed</td>
                        <td>Heiztemperatur in °C</td>
            
                    </tr></thead><tbody>

                    <tr>
                        <td id="bleed1">0.00</td>
                        <td id="heiztemperatur">80</td>
                        <td><input type="button" value="Bleed Berechnen" class="btn-block2" onclick="bleed()" /></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--------------------- Protokoll -------------------------------->

        <div id="Protokoll" class="tabcontent" style="display: none;">
            <h4 class="txt-title">Protokoll</h4>
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
   include './includes/connection.php';
   
   $stmt = "SELECT * FROM reifen";
   $result = $con->query($stmt);
   
   if($result->num_rows > 0){
     
     while( $row = $result->fetch_assoc()){
   ?>
   
   
      <tr>
        <td id="nr"><?php echo $row['ReifenID'];?></td>
        <td id="Reifenbezeichnung"><?php echo $row['Reifenart'];?></td>
        <td id="Datum"><?php echo date("d.m.Y", strtotime($row['Datum']));?></td> 
        <td id="Uhrzeit"><?php echo $row['Zeit'];?></td>
        <td id="Spez"><?php echo $row['Spezifikation'];?></td>
        <td id="Session"><?php echo $row['Session'];?></td>
         <td id="Kaltdruck">
           <table><tr>
             <td id="lv">vl:<?php echo $row['Kaltdruck_vl'];?> </td>
             <td id="rv">vr:<?php echo $row['Kaltdruck_vr'];?></td>
           </tr>
           <tr>
             <td id="lh">hl:<?php echo $row['Kaltdruck_hl'];?> </td>
             <td id="rh">hr:<?php echo $row['Kaltdruck_hr'];?></td>
           </tr>
         </table>
         </td>
   
         <td id="beiTemp"><?php echo $row['TempAbholung'];?>°C</td>
         
         <td id="Bleedkalt">
           <table><tr>
             <td id="lv">vl:<?php echo $row['bleed_vl'];?> </td>
             <td id="rv">vr:<?php echo $row['bleed_vr'];?></td>
           </tr>
           <tr>
             <td id="lh">hl:<?php echo $row['bleed_hl'];?> </td>
             <td id="rh">hr:<?php echo $row['bleed_hr'];?></td>
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
   
</tbody></table>


<h4 class="txt-title">Wetterwerte</h4> 

      <table class="table">

        <tr>

           <td>Tag</td>            
           <td>Uhrzeit</td>        
           <td>Luft</td>              
           <td>Strecke</td>           
           <td> Streckenverhältnisse</td>
      
        </tr>

        <?php
include './includes/connection.php';

$stmt2 = "SELECT * FROM wetter ORDER BY datum";
$result2 = $con->query($stmt2);

if($result2->num_rows > 0){
  
  while( $row2 = $result2->fetch_assoc()){
?>
        <tr>

          <td id="Tag"><?php echo date("d.m.Y", strtotime($row2['Datum']));?></td>            
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
<h4 class="txt-title"> Tankhistorie</h4>
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
        </div>    
        <!--------------------------------Statistik-------------------------------->

        <div id="Statistik" class="tabcontent" style="display: none;">
            <div w3-include-html="statistik.php"></div>
        </div>

        <!--------------------------------Einstellung -------------------------------->

        <div id="Einstellung" class="tabcontent" style="display: none;">
            <p>Ändern Sie Ihr Passwort für Sicherheit!</p>
            <br />
            <div class="body">
                <p><label for="pass1">Passwort :</label> <input type="text" id="pass1" name="pass1" minlength="8" required /></p>

                <p><label for="pass2">Wiederholen:</label> <input type="text" id="pass2" name="pass2" /></p>
            </div>

            <input type="submit" value="Sign in" />
        </div>

        <!--------------------------------Bestellung-NR-------------------------------->

        <div id="Bestellung-NR" class="tabcontent" style="display: none;">
            <div style="padding: 20px;">
                <table class="table">
                    <tr>
                        <td>test</td>
                        <td>menge</td>
                        <td>eigenshaft1</td>
                        <td>eigenshaft2</td>
                        <td>eigenshaft3</td>
                        <td>eigenshaft4</td>
                    </tr>
                </table>
            </div>
        </div>

        <!----------------- Rennwochenende -------------------------------->
<div id="Rennwochenende" class="tabcontent" style="display: none;">
    <h4 class="txt-title">Vergangene Rennwochenenden</h4>

      <table class="table">

        <tr>
            <td>Wochenend-ID</td>
            <td>Startdatum</td>            
            <td>Enddatum</td>        
            <td>Strecke</td>              
            <td>Rennformat</td>           
            <td>Reifenkontingent</td>
            <td>Bemerkung</td>
        </tr>

        <?php
include './includes/connection.php';

$stmt2 = "SELECT * FROM rennwochenende";
$result2 = $con->query($stmt2);

if($result2->num_rows > 0){
  
  while( $row2 = $result2->fetch_assoc()){
?>
        <tr>
            <td id="WeID"><?php echo $row2['WeID'];?></td>
            <td id="Von_Datum"><?php echo date("d.m.Y", strtotime($row2['Von_Datum']));?></td>           
            <td id="Bis_Datum"><?php echo date("d.m.Y", strtotime($row2['Bis_Datum']));?></td>        
            <td id="Strecke"><?php echo $row2['Strecke'];?></td>              
            <td id="Format"><?php echo $row2['Format'];?></td>
            <td id="Kontingent"><?php echo $row2['Gesamtkontingent'];?></td>
            <td id="Bemerkung"><?php echo $row2['Bemerkung'];?> </td>
     
       </tr>
       <?php
  }
}
?>
    </table>
    
     <h4 class="txt-title">Vergangene Sessions</h4>

      <table class="table">

        <tr>
            <td>Session-ID</td>
            <td>Session</td>            
            <td>Datum</td>        
            <td>Startzeit</td>              
            <td>Endzeit</td>
            <td>Rennwochenende</td>
        </tr>

        <?php
include './includes/connection.php';

$stmt2 = "SELECT * FROM session";
$result2 = $con->query($stmt2);

if($result2->num_rows > 0){
  
  while( $row2 = $result2->fetch_assoc()){
?>
        <tr>
            <td id="SessionID"><?php echo $row2['SessionID'];?></td>
            <td id="Session"><?php echo $row2['Session'];?></td>           
            <td id="Datum"><?php echo date("d.m.Y", strtotime($row2['Datum']));?></td>        
            <td id="Beginn"><?php echo $row2['Beginn'];?></td>              
            <td id="Ende"><?php echo $row2['Ende'];?></td>
            <td id="WeID"><?php echo $row2['WeID'];?></td>
       </tr>
       <?php
  }
}
?>
    </table>
    
    
        </div>
        <script>
            //includeHTML();
        </script>
    </body>
</html>