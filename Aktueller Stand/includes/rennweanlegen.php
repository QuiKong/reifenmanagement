<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);




if(isset($_POST["WEanlegen"])){

   include "connection.php";

        $von = $_POST["von"];
        $bis = $_POST["bis"];
        $strecke = $_POST["strecke"];
        $rennformat = $_POST["rennformat"];
        $kontingent = $_POST["kontingent"];
        $bemerkung = $_POST["bemerkung"];

        $von = stripslashes($von);
        $bis = stripslashes($bis);
        $strecke = stripslashes($strecke);
        $rennformat = stripslashes($rennformat);
        $kontingent = stripslashes($kontingent);
        $bemerkung = stripslashes($bemerkung);
        
        $von = mysqli_real_escape_string($con, $von);
        $bis = mysqli_real_escape_string($con, $bis);
        $strecke = mysqli_real_escape_string($con, $strecke);
        $rennformat = mysqli_real_escape_string($con, $rennformat);
        $kontingent = mysqli_real_escape_string($con, $kontingent);
        $bemerkung = mysqli_real_escape_string($con, $bemerkung); 

        $stmt = "INSERT INTO `rennwochenende` (`Von_Datum`, `Bis_Datum`, `Strecke`, `Format`, `Gesamtkontingent`, `Bemerkung`) VALUES ('$von', '$bis', '$strecke','$rennformat','$kontingent', '$bemerkung')";
        if($con->query($stmt) == TRUE){
             echo '<script>alert("Rennwochenende erfolgreich erstellt")</script>';
        };
       



    //mysqli_close($con);
  
}
    

?>