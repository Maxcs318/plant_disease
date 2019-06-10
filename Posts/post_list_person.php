<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Post All </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->

</head>

<body>

    <!-- user id top -->
    <div style="text-align:right;" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>
    </div>
    <!--end user id top -->

    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION [item-1]</p>
        <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p>
    </div>
    <!-- end slide text -->

    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-md-2">
                <?php if($_SESSION['m_imageprofile']==''){ ?>
                    <img src="../img/pageicon/aboutme.png ?>" class="about-img">

                <?php }else{ ?>
                    <img src="../Image/image_profile/<?php echo $_SESSION["m_imageprofile"]; ?>" class="about-img">
                <?php } ?>
            </div>
            <div class="col-xs-9 col-md-6 about-header">
                <div class="about-box">
                    <div class="about-text-id">
                        My Profile <br>
                        Username :
                        <?php echo $_SESSION["m_username"]; ?> <br>
                        Status :
                        <?php echo $_SESSION["m_status"]; ?> <br>
                        <a href="../index.php">Home</a> |
                        <a href="../Actor/editProfile.php">Edit profile</a> |
                        <a href="../classification/classification_list_person.php">Classification</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-md-4">
            </div>
        </div>
    </div>

    <!-- alert post and classification -->
    <div class="container " style="margin: auto; margin-top: 30px; background-color:white;">
        <div class="row">
            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = " SELECT * FROM posts WHERE p_status_comment !='' AND p_own='" . $_SESSION["m_id"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                ?>
                <div class="col-lg-6 col-xs-12">
                    <center>
                        <h4>Posts that have been comments.</h4>
                    </center>
                    <hr>
                    <div class="row">
                        <?php
                        // output data of each row
                        $check_post1 = 'a';
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-12 col-xs-12">
                                <a class="float:bottom" href='post_selected.php?getPostID=<?php echo $row["p_id"]; ?>'>
                                    Post ID: <?php echo $row["p_id"]; ?> Have been Comments.
                                </a>
                            </div>
                        <?php
                    }
                    ?>
                    </div><br>
                </div>
            <?php
        } else {
            // echo "";
        }
        $conn->close();
        ?>

            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE cl_status_confirm !='' AND m_id='" . $_SESSION["m_id"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                ?>
                <div class="col-lg-6 col-xs-12">
                    <center>
                        <h4>Classification that have been confirm.</h4>
                    </center>
                    <hr>
                    <div class="row">
                        <?php
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-12 col-xs-12">
                                <a class="float:bottom" href='../Classification/classification_selected.php?getCl_id=<?php echo $row["cl_id"]; ?>'>
                                    Classification : ID <?php echo $row['cl_id']; ?> Have been Confirm.
                                </a>
                            </div>
                        <?php
                    }
                    ?>
                    </div><br>
                </div>
            <?php
        } else {
            // echo "";
        }
        $conn->close();
        ?>

        </div>
    </div>
    <!-- end alert post and classification -->
    <div class="container box-list" style="margin: auto; margin-top: 30px;">
        <div class="row">
            <div class="col-xs-12 col-md-12"><br>
                <h4 class=" list-header">My Post All </h4>
            </div>
        </div>
        <?php require("../ConnData/connectDB.php"); ?>
        <?php
        $sql = " SELECT * FROM posts  LEFT JOIN image_of_post 
                ON posts.p_linkimage=image_of_post.iop_linkpost
                WHERE posts.p_own = " . $_SESSION['m_id'] . " 
                ORDER BY p_id DESC ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $check_post = 'a';
            while ($row = $result->fetch_assoc()) {

                if ($check_post != $row["p_linkimage"]) {
                    $check_post = $row["p_linkimage"];
                    ?>

                    <div class="row border-line">
                        <div class="col-xs-4 col-md-2" style="margin-top:20px;">
                            <?php
                            if ($row["iop_name"] != '') {
                                ?>
                                <img src="../Image/image_file_post/<?php echo $row["iop_name"]; ?>" width="100%">
                            <?php
                        }
                        ?>
                        </div>
                        <div class="col-xs-8 col-md-10">
                            <div style="margin-top:20px;">
                                Post ID: <?php echo $row["p_id"] . "<br>"; ?>
                                Header : <?php echo $row["p_header"] . "<br>"; ?>
                                Detail : <?php echo substr($row["p_detail"], 0, 100) . "<br>"; ?>
                                Date : <?php echo substr($row["p_date"], 0, 10)  . "<br>"; ?>
                                Time : <?php echo substr($row["p_date"], 11)  . "<br>"; ?>
                                <a class="float:bottom" href='post_selected.php?getPostID=<?php echo $row["p_id"]; ?>'>View Post</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    } else {
        echo " You have no posts. ";
    }
    ?>
        <a class=" btn btn-danger float-right" href="../index.php" style="width: 90px; margin:30px 0px 10px ">Back</a>
    </div>

    <footer style=" margin-bottom: 50px;">
        
    </footer>

    <?php $conn->close(); ?>

    <?php
    if($_SESSION["checkAlert"]=='EditProfileSuccess'){
    ?>
        <script language="javascript">
            swal({
            title: "Edit Profile Success", 
            text: "" , 
            type: "success",             
            });
        </script>
    <?php
    }
    $_SESSION["checkAlert"]='';
    ?>
</body>

</html>