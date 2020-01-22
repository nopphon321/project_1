
<?php
$pay_id =$_POST['pay_id'];
$reservation_id =$_POST['reservation_id'];
require 'mysql/config.php';

$sql = "UPDATE pay SET 	pay_status ='3' WHERE pay_id = $pay_id ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
if($result)
{
  $sql2 = "UPDATE reservation SET reservation.status ='3' WHERE reservation_id = $reservation_id ";
  $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
	echo "<script language=\"JavaScript\">";
		echo "alert('อนุมัติเรียบร้อย');";
		echo "location='adminreport_pays.php' ";
		echo "</script>";
}else
{
	printf("Error: %s\n", $conn->error);
	exit();
}
mysql_close($strSQL);
?>
