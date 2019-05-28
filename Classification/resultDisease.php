<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Result Disease.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12"><br>
                <center><h3>  <?php echo $_SESSION["disease"]; ?>  </h3></center><br>
            </div>
        </div>

        <div class="row">
        <?php require("../ConnData/connectDB.php");?>
        <?php 
            $sql = "SELECT * FROM symptoms WHERE s_disease ='".$_SESSION["disease"]."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
            <div class="col-3">
                <img src="../Image/image_classification/<?php echo $row["s_image"];?>" width="100%" >
            </div> 
        <?php 
                }
            }else{
            }
        ?> <?php $conn->close(); ?>
        </div>

        <div class="row">
        <?php require("../ConnData/connectDB.php");?>
        <?php 
            $sql = "SELECT * FROM disease WHERE d_name ='".$_SESSION["disease"]."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
            <div class="col-12">
                
                <hr>
                <h4> Symptoms</h4>
                <p><?php echo $row['d_detail'] ?></p>
            </div> 
        <?php 
                }
            }else{
            }
        ?> <?php $conn->close(); ?>
        </div> 
        
    </div>
    </form>
</body>
</html>