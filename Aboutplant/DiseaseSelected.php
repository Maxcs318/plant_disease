<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Symptoms in Mango</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->

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

    <div class="container box-list">
        <div class="row">
            <div class="col-lg-12 col-xs-12"><br></div>
        </div>
        <?php require("../ConnData/connectDB.php"); ?>
        <div class="row">
        <?php
            $sql = "SELECT * FROM disease INNER JOIN image_of_disease ON disease.d_link_image=image_of_disease.iod_link_disease WHERE d_id= " . $_GET['getd_id'] . " ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-<?php if($result->num_rows==1){echo '6';}else{echo '4';} ?> col-xs-12" style="margin: auto;"><br>
                        <img class="myImages" id="myImg" alt="<?php echo $row['d_name']; ?>" src="../Image/image_disease/<?php echo $row['iod_image']; ?>" width="100%" alt="">
                    </div>
                    <!-- zoom img click -->
                    <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                    </div>
                        <!-- end zoom img -->
                    <?php
                }
            }else{
                echo 'error';
            }
            $conn->close();
        ?>
        </div>
        <div class="row">
            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = "SELECT * FROM disease WHERE d_id= " . $_GET['getd_id'] . " ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-12 col-xs-12">
                        <h3>
                            <center>
                                <h1><?php echo $row['d_name']; ?></h1>
                            </center>
                        </h3>
                    </div>
                    <div class="col-lg-12 col-xs-12" style="margin-top: 50px;">
                        <h4><?php echo $row['d_detail'];
                            ?></h4>
                    </div>
                    <button class="btn btn-danger form-control" onclick="window.history.go(-1); return false;" style="width: 80px; color:white; margin: 10px; margin-left: auto;">Back</button>
                <?php
            }
        }
        $conn->close();
        ?>

        </div>
    </div>

    <footer style="margin-bottom: 50px;">

    </footer>

</body>
<script>
    // create references to the modal...
    var modal = document.getElementById('myModal');
    // to all images -- note I'm using a class!
    var images = document.getElementsByClassName('myImages');
    // the image in the modal
    var modalImg = document.getElementById("img01");
    // and the caption in the modal
    var captionText = document.getElementById("caption");

    // Go through all of the images with our custom class
    for (var i = 0; i < images.length; i++) {
        var img = images[i];
        // and attach our click listener for this image.
        img.onclick = function(evt) {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }
</script>

</html>