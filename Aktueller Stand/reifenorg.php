


      <h4 class="txt-title">Organisation</h4>     
      <form  action="./includes/reifenorg.php" method="post">
            <table class="table">
            <tr>
              <th><label for="BestellNr">BestellNr</label></th>
              <th><label for="Reifensatz">Reifensatz</label></th>
              <th><label for="Datum"> Datum</label></th>  
              <th><label for="Zeit"> Zeit</label></th>  
              <th><label for="Status"> Status</label></th>
              <th><label for="Mitarbeiter"> Mitarbeiter</label></th>
              <th></th>          
              
            </tr>

          
   
            <tr>    
              <td><input name="bestellnr" id="BestellNr" type="number" value="" class="adding"></td>
              <td><input name="reifensatz" id="Reifensatz" type="text" value="" class="adding"></td>
              <td><input name="datum" id="Datum" type="date" value="" class="adding"></td>
              <td><input name="zeit" id="Zeit" type="time" value="" class="adding"></td>
              <td><select id="Status" name="status" multiple>
                <option value="bestellt">bestellt</option>
                <option value="abgeholt">abgeholt</option>
                <option value="beschriftet">beschriftet</option>
                <option value="heizen">heizen</option>
                <option value="Einsatz">Einsatz</option>
                <option value="gebraucht">gebraucht</option>
             </select> </td>
              
             
             
             <td><select id="Mitarbeiter" name="mitarbeiter"> 
              <?php 
                include './includes/connection.php';

                $stmt = "SELECT * FROM users";
                $result = $con->query($stmt) or die("Bad SQL: $stmt");

              $opt = "<td><select name='mitarbeiter' id='Mitarbeiter'>";
             
              while( $row = $result->fetch_assoc()){

               $opt = "<option value='{$row['Name']}'>{$row['Name']} </option>\n";
                echo $opt;
                }
               $opt .= "</select></td>"; ?>
            </td>

            
              <td><input id="addRow" name="Add" type="button" value="hinzufügen" class="btn-block2" onclick=""></td>   
            </tr>
         
             
             
          </table>
        </form>
 

         



          <h4 class="txt-title">Verfügbares Reifenkontingent</h4>

<table class="table">
    
    <tr>
        <td>ReifenID</td>
        <td>Reifenart</td>
        <td>Mischung</td>
        <td>Bezeichnung</td>
        <td>Bearbeitungsvarianten</td>
        <td>Kontingent</td>
        <td>Verfügbarkeit</td>
    </tr>

    <tr>
      
      <td>001</td>

        <td>
          <select id="Reifenart" name="Reifenart">
            <option value="Slicks">Slicks</option>
            <option value="Inters">Inters</option>
            <option value="Rain">Rain</option>
           </select>
        </td>


        <td><select id="Mischung" name="Mischung">
<option value="Slicks_1"> Cold(H/E) </option>
<option value="Slicks_2"> Medium(G/D)</option>
<option value="Slicks_3"> Hot(I/F)</option>
<option value="Inters_1"> Intermediate(H+/E+)</option>
<option value="Rain_1"> Dry wet</option>
<option value="Rain_2"> Heavy wet</option>
       </select> </td>

        <td><select id="Bezeichnung" name="Bezeichnung">
    <option value="1xx">1xx</option>
    <option value="2xx">2xx</option>
    <option value="3xx">3xx</option>
    <option value="4xx">4xx</option>
    <option value="5xx">5xx</option>
    <option value="7xx">7xx</option>
         </select> </td>


        <td><select id="Bearbeitungsvarianten" name="Bearbeitungsvarianten">
<option value="text"></option>
<option value="Keine">Keine</option>
<option value="Siped">Siped</option>
<option value="Extra_grooved">Extra grooved</option>
<option value="Extra_grooved_siped">Extra grooved and siped</option>
           </select> </td>

        <td> <input type="number"></td>

        <td><select id="Verfuegbarkeit" name="Verfuegbarkeit">
            <option value="auf_Lager">Auf Lager</option>
            <option value="nicht_verfuegbar">nicht Verfügbar</option>
            
                       </select> </td>

  </tr>

</tr>
    
    <tr>  <td><button type="bearbeiten" class="btn-block2" name="bearbeiten" value="edit">Bearbeiten</button></td>
    </tr>

</table>
