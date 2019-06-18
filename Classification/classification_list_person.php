<?php session_start();
error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Classification All </title>
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
        <p class="item-1 ">ยินดีต้อนรับ คุณ <?php echo $_SESSION["m_username"]; ?></p>
        <p class="item-2 ">เข้าสู่ระบบคัดแยกโรคพืชของมะม่วง</p>
        <p class="item-3 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION</p>
    </div>
    <!-- end slide text -->
    <div class="container" style="margin-top: 70px;">
        <div class="col-md-4 col-xs-4">
            <!-- home button -->
            <a href="../index.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/home.png" class="imgabout">
                    <p class="text-img-detail">Home</p>
                </button></a>
        </div>
        <div class="col-md-4 col-xs-4">
            <!-- home button -->
            <a href="#" onclick="window.history.go(-1); return false;">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/back.svg" class="imgabout">
                    <p class="text-img-detail">Back</p>
                </button></a>
        </div>
    </div>

    <div class="container box-list">
        <div class="row">
            <div class="col-md-8 col-xs-12" style="text-align:center;"><br>
                <center>
                    <h4 class="header"> My Classification All . </h4>
                </center>
                
            </div>
            <div class="col-md-4 col-xs-12">
                <label>Status <?php echo $_GET['changStatus']; ?></label>
                <form action="" method="GET">
                    <select class="form-control" id="selectBox" name="changStatus" onchange="this.form.submit()">
                        <option value="" selected>Choose</option>
                        <option value="none">None</option>
                        <option value="confirm">Confirm</option>
                        <option value="">All</option>
                    </select><br>
                </form>

            </div>
        </div>
        <hr class="border-line">

        <?php require("../ConnData/connectDB.php"); ?>
        <?php
        if ($_GET['changStatus'] == '') {
            $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE m_id='" . $_SESSION["m_id"] . "' ORDER BY cl_id DESC ";
        } else if ($_GET['changStatus'] == 'none') {
            $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE m_id='" . $_SESSION["m_id"] . "' AND cl_confirm =' ' ORDER BY cl_id DESC ";
        } else if ($_GET['changStatus'] == 'confirm') {
            $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE m_id='" . $_SESSION["m_id"] . "' AND cl_confirm !='' ORDER BY cl_id DESC ";
        }
        ?>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            ?> <div class="row"> 
            <?php
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 col-xs-12">
                        <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <img style="display: block; margin: 0 auto;" src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>" height="" width="100%">
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <img style="display: block; margin: 0 auto;" src="../Image/image_for_checkdisease/<?php echo $row["cl_image2"]; ?>" height="" width="100%">
                        </div>
                        </div>
                        <br>
                        <b>The Disease you detected :</b> <?php echo $row["cl_disease"]; ?><br>
                        <b>Expert Confirm Disease :</b><br> <?php
                                                            if ($row["cl_confirm"] != '') {
                                                                echo $row["cl_confirm"];
                                                            } else {
                                                                echo 'Waiting to be confirmed';
                                                            }
                                                            ?><br><br>
                        <button type="submit" class="form-control btn-primary" 
                                onclick="window.location.href='classification_selected.php?getCl_id=<?php echo $row["cl_id"]; ?>'"> View</button><br><br>
                    </div>
                
                <?php
            }
            ?></div> <?php
                    } else {
                        echo "You have no classification.";
                    }
                    ?><br><br>
    </div>
    <?php $conn->close(); ?>

<footer style="margin-bottom: 50px;">

</footer>

</body>

</html>