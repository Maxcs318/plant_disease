<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Fail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
</head>
<body>
    
</body>
</html>

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
        ?>
        <script language="javascript">
            swal({
            title: "Edit Symptoms Success", 
            text: "" , 
            type: "success",
            // confirmButtonText: 'Yes.',
            // confirmButtonColor: '#64e986',                
            });
            setTimeout("location.href = '../Aboutplant/Symptoms.php';", 1500);
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>