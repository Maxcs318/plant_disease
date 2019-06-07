<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Fail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> sweetalert -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> sweetalert -->
<!-- </head>
<body>
    
</body>
</html> -->

<?php session_start(); ?>
<?php
for($i=0;$i<count($_FILES["imagedisease"]["name"]);$i++)
{
	if($_FILES["imagedisease"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imagedisease"]["name"][$i]));
		if(move_uploaded_file($_FILES["imagedisease"]["tmp_name"][$i],"../Image/image_disease/".$newfilename))
		{
            require("connectDB.php");
            $sql = "UPDATE disease SET d_image= '".$newfilename."' WHERE d_id= '".$_POST['diseaseid']."' ";
            if ($conn->query($sql) === TRUE) {
                // header("location:../allMember.php");  
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
    $sql = "UPDATE disease SET d_name = '".$_POST["diseasename"]."',d_detail = '".$_POST["diseasedetail"]."'

    WHERE d_id = '".$_POST['diseaseid']."' ";
    if ($conn->query($sql) === TRUE) { 
        $_SESSION["checkAlert"]='EidtDiseassSuccess' ;
        header("location:../Aboutplant/Disease.php");  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
