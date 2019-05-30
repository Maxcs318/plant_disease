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
                    ?>
                    <script language="javascript">
                        swal({
                        title: "Insert Disease Success", 
                        text: "" , 
                        type: "success",
                        confirmButtonText: 'Yes.',
                        confirmButtonColor: '#64e986',
                        }, function() {
                            window.location.href = "../Aboutplant/Disease.php";
                        });        
                    </script>
                    <?php      
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