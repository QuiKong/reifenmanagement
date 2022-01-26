<?php/*
include('./includes/auth_check.php');

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Mitarbeiter'){
  if($_SESSION['role'] == "Manager"){
    header('location: manager.php');
    exit;
  } else {
    header('location: ingenieur.php');
    exit;
  }
}

*/
?>







<!DOCTYPE html>
<html>
    
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/pages.css">
    <link rel="stylesheet" href="./assets/statistics.css">
    <link rel="stylesheet" href="./assets/timer/timer.css">
  
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div class="navbar">
          <p class="time_left" id="timer_left">00:00</p>
          <div class="menu"><a class="tablinks" onclick="opentab(event, 'Einstellung')">Einstellung </a>
            <a class="tablinks" onclick="window.location.href='login.html';"> Logout</a>
          </div>
            
            
          </div>
          
    <div class="tab">
        <img src="./assets/lms_logo_retina.png" style="width:200px; padding-bottom: 5px;">
      <iframe style="max-width: 220px; border: none; max-height: 65px;  background-color: transparent;" 
      src="https://www.wetter.de/widget/mini/u1j9qt/L2RldXRzY2hsYW5kL3dldHRlci1rb2Vsbi0xODIyMDY3OS5odG1s/">
      </iframe>
        <button class="tablinks active" onclick="opentab(event, 'Benachrichtigung')" id="defaultOpen">Benachrichtigung</button>
        <button class="tablinks" onclick="opentab(event, 'Wetterdaten')">Wetterdaten</button>
        <button class="tablinks" onclick="opentab(event, 'Tankvorgang')">Tankvorgang</button>

      </div>




    <!----------------- Benachrichtigung -------------------------------->

    <div id="Benachrichtigung" class="tabcontent" style="display: block;">

        <table class="table">
          <tbody><tr> 
             <td> Bestellung-NR  <a onclick="opentab(event, 'Offene Bestellung')">####</a>  sollte bestellt werden</td> 

          </tr>
          <tr> <td>Bestellung-NR   <a onclick="opentab(event, 'abholbereit')">####</a>   ist abholbereit </td>

          </tr>
      
          <tr>
            <td>Bestellung-NR  <a onclick="opentab(event, 'Bestellung-NR')">####</a> ist schon bestellt. Abholung am 15/12/2021 um **:** Uhr möglich.
              </td>
           
         </tr>
          <tr class="tr-table">
            <td>Möchten Sie den Timer aktivieren?</td>
            <td>
            <label for="ja">ja</label><input type="radio" id="ja" name="time_activat" value="ja">
          </td>
            <td>
            <label for="nein">nein</label><input type="radio" id="nein" name="time_activat" value="nein">  
          </td>
        </tr>
          <tr>
             <td> Der Abholungstermin zur Bestellung-NR   <a onclick="opentab(event, 'Bestellung-NR')">####</a> wurde verschoben.Neu Abholungstermin ist am 16/12/2021 um **:** Uhr möglich.
              </td>
           
         </tr>
         <tr class="tr-table">
          <td>wollen sie timer reset</td>
          <td>
            <label for="ja">ja</label><input type="radio" id="ja" name="time_reset" value="ja">
           </td>
           <td>
            <label for="nein">nein</label><input type="radio" id="nein" name="time_reset" value="nein"> 
          </td>
         </tr>
         <tr><td><p><br></p></td></tr>
  
        </tbody></table>
         
    </div>
    

                    

    <!----------------- Wetterdaten -------------------------------->

    <div id="Wetterdaten" class="tabcontent" style="display: block;">
        <h4 class="txt-title">Wetterdaten</h4>
