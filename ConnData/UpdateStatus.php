<?php session_start(); ?>
<?php
    require("connectDB.php");
    // echo $_GET['getID'];
    $sql = "UPDATE member SET m_status='expert' WHERE m_id= '".$_GET['getID']."' ";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        $_SESSION["checkAlert"]='UpdateStatusSuccess';
        header("location:../allMember.php"); //to redirect back to "index.php" after logging out
    }else {
        echo "0 results";
    }
     $conn->close();
?>
