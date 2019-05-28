<?php session_start();     error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Classification All </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container"> 
        <div class="row">
            <div class="col-lg-8 col-xs-12"><br>
            <center><h4> My Classification All . <a href="../index.php">Index</a></h4></center><br>
            </div>
            <div class="col-lg-4 col-xs-12">
                <label>Status <?php echo $_GET['changStatus']; ?></label>
                <form action="" method="GET">
                <select class="form-control" id="selectBox"  name="changStatus" onchange="this.form.submit()" >
                    <option  value="" selected>Choose</option>
                    <option  value="none">None</option>
                    <option  value="confirm">Confirm</option>
                    <option  value="">All</option>
                </select><br>
                </form>
                
            </div>
        </div>      <hr>      
            <?php require("../ConnData/connectDB.php");?>
            <?php
            if($_GET['changStatus']==''){
                $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE m_id='".$_SESSION["m_id"]."' ORDER BY cl_id DESC ";
            }else if($_GET['changStatus']=='none'){
                $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE m_id='".$_SESSION["m_id"]."' AND cl_confirm =' ' ORDER BY cl_id DESC ";
            }else if($_GET['changStatus']=='confirm'){
                $sql = " SELECT * FROM classification LEFT JOIN member 
                ON member.m_id=cl_linkmember WHERE m_id='".$_SESSION["m_id"]."' AND cl_confirm !='' ORDER BY cl_id DESC ";
            }
            ?>
            <?php    
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    ?> <div class="row"> <?php
                    while($row = $result->fetch_assoc()) {
                            ?>
                                <div class="col-lg-3 col-xs-6">
                                    <img src="../Image/image_for_checkdisease/<?php echo $row["cl_image"];?>" height="" width="100%" >
                                    <br><br>
                                    <b>The Disease you detected  :</b><br> <?php echo $row["cl_disease"];?><br><br>
                                    <b>Expert Confirm Disease  :</b><br> <?php
                                    if($row["cl_confirm"]!=''){
                                        echo $row["cl_confirm"];
                                    }else{
                                        echo 'Waiting to be confirmed';
                                    }
                                    ?><br><br>
                                    <!-- <button type="submit" class="form-control btn-primary" 
                                    onclick="window.location.href='classification_selected.php?getCl_image=<?php echo $row["cl_image"]; ?>'"> View</button><br><br> -->
                                </div>
                            <?php
                    }
                    ?></div> <?php
                } else {
                    echo "0 results";
                }
            ?>
    </div>
    <?php $conn->close(); ?>    
</body>
</html>