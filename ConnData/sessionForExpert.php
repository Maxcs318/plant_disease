<?php
    // session_start(); 
    if($_SESSION["m_status"]=="expert") {
        
    }else{
        header("location:http://localhost/plant/login.php"); 
        exit(0);
    }
?>