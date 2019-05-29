<?php
    // session_start(); 
    if($_SESSION["m_status"]=="expert") {
        
    }else{
        header("location: http://localhost/plant_disease/login.php"); //to redirect back to "index.php" after logging out
        exit(0);
    }
?>