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
    <link href="https://fonts.googleapis.com/css?family=Prompt|Sriracha&display=swap" rel="stylesheet">

</head>

<body>

    <?php session_start(); 
    error_reporting (E_ALL ^ E_NOTICE);
    ?>
    <div style="text-align:right" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>
    </div>

    <p class="text-line">
        <img src="../img/mangoicon.png" style="width: 50px; margin-right: 20px;">
        EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION
    </p>

    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-md-2">
                <img src="../img/pageicon/aboutme.png" class="about-img">
            </div>
            <div class="col-xs-8 col-md-6 about-header">
                <p class="aboutme">Aboutme.</p>
                <div class="about-box">
                    <div class="about-user">
                        Username :
                        <?php echo $_SESSION["m_username"]; ?> <br>
                        Status :
                        <?php echo $_SESSION["m_status"]; ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-md-4">
            </div>
        </div>
    </div>

    <div class="container box-list">
        <div class="row ">
            <div class="col-lg-8 col-xs-12"><br>
                <h4 class="list-header">Data Identify All . <a href="../index.php">Index</a></h4>
            </div>
            <div class="col-lg-4 col-xs-12">
                <label>Status <?php echo $_GET['changStatus']; ?></label>
                <form action="" method="GET">
                <select class="form-control" id="selectBox"  name="changStatus" onchange="this.form.submit()" >
                    <option  value="" selected>Choose</option>
                    <option  value="none">None</option>
                    <option  value="confirm">Confirm</option>
                    <option  value="">All</option>
                </select><br>
                </form>
                
            </div>
        </div>
        <?php require("../ConnData/connectDB.php"); ?>
        <?php 
        if($_GET['changStatus']==''){
            $sql = " SELECT * FROM classification LEFT JOIN member ON member.m_id=cl_linkmember ORDER BY cl_id DESC ";
        }else if($_GET['changStatus']=='none'){
            $sql = " SELECT * FROM classification LEFT JOIN member ON member.m_id=cl_linkmember 
            WHERE cl_confirm='' ORDER BY cl_id DESC ";
        }else if($_GET['changStatus']=='confirm'){
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
                <div class="row border-line" onclick="window.location.href='data_identify_selected.php?getCl_id=<?php echo $row["cl_id"]; ?>'">
                    <div class="col-lg-3 col-xs-12" style="margin-top:20px;">
                        <img src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>" width="100%">
                    </div>
                    <div class="col-lg-3 col-xs-12">
                        <h4>Date</h4>
                        <h5><?php echo $row["cl_date"]; ?></h5>
                    </div>
                    <div class="col-lg-3 col-xs-12">
                        <h4>User ID</h4>
                        <h5><?php echo $row["m_username"]; ?></h5>
                    </div>
                    <div class="col-lg-3 col-xs-12">
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
</body>

</html>