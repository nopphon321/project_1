<?php 
    require "mysql/config.php";
$rmid =$_POST['rmid'];
$rmtype =$_POST['rmtype'];
$detail = $_POST['detail'];


 

  
$sql = "INSERT INTO `rooms`(rmid, rmtype, detail) VALUES ('$rmid', '$rmtype' , '$detail')";
 $mysql =mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($mysql){
    echo "<script language=\"JavaScript\">";
    echo "alert('อัพเดทเสร็จสิ้น');";
    echo "location='admin_room.php' ";
    echo "</script>";

   
 }else{  
   echo "บันทึกข้อมูลไม่ได้ครับ";    
 }
?>
