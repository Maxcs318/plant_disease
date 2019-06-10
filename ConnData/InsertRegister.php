<?php session_start(); ?>
<?php require("connectDB.php");?>
<?php
    $sql = "INSERT INTO member (m_firstname, m_lastname, m_email, m_phone, m_username, m_password, m_status, m_career) 
    VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."',
            '".$_POST['phone']."','".$_POST['username']."','".$_POST['password']."','".$_POST['status']."','".$_POST['career']."')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["checkAlert"]='RegisterSuccess';
        header("location:../login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
