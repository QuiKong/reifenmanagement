<html>
    
<head>
    <link rel="stylesheet" href="/assets/pages.css">
    <link rel="stylesheet" href="/assets/statistics.css">
    <script type="text/javascript" src="/assets/script.js"></script>
 
    </head>
    <body>
       
        <div class="navbar">
            <a class="tablinks" onclick="opentab(event, 'Einstellung')">Einstellung </a> 
            <a class="tablinks" onclick="window.location.href='login.html';"> Logout</a>
            <a class="tablinks" style="float: right;"> Display Timer here </a> 
          </div>
          
          <section></section>
    


    <div class="tab">
        <img src="/assets/lms_logo_retina.png" style="width:200; padding-bottom: 5px;">
      <iframe style="max-width: 220px; border: none; max-height: 65px;  background-color: transparent;" 
      src="https://www.wetter.de/widget/mini/u1j9qt/L2RldXRzY2hsYW5kL3dldHRlci1rb2Vsbi0xODIyMDY3OS5odG1s/">
      </iframe>
        <button class="tablinks active" onclick="opentab(event, 'Benachrichtigung')" id="defaultOpen">Benachrichtigung</button>
        <button class="tablinks" onclick="opentab(event, 'Wetterdaten')">Wetterdaten</button>
        <button class="tablinks" onclick="opentab(event, 'Tankvorgang')">Tankvorgang</button>
  
      </div>

      <!----------------- Popup Fenester braucht noch Styling -------------------------------->
      
      <div id="popup1" class="overlay">
        <div class="popup">
          <h4>Erinnerung zum Messen der Strecken und Lufttemperatur</h4>
          <div class="tablinks" onclick="opentab(event, 'Wetterdaten')"> Klicken Sie bitte hier, um die Daten anzutragen!
          </div>
        </div>
      </div>
        
    <!----------------- Banachrichtigung -------------------------------->

    <div id="Benachrichtigung" class="tabcontent" style="display: block;">
        <table class="table">
          <tbody><tr> 
             <td> Bestellung-NR  <a onclick="opentab(event, 'Bestellung-NR')">####</a>  sollte bestellt werden</td> 
             <td></td> 
             <td></td>
          </tr>
          <tr> <td>Bestellung-NR   <a onclick="opentab(event, 'Bestellung-NR')">####</a>   ist abholbereit </td>
            <td></td>
            <td></td>
          </tr>
      
          <tr>
            <td>Bestellung-NR  <a onclick="opentab(event, 'Bestellung-NR')">####</a> ist schon bestellt. Abholung am 15/12/2021 um **:** Uhr m??glich.
               (M??chten Sie den Timer aktivieren?) </td>
            <td>
             <label for="ja">ja</label><input type="radio" id="ja" name="time_activat" value="ja">
            </td>
           <td>
            <label for="nein">nein</label><input type="radio" id="nein" name="time_activat" value="nein">  
          </td>
         </tr>
      
          <tr>
             <td> Der Abholungstermin zur Bestellung-NR   <a onclick="opentab(event, 'Bestellung-NR')">####</a> wurde verschoben.Neu Abholungstermin ist am 16/12/2021 um **:** Uhr m??glich.
               (wollen sie timer reset)</td>
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
        <h2>Wetterdaten</h2>

        <!-- Neuen Wetter-Datensatz hinzuf??gen -->  
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

         <!-- Alle Wetterdaten anzeigen lassen-->            
                
         <form action="includes/wetter_auslesen.php" method="post">
          <button type="submit" name="daten-auslesen" class="btn btn-primary btn-block">Wetterdaten auslesen</button>
          </form> 
      </div>    

       
    <!----------------- Tankvorgang -------------------------------->


    <div id="Tankvorgang" class="tabcontent" style="display: block;">

        <h2>Tankvorgang</h2>
            
        <!-- Neuen Tankvorgang hinzuf??gen -->       
            
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
            </div>    
           
            <div class="form-group"> 
            <input type="time" name="time" placeholder="" class="form-control"> 
            </div> 
            <div class="form-group">  
                <select name="driver">
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
            
        
        <!-- Tankhistorie anzeigen lassen -->           
          
          <form action="includes/tanken_auslesen.php" method="post">
          <button type="submit" name="daten-auslesen" class="btn btn-primary btn-block">Tankhistorie anzeigen</button>
          </form> 
                   
    </div>
            

          <!--------------------------------Bestellung-NR-------------------------------->

          <div id="Bestellung-NR" class="tabcontent" style="display: none;">
            <div style="padding: 20px;">
              <table class="table">
                  <tr>
                      <td > item</td>
                      <td> menge</td>
                      <td> eigenshaft1</td>
                      <td>eigenshaft2</td>
                      <td>eigenshaft3</td>
                      <td>eigenshaft4</td>
                  </tr>
              </table>
          
          </div>
              
           </div> 
        <!--------------------------------Einstellung -------------------------------->

        <div id="Einstellung" class="tabcontent" style="display: none;">
            <p>??ndern Sie ihr Passwort f??r Sicherheit!</p> 
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
      
      <script>
        includeHTML();
      </script>
     
    </body>
    
    </html>