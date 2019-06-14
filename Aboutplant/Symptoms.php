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
            $(".insertSymptoms").hide();

            $(".insertNewSymptoms").click(function() {
                $(".insertSymptoms").toggle();
            });
        });
            function EditThisSymptoms(s_id){                
                $(".showedit"+s_id).toggle();
                $(".showdata"+s_id).toggle();
            }
            function CancelThisSymptoms(s_id){                
                $(".showedit"+s_id).toggle();
                $(".showdata"+s_id).toggle();
            }
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
      <div class="col-xs-4 col-md-4">

         <a href="../index.php">
            <button type="submit" style="border: 0; background: transparent">
               <img src="../img/home.png" class="imgabout">
               <p class="text-img-detail">Home</p>
            </button></a>
      </div>
      <!-- Disease button -->
      <div class="col-xs-4 col-md-4">
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
      <!-- // find disease all in database -->
      <?php 
            $diseaseSelect= array();  
            
            require("../ConnData/connectDB.php"); 
                            $sql = " SELECT * FROM disease ";
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
                              <br><br>
                              <input type="file" id="image" name="imagesymptoms[]" required> <br><br><br>
                  </div>
                  <div class="col-xs-12 col-md-8">
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

      <?php require("../ConnData/connectDB.php");?>
      <?php 
            $sql = "SELECT * FROM symptoms LEFT JOIN image_of_symptoms ON symptoms.s_link_image = image_of_symptoms.ios_link_symptoms ";
            $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {            
            ?>
                  
                  <div class="col-xs-12 col-md-3">
                        <br>
                  <form action="../ConnData/EditSymptoms.php" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="symptomsid" value="<?php echo $row['s_id']; ?>">
                        <div class="showedit<?php echo $row['s_id'];?>">
                            <img style="display: block; margin: 0 auto;" id="blah<?php echo $row['s_id'];?>" src="../Image/image_symptoms/<?php echo $row['ios_image']; ?>" width="80%" alt="">
                            <br>
                            <input type="file" id="image<?php echo $row['s_id'];?>" name="imagesymptoms[]" > <br>
                        </div>
                        <div class="showdata<?php echo $row['s_id'];?>">
                              <img style="display: block; margin: 0 auto;" src="../Image/image_symptoms/<?php echo $row['ios_image'] ?>" width="80%" alt="">
                        </div>
                        <br>
                  </div>
                  <div class="col-xs-12 col-md-3">
                        <h3 class="detail-header">
                        <div class="showedit<?php echo $row['s_id'];?>">
                              <input type="text" class="form-control " name="symptomsname" maxlength="50" value="<?php echo $row['s_name']; ?>" required>
                        </div>
                        <div class="showdata<?php echo $row['s_id'];?>">
                                    <?php echo $row['s_name'] ?>
                        </div>
                        </h3>
                        <div class="showedit<?php echo $row['s_id'];?>">
                            <textarea class="form-control" rows="3" type="text" name="symptomsdetail" required><?php echo $row['s_detail'];?></textarea>
                            <br>
                        </div>
                        <div class="showdata<?php echo $row['s_id'];?>">
                              <p class="detail">
                                    <?php echo $row['s_detail'] ?>
                              </p>
                        </div>
                        <div class="showedit<?php echo $row['s_id'];?>">
                              <select class="form-control" name="symptomsdisease" style="float: left;">
                                    <?php
                                    for($i=0;$i<sizeof($diseaseSelect);$i++){
                                          if($row['s_disease'] == $diseaseSelect[$i]){
                                          ?>
                                                <option value="<?php echo $diseaseSelect[$i]; ?>" selected><?php echo $diseaseSelect[$i]; ?></option>
                                          <?php
                                          }else{
                                          ?>
                                                <option value="<?php echo $diseaseSelect[$i]; ?>" ><?php echo $diseaseSelect[$i]; ?></option>
                                          <?php
                                          }
                                    }
                                    ?>
                              </select> <br><br><br>
                              <!-- <input type="text" class="form-control " name="symptomsdisease" maxlength="50" value="<?php echo $row['s_disease']; ?>" required><br> -->
                        </div>
                        <div class="showdata<?php echo $row['s_id'];?>">
                              <b>Disease : <?php echo $row['s_disease']; ?></b><br><br>
                        </div> 
                        <?php 
                            if($_SESSION['m_status']=='admin'){
                            ?>  
                                <div class="row">
                                    <div class="col-6">
                                          <div >
                                                <input type="button" class="showdata<?php echo $row['s_id'];?> btn-primary form-control col-lg-12 col-xs-12" value="Edit" onclick="EditThisSymptoms(<?php echo $row['s_id'];?>)">
                                          </div>
                                          <div >
                                                <input type="button" class="showedit<?php echo $row['s_id'];?> btn-danger form-control col-lg-12 col-xs-12" value="Cancel" onclick="CancelThisSymptoms(<?php echo $row['s_id'];?>)">
                                          </div>
                                    </div>
                                    <div class="col-6">
                                          <div >
                                                <button class="showedit<?php echo $row['s_id'];?> btn-primary form-control col-lg-12 col-xs-12" >Save </button> 
                                          </div>
                  </form>                        
                                          <div >
                                                <input type="button" class="showdata<?php echo $row['s_id'];?> btn-danger form-control col-lg-12 col-xs-12" value="Delete" onclick="deleteData(<?php echo $row['s_id'];?>)">
                                          </div>
                                    </div>
                                </div>
                                <br>
                            <?php
                            }
                        ?>

                  </div>
                  <script>
                  // hide edit
                  $(".showedit<?php echo $row['s_id'];?>").hide();
                  // set image 
                  function readURL<?php echo $row['s_id'];?>(input) {
                        if (input.files && input.files[0]) {
                              var reader = new FileReader();
                              reader.onload = function(e) {
                              $('#blah<?php echo $row['s_id'];?>').attr('src', e.target.result);
                              }
                              reader.readAsDataURL(input.files[0]);
                        }
                  }
                  $("#image<?php echo $row['s_id'];?>").change(function() {
                        readURL<?php echo $row['s_id'];?>(this);
                  });
                  </script>
            
            <?php       }
                  }else{

            }
            $conn->close();    
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