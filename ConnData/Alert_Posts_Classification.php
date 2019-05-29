<?php //session_start(); ?>
<?php require("../../ConnData/connectDB.php"); ?>
        <?php
        $sql = " SELECT * FROM posts WHERE p_status_comment !='' AND p_own='".$_SESSION["m_id"]."' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $countpost = 0;
            while ($row = $result->fetch_assoc()) {
                 $countpost=$countpost+1;
            }
            //echo 'Post have comment '.$countpost.' posts <br>';
        } else {
        // echo "0 results";
        }
        $conn->close();
?>

<?php require("../../ConnData/connectDB.php"); ?>
        <?php
        $sql = " SELECT * FROM classification WHERE cl_status_confirm !='' AND cl_linkmember='".$_SESSION["m_id"]."' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $countclass = 0;
            while ($row = $result->fetch_assoc()) {
                 $countclass=$countclass+1;
            }
            //echo 'Classification confirm '.$countclass.' . <br>';
        } else {
        // echo "0 results";
        }
        $conn->close();
?>