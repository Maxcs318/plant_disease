<?php
session_start();
require("connectDB.php");?>
<?php
    $sql = "UPDATE classification SET 
    cl_status_confirm = 'confirm'
    WHERE cl_id = '".$_POST["Cl_id"]."' ";
    if ($conn->query($sql) === TRUE) { 
        //  header("location:../Classification/data_identify_list_all.php");       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
<?php require("connectDB.php");?>
<?php
    $sql = "INSERT INTO classification_confirm (
        cc_link_class,
        cc_disease,
        cc_own,
        cc_S1,cc_S2,cc_S3,cc_S4,cc_S5,cc_S6,cc_S7,cc_S8,
        cc_S9,cc_S10,cc_S11,cc_S12,cc_S13,cc_S14,cc_S15,cc_S16
        ) 
    VALUES (
        '".$_POST["Cl_id"]."',
        '".$_POST["newDisease"]."',
        '".$_SESSION["m_id"]."',
        '".$_POST["S1"]."','".$_POST["S2"]."','".$_POST["S3"]."','".$_POST["S4"]."',
        '".$_POST["S5"]."','".$_POST["S6"]."','".$_POST["S7"]."','".$_POST["S8"]."',
        '".$_POST["S9"]."','".$_POST["S10"]."','".$_POST["S11"]."','".$_POST["S12"]."',
        '".$_POST["S13"]."','".$_POST["S14"]."','".$_POST["S15"]."','".$_POST["S16"]."'
        )";

    if ($conn->query($sql) === TRUE) { 
        $_SESSION["getthecl_id"]=$_POST["Cl_id"];
        header("location:InsertResultDiseaseofClassification.php");       
        // header("location:../Classification/data_identify_list_all.php");       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>