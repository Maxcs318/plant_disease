<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All_Member </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/leaficon.ico" type="image/x-icon" />
</head>
<body>

    <div class="container"> <br>    
        <center><h4> All Member . <a href="register.php">register</a></h4></center> <hr>
        <!-- Row 1 -->
        <div class="row">
            <?php require("ConnData/connectDB.php");?>
            <?php
                $sql = "SELECT * FROM member ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    ?>  <table style='width:100%'>
                            <tr>
                                <th style='width:5%'>ID</th>
                                <th style='width:20%'>Firstname</th>
                                <th style='width:20%'>Lastname</th>
                                <th style='width:15%'>E-mail</th>
                                <th style='width:10%'>Phone</th>
                                <th style='width:10%'>Username</th>
                                <th style='width:10%'>Password</th>
                                <th style='width:10%'>Status</th>
                            </tr>
                    <?php
                    while($row = $result->fetch_assoc()) {
                    ?>      <tr>
                                <td><?php echo $row["m_id"];?></td>
                                <td><?php echo $row["m_firstname"];?></td>
                                <td><?php echo $row["m_lastname"];?></td>
                                <td><?php echo $row["m_email"];?></td>
                                <td><?php echo $row["m_phone"];?></td>
                                <td><?php echo $row["m_username"];?></td>
                                <td><?php echo $row["m_password"];?></td>
                                <td><?php echo $row["m_status"];?></td>
                            
                            </tr>                        
                    <?php
                    }
                    ?>  </table> <?php
                } else {
                    echo "0 results";
                }
                
            ?>
        </div>
        <!-- Row 2 -->
        <div class="row">
        
        </div>
        <!-- Row 3 -->
        <div class="row">
        
        </div>
        <!-- Row 4 -->
        <div class="row">
        
        </div>
    </div>
    
    <?php $conn->close(); 
        // session_start(); // test session
        // echo $_SESSION["m_firstname"];    
    ?>

</body>
</html>