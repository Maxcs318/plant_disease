<?php session_start(); ?>
<?php
if (isset($_SESSION["m_status"])) {
    if ($_SESSION["m_status"] == "admin") {
        header("location:Actor/Admin/AdminPage.php");
    } else if ($_SESSION["m_status"] == "expert") {
        header("location:Actor/Expert/ExpertPage.php");
    } else if ($_SESSION["m_status"] == "user") {
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
    <link rel="shortcut icon" href="img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Prompt|Sriracha&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">

        <!-- user register -->
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4"></div>
            <div id="user" class="box col-xs-4 col-sm-4 col-md-4">

                <h1>User Register</h1>
                    <p>กรุณากรอกข้อมูลใน * ให้ครบถ้วน</p>
                    <br>
                    <form action="ConnData/InsertRegister.php" method="post">

                        <p>Username *</p>
                        <input class="form-control" type="text" name="username" placeholder="username" maxlength="20" required>

                        <p>Password *</p>
                        <input class="form-control" type="password" name="password" placeholder="password" maxlength="20" required>

                        <p>Phone *</p>
                        <input class="form-control" name='phone' type='text' placeholder="number 0-9" value="" OnKeyPress="return chkNumber(this)" required="" maxlength="10">

                        <p>E-mail</p>
                        <input class="form-control" type="email" name="email" placeholder="example@plant.com">

                        <input type="hidden" name="status" value="user">
                        <button type="submit" name="save">Save</button>
                        <br>
                        <a href="login.php">Login</a>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4"></div>
        </div>
        </form>
    </div>

</body>

</html>