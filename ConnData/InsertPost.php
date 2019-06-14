<?php session_start(); ?>
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
                $_SESSION["checkAlert"]='CreatePostSuccess';
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
        $_SESSION["checkAlert"]='CreatePostSuccess';
        header("location:../Posts/post_list_person.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>