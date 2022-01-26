<?php
              include './includes/connection.php';

              $stmt = "SELECT * FROM `session`";
              $result = $con->query($stmt) or die("Bad SQL: $stmt");

            

               $opt = "<td><select name='session'>";
                while( $row = $result->fetch_assoc()){

               $opt .= "<option value='{$row['SessionID']}'>{$row['SessionID']} </option>\n";

                }
               $opt .= "</select></td>";
     
            ?>






<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);




if(isset($_POST["Add"])){

   include "./connection.php";

        $bestellnr = $_POST["bestellnr"];
        $reifensatz = $_POST["reifensatz"];
        $datum = $_POST["datum"];
        $zeit = $_POST["zeit"];
        $status = $_POST["status"];
        $mitarbeiter = $_POST["mitarbeiter"];

        $bestellnr = stripslashes($bestellnr);
        $reifensatz = stripslashes($reifensatz);
        $datum = stripslashes($datum);
        $zeit = stripslashes($zeit);
        $status = stripslashes($status);
        $mitarbeiter = stripslashes($mitarbeiter);

        $bestellnr = mysqli_real_escape_string($con, $bestellnr);
        $reifensatz = mysqli_real_escape_string($con, $reifensatz);
        $datum = mysqli_real_escape_string($con,$datum);
        $zeit = mysqli_real_escape_string($con, $zeit);
        $status = mysqli_real_escape_string($con, $status);
        $mitarbeiter = mysqli_real_escape_string($con, $mitarbeiter);

        $stmt = "INSERT INTO `bestellung` (`BestellNR`, `Reifensatz`, `Datum`, `Zeit`, `Status`, `Mitarbeiter`) VALUES ('$bestellnr', '$reifensatz', '$datum','$zeit','$status', '$mitarbeiter')";
        if($con->query($stmt) == TRUE){
             echo "Besttellung erfolgreich erstellt";
        };
       



    //mysqli_close($con);
  
}
    

?>