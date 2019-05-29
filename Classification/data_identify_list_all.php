<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Identify All </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>

<body>
    <?php session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    ?>

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

    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-md-2">
                <img src="../Image/image_profile/<?php echo $_SESSION["m_imageprofile"]; ?>" class="about-img">
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

    <div class="container box-list">
        <div class="row">
            <div class="col-lg-8 col-xs-12" style="text-align:center;"><br>
                <h4 class="list-header">Data Identify All .</h4>
                <a href="../index.php">Home</a> |
                <a href="">Button 1</a> |
                <a href="">Button 2</a>
            </div>
            <div class="col-lg-4 col-xs-12">
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
        <?php require("../ConnData/connectDB.php"); ?>
        <?php
        if ($_GET['changStatus'] == '') {
            $sql = " SELECT * FROM classification LEFT JOIN member ON member.m_id=cl_linkmember ORDER BY cl_id DESC ";
        } else if ($_GET['changStatus'] == 'none') {
            $sql = " SELECT * FROM classification LEFT JOIN member ON member.m_id=cl_linkmember 
            WHERE cl_confirm='' ORDER BY cl_id DESC ";
        } else if ($_GET['changStatus'] == 'confirm') {
            $sql = " SELECT * FROM classification LEFT JOIN member ON member.m_id=cl_linkmember 
            WHERE cl_confirm !='' ORDER BY cl_id DESC ";
        }
        ?>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="row border-line">
                    <div class="col-md-4 col-lg-3 col-xs-12" style="margin-top:20px; text-align:center;">
                        <a href='data_identify_selected.php?getCl_id=<?php echo $row["cl_id"]; ?>'>
                            <img id="edit-save" src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>" 
                                style="width: 200px; margin-bottom: 10px;">
                        </a>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xs-6">
                        <h4>Date</h4>
                        <h5><?php echo substr($row["cl_date"], 0, 10);  ?></h5>
                       
                    </div>

                    <div class="col-md-2 col-lg-2 col-xs-6">
                        <h4>Time</h4>
                        <h5><?php echo substr($row["cl_date"], 11);  ?></h5>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xs-6">
                        <h4>User ID</h4>
                        <h5><?php echo $row["m_username"]; ?></h5>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xs-6">
                        <h4>Status</h4>
                        <h5>
                            <?php if ($row["cl_confirm"] == '') {
                                echo 'None';
                            } else {
                                echo 'Confirm : ' . $row["cl_confirm"];
                            }
                            ?>
                        </h5>
                    </div>
                    <div class="col-md-4 col-xs-8 float-right" style="text-align:right;">
                    <a class="btn btn-primary" style="margin-top: " href='data_identify_selected.php?getCl_id=<?php echo $row["cl_id"]; ?>'>
                            View post
                        </a>
                    </div>
                </div>

            <?php
        }
    } else {
        echo "0 results";
    }
    ?>
        <a class=" btn btn-danger float-right" href="../index.php" style="width: 90px; margin:30px 0px 10px ">Back</a>
    </div>
    <?php $conn->close(); ?>
    <footer style="margin: 50px;">

    </footer>
    <style>
    h4 {
        margin-top: 20px;
    }
    </style>
    <script>
    function edit()
{   
    var inputs = document.myform;
    for(var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }

    var edit_save = document.getElementById("edit-save");

       edit_save.src = "../img/a1.jpg";                              
}
    </script>
</body>
</html>