<?php
session_start();
require_once("connectDB.php");

if(isset($_SESSION["m_status"])){
    if($_SESSION["m_status"] == "admin"){
        header("location:../Actor/Admin/AdminPage.php");
    }else if($_SESSION["m_status"] == "expert"){
        header("location:../Actor/Expert/ExpertPage.php");
    }else if($_SESSION["m_status"] == "user") {
        header("location:../Actor/User/UserPage.php");
    }
}

$strUsername = $_POST['username'];
$strPassword = $_POST['password'];

$sql = "SELECT * FROM member WHERE m_username = '".$strUsername."' and m_password = '".$strPassword."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

	if ($result->num_rows == 0) {
		?>
		<!DOCTYPE html>
		<html>
		<head>    
    	</head>
		<body onload="setTimeout(function() { document.frm1.submit() },10)">
            <form action="../login.php" name="frm1" method="POST">
                <input type="hidden" name="checkLogin" value="Username or Password is Incorrect" />
            </form>
        </body>
		</html>
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
