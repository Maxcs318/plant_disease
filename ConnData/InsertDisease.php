<?php session_start(); ?>
<?php
for($i=0;$i<count($_FILES["imagedisease"]["name"]);$i++)
{
	if($_FILES["imagedisease"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imagedisease"]["name"][$i]));
		if(move_uploaded_file($_FILES["imagedisease"]["tmp_name"][$i],"../Image/image_disease/".$newfilename))
		{
            ?>
            <?php require("connectDB.php");?>
            <?php
                $sql = "INSERT INTO disease (d_name, d_detail,d_image) 
                VALUES ('".$_POST['diseasename']."','".$_POST['diseasedetail']."','$newfilename')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION["checkAlert"]='InsertDiseaseSuccess' ;    
                    header("location:../Aboutplant/Disease.php");
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