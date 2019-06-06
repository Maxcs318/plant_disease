<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Summary </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../bootstrap/css/main.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> <!-- chart -->

</head>
<body>
    <div class="container"><br>
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div id="ChartPie" style="width: 100%; margin: 0 auto"></div><br>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div id="ChartColumn" style="width: 100%; margin: 0 auto"></div>
            </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div id="ChartColumn2" style="width: 100%; margin: 0 auto"></div>
            </div> 
            <div class="col-lg-6 col-xs-12"> <br> <!--div show data Result Start-->
                <!-- // -->
                <?php // echo substr($row["p_date"], 0, 10); ?>
                    <?php 
                    require("../../ConnData/connectDB.php"); 
                    
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
                    require("../../ConnData/connectDB.php"); 
                    
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
            <div class="col-lg-6 col-xs-12"><!--div show data Result2 Start-->
            <!-- // -->
                <?php 
                    require("../../ConnData/connectDB.php"); 
                    $disease2=$disease;
                    for($d=0;$d<sizeof($disease);$d++){
                        $disease2[$d][1]=0;
                    }
                    $sql = " SELECT * FROM classification ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                        $i=0;
                        $dateold='a';
                        while ($row = $result->fetch_assoc()) { 
                            $row['cl_confirm'];
                            if(substr($row["cl_date"],0,7)!=$dateold){
                                $dateDisease[]=[substr($row["cl_date"],0,7),[]];
                                $dateold=substr($row["cl_date"],0,7);
                            }else{
                                
                            }        
                        }
                    }else {
                        echo "0 Comment .";
                    }     
                    $conn->close();  
                ?>
                <?php 
                    require("../../ConnData/connectDB.php"); 
                    
                    $sql = " SELECT * FROM classification ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                        $i=0;
                        while ($row = $result->fetch_assoc()) { 
                            $row['cl_confirm'];
                            for($y=0;$y<sizeof($dateDisease);$y++){
                                if(substr($row["cl_date"],0,7)==$dateDisease[$y][0]&&$row['cl_confirm']!='') {
                                    // for($p=0;$p<sizeof($dateDisease);$p++){
                                        array_push($dateDisease[$y][1],[$row['cl_confirm'],1]);
                                    // }
                                    
                                } 
                            }
                        }
                    }else {
                        echo "0 Comment .";
                    }     
                    $conn->close();  
                ?>

                <script>
                    console.log(<?= json_encode($disease2); ?>);
                    console.log(<?= json_encode($dateDisease); ?>);
                </script>

                <table id="datatable2" > <!-- Start write Data -->
                    <thead>
                        <tr><th>Date</th>
                            <!-- <th></th> -->
                            <?php
                            for($j=0;$j<sizeof($disease);$j++){
                            ?>
                                <th><?php echo $disease[$j][0];?></th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> <td>xx</td>
                        <?php
                        for($k=0;$k<sizeof($disease);$k++){
                        ?>
                            <td><?php echo $disease[$k][1];?></td>     
                        <?php
                        }
                        ?>
                        </tr>
                    </tbody>
                </table> <!-- End write Data -->
            </div><!--div show data Result2 End-->
        </div>
    
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script>
        var persen="<?php echo $sumAll; ?>";
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
            // ----- Chart Column2   
            $('#ChartColumn2').highcharts({
                data: {
                    //กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
                    table: 'datatable2'
                },
                chart: {
                    backgroundColor: 'rgba(255, 255, 255, 0.50)',
                    type: 'column'
                },
                title: {
                    text: ' Period of disease '
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
            // 
        });
    //

    </script>
    <style>
        table, tr ,td{
            text-align: center;
            visibility: show; /* :hidden or :show */
        }
    </style>
</body>
</html>