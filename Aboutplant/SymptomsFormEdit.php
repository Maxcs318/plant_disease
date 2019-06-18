<?php session_start(); ?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Symptoms </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
    <!-- bootstrap toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function() {
            // var count = 0;
            $('#add_image1').click(function() {
                //   count = count-1;
                $('.xyz').append('<div class="col-lg-4 col-xs-12"><img src="../Image/image_disease/choose.png" width="100%" alt=""><br>' +
                    '<br><input type="file" name="insertimagesymptoms[]" > <br></div>'
                );
            });
        });
    </script>

    <head>

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
            <form action="../ConnData/EditSymptoms.php" method="post" enctype="multipart/form-data">

                <!-- // find disease all in database -->
                <?php
                $diseaseSelect = array();
                require("../ConnData/connectDB.php");
                $sql = " SELECT * FROM disease WHERE d_name !='Normal' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        array_push($diseaseSelect, $row["d_name"]);
                    }
                } else {
                    echo "0 Comment .";
                }
                $conn->close();
                // print_r(sizeof($diseaseSelect)); 
                ?>
                <!-- // end of find -->
                <?php
                $arrayImage = array();  //countimage
                require("../ConnData/connectDB.php");
                $sql = " SELECT * FROM image_of_symptoms WHERE ios_link_symptoms ='" . $_GET['getKey'] . "' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    ?>
                    <div class="row">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            array_push($arrayImage, $row['ios_id']); //countimage
                            ?>
                            <div class="col-lg-3 col-xs-12" style="display: block; margin: 0 auto;">
                                <br>
                                <!-- toggle Delete -->
                                <input type="checkbox" data-toggle="toggle" data-on="Delete" data-off="Not Delete" data-onstyle="danger" data-offstyle="success" name="deleteimagesymptoms[]" value="<?php echo $row['ios_image']; ?>">
                                <br><br>
                                <img style="display: block; margin: 0 auto;" id="blah<?php echo $row['ios_id']; ?>" src="../Image/image_symptoms/<?php echo $row['ios_image']; ?>" width="100%" alt="">
                                <br>
                                <input type="file" id="image<?php echo $row['ios_id']; ?>" name="imagesymptoms[]"> <br>

                            </div>
                            <script>
                                function readURL<?php echo $row['ios_id']; ?>(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            $('#blah<?php echo $row['ios_id']; ?>').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                                $("#image<?php echo $row['ios_id']; ?>").change(function() {
                                    readURL<?php echo $row['ios_id']; ?>(this);
                                });
                            </script>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
                    for ($a = 0; $a < sizeof($arrayImage); $a++) {
                        ?>
                        <input type="hidden" name="countimage[]" value="<?php echo $arrayImage[$a]; ?>">
                    <?php
                }
            } else {
                echo "0 Comment .";
            }
            $conn->close();
            ?>
                <div class="row">
                    <div class="xyz col-lg-12 col-xs-12"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-xs-12"></div>
                    <div class="col-lg-6 col-xs-12"> <br>
                        <input class="btn-primary form-control col-lg-4 col-xs-6" style="float: right;" type="button" value="Add Image" id="add_image1">
                    </div>
                    <div class="col-lg-3 col-xs-12"></div>
                </div>
                <?php
                require("../ConnData/connectDB.php");
                $sql = " SELECT * FROM symptoms WHERE s_link_image ='" . $_GET['getKey'] . "' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    ?>
                    <div class="row">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-3 col-xs-12">
                                <!-- // Key  -->
                                <input type="hidden" name="key_image" value="<?php echo $row["s_link_image"]; ?>">
                            </div>
                            <div class="col-lg-6 col-xs-12"> <br>

                                <h4>Name of Symptoms</h4>
                                <input type="text" class="form-control " name="symptomsname" maxlength="50" value="<?php echo $row['s_name']; ?>" required>
                                <br>
                                <h4>Detail</h4>
                                <textarea class="form-control" rows="4" type="text" name="symptomsdetail" required><?php echo $row['s_detail']; ?></textarea>
                                <br>
                                <h4>Disease of Symptoms</h4>
                                <select class="form-control" name="symptomsdisease" style="float: left;">
                                    <?php
                                    for ($i = 0; $i < sizeof($diseaseSelect); $i++) {
                                        if ($row['s_disease'] == $diseaseSelect[$i]) {
                                            ?>
                                            <option value="<?php echo $diseaseSelect[$i]; ?>" selected><?php echo $diseaseSelect[$i]; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                            <option value="<?php echo $diseaseSelect[$i]; ?>"><?php echo $diseaseSelect[$i]; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                                </select> <br><br><br>
                                <button type="submit" class="btn-primary form-control col-lg-4 col-xs-12" style="float: right;"> Save </button>
                                <br><br><br><br>
                                </from>
                            </div>
                            <div class="col-lg-3 col-xs-12"></div>
                        <?php
                    }
                    ?>
                    </div>
                <?php
            } else {
                echo "0 Comment .";
            }
            $conn->close();
            ?>
        </div>
        <footer style="margin-bottom: 50px;">

        </footer>
    </body>

</html>