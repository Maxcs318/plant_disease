<!DOCTYPE html>
<html>
    <head>
            
    </head>
<?php
    require("connectDB.php");
    // echo $_GET['getID'];
    $sql = "UPDATE member SET m_status='expert' WHERE m_id= '".$_GET['getID']."' ";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        ?>  
        <body onload="setTimeout(function() { document.frm1.submit() },10)">
            <form action="../allMember.php" name="frm1" method="POST">
                <input type="hidden" name="checkUp" value="success" />
            </form>
        </body>
        <?php
    }else {
        echo "0 results";
    }
     $conn->close();
?>
</html> 