<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container box-list">
    <?php require("../ConnData/connectDB.php"); ?>
        <?php
            $sql = "SELECT * FROM classification WHERE cl_id = '" . $_GET["getCl_id"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="row"><!-- start row 1-->
                        <div class="col-lg-12 col-xs-12"><br>
                            <center>
                                <h4 class="header">Classification ID : <?php echo $_GET["getCl_id"]; ?> </h4>
                            </center>
                            <hr class="border-line">
                        </div>
                    </div><!-- end row 1-->
                    <div class="row" style="margin-left:auto; margin-right: auto;"> <!-- start row 2-->

                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <img style="width: 100%" class="myImages" id="myImg" alt="Font Leaf" src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>">
                            <center>Front Leaf</center>
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <img style="width: 100%" class="myImages" id="myImg" alt="Back Leaf" src="../Image/image_for_checkdisease/<?php echo $row["cl_image2"]; ?>">
                            <center>Back Leaf</center>
                        </div>

                    </div> <!-- end row 2-->
                    <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <hr class="border-line">
                        <h2>Results Of Owner </h2>
                        S1 : Leaf become a lesion [ <?php if ($row['cl_S1'] == 1) {
                                                        echo '&#x2713';
                                                    } else {
                                                        echo '&#x2717';
                                                    }   ?> ] <br>
                        S2 : check on lesion area [ <?php if ($row['cl_S2'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    }   ?> ] <br>
                        S3 : Blight on leaf [ <?php if ($row['cl_S3'] == 1) {
                                                    echo '&#x2713 ';
                                                } else {
                                                    echo '&#x2717';
                                                }   ?> ] <br>
                        S4 : Mature lesion are explanded and become dark-brown [ <?php if ($row['cl_S4'] == 1) {
                                                                                        echo '&#x2713 ';
                                                                                    } else {
                                                                                        echo '&#x2717';
                                                                                    } ?> ] <br>
                        S5 : Lesion occur at leaf margin [ <?php if ($row['cl_S5'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            }   ?> ] <br>
                        S6 : Tiny and irregular spot appear on leaf [ <?php if ($row['cl_S6'] == 1) {
                                                                            echo '&#x2713 ';
                                                                        } else {
                                                                            echo '&#x2717';
                                                                        }  ?> ]<br>
                        S7 : Rust-colored or orange spot on leaf [ <?php if ($row['cl_S7'] == 1) {
                                                                        echo '&#x2713 ';
                                                                    } else {
                                                                        echo '&#x2717';
                                                                    } ?> ]<br>
                        S8 : White spot on leaf [ <?php if ($row['cl_S8'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S9 : Greenish-gray spot on leaf [ <?php if ($row['cl_S9'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S10 : Brown spot on leaf [ <?php if ($row['cl_S10'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S11 : Black spot on leaf [ <?php if ($row['cl_S11'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S12 : Brown or orange powdery appear on the underside of leaf [ <?php if ($row['cl_S12'] == 1) {
                                                                                            echo '&#x2713 ';
                                                                                        } else {
                                                                                            echo '&#x2717';
                                                                                        } ?> ]<br>
                        S13 : Wither on the tip of leaf [ <?php if ($row['cl_S13'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S14 : Watery around lesion area [ <?php if ($row['cl_S14'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S13 : Yellow margin around a lesion [ <?php if ($row['cl_S15'] == 1) {
                                                                    echo '&#x2713 ';
                                                                } else {
                                                                    echo '&#x2717';
                                                                } ?> ]<br>
                        S16 : Leaf is irregular shape [ <?php if ($row['cl_S16'] == 1) {
                                                            echo '&#x2713 ';
                                                        } else {
                                                            echo '&#x2717';
                                                        } ?> ]<br>
                        </div> 
                    </div><br><br>
                <?php } 
                }else{
                    echo 'error';
                }
                $conn->close();
         ?>
        <div class="row">
        <div class="col-lg-6 col-xs-12">
                Chart 1
            </div>
            <div class="col-lg-6 col-xs-12">
                Chart 2
            </div>
        </div>
    </div>
</body>
</html>