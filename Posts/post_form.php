<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test Up Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Prompt|Sriracha&display=swap" rel="stylesheet">

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
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION</p>
        <!-- <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p> -->
    </div>
    <!-- end slide text -->

    <div class="container box-post">
        <form action="../ConnData/InsertPost.php" method="post" enctype="multipart/form-data">

            <div class="row" style="margin: 0px;">
                <div class="col-xs-0 col-sm-0 col-md-2"></div>
                <div class="col-xs-12 col-sm-6 col-md-8">

                    <h1 class="header">Create Post</h1>
                    <label id="first">Header :</label><br />
                    <input class="form-control" type="text" name="header" maxlength="50" style="width:40%;" required><br />
                    <label id="first">Detail :</label><br />
                    <textarea class="form-control" rows="5" type="text" maxlength="100" name="detail" required></textarea>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <img id="blah" src="../img/leafpreview.png" width="250px;" style="border: 2px solid green; border-radius: 5%;" /><br>
                            <label id="first" style="margin-top: 20px;">Upload Font leaf :</label><br />
                            <input type="file" name="image[]" id="image">
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <img id="blah2" src="../img/leafpreview.png" width="250px;" style="border: 2px solid green; border-radius: 5%;" /><br>
                            <label id="first" style="margin-top: 20px;">Upload Back leaf :</label><br />
                            <input type="file" name="image[]" id="image2"><br>
                        </div>
                    </div>

                    <!-- <h5></h5>
                    <input type="button" value="Add Image" id="add_image1"> -->

                    <input type="hidden" name="own" value="<?php echo $_SESSION["m_id"]; ?>">
                    <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s", time() + (60 * 60) * 5); ?>">
                    <br>

                    <?php
                    function generateRandomString($length = 30)
                    {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString;
                    }
                    // echo generateRandomString();
                    ?>
                    <input type="hidden" name="key_post_image" value="<?php echo generateRandomString(); ?>">
                    <div style="margin-top:30px; margin-bottom: 50px;">
                        <button class="btn-success form-control float-right" id="insert" type="submit" name="save" style="width: 80px; margin-left:10px;">Post</button>
                        <a class="btn btn-danger float-right" href="../index.php" style="width: 80px; margin:0px 0px 10px ">Back</a>
                    </div>

                </div>
                <div class="col-xs-0 col-sm-0 col-md-2"></div>

            </div>
        </form>
    </div>

    <!-- script + function -->
    <script src="../bootstrap/js/jquery-3.3.1.min.js"></script>

    <script>
        $('#add_image1').click(function() {
            $('h5').append('<input type="file" name="image[]" id="image"><br><br>');
        });
    </script>

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

</body>

</html>