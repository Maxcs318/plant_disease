<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container box-list">
    <?php require("../ConnData/connectDB.php"); ?>
        <?php
            $sql = "SELECT * FROM classification WHERE cl_id = '" . $_GET["getCl_id"] . "' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="row"><!-- start row 1-->
                        <div class="col-lg-12 col-xs-12"><br>
                            <center>
                                <h4 class="header">Summary Classification ID : <?php echo $_GET["getCl_id"]; ?> </h4>
                            </center>
                            <hr class="border-line">
                        </div>
                    </div><!-- end row 1-->
                    <div class="row" style="margin-left:auto; margin-right: auto;"> <!-- start row 2-->

                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <img style="width: 100%" class="myImages" id="myImg" alt="Font Leaf" src="../Image/image_for_checkdisease/<?php echo $row["cl_image"]; ?>">
                            <center>Front Leaf</center>
                            <img style="width: 100%" class="myImages" id="myImg" alt="Back Leaf" src="../Image/image_for_checkdisease/<?php echo $row["cl_image2"]; ?>">
                            <center>Back Leaf</center>
                        </div>

                        <div class="col-lg-9 col-md-9 col-xs-12">
                        <h2>Owner Classification results</h2>
                        S1 : Leaf become a lesion [ <?php if ($row['cl_S1'] == 1) {
                                                        echo '&#x2713';
                                                    } else {
                                                        echo '&#x2717';
                                                    }   ?> ] <br>
                        S2 : check on lesion area [ <?php if ($row['cl_S2'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    }   ?> ] <br>
                        S3 : Blight on leaf [ <?php if ($row['cl_S3'] == 1) {
                                                    echo '&#x2713 ';
                                                } else {
                                                    echo '&#x2717';
                                                }   ?> ] <br>
                        S4 : Mature lesion are explanded and become dark-brown [ <?php if ($row['cl_S4'] == 1) {
                                                                                        echo '&#x2713 ';
                                                                                    } else {
                                                                                        echo '&#x2717';
                                                                                    } ?> ] <br>
                        S5 : Lesion occur at leaf margin [ <?php if ($row['cl_S5'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            }   ?> ] <br>
                        S6 : Tiny and irregular spot appear on leaf [ <?php if ($row['cl_S6'] == 1) {
                                                                            echo '&#x2713 ';
                                                                        } else {
                                                                            echo '&#x2717';
                                                                        }  ?> ]<br>
                        S7 : Rust-colored or orange spot on leaf [ <?php if ($row['cl_S7'] == 1) {
                                                                        echo '&#x2713 ';
                                                                    } else {
                                                                        echo '&#x2717';
                                                                    } ?> ]<br>
                        S8 : White spot on leaf [ <?php if ($row['cl_S8'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S9 : Greenish-gray spot on leaf [ <?php if ($row['cl_S9'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S10 : Brown spot on leaf [ <?php if ($row['cl_S10'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S11 : Black spot on leaf [ <?php if ($row['cl_S11'] == 1) {
                                                        echo '&#x2713 ';
                                                    } else {
                                                        echo '&#x2717';
                                                    } ?> ]<br>
                        S12 : Brown or orange powdery appear on the underside of leaf [ <?php if ($row['cl_S12'] == 1) {
                                                                                            echo '&#x2713 ';
                                                                                        } else {
                                                                                            echo '&#x2717';
                                                                                        } ?> ]<br>
                        S13 : Wither on the tip of leaf [ <?php if ($row['cl_S13'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S14 : Watery around lesion area [ <?php if ($row['cl_S14'] == 1) {
                                                                echo '&#x2713 ';
                                                            } else {
                                                                echo '&#x2717';
                                                            } ?> ]<br>
                        S13 : Yellow margin around a lesion [ <?php if ($row['cl_S15'] == 1) {
                                                                    echo '&#x2713 ';
                                                                } else {
                                                                    echo '&#x2717';
                                                                } ?> ]<br>
                        S16 : Leaf is irregular shape [ <?php if ($row['cl_S16'] == 1) {
                                                            echo '&#x2713 ';
                                                        } else {
                                                            echo '&#x2717';
                                                        } ?> ]<br><br>
                            <b>The Disease Owner detected :</b>
                            <?php echo $row["cl_disease"]; ?>
                            <br>
                            <b>Expert Confirm Disease :</b>
                            <?php
                            if ($row["cl_confirm"] != '') {
                                echo $row["cl_confirm"];
                            } else {
                                '<div style="color: yellow;">';
                                echo 'Waiting to be confirmed';
                                '</div>';
                            }
                            ?>
                        </div>

                    </div> <!-- end row 2-->
                <?php } 
                }else{
                    echo 'error';
                }
                $conn->close();
         ?>
         <hr>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div id="ChartPie" style="width: 100%; margin: 0 auto"></div><br>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div id="ChartColumn" style="width: 100%; margin: 0 auto"></div><br>
            </div>
        </div><br><br>
        <div class="row"> <!-- create table for check data and insert data to chart  -->
            <div class="col-lg-6 col-xs-12"> <br> <!--div show data Result Start-->
                <!-- // -->
                <?php // echo substr($row["p_date"], 0, 10); ?>
                    <?php 
                    require("../ConnData/connectDB.php"); 
                    
                    $sql = " SELECT * FROM disease ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                        $i=0;
                        while ($row = $result->fetch_assoc()) { 
                            $disease[] = [$row['d_name'],0];
                        }
                    }else {
                        echo "0 Comment .";
                    }     
                    $conn->close();         
                    ?>

                    <?php 
                    require("../ConnData/connectDB.php"); 
                    
                    $sql = " SELECT * FROM classification ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                        $i=0;
                        while ($row = $result->fetch_assoc()) { 
                            $row['cl_confirm'];
                            for($j=0;$j<sizeof($disease);$j++){
                                if($disease[$j][0]==$row['cl_confirm']){
                                    $disease[$j][1]=$disease[$j][1]+1;                                    
                                }
                            } 
                        }
                    }else {
                        echo "0 Comment .";
                    }     
                    $conn->close();  
                    // for($j=0;$j<sizeof($disease);$j++){
                    //     echo $disease[$j][0];
                    //     echo $disease[$j][1];
                    // }  
                    $sumAll=0;
                    for($j=0;$j<sizeof($disease);$j++){
                        $sumAll=$sumAll+$disease[$j][1];
                    }       
                    // echo $sumAll;
                    ?>
                        
                <!-- // -->
                <table id="datatable" > <!-- Start write Data -->
                    <thead>
                        <tr>
                            <th>Disease</th>
                            <th>Confirm By Expert</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($j=0;$j<sizeof($disease);$j++){
                        ?>
                        <tr>
                            <th><?php echo $disease[$j][0];?></th>
                            <td><?php echo $disease[$j][1];?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table> <!-- End write Data -->
            </div> <!--div show data Result End-->
        </div>
    </div>
<!-- // Script Create Chart -->
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script>
        $(function () {
            // ----- Chart Column   
            $('#ChartColumn').highcharts({
                data: {
                    //กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
                    table: 'datatable'
                },
                chart: {
                    backgroundColor: 'rgba(255, 255, 255, 0.50)',
                    type: 'column'
                },
                title: {
                    text: ' Confirmation information of all experts '
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: ' '
                    }
                },
                credits: { // hide credits Highchart.com
                    enabled: false
                }, 
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '  ' +
                            this.point.y + ' time </b>' ;
                    }
                }
            });
            // ----- Chart Pie
            $('#ChartPie').highcharts({
                data: {
                    //กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
                    table: 'datatable'
                },
                chart: {
                    backgroundColor: 'rgba(255, 255, 255, 0.50)',
                    type: 'pie'
                },
                title: {
                    text: ' Confirmation results As a percentage ( 100% ) '
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: ' '
                    }
                },
                credits: { // hide credits Highchart.com
                    enabled: false
                },         
                tooltip: {
                    formatter: function () {
                        return '<b>' + 'Found ' + this.point.name +' '+
                        (this.point.y/persen*100).toFixed(2) + ' % </b>' ;
                    }
                }
            });
        });
    //

    </script>
</body>
</html>