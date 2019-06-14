<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Disease in Mango</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 

    <script>
        $(document).ready(function() {
            $(".insertDisease").hide();

            $(".insertNewDisease").click(function() {
                $(".insertDisease").toggle();
            });
            
        });
            function EditThisDisease(d_id){                
                $(".showedit"+d_id).toggle();
                $(".showdata"+d_id).toggle();
            }
            function CancelThisDisease(d_id){                
                $(".showedit"+d_id).toggle();
                $(".showdata"+d_id).toggle();
            }
    </script>
</head>

<body>
    <div style="text-align:right" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>

    </div>
    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION [item-1]</p>
        <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 50px;">
        <!-- home button -->
        <div class="col-xs-4 col-md-4">

            <a href="../index.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/home.png" class="imgabout">
                    <p class="text-img-detail">Home</p>
                </button></a>
        </div>
        <!-- symptoms button -->
        <div class="col-xs-4 col-md-4">

            <a href="Symptoms.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../img/symptom.png" class="imgabout">
                    <p class="text-img-detail">Symptoms</p>
                </button></a>
        </div>

    </div>
    
    <div class="container" style="margin-top: 10px;">
    <div class="row">
        <?php if($_SESSION['m_status']=='admin'){ ?>
        <div class="col-lg-8 col-xs-12">
        <?php }else{ ?>
        <div class="col-lg-12 col-xs-12">
        <?php } ?>
        <p class="textabout">Disease in Mango</p>
        </div>
        <?php 
                if($_SESSION['m_status']=='admin'){
            ?>  <div class="col-lg-4 col-xs-12"><br>
                    <button class="insertNewDisease btn-primary form-control col-lg-12 col-xs-12">Insert Disease</button>                     
                        <br><br><br>
                </div>
                <?php
                    }
                ?> 
    </div>
    <div class="insertDisease "> <!-- Start form insert -->
    <form action="../ConnData/InsertDisease.php" method="post" enctype="multipart/form-data">
        <div class="row box-disease">
                <div class="col-xs-12 col-md-4"><br>
                        <img style="display: block; margin: 0 auto;" id="blah" src="../Image/image_disease/choose.png" width="100%" alt="">
                        <br><br>
                        <input type="file" id="image" name="imagedisease[]" required> <br><br><br>
                </div>
                <div class="col-xs-12 col-md-8">
                    <!-- //Key start-->
                    <?php
                    function generateRandomString($length = 40)
                    {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString;
                    }
                    // echo generateRandomString();
                    ?>
                    <input type="hidden" name="key_disease_image" value="<?php echo generateRandomString(); ?>">
                    <!-- //Key end -->
                    <h3> Name of Disease </h3>
                    <input type="text" class="form-control col-lg-8 col-xs-12" name="diseasename" maxlength="50" required><br>
                    <h3> Detail </h3>
                    <textarea class="form-control" rows="5" type="text" name="diseasedetail" required></textarea>
                    <br>
                    <button type="submit" class="form-control col-lg-4 col-xs-12 btn-primary" > Save </button> 
                    <br><br><br>
                </div>
        </div>
    </form>
    </div><br> <!-- Stop form insert -->

    <?php require("../ConnData/connectDB.php");?>
    <?php 
        $sql = "SELECT * FROM disease LEFT JOIN image_of_disease ON disease.d_link_image = image_of_disease.iod_link_disease WHERE d_name != 'normal'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
                <form action="../ConnData/EditDisease.php" method="post" enctype="multipart/form-data" >
                <div class="row box-disease">
                    <div class="col-xs-12 col-md-4"><br>
                        <div class="showedit<?php echo $row['d_id'];?>">
                            <img style="display: block; margin: 0 auto;" id="blah<?php echo $row['d_id'];?>" src="../Image/image_disease/<?php echo $row['iod_image']; ?>" width="100%" alt="">
                            <br>
                            <input type="hidden" name="key_disease" value="<?php echo $row['iod_link_disease']; ?>">
                            <input type="file" id="image<?php echo $row['d_id'];?>" name="imagedisease[]" > <br>
                        </div>
                        <div class="showdata<?php echo $row['d_id'];?>">
                            <img src="../Image/image_disease/<?php echo $row['iod_image']; ?>" width="100%" alt="">
                            <br><br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <h2 class="detail-header">
                            <div class="showedit<?php echo $row['d_id'];?>">
                                <input type="text" class="form-control col-lg-8 col-xs-12" name="diseasename" maxlength="50" value="<?php echo $row['d_name']; ?>" required><br>
                            </div>
                            <div class="showdata<?php echo $row['d_id'];?>">
                                <?php echo $row['d_name']; ?>
                            </div>
                        </h2> <input type="hidden" name="diseaseid" value="<?php echo $row['d_id']; ?>" >
                        <p class="showdata<?php echo $row['d_id'];?> detail" >
                            <?php echo substr($row['d_detail'],0,650); ?>
                            <a href="../Aboutplant/DiseaseSelected.php?getd_id=<?php echo $row['d_id']; ?>" > . . . See More</a>
                        </p>
                        <div class="showedit<?php echo $row['d_id'];?>">
                            <textarea class="form-control" rows="7" type="text" name="diseasedetail" required><?php echo $row['d_detail'];?></textarea>
                            <br>
                        </div>

                        <?php 
                            if($_SESSION['m_status']=='admin'){
                            ?>  
                                <div class="row">
                                    <div class="col-6">
                                        <div class="showedit<?php echo $row['d_id'];?>">
                                            <input type="button" class="editDisease<?php echo $row['d_id'];?> btn-danger form-control col-lg-12 col-xs-12" value="Cancel" onclick="CancelThisDisease(<?php echo $row['d_id'];?>)">
                                        </div>
                                        
                                        <div class="showdata<?php echo $row['d_id'];?>">
                                            <input type="button" class="editDisease<?php echo $row['d_id'];?> btn-primary form-control col-lg-12 col-xs-12" value="Edit Disease" onclick="EditThisDisease(<?php echo $row['d_id'];?>)">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="showedit<?php echo $row['d_id'];?>">
                                            <button class="editDisease<?php echo $row['d_id'];?> btn-primary form-control col-lg-12 col-xs-12" type="submit" >Save</button> 
                                        </div>
                </form>
                                        <div class="showdata<?php echo $row['d_id'];?>">
                                            <input type="button" class="btn-danger form-control col-lg-12 col-xs-12" value="Delete Disease" onclick="deleteData('<?php echo $row['d_link_image'];?>')" >
                                        </div>
                                    </div>
                                </div>
                                <br>
                            <?php
                            }
                        ?>
                <script>
                // hide edit
                $(".showedit<?php echo $row['d_id'];?>").hide();
                // set image 
                function readURL<?php echo $row['d_id'];?>(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#blah<?php echo $row['d_id'];?>').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#image<?php echo $row['d_id'];?>").change(function() {
                    readURL<?php echo $row['d_id'];?>(this);
                });
                </script>
                    </div>
                </div><br>
            
            <?php
            }
        }else{

        }
        $conn->close(); 

    ?>
    </div>

    <footer style="margin: 30px;">
        
    </footer>
    <script>
        function deleteData(getKey) {

            swal({
            title: "Are you sure?", 
            text: "You want to Delete this Disease." , 
            type: "warning",
            confirmButtonText: 'Yes.',
            confirmButtonColor: '#DD6B55',
            
            showCancelButton: true ,
            }, function() {
                window.location.href='../ConnData/DeleteDisease.php?getKeylink='+getKey;
            });
            
        }
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });

        
    </script>
    <!-- Alert Edit Start -->
    <?php if( $_SESSION["checkAlert"]!=''){ ?>
        <script>
            swal({
            <?php if( $_SESSION["checkAlert"]=='EidtDiseassSuccess'){ ?>
                title: "Edit Disease Success",
            <?php }else if( $_SESSION["checkAlert"]=='InsertDiseaseSuccess'){ ?>
                title: "Insert Disease Success", // 2 
            <?php }else if( $_SESSION["checkAlert"]=='DeleteDiseaseSuccess'){ ?>
                title: "Delete Disease Success", // 3
            <?php } ?>
            text: "" , 
            type: "success",              
            });
        </script>
    <?php } ?>
    <!-- Alert Edit Stop -->
</body>
</html>
<?php $_SESSION["checkAlert"]='' ?>