<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>บัญชีผู้ใช้งาน</title>
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
        ชื่อผู้ใช้ :
        <?php echo $_SESSION["m_username"]; ?>
        | สถานะ :
        <?php echo $_SESSION["m_status"]; ?>
    </div>
    <!--end user id top -->

    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">ยินดีต้อนรับ คุณ <?php echo $_SESSION["m_username"]; ?></p>
        <p class="item-2 ">เข้าสู่ระบบคัดแยกโรคพืชของมะม่วง</p>
        <p class="item-3 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION</p>
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
                        บัญชีของฉัน <br>
                        ชื่อผู้ใช้งาน :
                        <?php echo $_SESSION["m_username"]; ?> <br>
                        สถานะผู้ใช้งาน :
                        <?php echo $_SESSION["m_status"]; ?> <br>
                        <a href="../index.php">เมนูหลัก</a> |
                        <a href="../Actor/editProfile.php">แก้ไขโปรไฟล์</a> |
                        <a href="../classification/classification_list_person.php">การตรวจโรคของฉัน</a>
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
                        <h4>กระทู้ของคุฯได้รับการยืนยันแล้ว</h4>
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
                                    กระทู้หมายเลข : <?php echo $row["p_id"]; ?> ได้รับการยืนยัน
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
                        <h4>การตรวจโรคของคุณได้รับการยืนยันแล้ว</h4>
                    </center>
                    <hr>
                    <div class="row">
                        <?php
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-12 col-xs-12">
                                <a class="float:bottom" href='../Classification/classification_selected.php?getCl_id=<?php echo $row["cl_id"]; ?>'>
                                    การตรวจโรคหมายเลข : <?php echo $row['cl_id']; ?> ได้รับการยืนยัน
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
                <h4 class=" list-header">กระทู้ทั้งหมดของฉัน </h4>
            </div>
        </div> <hr>
        <!-- WHERE p_own = " . $_SESSION['m_id'] . "  -->
        <!-- find all post and push to array -->
        <?php
        $mypostAll = array();
        require("../ConnData/connectDB.php");
        $sql = " SELECT * FROM posts WHERE p_own = ".$_SESSION['m_id']." ORDER BY p_date DESC ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($mypostAll, $row["p_linkimage"]);
            }
        }
        $conn->close();
        // echo sizeof($mypostAll).'<br>';
        // echo $mypostAll[0];
        ?>
        <!-- end find -->
        <!-- start row data-->
        <?php
        for($i=0;$i<sizeof($mypostAll);$i++){
            ?>
            <div class="row">
            <?php
            // start loop image
            require("../ConnData/connectDB.php");
            $sql = " SELECT * FROM image_of_post WHERE iop_linkpost ='".$mypostAll[$i]."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 1) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-2 col-xs-6">
                        <img src="../Image/image_file_post/<?php echo $row["iop_name"]; ?>" width="100%">
                    </div>
                    <?php
                }
            }else if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    ?>
                     <div class="col-lg-2 col-xs-6"></div>
                     <div class="col-lg-2 col-xs-6">
                         <img src="../Image/image_file_post/<?php echo $row["iop_name"]; ?>" width="100%">
                     </div>
                     <?php 
                }
            }else{
                ?>
                    <div class="col-lg-4 col-xs-6">
                    </div>
                <?php
            }
            $conn->close();
            // end loop image
            //start data
            require("../ConnData/connectDB.php");
            $sql = " SELECT * FROM posts WHERE p_linkimage ='".$mypostAll[$i]."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col-xs-8 col-xs-12">
                            <div style="margin-top:20px;">
                                My Post ID: <?php echo $row["p_id"] . "<br>"; ?>
                                <h4> <?php echo $row["p_header"] . "<br>"; ?></h4>
                                <p style="text-indent: 2.5em;">
                                    <font color="black">
                                        <?php echo substr($row["p_detail"], 0, 100) . "<br>"; ?>
                                    </font>
                                </p>
                                <div style="text-align: right">Date : <?php echo substr($row["p_date"], 0, 10); ?></div>
                                <div style="text-align: right">Time : <?php echo substr($row["p_date"], 11); ?></div>
                                <a class="float:bottom" href='post_selected.php?getPostID=<?php echo $row["p_id"]; ?>'>View Post</a>
                                
                            </div>
                        </div>
                    <?php
                }
            }
            $conn->close();
            //end data
            ?>
            </div> <hr>
            <?php
        }
        ?>
        
        <!-- stop row data-->
    <!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh -->

        <!-- <?php require("../ConnData/connectDB.php"); ?>
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
                                My Post ID: <?php echo $row["p_id"] . "<br>"; ?>
                                <h4> <?php echo $row["p_header"] . "<br>"; ?></h4>
                                <p style="text-indent: 2.5em;">
                                    <font color="black">
                                        <?php echo substr($row["p_detail"], 0, 100) . "<br>"; ?>
                                    </font>
                                </p>
                                <div style="text-align: right">Date : <?php echo substr($row["p_date"], 0, 10); ?></div>
                                <div style="text-align: right">Time : <?php echo substr($row["p_date"], 11); ?></div>
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
    ?> -->
    <!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh -->
        <a class=" btn btn-danger float-right" href="../index.php" style="width: 90px; margin:30px 0px 10px ">Back</a>
    </div>

    <footer style=" margin-bottom: 50px;">
        
    </footer>

    <?php $conn->close(); ?>

    <?php
    if($_SESSION["checkAlert"]!=''){
    ?>
        <script language="javascript">
            swal({
                <?php
                if($_SESSION["checkAlert"]=='EditProfileSuccess'){
                ?>
                    title: "Edit Profile Success", 
                <?php
                }else if($_SESSION["checkAlert"]=='CreatePostSuccess'){
                ?>
                    title: "Create Post Success", 
                <?php
                }
                ?>
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