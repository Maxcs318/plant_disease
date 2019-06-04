<?php
    // session_start(); 
    if($_SESSION["m_status"]=="admin") {
        
    }else{
        header("location: http://localhost/plant_disease/login.php");
        exit(0);
    }
?>