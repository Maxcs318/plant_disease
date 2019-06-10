<?php session_start(); ?>
<?php $_GET['getCl_id']; ?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM classification WHERE cl_id='".$_GET['getCl_id']."' ";
    if ($conn->query($sql) === TRUE) {
    $_SESSION["checkAlert"]='DeleteClassificationSuccess' ;    
    header("location:../Classification/data_identify_list_all.php");      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>