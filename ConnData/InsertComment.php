<?php require("connectDB.php");?>

<?php
    $sql = "INSERT INTO comment ( c_detail, c_own, c_confirm, c_date, c_linkpost) 
    VALUES ('".$_POST['commentdetail']."','".$_POST['commentown']."','".$_POST['commentconfirm']."'
    ,'".$_POST['commentdate']."','".$_POST['id_linkpost']."')";
    if ($conn->query($sql) === TRUE) {
        // header("location:../Posts/post_selected.php?getPostID=".$_POST['id_linkpost']);      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>

<?php require("connectDB.php");?>

<?php
    if($_POST['commentconfirm']!=''){
        $sql = "UPDATE posts SET p_status_comment= 'comment' , p_status_confirm ='confirm' 
        WHERE p_id='".$_POST['id_linkpost']."' ";
    }
    if($_POST['commentconfirm']==''){
        $sql = "UPDATE posts SET p_status_comment= 'comment' 
        WHERE p_id='".$_POST['id_linkpost']."' ";
    }

    if ($conn->query($sql) === TRUE) {
        header("location:../Posts/post_selected.php?getPostID=".$_POST['id_linkpost']);      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>

