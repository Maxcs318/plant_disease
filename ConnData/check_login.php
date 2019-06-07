<?php
session_start();
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
require_once("connectDB.php");
$sql = "SELECT * FROM member WHERE m_username = '".$strUsername."' and m_password = '".$strPassword."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

	if ($result->num_rows != 0) {
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
		$conn->close();
	}else{	
		
		require_once("connectDB.php");
		$sql = "SELECT * FROM member WHERE m_phone = '".$strUsername."' and m_password = '".$strPassword."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($result->num_rows != 0) {
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
			$conn->close();
		}else{ 
			require_once("connectDB.php");
			$sql = "SELECT * FROM member WHERE m_email = '".$strUsername."' and m_password = '".$strPassword."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if ($result->num_rows != 0) {
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
				$conn->close();
			}else{ 
				$_SESSION["checkAlert"] = 'HaHaHa';
				header("location:../login.php");
			}

		}
		

	}

    
?>
