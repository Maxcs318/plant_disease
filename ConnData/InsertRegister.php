<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->

</head>
<body>

<?php require("connectDB.php");?>
<?php
    $sql = "INSERT INTO member (m_firstname, m_lastname, m_email, m_phone, m_username, m_password, m_status) 
    VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."',
            '".$_POST['phone']."','".$_POST['username']."','".$_POST['password']."','".$_POST['status']."')";
    if ($conn->query($sql) === TRUE) {
    ?> 
        <script language="javascript">
            swal({
            title: "Register Success", 
            text: "Thank you For register." , 
            type: "success",
            confirmButtonText: 'Yes.',
            confirmButtonColor: '#64e986',
            }, function() {
                window.location.href = "../login.php";
            });        
        </script>
    <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
    
</body>
</html>
