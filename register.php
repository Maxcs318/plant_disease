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
    <title>Plant Disease</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 9000px;)">
    <link rel="shortcut icon" href="img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Prompt|Sriracha&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">

        <!-- user register -->
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4"></div>
                
                <div id="user" class="box col-xs-4 col-sm-12 col-md-4">
                
                    <h1>User Register</h4>
                    <button class="tablinks tab " onclick="openCity(event, 'expert')">Expert Register</button>
                    <form action="ConnData/InsertRegister.php" method="post">

                        <p>First Name</p>
                        <input class="form-control" type="text" name="firstname" placeholder="first name" maxlength="25" required>

                        <p>Last Name</p>
                        <input class="form-control" type="text" name="lastname" placeholder="last name" maxlength="25" required>

                        <p>E-mail</p>
                        <input class="form-control" type="email" name="email" placeholder="example@plant.com" required>

                        <p>Phone</p>
                        <input class="form-control" name='phone' type='text'  placeholder="number 0-9" value="" OnKeyPress="return chkNumber(this)" required="" maxlength="10">

                        <p>User Name</p>
                        <input class="form-control" type="text" name="username" placeholder="username" maxlength="10" required>

                        <p>Password</p>
                        <input class="form-control" type="password" name="password" placeholder="password" maxlength="10" required>

                        <input type="hidden" name="status" value="user">
                        <button  type="submit" name="save">Save</button>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4"></div>
            </div>
        </form>

            <div class="row">
                
                <div class="col-xs-4 col-sm-4 col-md-4"></div>
                <div id="expert" class="col-xs-4 col-sm-4 col-md-4 box" style="display: none">
                
                    <h1>Expert Register</h4>
                    <button class="tablinks tab  active" onclick="openCity(event, 'user')">User Register</button>
                    <form action="ConnData/InsertRegister.php" method="post">

                        <p>First Name</p>
                        <input class="form-control" type="text" name="firstname" placeholder="first name" required>

                        <p>Last Name</p>
                        <input class="form-control" type="text" name="lastname" placeholder="last name" required>

                        <p>E-mail</p>
                        <input class="form-control" type="email" name="email" placeholder="example@plant.com" required>

                        <p>Phone</p>
                        <input class="form-control" name='phone' type='text'  placeholder="number 0-9" value="" OnKeyPress="return chkNumber(this)" required="" minlength="10" maxlength="10">

                        <p>Certificate</p>
                        <input class="form-control" type="text" name="certificate" placeholder="certificate" required>

                        <p>User Name</p>
                        <input class="form-control" type="text" name="username" placeholder="username" required>

                        <p>Password</p>
                        <input class="form-control" type="password" name="password" placeholder="password" required>

                        <input type="hidden" name="status" value="expert">
                        <button type="submit" name="save">Save</button>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4"></div>
            </div>
        </form>
        <!-- expert register -->

    </div>

    <!-- Togglable Script -->
    <script language="JavaScript">
            function chkNumber(ele){
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
            ele.onKeyPress=vchar;
            }
    </script>
    <!-- End Togglable Script -->

</body>

</html>