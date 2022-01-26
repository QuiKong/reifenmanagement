<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);




if(isset($_POST["submit"])){

   include "./connection.php";

        $username = $_POST["uname"];
        $password = $_POST["psw"];

        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $stmt = "SELECT * FROM `users` WHERE Name = '$username'";
        $result = $con->query($stmt);
        
        if($result->num_rows == 1)
        {
            
            $row = $result->fetch_assoc();
            
            if(password_verify($password, $row["Passwort"])){
                session_start();
                $_SESSION["username"] = $row["Name"];
                $_SESSION["role"] = $row["Rolle"];
                if(  $_SESSION["role"]== "Manager"){
                header("Location: ../manager.php");
                exit;
                } 
                else if(  $_SESSION["role"]== "ingenieur"){
                    header("Location: ../ingenieur.php");
                exit;
                } else{
                    header("Location: ../mitarbeiter.php");
                exit;
                }

            }   else{
                echo " Der Login ist fehlgeschlagen";
           
            }
        } else {
            echo " Der Login ist fehlgeschlagen";

        }
        
    
    
    
}
    

?>