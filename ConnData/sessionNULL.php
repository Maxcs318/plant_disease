<?php
    session_start(); //เปิดใช้ session 
    if($_SESSION["m_status"]=="") {
        header("location: http://localhost/plant_disease/login.php"); //to redirect back to "index.php" after logging out
    }
?>