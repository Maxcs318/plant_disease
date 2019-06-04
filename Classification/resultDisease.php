<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Result Disease.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>

    <div style="text-align:right" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>
    </div>

    <!-- slide text -->
    <div class="row" >
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION [item-1]</p>
        <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 50px;">
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

    <div class="container box-list" style="margin-top: 0px;">
        <div class="row">
            <div class="col-12"><br>
                <h1 style="text-align:center;">Disease : <?php echo $_SESSION["disease"]; ?> </h1>
                <br>
            </div>
        </div>
        <h3>The picture of the disease leaves </h3>
        <?php if($_SESSION["disease"]!='Normal'){ ?>
        <div class="row">
            
            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = "SELECT * FROM symptoms WHERE s_disease ='" . $_SESSION["disease"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-3 col-xs-4" style="text-align:center;">
                        <img src="../Image/image_classification/<?php echo $row["s_image"]; ?>" style="border: 1px solid green;" width="100%">
                        <?php echo $row["s_name"]; ?>
                    </div>
                <?php
                }
            } else { echo ''; }
            ?> <?php $conn->close(); ?>
        </div>
        <hr class="border-line">
        <div class="row"> 
            <div class="col-lg-12 col-xs-12">
                <h2>Symptoms</h2>
            </div> 
            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = "SELECT * FROM symptoms WHERE s_disease ='" . $_SESSION["disease"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-12 col-xs-12" >
                        <?php echo $row["s_name"].' : '.$row["s_detail"]; ?>
                    </div>
                <?php
                    
                }

            } else { echo ''; }
        ?> <?php $conn->close(); ?>
        </div>

        <div class="row">
            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = "SELECT * FROM disease WHERE d_name ='" . $_SESSION["disease"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>

                    <div class="col-12">
                        <hr class="border-line">
                        <h2>Disease  <?php echo $row['d_name'] ?></h2>
                        <p style="text-indent: 2.5em;"><?php echo $row['d_detail'] ?></p>
                        <br>
                    </div>
                <?php
            }
        } else { }
        ?> <?php $conn->close(); ?>
        </div>
        <?php } ?>
    </div>
        
        <footer style="margin-bottom: 50px;">

        </footer>

</body>

</html>