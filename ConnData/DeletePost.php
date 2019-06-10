<?php session_start(); ?>
<?php echo $_GET['getp_id']; ?>
<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM posts WHERE p_id='".$_GET['getp_id']."' ";
    if ($conn->query($sql) === TRUE) {
    $_SESSION["checkAlert"]='DeletePostSuccess' ;    
    header("location:../Posts/post_list_all.php");      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>