<?php session_start(); ?>
<?php require("../ConnData/connectDB.php"); ?>
<?php
$sql = "UPDATE posts SET p_status_comment = '' ,p_status_confirm = ''
    WHERE p_own= '" . $_SESSION["m_id"] . "' AND p_id='" . $_GET["getPostID"] . "' ";
if ($conn->query($sql) === TRUE) { } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

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
    <script src="../bootstrap/js/zoom_img.js"></script>
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
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
            <div class="col-md-12">
                <h4 class="list-header">Post ID : <?php echo $_GET["getPostID"] ?> </h4>
            </div>
        </div>

        <?php require("../ConnData/connectDB.php"); ?>
        <?php
        $sql = " SELECT * FROM posts LEFT JOIN image_of_post 
                ON posts.p_linkimage=image_of_post.iop_linkpost
                WHERE p_id='" . $_GET["getPostID"] . "' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<div class="row">';

            while ($row = $result->fetch_assoc()) {
                if ($row["iop_name"] != '') {
                    ?>
                    <div class="col-md-4 imgpost">

                        <img style="width: 100%" class="myImages" id="myImg" src="../Image/image_file_post/<?php echo $row["iop_name"]; ?>" style="width:100%; border: 4px solid green;">

                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>

                    </div>
                    <br>
                <?php
            }
        }
        echo ' </div> ';
    } else {
        echo "0 results";
    }
    ?>
        <?php $conn->close(); ?>

        <?php require("../ConnData/connectDB.php"); ?>

        <?php
        $sql = " SELECT * FROM posts 
                WHERE p_id='" . $_GET["getPostID"] . "' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<div class="row">';

            echo '<div class="col-12" style="margin-top: 10px;">';
            while ($row = $result->fetch_assoc()) {

                echo ' <div> ';
                echo ' <h3> ' . $row["p_header"] . "</h3>";
                echo '</div>';

                echo ' <div>  ';
                echo ' <p style="text-indent: 2.5em;">' . $row["p_detail"] . "</p>";
                echo '</div>';

                echo ' <div style="text-align: right"> Date : ';
                echo substr($row["p_date"], 0, 10)  . "<br>";
                echo '</div>';

                echo ' <div style="text-align: right"> Time : ';
                echo substr($row["p_date"], 11)  . "<br>";
                echo '</div>';
            }
            echo '</div>';

            //row
            echo '</div>';
        } else {
            echo "0 results";
        }
        ?>

        <?php $conn->close(); ?>

        <hr class="border-line">
        <?php require("../ConnData/connectDB.php"); ?>
        <?php
        $sql = " SELECT * FROM comment LEFT JOIN member
                ON member.m_id=comment.c_own
                WHERE c_linkpost='" . $_GET["getPostID"] . "' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row

            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">
                                <div class="col-12">';

                echo ' <div> ';
                echo $row["m_username"] . " : " . $row["c_detail"];
                echo '<br></div>';

                if ($row["c_confirm"] != '') {
                    echo " <div style='text-align: right'> Your plant is : " . $row["c_confirm"] . " disese</div>";
                }

                echo ' <div style="text-align: right"> Date : ';
                echo substr($row["c_date"], 0, 10)  . "<br>";
                echo '</div>';

                echo ' <div style="text-align: right"> Time : ';
                echo substr($row["c_date"], 11)  . "<br>";
                echo '</div>';

                echo '  </div>
                            </div> <hr class="border-comment">';
            }
        } else {
            echo "0 Comment .";
        }
        ?>
        <?php $conn->close(); ?>

        <?php
        if ($_SESSION["m_status"] == 'expert' || $_SESSION["m_status"] == 'admin') {
            ?>
            <form action="../ConnData/InsertComment.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <select class="form-control col-3" name="commentconfirm" style="float: right;">
                            <?php require("../ConnData/connectDB.php"); ?>
                            <?php
                            $sql = " SELECT * FROM disease ";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row["d_name"]; ?>" selected>Disease <?php echo $row["d_name"]; ?></option>
                                <?php
                            }
                        } else {
                            echo "0 Comment .";
                        }
                        $conn->close();
                        ?>
                            <option value="" selected disabled>Choose</option>

                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12">
                        <input type="hidden" name="id_linkpost" value="<?php echo $_GET["getPostID"]; ?>">
                        <input type="hidden" name="commentown" value="<?php echo $_SESSION["m_id"]; ?>">
                        <input type="hidden" name="commentdate" value="<?php echo date("Y-m-d H:i:s", time() + (60 * 60) * 5); ?>">
                        <textarea rows="4" class="form-control" name="commentdetail"> </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"> <br>
                        <button class="btn-primary form-control col-3" type="submit" style="float: right;">Comment.</button>
                    </div>
                </div>
            </form><br>
        <?php
    }
    ?>
        <br>
        <a class="btn btn-danger float-right" onclick="window.history.go(-1); return false;" style="color: white;width: 90px; margin:30px 0px 10px">Back</a>
        <br>
    </div>
    <footer style="margin-bottom: 70px;">

    </footer>
    <style>
        
    </style>
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
</body>

</html>