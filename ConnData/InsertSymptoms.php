<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create post Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
</head>
<body>
    
</body>
</html>
<?php
for($i=0;$i<count($_FILES["imagesymptoms"]["name"]);$i++)
{
	if($_FILES["imagesymptoms"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imagesymptoms"]["name"][$i]));
		if(move_uploaded_file($_FILES["imagesymptoms"]["tmp_name"][$i],"../Image/image_symptoms/".$newfilename))
		{
            ?>
            <?php require("connectDB.php");?>
            <?php
                $sql = "INSERT INTO symptoms (s_name, s_detail,s_image,s_disease) 
                VALUES ('".$_POST['symptomsname']."','".$_POST['symptomsdetail']."','$newfilename','".$_POST['symptomsofdisease']."')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION["checkAlert"]='InsertSymptomsSuccess' ;  
                    header("location:../Aboutplant/Symptoms.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            ?>
            <?php
        }
	}
}
?>