
<?php
require 'mysql/config.php';
$reservation_id = $_POST['reservation_id'];



$sql = "UPDATE reservation SET status = '0' WHERE reservation_id = '$reservation_id'";

$query = mysqli_query($conn,$sql);
if($query){
  echo "<script language=\"JavaScript\">";
  echo "alert('แจ้งยกเลิกสำเร็จ');";
  echo "location='books_list.php' ";
  echo "</script>";

 
}else{  
 echo "บันทึกข้อมูลไม่ได้ครับ";    
}

?>
