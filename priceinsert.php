<?php 
    require 'mysql/config.php';
    $rmid = $_POST['rmid'];
    $rmprice =$_POST ['rmprice'];

    $strSQL = "UPDATE rooms SET ";
    $strSQL .="rmprice = '".$rmprice."' ";
    $strSQL .="WHERE rmid = '".$rmid."' ";
    $query = mysqli_query($conn,$strSQL);
    if($query)
    {
       echo "<script language=\"JavaScript\">";
           echo "alert('อัพเดทเสร็จสิ้น');";
            echo "location='rooms.php' ";
           echo "</script>";
    }else
    {
        printf("Error: %s\n", $conn->error);
        exit();
    }
    
?>