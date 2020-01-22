<?php 
    require 'mysql/config.php';
    $rmid = $_GET['rmid'];
    $rmtype =$_GET ['rmtype'];
    $rmprice = $_GET['rmprice'];
    $sql = "INSERT INTO rooms (rmid, rmtype, rmprice ) 
    VALUE ('$rmid', '$rmtype', '$rmprice' ) ";
    $query = mysqli_query($conn,$sql);
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
