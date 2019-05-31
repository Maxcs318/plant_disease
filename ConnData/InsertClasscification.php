<?php require("connectDB.php");?>
<?php
session_start();

	if($_FILES["imageforcheck"]["name"][0] != "" && $_FILES["imageforcheck"]["name"][1] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imageforcheck"]["name"][0]));
        $newfilename1= date('dmYHis').str_replace(" ", "", basename($_FILES["imageforcheck"]["name"][1]));
        if(
            move_uploaded_file($_FILES["imageforcheck"]["tmp_name"][0],"../Image/image_for_checkdisease/".$newfilename) &&
            move_uploaded_file($_FILES["imageforcheck"]["tmp_name"][1],"../Image/image_for_checkdisease/".$newfilename1)
        )
		{
                // echo "Copy/Upload Complete<br>  ".$newfilename."<br>";
                require("connectDB.php");
                $sql = "INSERT INTO classification (cl_image,cl_image2, cl_linkmember) 
                VALUES ('$newfilename','$newfilename1','".$_POST['linkmember']."')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION["imagefront"] = $newfilename;
                    $_SESSION["imageback"] = $newfilename1;
                    // header("location:../Classification/checkDisease.php");      
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();

        }
	}

    header("location:../Classification/checkDisease.php");      

?>