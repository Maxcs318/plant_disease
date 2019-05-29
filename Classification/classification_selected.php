<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "UPDATE classification SET cl_status_confirm = ''
    
    WHERE cl_id='" . $_GET["getCl_id"] . "' ";
    if ($conn->query($sql) === TRUE) { 
		
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>

<?php session_start(); ?>
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
            <div class="col-lg-12 col-xs-12"><br>
                <center><h4 class="header">Classification ID : <?php echo $_GET["getCl_id"]; ?> </h4></center>
                <hr class="border-line">
            </div>
        </div>
        <div class="row">
                <?php require("../ConnData/connectDB.php");?>
                <?php 
                $sql = "SELECT * FROM classification WHERE cl_id = '".$_GET["getCl_id"]."' "; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-5 col-xs-12">
                        <img src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>" height="" width="100%">
                        
                        <br><br>
                        <b>The Disease you detected :</b> <?php echo $row["cl_disease"]; ?><br><br>
                        <b>Expert Confirm Disease :</b>
                        <?php
                            if ($row["cl_confirm"] != '') {
                                echo $row["cl_confirm"];
                            } else {
                                echo 'Waiting to be confirmed';
                            }
                        ?><br><br>
                    </div>
                    <div class="col-lg-7 col-xs-12">
                            <center><h4>Latest results</h4></center><br>
                            S1 :  <?php if($row['cl_S1']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S2 : <?php if($row['cl_S2']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S3 : <?php if($row['cl_S3']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S4 : <?php if($row['cl_S4']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S5 : <?php if($row['cl_S5']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S6 : <?php if($row['cl_S6']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S7 : <?php if($row['cl_S7']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S8 : <?php if($row['cl_S8']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S9 : <?php if($row['cl_S9']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S10 : <?php if($row['cl_S10']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S11 : <?php if($row['cl_S11']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S12 : <?php if($row['cl_S12']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S13 : <?php if($row['cl_S13']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S14 : <?php if($row['cl_S14']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S13 : <?php if($row['cl_S15']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>
                            S16 : <?php if($row['cl_S16']==1){echo 'Found ';}else{echo 'Not Found';}   ?> <br>


                    </div>

                    <?php
                    }
                }
                
                ?>
        </div>
        <a class="btn btn-danger float-right" href="../index.php" style="width:80px; margin: 10px;">Back</a>

    </div>

</body>
</html>