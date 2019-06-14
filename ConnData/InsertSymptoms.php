<?php session_start(); ?>
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
                $sql = "INSERT INTO image_of_symptoms (ios_image,ios_link_symptoms) 
                VALUES ('$newfilename','".$_POST['key_symptoms_image']."')";
                if ($conn->query($sql) === TRUE) {
                
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
<?php require("connectDB.php");?>
    <?php
        $sql = "INSERT INTO symptoms (s_name, s_detail,s_disease,s_link_image) 
        VALUES ('".$_POST['symptomsname']."','".$_POST['symptomsdetail']."','".$_POST['symptomsofdisease']."','".$_POST['key_symptoms_image']."')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION["checkAlert"]='InsertSymptomsSuccess' ;  
            header("location:../Aboutplant/Symptoms.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>