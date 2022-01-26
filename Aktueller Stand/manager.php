
<?php /*
include('./includes/auth_check.php');

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Manager'){
  if($_SESSION['role'] == "Mitarbeiter"){
    header('location: mitarbeiter.php');
    exit;
  } else {
    header('location: ingenieur.php');
    exit;
  }
}

*/
?>






<html>
    
<head>

    <script type="text/javascript" src="assets/script.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/pages.css">
    <link rel="stylesheet" href="assets/timer/timer.css">
    <link rel="stylesheet" href="assets/diagramm.css">
    <link rel="stylesheet" href="assets/statistics.css">
    <script type="text/javascript" src="assets/script.js"></script>
    <script type="text/javascript" src="assets/timer/timer.js"></script>
 
    </head>
    <body>
       
      <div class="navbar">
        <input type="hidden" data-time="300" class="time-set" />
        <p class="time_left" id="timer_left">00:00</p>
        <p class="end_time"></p>
        <div class="menu">
            <a class="tablinks" onclick="opentab(event, 'Einstellung')">Einstellung </a>
            <a class="tablinks" onclick="window.location.href='./includes/abmelden.php';"> Logout</a>
        </div>
    </div>
    



    <div class="tab">
      <img src="./assets/lms_logo_retina.png" style="max-width:220; min-width:auto; padding-bottom: 5px;">
      <iframe style="max-width: 220px; border: none; max-height: 65px; min-width:auto; background-color: transparent;" 
      src="https://www.wetter.de/widget/mini/u1j9qt/L2RldXRzY2hsYW5kL3dldHRlci1rb2Vsbi0xODIyMDY3OS5odG1s/">
      </iframe>
      <button class="tablinks active" onclick="opentab(event, 'Benachrichtigungen')" id="defaultOpen">Benachrichtigungen</button>
      <button class="tablinks" onclick="opentab(event, 'Reifensorganisation')">Reifensorganisation</button>
      <button class="tablinks" onclick="opentab(event, 'Rennwochenende')">Rennwochenende</button>
      <button class="tablinks" onclick="opentab(event, 'Statistik')">Statistik</button>
      <button class="tablinks" onclick="opentab(event, 'Protokoll')">Protokoll</button>
      
    </div>
    




     <!----------------- Benachrichtigungen-------------------------------->

    <div id="Benachrichtigungen" class="tabcontent" style="display: block;">

          <!---the timer-->
    <!--<div class="container">
      <div class="options">
          <button data-time="20" class="option">20 sec</button>
          <button data-time="300" class="option">5 min</button>
          <button data-time="900" class="option">15 min</button>
          <button data-time="1200" class="option">20 min</button>
          <button data-time="3600" class="option">60 min</button>
          <form name="customForm" id="custom">
              <input type="text" name="minutes" class="option" placeholder="Enter Minutes...">
          </form>
      </div>
      <div class="display">
          <h1 class="time_left" id="timer_left">00:00</h1>
          <p class="end_time"></p>
          <div class="timer_options_btn">
              <button type="button" id="timer_options_foreword">foreword</button>
              <button type="button" id="timer_options_stop">stop</button>
              <button type="button"id="timer_options_reset">reset</button>
          </div>

      </div>-->
      <table>
        <tbody><tr> 
           <td> Bestellung-NR <a onclick="opentab(event, 'Offene Bestellung')">BestellungsNR</a>
            wartet auf Ihre Zustimmung </td> 
           <td></td> 
           <td></td>
        </tr>
        <!-- BestellungsNR auto incremented in DB -->
        <tr> <td>Bestellung-NR  <a onclick="opentab(event, 'Bestellung-NR')"> BestellungsNR</a>  ist in Bearbeitung </td>
          <td></td>
          <td></td>
        </tr>
    
        <tr>
          <td>Bestellung-NR  <a onclick="opentab(event, 'Bestellung-NR')">BestellungsNR</a> ist schon bestellt.
             (Wollen Sie Timer aktivieren?) </td>
          <td>
           <label for="ja">ja</label><input id="timer_activated" type="radio" name="timer_activated" value="ja">
          </td>
         <td>
          <label for="nein">nein</label><input id="timer_not_activated" type="radio" name="timer_not_activated" value="nein">  
        </td>
       </tr>
    
        <tr>
           <td>Abholung der Bestellung-NR   <a onclick="opentab(event, 'Bestellung-NR')">BestellungsNR</a>
            würde verschoben.
             (Wollen Sie den Timer reaktivieren? )</td>
          <td>
          <label for="ja">ja</label><input id="timer_reset_yes" type="radio" name="timer_reset" value="ja">
         </td>
         <td>
          <label for="nein">nein</label><input id="timer_reset_no" type="radio" name="timer_reset" value="nein"> 
        </td>
       </tr>
       <tr><td><p><br></p></td></tr>
<h4 class="txt-title">Organisation</h4>     
      <form  action="./includes/sessionwahl.php" method="post">
            <table class="table">
           
        
            <tr>  
              <?php 
              include './includes/sessionwahl.php';
              echo $opt;
              ?>
            </tr>

            <tr> 
              <td></td> 
              <td><button name="Add" id="addRow" type="submit" >Show</td>
            </tr>

          </table>
        </form>
      </tbody></table>
  </div>


  
 


        <!--------------------------------Reifensorganisation-------------------------------->
    <div id="Reifensorganisation" class="tabcontent" style="display: none;">
      <div w3-include-html="reifenorg.php">



        
      </div>

     
    </div>
        <!--------------------------------Statistik-------------------------------->

        <!--------------------------------Diagramm-------------------------------->

     <div id="Diagramm" class="tabcontent" style="display: none;">
    
      <div w3-include-html="diagramm.html"></div> 
    
     </div>
        <!--------------------------------Protokoll -------------------------------->

     <div id="Protokoll" class="tabcontent" style="display: none;">
      <div w3-include-html="protokoll.php"></div> 

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
     
       <!--------------------------------Bestellung-NR-------------------------------->

       <div id="Bestellung-NR" class="tabcontent" style="display: none;">
        <div w3-include-html="bestellungNR.html"></div> 
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
        
        
        
  
     <!----------------- Rennwochenende -------------------------------->

     <div id="Rennwochenende" class="tabcontent" style="display: none;">
      <div w3-include-html="rennWE.php"></div>       
    </div>
    
    <script>
      includeHTML();
    </script>

    </body>
    
    </html>