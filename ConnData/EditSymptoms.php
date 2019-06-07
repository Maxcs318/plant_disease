<?php session_start(); ?>
<?php
for($i=0;$i<count($_FILES["imagesymptoms"]["name"]);$i++)
{
	if($_FILES["imagesymptoms"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imagesymptoms"]["name"][$i]));
		if(move_uploaded_file($_FILES["imagesymptoms"]["tmp_name"][$i],"../Image/image_symptoms/".$newfilename))
		{
            require("connectDB.php");
            $sql = "UPDATE symptoms SET s_image= '".$newfilename."' WHERE s_id= '".$_POST['symptomsid']."' ";
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
    $sql = "UPDATE symptoms SET s_name = '".$_POST["symptomsname"]."',s_detail = '".$_POST["symptomsdetail"]."'
    ,s_disease = '".$_POST["symptomsdisease"]."'

    WHERE s_id = '".$_POST['symptomsid']."' ";
    if ($conn->query($sql) === TRUE) { 
        $_SESSION["checkAlert"]='EidtSymptomsSuccess' ;
        header("location:../Aboutplant/Symptoms.php");  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>