<?php session_start(); ?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM symptoms WHERE s_id='".$_GET["getID"]."' ";
    if ($conn->query($sql) === TRUE) {
    $_SESSION["checkAlert"]='DeleteSymptomsSuccess';
    header("location:../Aboutplant/Symptoms.php");      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>