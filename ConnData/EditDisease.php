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
            $sql = "UPDATE image_of_disease SET iod_image = '".$newfilename."' WHERE iod_link_disease = '".$_POST['key_disease']."' ";
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
