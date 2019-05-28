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

    <form action="../ConnData/InsertClasscification.php" method="post" enctype="multipart/form-data">
        <div class="container box-post">

            <div class="row">
                <div class="col-12">
                    <h1 class="header">Choose plant image for check disease.</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-2 col-md-4"></div>

                <div class="col-xs-8 col-md-4">
                    <div class="check-img ">
                    </div>
                    <label id="first" >Upload Photo :</label>

                    <input type="file" name="imageforcheck[]" id="image" required>
                    <input type="hidden" name="linkmember" value="<?php echo $_SESSION["m_id"]; ?>">
                    <div class="row float-right" style="margin-top:20px; margin-bottom: 10px;">
                        <a class="btn btn-danger " href="../index.php" style="width: 80px; margin-right: 10px;">Back</a>
                        <button class="btn-primary form-control " type="submit" name="save" style="width: 80px;">Next</button>

                    </div>

                </div>

                <div class="col-xs-2 col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </form>


</body>

</html>