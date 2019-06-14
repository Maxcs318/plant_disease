<?php session_start(); ?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM disease WHERE d_link_image='".$_GET["getKeylink"]."' ";
    if ($conn->query($sql) === TRUE) {
    // $_SESSION["checkAlert"]='DeleteDiseaseSuccess';
    // header("location:../Aboutplant/Disease.php");      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM image_of_disease WHERE iod_link_disease='".$_GET["getKeylink"]."' ";
    if ($conn->query($sql) === TRUE) {
    $_SESSION["checkAlert"]='DeleteDiseaseSuccess';
    header("location:../Aboutplant/Disease.php");      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>