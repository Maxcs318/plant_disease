<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Post All </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->

</head>

<body>

    <?php session_start(); ?>
    <div style="text-align:right" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>
    </div>

    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">ยินดีต้อนรับ คุณ <?php echo $_SESSION["m_username"]; ?></p>
        <p class="item-2 ">เข้าสู่ระบบคัดแยกโรคพืชของมะม่วง</p>
        <p class="item-3 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 50px;">
        <!-- home button -->
        <div class="col-md-4 col-xs-4">
            <a href="../index.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/home.png" class="imgabout">
                    <p class="text-img-detail">Home</p>
                </button></a>
        </div>

        <div class="col-md-4 col-xs-4">
            <!-- symptoms button -->
            <a href="../Classification/data_identify_list_all.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/pageicon/dataidentify.png" class="imgabout">
                    <p class="text-img-detail">Data Identify</p>
                </button></a>
        </div>
    </div>

    <div class="container box-list" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12"><br>
                <h4 class="list-header"> Post All .</h4>
            </div>
        </div> <hr>
        <!-- find all post and push to array -->
        <?php
        $postAll = array();
        require("../ConnData/connectDB.php");
        $sql = " SELECT * FROM posts ORDER BY p_date DESC ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($postAll, $row["p_linkimage"]);
            }
        }
        $conn->close();
        // echo sizeof($postAll);
        // echo $postAll[0];
        ?>
        <!-- end dind -->
        
        <?php
        for($i=0;$i<sizeof($postAll);$i++){
            ?>
            <div class="row">
            <?php
            // start loop image
            require("../ConnData/connectDB.php");
            $sql = " SELECT * FROM image_of_post WHERE iop_linkpost ='".$postAll[$i]."' ";
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
            $sql = " SELECT * FROM posts WHERE p_linkimage ='".$postAll[$i]."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-8 col-xs-12">
                        <div style="margin-top:20px;">
                                Post ID: <?php echo $row["p_id"] . "<br>"; ?>
                                <h4> <?php echo $row["p_header"] . "<br>"; ?></h4>
                                <p style="text-indent: 2.5em;">
                                    <font color="black">
                                        <?php echo substr($row["p_detail"], 0, 100) . "<br>"; ?>
                                    </font>
                                </p>
                                <div style="text-align: right">Date : <?php echo substr($row["p_date"], 0, 10); ?></div>
                                <div style="text-align: right">Time : <?php echo substr($row["p_date"], 11); ?></div>
                                <a class="float:bottom" href='post_selected.php?getPostID=<?php echo $row["p_id"]; ?>'>View Post</a>
                                
                                <?php if( $_SESSION["m_status"]=='admin'){ ?>
                                <div class="row">
                                    <div class="col-lg-9 col-xs-6"></div>
                                    <div class="col-lg-3 col-xs-6">
                                       <input type="button" class="btn-danger form-control col-lg-12 col-xs-6" value="Delete." onclick="deleteData(<?php echo $row['p_id'];?>)" >
                                    </div>
                                </div>
                                <?php } ?>

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
        

        <a class=" btn btn-danger float-right" href="../index.php" style="width: 90px; margin:30px 0px 10px ">Back</a>

    </div>
    <?php // $conn->close(); ?>

    <footer style="margin-bottom: 50px;">

    </footer>
    <script>
        function deleteData(getid) {
            swal({
            title: "Are you sure?", 
            text: "You want to Delete this Post." , 
            type: "warning",
            confirmButtonText: 'Yes.',
            confirmButtonColor: '#DD6B55',
            showCancelButton: true ,
            }, function() {
                window.location.href='../ConnData/DeletePost.php?getp_id='+getid;
            });
        }
    </script>
    <?php if( $_SESSION["checkAlert"]=='DeletePostSuccess'){ ?>
        <script>
            swal({
            title: "Delete Post Success", 
            text: "" , 
            type: "success",              
            });
        </script>
    <?php } 
    $_SESSION["checkAlert"]='';
    ?>
    
</body>

<style>
    @media screen and (max-width: 500px) {
        h4 {
            font-size: 15px;
        }

        p {
            font-size: 12px;
        }
    }
</style>

</html>