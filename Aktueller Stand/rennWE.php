<? /*php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.html");
    exit;
}*/
?>


      


<h4 class="txt-title">Neues Rennwochenende anlegen</h4>
<form  action="./includes/rennweanlegen.php" method="post">
<table>
    <tr>
        <td>Von</td> 
        <td>Bis</td> 
        <td>Strecke</td> 
        <td>Rennformat</td> 
        <td>Reifenkontingent</td>
        <td>Bemerkung</td> 
       
        
        
        <td></td>
    </tr>
    
    <tr>
        <td><input type="date" name="von"></td>
        <td><input type="date" name="bis"></td>
        <td><input type="text" name="strecke"></td>
        <td><input type="text" name="rennformat"></td>
        <td><input type="int" name="kontingent"></td>
        <td><input type="text" name="bemerkung"></td>
        
        <td><button class="btn-block2" type="submit" value="WEanlegen" name="weanlegen">Rennwochenende anlegen</button></td>
       
    </tr>
</table>
</form>


<h5 class="txt-title">Neue Session</h5>
<form  action="./includes/sessionanlegen.php" method="post">
    <table>
        
        <tr>
            <td>Session</td> 
            <td>Datum</td> 
            <td>Beginn</td>
            <td>Ende</td>
            <td ><label for="weid">WeID</label></td>
            <td></td>
        </tr>
        <tr>
            <td><input type="text" name="sess"></td>
            <td><input type="date" name="date"></td>
            <td><input type="time" name="beginn"></td>
            <td><input type="time" name="ende"></td>
           <td><select id="weid" name="weid"> <?php
              include './includes/connection.php';

              $stmt = "SELECT * FROM `rennwochenende` ";
              $result = $con->query($stmt) or die("Bad SQL: $stmt");

            

               $opt = "<td><select name='weid'>";
                while( $row = $result->fetch_assoc()){

               
                 
               $opt .= "<option value='{$row['WeID']}'>{$row['WeID']} {$row['Strecke']} </option>\n";

               
                }echo $opt;
               $opt .= "</select></td>";

            ?>
            </td>
            <td><button class="btn-block2" type="submit" name="SEanlegen" value="add">Session anlegen</button></td>
        </tr>
    
    </table>
    </form>
    