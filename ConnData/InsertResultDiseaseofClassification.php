<?php
session_start();
// echo $_SESSION["getthecl_id"].'<br>';
// echo $diseaseConfirm.'<br>';
?>
<?php 
    require("connectDB.php");  
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
// for($i=0;$i<sizeof($disease); $i++){
// echo $disease[$i][0].' '.$disease[$i][1].'<br>'; 
// }     
?>
<?php require("connectDB.php");?>
<?php
    $sql = "SELECT * FROM classification_confirm WHERE cc_link_class = '".$_SESSION["getthecl_id"]."' ";

    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // echo $row['cc_id'].' '. $row['cc_disease'].'<br>';
                for($j=0;$j<sizeof($disease);$j++){
                    if($disease[$j][0]==$row['cc_disease']){
                        $disease[$j][1]=$disease[$j][1]+1;                                    
                    }
                } 
            }
    
        }else {
            echo "0 results";
        }
    $conn->close();
    $chkHight[]= ['non','0'] ; 
    // echo $chkHight[0][0];
    // echo $chkHight[0][1]; 
    for($z=0;$z<sizeof($disease); $z++){
        if($disease[$z][1]>$chkHight[0][1]){
            $chkHight[0][0]=$disease[$z][0];
            $chkHight[0][1]=$disease[$z][1];
        }else if($disease[$z][1]==$chkHight[0][1]){
            $chkHight[0][0]=$disease[$z][0];
            $chkHight[0][1]=$disease[$z][1];
        }
        
    } 
    // echo $diseaseConfirm.'<br>';
    // for($i=0;$i<sizeof($disease); $i++){
    //     echo $disease[$i][0].' '.$disease[$i][1].'<br>'; 
    // } 
    // echo $chkHight[0][0];
    // echo $chkHight[0][1];
?>

<?php require("connectDB.php");?>
<?php
    $sql = "UPDATE classification SET 
    cl_confirm = '".$chkHight[0][0]."'
    WHERE cl_id = '".$_SESSION['getthecl_id']."' ";
    if ($conn->query($sql) === TRUE) { 
        header("location:../Classification/data_identify_list_all.php");       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    $_SESSION["getthecl_id"]='';
?>