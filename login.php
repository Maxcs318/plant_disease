<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php session_start(); ?>
<?php 
if(isset($_SESSION["m_status"])){
    if($_SESSION["m_status"] == "admin"){
        header("location:Actor/Admin/AdminPage.php");
    }else if($_SESSION["m_status"] == "expert"){
        header("location:Actor/Expert/ExpertPage.php");
    }else if($_SESSION["m_status"] == "user") {
        header("location:Actor/User/UserPage.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="shortcut icon" href="img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Prompt|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
</head>

<body>
    <div class="container ">
        <div class="row">
           <div class="col-xs-4 col-sm-4 col-md-4"></div>
            <div class="col-xs-4 col-sm-4 col-md-4 box">
                <form action="ConnData/check_login.php" method="post" autocomplete="off">
                    <h1>LOGIN</h1>
                        <?php if($_SESSION["checkAlert"] =='HaHaHa'){ ?>
                        <font color="red"><?php echo 'Username or Password is Incorrect'; ?></font>
                        <?php } ?>                    
                    <p>User Name</p>
                    <input class="form-control" type="text" name="username" maxlength="20" placeholder="username" required>

                    <p>Password</p>
                    <input class="form-control" type="password" name="password" maxlength="20" placeholder="password" required>

                    <button id="insert" type="submit" name="save">sign in</button>
                    <br>
                    <a href="index.php">Back</a> |
                    <a href="register.php">Register</a>
                </form>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4"></div>
        </div>
        <!--end row -->
    </div>
    <?php if($_SESSION["checkAlert"]=='RegisterSuccess'){ ?>
        <script language="javascript">
            swal({
            title: "Register Success", 
            text: "Thank you For register." , 
            type: "success",
            confirmButtonText: 'Yes.',
            confirmButtonColor: '#64e986',
            
            });        
        </script>
    <?php } ?>
</body>

</html>
<?php $_SESSION["checkAlert"]='' ?>