<?php session_start(); ?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM disease WHERE d_id='".$_GET["getID"]."' ";
    if ($conn->query($sql) === TRUE) {
    $_SESSION["checkAlert"]='DeleteDiseaseSuccess';
    header("location:../Aboutplant/Disease.php");      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>