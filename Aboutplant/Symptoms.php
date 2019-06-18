<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Symptoms in Mango</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="../bootstrap/css/main.css">
   <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
   <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
   <script>
        $(document).ready(function() {
            // $(".insertSymptoms").show();
            $(".insertSymptoms").hide();
            
            $(".insertNewSymptoms").click(function() {
                $(".insertSymptoms").toggle();
            });
            var count = 0;
            $('#add_image1').click(function() {
                  count = count-1;
                  $('xyz').append('<img style="display: block; margin: 0 auto;"  src="../Image/image_disease/choose.png" width="100%" alt="">'
                  +'<input type="file" name="imagesymptoms[]" ><br><br>'
                  );
            });
        
        });
    </script>
</head>

<body>

   <?php session_start(); ?>
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
      <div class="col-xs-4 col-lg-4">

         <a href="../index.php">
            <button type="submit" style="border: 0; background: transparent">
               <img src="../img/home.png" class="imgabout">
               <p class="text-img-detail">Home</p>
            </button></a>
      </div>
      <!-- Disease button -->
      <div class="col-xs-4 col-lg-4">
         <a href="Disease.php">
            <button type="submit" style="border: 0; background: transparent">
               <img src="../img/pageicon/classification.png" class="imgabout">
               <p class="text-img-detail">Disease Detail</p>
            </button></a>
      </div>

   </div>
   <!-- symptoms -->
   <div class="container" style="margin-top: 10px;">
      <div class="row">
            <?php if($_SESSION['m_status']=='admin'){ ?>
            <div class="col-lg-8 col-xs-12">
            <?php }else{ ?>
            <div class="col-lg-12 col-xs-12">
            <?php } ?>
            <p class="textabout">Symptoms in Mango</p>
            </div>
            <?php 
                  if($_SESSION['m_status']=='admin'){
                  ?>  <div class="col-lg-4 col-xs-12"><br>
                        <button class="insertNewSymptoms btn-primary form-control col-lg-12 col-xs-12">Insert Symptoms</button>                     
                              <br><br><br>
                  </div>
                  <?php
                        }
                  ?> 
      </div>
      <!-- // find disease all in database Use For Insert Symptoms-->
      <?php 
            $diseaseSelect= array();  
            require("../ConnData/connectDB.php"); 
                            $sql = " SELECT * FROM disease WHERE d_name !='Normal' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) { 
                                while ($row = $result->fetch_assoc()) { 
                                    array_push($diseaseSelect,$row["d_name"]);
                                }
                            }else {
                                echo "0 Comment .";
                            }     
                            $conn->close();              
            // print_r(sizeof($diseaseSelect)); 
      ?>
      <!-- // end of find -->
      <div class="insertSymptoms"> <!-- Start form insert -->
      <form action="../ConnData/InsertSymptoms.php" method="post" enctype="multipart/form-data">
            <div class="row box-disease">
                  <div class="col-xs-12 col-md-4"><br>
                              <img style="display: block; margin: 0 auto;" id="blah" src="../Image/image_disease/choose.png" width="100%" alt="">
                              <br>
                              <input type="file" id="image" name="imagesymptoms[]" required> <br>
                              <xyz></xyz><br>
                              <input type="button" value="Add Image" id="add_image1">
                              <br><br>
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
                        <input type="hidden" name="key_symptoms_image" value="<?php echo generateRandomString(); ?>">
                        <!-- //Key end -->
                        <h3> Name of Symptoms </h3>
                        <input type="text" class="form-control col-lg-8 col-xs-12" name="symptomsname" maxlength="50" required><br>
                        <h3> Disease of Symptoms </h3>
                        <select class="form-control col-lg-8 col-xs-12" name="symptomsofdisease" style="float: left;">
                              <?php
                              for($i=0;$i<sizeof($diseaseSelect);$i++){
                                    ?>
                                    <option value="<?php echo $diseaseSelect[$i]; ?>"><?php echo $diseaseSelect[$i]; ?></option>
                                    <?php
                              }
                              ?>
                                    <option value="" selected disabled>Choose</option>
                        </select><br>
                        <!-- <input type="text" class="form-control col-lg-8 col-xs-12" name="symptomsofdisease" maxlength="50" required><br> -->
                        <h3> Detail </h3>
                        <textarea class="form-control" rows="5" type="text" name="symptomsdetail" required></textarea>
                        <br>
                        <button type="submit" class="form-control col-lg-4 col-xs-12 btn-primary" > Save </button> 
                        <br><br><br>
                  </div>
            </div>
      </form>
      </div><br> <!-- Stop form insert -->
      
      <div class="row box-disease">

      <!-- // find Symptoms all-->
      <?php 
            $symptomsAll= array();  
            require("../ConnData/connectDB.php"); 
                            $sql = " SELECT * FROM symptoms ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) { 
                                while ($row = $result->fetch_assoc()) { 
                                    array_push($symptomsAll,$row["s_link_image"]);
                                }
                            }else {
                                echo "0 Comment .";
                            }     
                            $conn->close();              
            // print_r(sizeof($symptomsAll)); 
      ?>
      <!-- // end of find -->
      <?php
      for($i=0;$i<sizeof($symptomsAll);$i++){
            ?>
            <!-- <div class="row"> -->
                  <div class="col-lg-6 col-xs-12">
                        <div class="row">
            <?php
            require("../ConnData/connectDB.php");
            $sql = "SELECT * FROM image_of_symptoms  WHERE ios_link_symptoms ='".$symptomsAll[$i]."' ";
            $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                              ?>
                              <div class="col-lg-4 col-xs-6" style="margin: auto;">
                                    <br>
                                    <img style="display: block; margin: auto;" src="../Image/image_symptoms/<?php echo $row['ios_image'] ?>" width="100%" alt="">
                                    <br>
                              </div>
                              <?php
                        }
                  }else{

                  }
                  $conn->close(); 
            ?>
                        </div>
                  </div>
                        <div class="col-lg-6 col-xs-12">
            <?php
            require("../ConnData/connectDB.php");
            $sql = "SELECT * FROM symptoms  WHERE s_link_image ='".$symptomsAll[$i]."' ";
            $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                              ?>
                              
                                    <h3 class="detail-header">
                                                <?php echo $row['s_name'] ?>
                                    </h3>
                                          <p class="detail">
                                                <?php echo $row['s_detail'] ?>
                                          </p>
                                          <b>Disease : <?php echo $row['s_disease']; ?></b><br><br>
                                    <?php 
                                    if($_SESSION['m_status']=='admin'){
                                    ?>  
                                          <div class="row">
                                                <div class="col-6">
                                                      <input type="button" class="btn-primary form-control col-lg-12 col-xs-12" value="Edit" onclick="EditThisSymptoms('<?php echo $row['s_link_image'];?>')">
                                                </div>
                                                <div class="col-6">
                                                      <input type="button" class="btn-danger form-control col-lg-12 col-xs-12" value="Delete" onclick="deleteData('<?php echo $row['s_link_image'];?>')">
                                                </div>
                                          </div>
                                    <?php
                                    }
                                    ?> 
                                    
                                 
                              
                              <?php
                        }
                  }else{

                  }
                  $conn->close(); 
            ?>
                        </div>
                  <div class="col-lg-12 col-xs-12">
                        <hr>
                  </div> 
            <!-- </div> -->
            <?php
      }
      ?>
      
                  
      </div>
   </div>
   </div>
   </div>

   <footer style="margin: 30px;">
      <div>

      </div>
   </footer>
   <script>
      function deleteData(getid) {

            swal({
            title: "Are you sure?", 
            text: "You want to Delete this Symptoms." , 
            type: "warning",
            confirmButtonText: 'Yes.',
            confirmButtonColor: '#DD6B55',

            showCancelButton: true ,
            }, function() {
            window.location.href='../ConnData/DeleteSymptoms.php?getID='+getid;
            });

      }
        function EditThisSymptoms(s_key){                
            window.location.href='SymptomsFormEdit.php?getKey='+s_key;
        }

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#blah").attr("src", e.target.result);
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
            <?php if( $_SESSION["checkAlert"]=='EidtSymptomsSuccess'){ ?>
                  title: "Edit Symptoms Success", 
            <?php }else if( $_SESSION["checkAlert"]=='InsertSymptomsSuccess'){ ?>
                  title: "Insert Symptoms Success", //2
            <?php }else if( $_SESSION["checkAlert"]=='DeleteSymptomsSuccess'){ ?>
                  title: "Delete Symptoms Success", //3
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