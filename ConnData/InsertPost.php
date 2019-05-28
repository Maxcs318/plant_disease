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
for($i=0;$i<count($_FILES["image"]["name"]);$i++)
{
	if($_FILES["image"]["name"][$i] != "")
	{   
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["image"]["name"][$i]));
		if(move_uploaded_file($_FILES["image"]["tmp_name"][$i],"../Image/image_file_post/".$newfilename))
		{
            // echo "Copy/Upload Complete<br>  ".$newfilename."<br>";
            require("connectDB.php");
            $sql = "INSERT INTO image_of_post (iop_name, iop_linkpost) 
            VALUES ('$newfilename','".$_POST['key_post_image']."')";
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
    $sql = "INSERT INTO posts (p_header, p_detail, p_own, p_date, p_linkimage) 
    VALUES ('".$_POST['header']."','".$_POST['detail']."','".$_POST['own']."','".$_POST['date']."','".$_POST['key_post_image']."')";
    if ($conn->query($sql) === TRUE) {
        ?>
        <script language="javascript">
            swal({
            title: "Create Post Success", 
            text: "" , 
            type: "success",
            confirmButtonText: 'Yes.',
            confirmButtonColor: '#64e986',
            }, function() {
                window.location.href = "../Posts/post_list_person.php";
            });        
        </script>
        <?php      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>