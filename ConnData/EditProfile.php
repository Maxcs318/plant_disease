<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Fail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
</head>
<body>
    
</body>
</html>

<?php session_start(); ?>
<?php
for($i=0;$i<count($_FILES["imageprofile"]["name"]);$i++)
{
	if($_FILES["imageprofile"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imageprofile"]["name"][$i]));
		if(move_uploaded_file($_FILES["imageprofile"]["tmp_name"][$i],"../Image/image_profile/".$newfilename))
		{
            require("connectDB.php");
            $sql = "UPDATE member SET m_imageprofile= '".$newfilename."' WHERE m_id= '".$_SESSION['m_id']."' ";
            if ($conn->query($sql) === TRUE) {
                // header("location:../allMember.php");  
                $_SESSION["m_imageprofile"] = $newfilename;       
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
	}
}
?>

<?php require("connectDB.php");?>
<?php
    $sql = "UPDATE member SET m_firstname = '".$_POST["firstname"]."',m_lastname = '".$_POST["lastname"]."',
    m_email = '".$_POST["email"]."',m_phone = '".$_POST["phone"]."',
    m_username = '".$_POST["username"]."',m_password = '".$_POST["password"]."'

    WHERE m_id = '".$_SESSION['m_id']."' ";
    if ($conn->query($sql) === TRUE) { 
		$_SESSION["m_firstname"] = $_POST["firstname"];
		$_SESSION["m_lastname"] = $_POST["lastname"];
		// $_SESSION["m_email"] = $_POST["email"];
		// $_SESSION["m_phone"] = $_POST["phone"];
        $_SESSION["m_username"] = $_POST["username"];  
        
        $_SESSION["checkAlert"]='EditProfileSuccess';
        
        header("location:../Posts/post_list_person.php"); 

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>