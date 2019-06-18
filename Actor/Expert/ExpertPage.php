<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เมนูหลัก</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
</head>

<body>
    <?php require("../../ConnData/sessionNULL.php");
    require("../../ConnData/sessionForExpert.php");    
    require("../../ConnData/Alert_Posts_Classification.php");    
    ?>
    

    <!-- user id top -->
    <div style="text-align:right;" class="usertop">
        ชื่อผู้ใช้ :
        <?php echo $_SESSION["m_username"]; ?>
        | สถานะ :
        <?php echo $_SESSION["m_status"]; ?>
    </div>
    <!--end user id top -->

    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">ยินดีต้อนรับ คุณ <?php echo $_SESSION["m_username"]; ?></p>
        <p class="item-2 ">เข้าสู่ระบบคัดแยกโรคพืชของมะม่วง</p>
        <p class="item-3 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 70px;">
        <!-- row 1 -->
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <a href="../../Posts/post_list_person.php">
                    <button type="submit" class="imgcenter" style="border:0; background: transparent; ">
                        <img src="../../img/pageicon/aboutme.png" class="imgcenter">
                        <p class="textimg">About me<br>เกี่ยวกับฉัน 
                        <font color="red"> <?php 
                        if($countpost>0){
                            echo 'p+'.$countpost;
                        }
                        if($countclass>0){
                            echo ' c+'.$countclass ;
                        } 
                        
                        ?>
                        
                        </font>
                        </p> 
                        <!-- ..แจ้งเตือน -->
                    </button></a>
            </div>

            <div class="col-xs-6 col-md-4">
                <a href="../../Posts/post_form.php">
                    <button type="submit" class="imgcenter" style="border: 0; background: transparent">
                        <img src="../../img/pageicon/post.png" class="imgcenter">
                        <p class="textimg">Create Post<br>สร้างกระทู้</p>
                    </button></a>
            </div>

            <div class="col-xs-6 col-md-4">
                <a href="../../Classification/chooseimageforcheck.php">
                    <button type="submit" class="imgcenter" style="border: 0; background: transparent">
                        <img src="../../img/pageicon/classification.png" class="imgcenter">
                        <p class="textimg">Classification<br>ตรวจโรค</p>
                    </button></a>
            </div>

            <div class="col-xs-6 col-md-4">
                <a href="../../Aboutplant/AboutPlant.php">
                    <button type="submit" class="imgcenter" style="border: 0; background: transparent">
                        <img src="../../img/pageicon/aboutplant.png" class="imgcenter">
                        <p class="textimg">Plant Disease<br>ข้อมูลโรค</p>
                    </button></a>
            </div>

            <div class="col-xs-6 col-md-4">
                <a href="../../Posts/post_list_all.php">
                    <button type="submit" class="imgcenter" style="border: 0; background: transparent">
                        <img src="../../img/pageicon/dataidentify.png" class="imgcenter">
                        <p class="textimg">Data Identify<br>วิเคราะห์โรค</p>
                    </button></a>
            </div>

            <div class="col-xs-6 col-md-4">
                <button type="submit" class="imgcenter" style="border: 0; background: transparent" onclick="logout()">
                    <img src="../../img/pageicon/logout.png" class="imgcenter">
                    <p class="textimg">Log out<br>ออกจากระบบ</p>
                </button>
            </div>
        </div>

    </div>

    </div>
    <script>
        function logout() {

            swal({
                title: "Are you sure?",
                text: "You want to Logout .",
                type: "warning",
                confirmButtonText: 'Yes.',
                confirmButtonColor: '#DD6B55',

                showCancelButton: true,
            }, function() {
                // swal("Log Out!", " ", "success");
                //     setTimeout(function(){
                window.location.href = "../../ConnData/logout.php";
                //     },4000);
            });

        }
    </script>
</body>

</html>