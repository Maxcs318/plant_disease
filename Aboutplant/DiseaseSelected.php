<?php session_start(); ?>
<?php require("../ConnData/connectDB.php");?>
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
    <div class="container">
        <div class="row">

        <?php 
            $sql = "SELECT * FROM disease WHERE d_id= ".$_GET['getd_id']." " ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-12 col-xs-12">
                    <h3><center><?php echo $row['d_name'];// ชื่อโรค ?></center></h3>
                </div>
                <div class="col-lg-2 col-xs-2"></div>
                <div class="col-lg-8 col-xs-8">
                <img src="../Image/image_disease/<?php echo $row['d_image']; ?>" width="100%" alt="">
                </div>
                <div class="col-lg-2 col-xs-2"></div>
                <div class="col-lg-12 col-xs-12">
                    <h4><?php echo $row['d_detail'];//รายละเอียด ?></h4>
                </div>
                <?php
                }
            }
            $conn->close(); 
        ?>
        
        </div>
    </div>
</body>
</html>