<br>
        <!-- Neuen Wetter-Datensatz hinzufügen -->  
        <form action="includes/wetter_insert.php" method="post"> 
        <div class="form-group"> 
        <input type="date" name="date" placeholder="tt.mm.jjjj" class="form-control"> 
        </div>    
        <div class="form-group"> 
        <input type="time" name="time" placeholder="" class="form-control"> 
        </div> 
        <div class="form-group"> 
        <input type="number" name="air_temp" placeholder="Lufttemperatur" class="form-control"> 
        </div> 
        <div class="form-group"> 
        <input type="number" name="track_temp" placeholder="Streckentemperatur" class="form-control"> 
        </div> <div class="form-group"> 
        <input type="text" name="track_conditions" placeholder="Streckenverhaeltnisse" class="form-control"> 
        </div>
    <br>   <div class="form-group"> 
        <button type="submit" name="formular-submit" class="btn btn-primary btn-block">Datensatz anlegen</button>
    </div> 
            
        </form>
        
<br>
<br>
        
        
<!-- Alle Wetterdaten anzeigen lassen-->            
<h4 class="txt-title">Wetterdaten</h4>
    <table class="table">
        <tr>
            <td>Datum</td>
            <td>Uhrzeit</td>
            <td>Lufttemperatur</td>
            <td>Streckentemperatur</td> 
            <td>Steckenverhaeltnisse</td> 
      </tr>



    

<?php 
require 'includes/connection.php';


$sql = "SELECT * FROM wetter ORDER BY Datum";
$result = $con->query($sql);


if ($result->num_rows > 0){
    
    while ($row = $result->fetch_assoc()){
    ?>    
        <tr>
            <td id="Session"><?php echo date("d.m.Y", strtotime($row['Datum']));?></td>
            <td id="Uhrzeit"><?php echo $row['Zeit'];?></td>
            <td id="Fahrer"><?php echo $row['LuftTemp'];?></td>
            <td id="Menge"><?php echo $row['StreckenTemp'];?></td>
            <td id="Bemerkung"><?php echo $row['Streckenverhaeltnisse'];?></td>
        </tr>
    <?php
    }
}
?> 
        
        
        </table>
      </div>   

        <!--the new counter-->
        <!-- Creat Countdown Timer -->
        <article class="clock" id="model3">
            <h3 >nächste Temperaturmessung in:</h3>
            <div id="show_the_timer" class=""></div>
            <div class="count">
                <div id="timer"></div>
            </div>

        </article>
  

       
    <!----------------- Tankvorgang -------------------------------->


    <div id="Tankvorgang" class="tabcontent" style="display: block;">

        <h4 class="txt-title">Tankvorgang</h4>
        <br>    
        <!-- Neuen Tankvorgang hinzufügen -->       
            
        <form action="includes/tanken_insert.php" method="post"> 
          <div class="form-group"> 
              <select name="session">
                  <option value="Q1">Q1</option>
                  <option value="Q2">Q2</option>
                  <option value="Q3">Q3</option>
                  <option value="TopQ">TopQ</option>
                  <option value="WUP">Warm Up</option>
                  <option value="Start">Race Start</option>
                  <option value="RACE">Race</option>
              </select>
              
            <!-- Verbindung zu Tabelle Session vorbereitet



                <select name="session">
                  <select id="SessionID" name="SessionID"> <?php 
              include './includes/connection.php';

              $stmt = "SELECT * FROM `session` ";
              $result = $con->query($stmt) or die("Bad SQL: $stmt");

            

               $opt = "<td><select name='SessionID'>";
                while( $row = $result->fetch_assoc()){

               
                 
               $opt .= "<option value='{$row['SessionID']}'>{$row['SessionID']} {$row['Session']} </option>\n";

               
                }echo $opt;
               $opt .= "</select></td>";

            ?> 
              
              
              
                 </select>
                 </select>  -->
          </div>    
         
          <div class="form-group"> 
          <input type="time" name="time" placeholder="" class="form-control"> 
          </div> 
          <div class="form-group">  
              <select name="driver">
                  <option value="0"></option>
                  <option value="RAS">RAS</option>
                  <option value="MIE">MIE</option>
                  <option value="KVL">KVL</option>
                  <option value="FRI">FRI</option>
              </select>    
          </div> 
          <div class="form-group"> 
          <input type="number" name="menge" placeholder="Menge in Liter" class="form-control"> 
          </div> <div class="form-group"> 
          <input type="text" name="info" placeholder="Info" class="form-control"> 
          </div> 
      <br>   <div class="form-group"> 
          <button type="submit" name="formular-submit" class="btn btn-primary btn-block">Tankvorgang anlegen</button>
      </div> 
              
      </form>
