
<?php
require 'mysql/config.php';
$rmtype = $_POST["rmtype"];


$sql = "DELETE FROM roomtype WHERE rmtype='$rmtype' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบข้อมูลเสร็จสิ้น');";
	echo "window.location = 'admin_roomtype.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('เกิดความผิดพลาด (ลองใหม่อีกครั้ง)');";
	echo "</script>";
}
?>