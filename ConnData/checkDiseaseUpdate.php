<?php session_start(); ?>
<?php require("connectDB.php");?>
<?php
    $sql = "UPDATE classification SET cl_S1 = '".$_POST["S1"]."',cl_S2 = '".$_POST["S2"]."',
    cl_S3 = '".$_POST["S3"]."',cl_S4 = '".$_POST["S4"]."',cl_S5 = '".$_POST["S5"]."',
    cl_S6 = '".$_POST["S6"]."',cl_S7 = '".$_POST["S7"]."',cl_S8 = '".$_POST["S8"]."',
    cl_S9 = '".$_POST["S9"]."',cl_S10 = '".$_POST["S10"]."',cl_S11 = '".$_POST["S11"]."',
    cl_S12 = '".$_POST["S12"]."',cl_S13 = '".$_POST["S13"]."',cl_S14 = '".$_POST["S14"]."',
    cl_S15 = '".$_POST["S15"]."',cl_S16 = '".$_POST["S16"]."',cl_disease = '".$_POST["disease"]."',
    cl_date = '".$_POST["date"]."'
    WHERE cl_image = '".$_SESSION["imagefront"]."' AND cl_image2 = '".$_SESSION["imageback"]."' ";

    $_SESSION["disease"]=$_POST["disease"];
    if ($conn->query($sql) === TRUE) {
        header("location:../Classification/resultDisease.php");    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
