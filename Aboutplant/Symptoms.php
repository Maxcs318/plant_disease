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




   <!-- disease 1 -->
   <div class="container" style="margin-top: 10px;">
      <p class="textabout">Symptoms in Mango</p>
      <div class="row box-disease">
         <div class="col-xs-12 col-md-3">
            <img src="../img/classify_img/S1.jpg" class="imgsymptoms" alt="">
         </div>
         <div class="col-xs-12 col-md-3">
            <h2 class="detail-header">
               S1 :
            </h2>
            <p class="detail">
               Leaf become a lesion.
            </p>
         </div>
         <div class="col-xs-12 col-md-3">
            <img src="../img/classify_img/S2.jpg" class="imgsymptoms" alt="">
         </div>
         <div class="col-xs-12 col-md-3">
            <h2 class="detail-header">
               S2 :
            </h2>
            <p class="detail">
               Crack on lesion area.
            </p>
         </div>

         <div class="col-xs-12 col-md-3">
            <img src="../img/classify_img/S3.jpg" class="imgsymptoms" alt="">
         </div>
         <div class="col-xs-12 col-md-3">
            <h2 class="detail-header">
               S3 :
            </h2>
            <p class="detail">
               Blight on leaf.
            </p>
         </div>
         <div class="col-xs-12 col-md-3">
            <img src="../img/classify_img/S4.jpg" class="imgsymptoms" alt="">
         </div>
         <div class="col-xs-12 col-md-3">
            <h2 class="detail-header">
               S16 :
            </h2>
            <p class="detail">
               Leaf is irregular shape.
            </p>
         </div>
      </div>
   </div>
   </div>
   </div>

   <footer style="margin: 30px;">
      <div>

      </div>
   </footer>

</body>

</html>