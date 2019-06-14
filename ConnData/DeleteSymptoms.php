<?php session_start(); ?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM image_of_symptoms WHERE ios_link_symptoms='".$_GET["getID"]."' ";
    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM symptoms WHERE s_link_image='".$_GET["getID"]."' ";
    if ($conn->query($sql) === TRUE) {
    $_SESSION["checkAlert"]='DeleteSymptomsSuccess';
    header("location:../Aboutplant/Symptoms.php");      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>