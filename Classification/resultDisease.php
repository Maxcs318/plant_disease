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
    <div class="container box-list">
        <div class="row">
            <div class="col-12"><br>
                <h1 style="text-align:center;">Disease : <?php echo $_SESSION["disease"]; ?> </h1>
                <a class=" btn btn-primary float-left" href="../index.php" style="width: 90px; margin:30px 0px 10px ">Home</a>

            </div>
        </div>

        <div class="row">
            <?php require("../ConnData/connectDB.php"); ?>
            <?php
            $sql = "SELECT * FROM symptoms WHERE s_disease ='" . $_SESSION["disease"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-3" style="text-align:center;">
                        <img src="../Image/image_classification/<?php echo $row["s_image"]; ?>" width="100%">
                        <?php echo $row["s_id"]; ?>
                    </div>
                <?php
            }
        } else { }
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
                        <h4> Symptoms :</h4>
                        qweqwrqwr
                        qwrqwrqwrq
                        qwrqrqwrqwr
                        qwrqrqw
                        <hr class="border-line">
                        <p>Disease : <?php echo $row['d_name'] ?></p>
                        <p>Detail : <?php echo $row['d_detail'] ?></p>
                        <br>
                    </div>
                <?php
            }
        } else { }
        ?> <?php $conn->close(); ?>
        </div>
    </div>
    </form>
</body>

</html>