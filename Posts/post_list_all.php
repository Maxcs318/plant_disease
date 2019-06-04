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
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION [item-1]</p>
        <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p>
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
                    <p class="text-img-detail">Data <br>Identify</p>
                </button></a>
        </div>

    </div>

    <div class="container box-list" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12"><br>
                <h4 class="list-header"> Post All .</h4>
            </div>
        </div>
        <?php require("../ConnData/connectDB.php"); ?>
        <?php
        $sql = " SELECT * FROM posts LEFT JOIN image_of_post 
                ON posts.p_linkimage=image_of_post.iop_linkpost ORDER BY p_date DESC ";

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
                                // echo $row["iop_id"]."<br>";
                                // echo $row["iop_name"]."<br>";
                                ?>
                                <img src="../Image/image_file_post/<?php echo $row["iop_name"]; ?>" width="100%">
                            <?php
                        }
                        ?>
                        </div>
                        <div class="col-xs-8 col-md-10">
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

                            </div>
                        </div>
                    </div>

                <?php
            }
        }
    } else {
        echo "0 results";
    }
    ?>
        <a class=" btn btn-danger float-right" href="../index.php" style="width: 90px; margin:30px 0px 10px ">Back</a>

    </div>
    <?php $conn->close(); ?>
    <footer>
        <div class="row" style="margin: 30px;">

        </div>
    </footer>
</body>

</html>