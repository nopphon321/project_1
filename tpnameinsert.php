<?php 
    require 'mysql/config.php';
    $rmtype = $_POST['rmtype'];
    $tpname =$_POST ['tpname'];

    $strSQL = "UPDATE roomtype SET ";
    $strSQL .="tpname = '".$tpname."' ";
    $strSQL .="WHERE rmtype = '".$rmtype."' ";
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