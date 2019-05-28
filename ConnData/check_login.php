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
<?php
session_start();
require_once("connectDB.php");

$strUsername = $_POST['username'];
$strPassword = $_POST['password'];

$sql = "SELECT * FROM member WHERE m_username = '".$strUsername."' and m_password = '".$strPassword."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

	if ($result->num_rows == 0) {
		?>
		<script language="javascript">
			swal({
			title: "Please Login Again .", 
			text: " Username or Password is incorrect." , 
			type: "error",
			confirmButtonText: 'Back.',
			confirmButtonColor: '#DD6B55',
			}, function() {
				window.location.href = "../login.php";
			});        
		</script>
	<?php	
	}else{	
		$_SESSION["m_id"] = $row["m_id"];
		$_SESSION["m_firstname"] = $row["m_firstname"];
		$_SESSION["m_lastname"] = $row["m_lastname"];
		// $_SESSION["m_email"] = $row["m_email"];
		// $_SESSION["m_phone"] = $row["m_phone"];
		$_SESSION["m_status"] = $row["m_status"];
		$_SESSION["m_username"] = $row["m_username"];
		$_SESSION["m_imageprofile"] = $row["m_imageprofile"];  

		//Bla Bla Bla
		session_write_close();
		if($row["m_status"] == "admin"){
			header("location:../Actor/Admin/AdminPage.php");
		}else if($row["m_status"] == "expert"){
			header("location:../Actor/Expert/ExpertPage.php");
		}else if($row["m_status"] == "user") {
			header("location:../Actor/User/UserPage.php");
		}
			
	}
$conn->close();
    
?>
