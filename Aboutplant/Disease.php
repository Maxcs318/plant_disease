<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Disease in Mango</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>

<body>
    <?php session_start(); ?>
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
        <!-- home button -->
        <a href="../index.php">
            <button type="submit" style="border: 0; background: transparent">
                <img src="../img/home.png" class="imgabout">
                <p class="text-img-detail">Home</p>
            </button></a>

        <!-- symptoms button -->
        <a href="Symptoms.php">
            <button type="submit" style="border: 0; background: transparent">
                <img src="../img/symptom.png" class="imgabout">
                <p class="text-img-detail">Symptoms</p>
            </button></a>

        <!-- home button -->
        <a href="../index.php">
            <button type="submit" style="border: 0; background: transparent">
                <img src="../img/back.svg" class="imgabout">
                <p class="text-img-detail">Back</p>
            </button></a>
    </div>

    <!-- disease 1 -->
    <div class="container" style="margin-top: 10px;">
        <p class="textabout">Disease in Mango</p>
        <div class="row box-disease">
            <div class="col-xs-12 col-md-4">
                <img src="../img/a1.jpg" class="imgdetail" alt="">
            </div>
            <div class="col-xs-12 col-md-8">
                <h2 class="detail-header">
                    1. Anthranose
                </h2>
                <p class="detail">
                    Detail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in Mango
                </p>
            </div>
        </div>
    </div>

    <!-- disease 2 -->
    <div class="container box-disease" style="margin-top: 30px;">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <img src="../img/a1.jpg" class="imgdetail" alt="">
            </div>
            <div class="col-xs-12 col-md-8">
                <h2 class="detail-header">
                    2. Anthranose
                </h2>
                <p class="detail">
                    Detail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in MangoDetail of Disease in Mango
                </p>
            </div>
        </div>
    </div>

    <footer style="margin: 30px;">
        <div>
    
        </div>
    </footer>

</body>

</html>