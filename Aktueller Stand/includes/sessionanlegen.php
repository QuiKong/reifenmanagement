<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


if(isset($_POST["SEanlegen"])){

   include "./connection.php";

        $session = $_POST["sess"];
        $date = $_POST["date"];
        $beginn = $_POST["beginn"];
        $ende = $_POST["ende"];
        $weid = $_POST["weid"];

        $session = stripslashes($session);
        $date = stripslashes($date);
        $beginn = stripslashes($beginn);
        $ende = stripslashes($ende);
        $weid = stripslashes($weid);  

        $session = mysqli_real_escape_string($con, $session);
        $date = mysqli_real_escape_string($con, $date);
        $beginn = mysqli_real_escape_string($con, $beginn);
        $ende= mysqli_real_escape_string($con, $ende);
        $weid = mysqli_real_escape_string($con, $weid);
      
        $stmts = "INSERT INTO `session` (`Session`, `Datum`, `Beginn`, `Ende`,WeID) VALUES ('$session', '$date', '$beginn','$ende',$weid)";
        if($con->query($stmts) == TRUE){
             echo "Session erfolgreich erstellt";
        };
       



    //mysqli_close($con);
  
}
echo '<br><br>' ;
echo '<a href="../manager.php">Zurueck zur Eingabe</a>';
?>