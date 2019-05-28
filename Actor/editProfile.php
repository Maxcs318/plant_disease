<?php session_start(); 
    require_once("../ConnData/connectDB.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12"><br>
                <center><h4>Edit Profile</h4></center>  <hr>
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-1"></div>
            <div class="col-lg-4 col-xs-10">
            <?php
            $sql = "SELECT * FROM member WHERE m_id='".$_SESSION['m_id']."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { // Open IF
                $row = $result->fetch_assoc();            
            ?>
            <form action="../ConnData/EditProfile.php" method="post" enctype="multipart/form-data">
                <center>
                <img src="../Image/image_profile/<?php echo $row["m_imageprofile"]; ?>" width="60%"><br>  
                </center>
                <label>Profile :</label>
                <input type="file" name="imageprofile[]" > <br><br>
                
                <label>First Name</label>
                <input class="form-control" type="text" name="firstname" value="<?php echo $row["m_firstname"]; ?>" maxlength="25" required>

                <label>Last Name</label>
                <input class="form-control" type="text" name="lastname" value="<?php echo $row["m_lastname"]; ?>" maxlength="25" required>

                <label>E-mail</label>
                <input class="form-control" type="email" name="email" value="<?php echo $row["m_email"]; ?>" required>

                <label>Phone</label>
                <input class="form-control" type='text' name='phone' value="<?php echo $row["m_phone"]; ?>" OnKeyPress="return chkNumber(this)" required="" maxlength="10">

                <label>User Name</label>
                <input class="form-control" type="text" name="username" value="<?php echo $row["m_username"]; ?>"  maxlength="10" required>

                <label>Password</label>
                <input class="form-control" type="text" name="password" value="<?php echo $row["m_password"]; ?>" maxlength="10" required>
                <br>
                <button class="form-control btn-primary"  type="submit" name="save">Save</button>   <br> 
            
            </form>
            </div>
            <div class="col-lg-4 col-xs-1"></div>
            <?php // Close IF
            }
            $conn->close();
            ?>
        </div>
    </div>
    <script language="JavaScript">
            function chkNumber(ele){
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
            ele.onKeyPress=vchar;
            }
    </script>
</body>
</html>