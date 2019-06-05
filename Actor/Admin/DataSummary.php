<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Summary </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>
<body>
    <div class="container"><br>
        <div class="row">
            <div class="col-lg-6 col-xs-12">

            </div> 
            <div class="col-lg-6 col-xs-12">
            
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div id="Chartscolumn" style="min-width: 100%; margin: 0 auto"></div>
            </div> 
            <div class="col-lg-6 col-xs-12"> <br>

                <!-- // -->
                
                    <?php 
                    require("../../ConnData/connectDB.php"); 
                    $diseaseSelect= array(); 
                    
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
                    $diseaseSelect= array(); 
                    
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
                    ?>
                        
                <!-- // -->
                <table id="datatable">
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
                </table>
            </div>
        </div>
    
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script>
    
        $(function () {
                    
            $('#Chartscolumn').highcharts({
                data: {
                    //กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
                    table: 'datatable'
                },
                chart: {
                    type: 'pie'
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
                
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + ' </b> ' +
                            this.point.y; + ' ' + this.point.name.toLowerCase();
                    }
                }
            });
        });
    //

    </script>
    <style>
        tr ,td{
            text-align: center
        }
    </style>
</body>
</html>