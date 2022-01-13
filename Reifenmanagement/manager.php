<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.html");
    exit;
}
?>





<html>
    
<head>
    <link rel="stylesheet" href="./assets/pages.css">
    <link rel="stylesheet" href="./assets/statistics.css">
    <link rel="stylesheet" href="./assets/diagramm.css">
    <script type="text/javascript" src="./assets/script.js"></script>
 
    </head>
    <body>
       
      <div class="navbar">
        <a class="tablinks" onclick="opentab(event, 'Einstellung')">Einstellung </a> 
        <a class="tablinks" onclick="window.location.href='abmelden.php';"> Logout</a>
        <a class="tablinks" style="float: right;"> Display Timer here </a> 
      </div>
      
      <section></section>
  
    <div class="tab">
      <img src="/assets/lms_logo_retina.png" style="max-width:220; min-width:auto; padding-bottom: 5px;">
      <iframe style="max-width: 220px; border: none; max-height: 65px; min-width:auto; background-color: transparent;" 
      src="https://www.wetter.de/widget/mini/u1j9qt/L2RldXRzY2hsYW5kL3dldHRlci1rb2Vsbi0xODIyMDY3OS5odG1s/">
      </iframe>
      <button class="tablinks active" onclick="opentab(event, 'Benachrichtigungen')" id="defaultOpen">Benachrichtigungen</button>
      <button class="tablinks" onclick="opentab(event, 'Reifensorganisation')">Reifensorganisation</button>
      <button class="tablinks" onclick="opentab(event, 'Rennwochenende')">Rennwochenende</button>
      <button class="tablinks" onclick="opentab(event, 'Protokoll')">Protokoll</button>
      
    </div>
    
     <!----------------- Benachrichtigungen-------------------------------->

    <div id="Benachrichtigungen" class="tabcontent" style="display: block;">
      <table>
        <tbody><tr> 
           <td> Bestellung-NR <a onclick="opentab(event, 'Bestellung-NR')">BestellungsNR</a>
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

      </tbody></table>
       
    </div>
        <!--------------------------------Reifensorganisation-------------------------------->
    <div id="Reifensorganisation" class="tabcontent" style="display: none;">
      <div w3-include-html="reifenorg.html"></div>

     
    </div>
        <!--------------------------------Statistik-------------------------------->

    <div id="Statistik" class="tabcontent" style="display: none;">
      <div w3-include-html="statistik.html"></div>
   </div>
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
  
     <!----------------- Rennwochenende -------------------------------->

     <div id="Rennwochenende" class="tabcontent" style="display: block;">
      <div w3-include-html="rennWE.html"></div>       
    </div>
    
    <script>
      includeHTML();
    </script>

    </body>
    
    </html>