<?php
// Is User logged in?

session_start();


if(!isset($_SESSION["username"])){

header("Location: login.html");
    exit;
 }

?>


