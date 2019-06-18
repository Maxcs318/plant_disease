<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Summary </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/main.css">
    <link rel="shortcut icon" href="../../img/leaficon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> <!-- sweetalert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> <!-- sweetalert-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $("table").hide();

        });
    </script>
</head>

<body>
    <?php
    if ($_SESSION["m_status"] != "admin") {
        header("location:../../index.php"); //to redirect back to "index.php" after logging out
    }
    ?>
    <!-- user id top -->
    <div style="text-align:right;" class="usertop">
        Username :
        <?php echo $_SESSION["m_username"]; ?>
        | Status :
        <?php echo $_SESSION["m_status"]; ?>
    </div>
    <!--end user id top -->

    <!-- slide text -->
    <div class="row">
        <p class="item-1 ">EXPERT SYSTEM FOR PLANT DISEASE CLASSIFICATION [item-1]</p>
        <p class="item-2 ">Some Text for [item-2]</p>
        <p class="item-3 ">Some Text for [item-3]</p>
    </div>
    <!-- end slide text -->

    <div class="container" style="margin-top: 70px;">
        <div class="col-md-4 col-xs-4">
            <!-- home button -->
            <a href="../../index.php">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../../img/home.png" class="imgabout">
                    <p class="text-img-detail">Home</p>
                </button></a>
        </div>
        <div class="col-md-4 col-xs-4">
            <!-- home button -->
            <a href="#" onclick="window.history.go(-1); return false;">
                <button type="submit" style="border: 0; background: transparent">
                    <img src="../../img/back.svg" class="imgabout">
                    <p class="text-img-detail">Back</p>
                </button></a>
        </div>
    </div>

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
            <div class="col-lg-6 col-xs-12"> <br>
                <!--div show data Result Start-->
                <!-- // -->
                <?php 
                ?>
                <?php
                require("../../ConnData/connectDB.php");

                $sql = " SELECT * FROM disease ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $disease[] = [$row['d_name'], 0];
                    }
                } else {
                    echo "0 Comment .";
                }
                $conn->close();
                ?>

                <?php
                require("../../ConnData/connectDB.php");

                $sql = " SELECT * FROM classification ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $row['cl_confirm'];
                        for ($j = 0; $j < sizeof($disease); $j++) {
                            if ($disease[$j][0] == $row['cl_confirm']) {
                                $disease[$j][1] = $disease[$j][1] + 1;
                            }
                        }
                    }
                } else {
                    echo "0 Comment .";
                }
                $conn->close();
                // for($j=0;$j<sizeof($disease);$j++){
                //     echo $disease[$j][0];
                //     echo $disease[$j][1];
                // }  
                $sumAll = 0;
                for ($j = 0; $j < sizeof($disease); $j++) {
                    $sumAll = $sumAll + $disease[$j][1];
                }
                // echo $sumAll;
                ?>

                <!-- // -->
                <table id="datatable">
                    <!-- Start write Data -->
                    <thead>
                        <tr>
                            <th>Disease</th>
                            <th>Confirm By Expert</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($j = 0; $j < sizeof($disease); $j++) {
                            ?>
                            <tr>
                                <th><?php echo $disease[$j][0]; ?></th>
                                <td><?php echo $disease[$j][1]; ?></td>
                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table> <!-- End write Data -->
            </div>
            <!--div show data Result End-->
            <div class="col-lg-6 col-xs-12">
                <!--div show data Result2 Start-->
                <!-- // -->
                <?php
                require("../../ConnData/connectDB.php");
                $disease2 = $disease;
                for ($d = 0; $d < sizeof($disease); $d++) {
                    $disease2[$d][1] = 0;
                }
                $sql = " SELECT * FROM classification ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    $dateold = 'a';
                    $countTime = 0;
                    while ($row = $result->fetch_assoc()) {
                        $row['cl_confirm'];
                        if (substr($row["cl_date"], 0, 7) != $dateold) {
                            $dateDisease[] = substr($row["cl_date"], 0, 7);
                            $dateold = substr($row["cl_date"], 0, 7);
                        } else { }
                        $countTime = $countTime + 1;
                    }
                } else {
                    echo "0 Comment .";
                }
                $conn->close();
                ?>
                <?php
                $confirmTime = 0;
                require("../../ConnData/connectDB.php");
                for ($e = 0; $e < sizeof($dateDisease); $e++) {
                    $disease3[$dateDisease[$e]] = $disease2;
                }
                $sql = " SELECT * FROM classification ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $confirmTime = $confirmTime + 1;
                        if ($row['cl_confirm'] != '') {
                            // $disease3[substr($row["cl_date"],0,7)]=$disease2;
                            for ($y = 0; $y < $countTime; $y++) { // $y< ...
                                if (substr($row["cl_date"], 0, 7) == $dateDisease[$y]) {
                                    for ($k = 0; $k < 10; $k++) {
                                        if ($row["cl_confirm"] == $disease3[substr($row["cl_date"], 0, 7)][$k][0]) {
                                            $disease3[$dateDisease[$y]][$k][1] = $disease3[$dateDisease[$y]][$k][1] + 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    echo "0 Comment .";
                }
                $conn->close();
                ?>

                <script>
                    // console.log(<?= sizeof($disease2); ?>);
                    // console.log(<?= json_encode($disease3); ?>);
                    // console.log(<?= json_encode($dateDisease); ?>);
                </script>

                <table id="datatable2">
                    <!-- Start write Data -->
                    <thead>
                        <tr>
                            <th>Date</th>
                            <!-- <th></th> -->
                            <?php
                            for ($j = 0; $j < sizeof($disease); $j++) {
                                ?>
                                <th><?php echo $disease[$j][0]; ?></th>
                            <?php
                        }
                        ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Start<?php echo substr($dateDisease[0], 0, 4); ?></td>
                            <?php
                            for ($z = 0; $z < sizeof($disease); $z++) {
                                ?>
                                <td></td>
                            <?php
                        }
                        ?>
                        </tr>

                        <?php
                        for ($k = 0; $k < sizeof($disease); $k++) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    // substr($row["cl_date"],0,7)
                                    if (substr($dateDisease[$k], 5, 7) == 1) {
                                        echo 'January  ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 2) {
                                        echo 'February   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 3) {
                                        echo 'March   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 4) {
                                        echo 'April   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 5) {
                                        echo 'May   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 6) {
                                        echo 'June   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 7) {
                                        echo 'July   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 8) {
                                        echo 'August   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 9) {
                                        echo 'September   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 10) {
                                        echo 'October   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 11) {
                                        echo 'November   ' . substr($dateDisease[$k], 0, 4);
                                    } else if (substr($dateDisease[$k], 5, 7) == 12) {
                                        echo 'December   ' . substr($dateDisease[$k], 0, 4);
                                    }
                                    ?>
                                </td>
                                <?php
                                for ($z = 0; $z < sizeof($disease); $z++) {
                                    ?>
                                    <td><?php echo $disease3[$dateDisease[$k]][$z][1]; ?></td>
                                <?php
                            }
                            ?>
                            </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table> <!-- End write Data -->
            </div>
            <!--div show data Result2 End-->
        </div>

    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script>
        var persen = "<?php echo $sumAll; ?>";
        var person = "<?php echo $confirmTime; ?>";
        $(function() {
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
                    text: ' Confirmation information of all experts ' + '<br>( classification all ' + person + ' )'
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
                    formatter: function() {
                        return '<b>' + this.series.name + '  ' +
                            this.point.y + ' time </b>';
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
                    formatter: function() {
                        return '<b>' + 'Found ' + this.point.name + ' ' +
                            (this.point.y / persen * 100).toFixed(2) + ' % </b>';
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
                    formatter: function() {
                        return '<b>' + this.series.name + '  ' +
                            this.point.y + ' time </b>';
                    }
                }
            });
            // 
        });
        //
    </script>
    <footer style="margin-bottom: 50px;">

    </footer>
</body>

</html>