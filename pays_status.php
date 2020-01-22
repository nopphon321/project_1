<?php
require 'mysql/config.php';
$bkin =$_POST['bkin'];
$rmid =$_POST['rmid'];
    $sql="UPDATE reservation SET status='3' WHERE bkin='$bkin' AND rmid = '$rmid'";
    $result=$conn->query($sql);
    if($result==1){
        echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดทเสร็จสิ้น');";
		echo "location='adminbooks_in.php' ";
        echo "</script>";
        $v1=1;
    }else{
        printf("Error: %s\n", $conn->error);
        exit();
    }
      
?>