<br>            
<br>        
        <!-- Tankhistorie anzeigen lassen -->           
          
         <h4 class="txt-title">Tankhistorie</h4>
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
        
        
        <!--------------------------------Offene Bestellungen-------------------------------->

<div id="Offene Bestellung" class="tabcontent" style="display: none;">
            <div style="padding: 20px;">
<h4 class="txt-title">Offene Bestellungen</h4>
    <table class="table">
        <tr>
            <td>Bestell-Nr.</td>
            <td>Reifensatz-ID</td>
            <td>Datum</td>
            <td>Uhrzeit</td>
      </tr>
<?php 
require 'includes/connection.php';


$sql = "SELECT * FROM bestellung WHERE Status=1";
$result = $con->query($sql);


if ($result->num_rows > 0){
    
    while ($row = $result->fetch_assoc()){
    ?>    
        <tr>
            <td id="Bestell-Nr."><?php echo $row['BestellNr'];?></td>
            <td id="Reifensatz-ID"><?php echo $row['Reifensatz'];?></td>
            <td id="Datum"><?php echo date("d.m.Y", strtotime($row['Datum']));?></td>
            <td id="Uhrzeit"><?php echo $row['Zeit'];?></td>
        </tr>
    <?php
    }
}
?> 
        
 </table>
              
</div> 
    </div>              
              
              
<!--------------------------------Abholbereite Bestellungen-------------------------------->

<div id="abholbereit" class="tabcontent" style="display: none;">
            <div style="padding: 20px;">
<h4 class="txt-title">Abholbereite Bestellungen</h4>
    <table class="table">
        <tr>
            <td>Bestell-Nr.</td>
            <td>Reifensatz-ID</td>
            <td>Datum</td>
            <td>Uhrzeit</td>
      </tr>
    

<?php 
require 'includes/connection.php';


$sql = "SELECT * FROM bestellung WHERE Status=3";
$result = $con->query($sql);


if ($result->num_rows > 0){
    
    while ($row = $result->fetch_assoc()){
    ?>    
        <tr>
            <td id="Bestell-Nr."><?php echo $row['BestellNr'];?></td>
            <td id="Reifensatz-ID"><?php echo $row['Reifensatz'];?></td>
            <td id="Datum"><?php echo date("d.m.Y", strtotime($row['Datum']));?></td>
            <td id="Uhrzeit"><?php echo $row['Zeit'];?></td>
        </tr>
    <?php
    }
}
?> 
        
        
        </table>
              
</div> 
        
        </div>
    
        
            

        <!--------------------------------Einstellung -------------------------------->

        <div id="Einstellung" class="tabcontent" style="display: none;">
            <p>Ändern Sie ihr Passwort für Sicherheit!</p> 
              <br>
              <div class="body">
                <p><label for="pass1">Passwort    :</label>
                  <input type="text" id="pass1" name="pass1" minlength="8" required></p>
                  
                  <p><label for="pass2">Wiederholen:</label>
                  <input type="text" id="pass2" name="pass2"></p>
                  
              </div>
              
              <input type="submit" value="Sign in">
         </div>

     <!----------------- Rennwochenende -------------------------------->

     <div id="Rennwochenende" class="tabcontent" style="display: block;">
        <div w3-include-html="rennWE.html"></div>       
      </div>
        <script type="text/javascript" src="./assets/timer/timer.js"></script>
      <script>
        includeHTML();
      </script>
      <script type="text/javascript" src="./assets/script.js"></script>

    </body>

    </html>
