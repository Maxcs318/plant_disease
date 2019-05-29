<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>This Classification </title>
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


    <div class="container box-list" style="margin-top: 70px;">
        <div class="row">
            <div class="col-xs-12 col-md-12"><br>
                <h4 class="header"> Identify the disease . <a href="../index.php">Home</a></h4>
                <hr class="border-line">
            </div>
        </div>
        <?php require("../ConnData/connectDB.php"); ?>
        <?php
        $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE cl_id='" . $_GET["getCl_id"] . "' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="row">
                    <div class="col-lg-4 col-xs-612">
                        <img src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>" width="100%" class="imgpost">
                    </div>
                    <div class="col-lg-8 col-xs-612">
                        <form action="../ConnData/EditClassificationDisease.php" method="post">
                            <input type="hidden" name="Cl_id" value="<?php echo $_GET["getCl_id"]; ?>">
                            <br>
                            <div class="col-md-8 col-xs-8">
                                <b>S1 :</b> Leaf become a lesion
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S1" value="1"> Yes
                                <input type="radio" name="S1" value="0"> No
                                <br>
                            </div>

                            <div class="col-md-8 col-xs-8">
                                <b>S2 :</b> check on lesion area
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S2" value="1"> Yes
                                <input type="radio" name="S2" value="0"> No
                                <br>
                            </div>

                            <div class="col-md-8 col-xs-8">
                                <b>S3 :</b> Blight on leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S3" value="1"> Yes
                                <input type="radio" name="S3" value="0"> No
                                <br>
                            </div>

                            <div class="col-md-8 col-xs-8">
                                <b>S4 :</b> Mature lesion are explanded and become dark-brown
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S4" value="1"> Yes
                                <input type="radio" name="S4" value="0"> No
                                <br>
                            </div>

                            <div class="col-md-8 col-xs-8">
                                <b>S5 :</b> Lesion occur at leaf margin
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S5" value="1"> Yes
                                <input type="radio" name="S5" value="0"> No
                                <br>
                            </div>

                            <div class="col-md-8 col-xs-8">
                                <b>S6 :</b> Tiny and irregular spot appear on leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S6" value="1"> Yes
                                <input type="radio" name="S6" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S7 :</b> Rust-colored or orange spot on leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S7" value="1"> Yes
                                <input type="radio" name="S7" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S8 :</b> White spot on leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S8" value="1"> Yes
                                <input type="radio" name="S8" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S9 :</b> Greenish-gray spot on leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S9" value="1"> Yes
                                <input type="radio" name="S9" value="0"> No
                                <br>
                            </div>

                            <div class="col-md-8 col-xs-8">
                                <b>S10 :</b> Brown spot on leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S10" value="1"> Yes
                                <input type="radio" name="S10" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S11 :</b> Black spot on leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S11" value="1"> Yes
                                <input type="radio" name="S11" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S12 :</b> Brown or orange powdery appear on the underside of leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S12" value="1"> Yes
                                <input type="radio" name="S12" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S13 :</b> Wither on the tip of leaf
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S13" value="1"> Yes
                                <input type="radio" name="S13" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S14 :</b> Watery around lesion area
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S14" value="1"> Yes
                                <input type="radio" name="S14" value="0"> No
                                <br>
                            </div>

                            <div class="col-md-8 col-xs-8">
                                <b>S15 :</b> Yellow margin around a lesion
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S15" value="1"> Yes
                                <input type="radio" name="S15" value="0"> No
                                <br>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <b>S16 :</b> Leaf is irregular shape
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" name="S16" value="1"> Yes
                                <input type="radio" name="S16" value="0"> No
                                <br>
                            </div>
                            <br>
                    </div>
                </div><!-- end row -->
                <hr class="border-line">

                <h5 style="margin-top:20px;">Identify The Disease</h5>
                        <select class="form-control col-lg-6" type="text" name="newDisease">
                            <option value="Anthracnose">Anthracnose</option>
                            <option value="Algol Spot">Algol Spot</option>
                            <option value="Normol">Normal</option>
                            <option value="" selected>Choose</option>
                        </select>
                        <br>
                        <br>
                        <button class="form-control col-lg-6 btn-primary" style="margin-bottom: 50px;"> Save </button>
          
                </div>




            </div><!--  end container -->


            </form>

            </div>

        <?php
    }
    ?> <?php
    } else {
        echo "0 results";
    }
    ?>
    </div>
    <?php $conn->close(); ?>
</body>

</html>