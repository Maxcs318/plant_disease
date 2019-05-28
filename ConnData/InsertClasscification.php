<?php require("connectDB.php");?>
<?php
session_start();

for($i=0;$i<count($_FILES["imageforcheck"]["name"]);$i++)
{
	if($_FILES["imageforcheck"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imageforcheck"]["name"][$i]));
		if(move_uploaded_file($_FILES["imageforcheck"]["tmp_name"][$i],"../Image/image_for_checkdisease/".$newfilename))
		{
            // echo "Copy/Upload Complete<br>  ".$newfilename."<br>";
            require("connectDB.php");
            $sql = "INSERT INTO classification (cl_image, cl_linkmember) 
            VALUES ('$newfilename','".$_POST['linkmember']."')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION["nameimage"] = $newfilename;
                header("location:../Classification/checkDisease.php");      
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();

        }
	}
}
?>