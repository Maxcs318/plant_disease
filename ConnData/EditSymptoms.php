<?php session_start(); ?>
<?php
error_reporting( error_reporting() & ~E_NOTICE );

// print_r($_POST['countimage']); 
echo $_POST['countimage']['1'];
for($i=0;$i<count($_FILES["imagesymptoms"]["name"]);$i++)
{
	if($_FILES["imagesymptoms"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["imagesymptoms"]["name"][$i]));
		if(move_uploaded_file($_FILES["imagesymptoms"]["tmp_name"][$i],"../Image/image_symptoms/".$newfilename))
		{
            require("connectDB.php");
            $sql = "UPDATE image_of_symptoms SET ios_image= '".$newfilename."' WHERE ios_id='".$_POST['countimage'][$i]."' AND ios_link_symptoms= '".$_POST['key_image']."' ";
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
<?php // delete image symptoms
    // echo sizeof($_POST['deleteimagesymptoms']). "<br>";
    if(sizeof($_POST['deleteimagesymptoms'])!=0){
        for($i=0;$i<sizeof($_POST['deleteimagesymptoms']);$i++){
            // echo $_POST['deleteimagesymptoms'][$i]."<br>";
            require("connectDB.php");
                $sql = "DELETE FROM image_of_symptoms WHERE ios_image='".$_POST['deleteimagesymptoms'][$i]."' ";
                if ($conn->query($sql) === TRUE) {
                    //
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
        }
    }
?>
<?php //insert image symptoms
for($i=0;$i<count($_FILES["insertimagesymptoms"]["name"]);$i++)
{
	if($_FILES["insertimagesymptoms"]["name"][$i] != "")
	{   
        $newfilename2= date('dmYHis').str_replace(" ", "", basename($_FILES["insertimagesymptoms"]["name"][$i]));
		if(move_uploaded_file($_FILES["insertimagesymptoms"]["tmp_name"][$i],"../Image/image_symptoms/".$newfilename2))
		{
            require("connectDB.php");
            $sql = "INSERT INTO image_of_symptoms (ios_image, ios_link_symptoms) 
            VALUES ('$newfilename2','".$_POST['key_image']."')";
            if ($conn->query($sql) === TRUE) {
                   
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

    WHERE s_link_image = '".$_POST['key_image']."' ";
    if ($conn->query($sql) === TRUE) { 
        $_SESSION["checkAlert"]='EidtSymptomsSuccess' ;
        header("location:../Aboutplant/Symptoms.php");  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
