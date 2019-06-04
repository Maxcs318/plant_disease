<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".checkbyimage").hide();

            $(".showselectimage").click(function() {
                $(".checkbyimage").toggle();
            });
        });
    </script>
</head>

<body>
    <?php $_SESSION["imagefront"] = ''; ?>
    <?php $_SESSION["imageback"] = ''; ?>

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

    <div class="container box-post">
        <br><br>
        <div class=" row">
            <div class="col-12">
                <h1 class="header">Check disease.</h1><br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <button class="form-control btn-primary showselectimage"> Check By Upload Image</button>
            </div><br><br><br>
            <div class="col-lg-6 col-xs-12">
                <button class="form-control btn-primary" onclick="location.href='../ConnData/InsertClasscification.php' "> Check Real Time </button>
            </div>
        </div>

        <div class="checkbyimage row">
            <div class="col-lg-12 col-xs-12">
                <form action="../ConnData/InsertClasscification.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <center><label id="first">Upload Front Leaf :</label></center><br>
                            <img id="blah" src="../img/leafpreview.png" width="100%" />
                            <input type="file" name="imageforcheck[]" id="image" required>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <center><label id="first">Upload Back Leaf :</label></center><br>
                            <img id="blah2" src="../img/leafpreview.png" width="100%" />
                            <input type="file" name="imageforcheck[]" id="image2" required>
                        </div>
                    </div>

                    <br>
                    <br>
                    <input type="hidden" id="blah" class="check-img" name="linkmember" value="<?php echo $_SESSION["m_id"]; ?>">
                    <div class="row">
                        <div class="col-lg-3 col-xs-1"></div>
                        <div class="col-lg-6 col-xs-10">
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-danger col-12" href="../index.php">Back</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn-primary form-control col-12" type="submit" name="save">Next</button>
                                </div>
                            </div> <br>
                        </div>
                        <div class="col-lg-3 col-xs-1"></div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>


</body>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });

    function readURL2(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image2").change(function() {
        readURL2(this);
    });
</script>

</html>