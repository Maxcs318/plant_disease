<?php require("../ConnData/connectDB.php");?>
<?php
    $sql = "DELETE FROM disease WHERE d_id='".$_GET["getID"]."' ";
    if ($conn->query($sql) === TRUE) {
    ?> 
                <!-- <!DOCTYPE html>
				<html>
				<head>    
				</head>
				<body onload="setTimeout(function() { document.frm1.submit() },10)">
                    <form action="../Aboutplant/Disease.php" name="frm1" method="POST">
                        <input type="hidden" name="deletesuccess" value="success" />
                    </form>
                </body>
				</html> -->
    <?php

    header("location:../Aboutplant/Disease.php");      


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>