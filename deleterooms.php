
<?php
require 'mysql/config.php';
$rmid = $_POST["rmid"];


$sql = "DELETE FROM rooms WHERE rmid='$rmid' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบข้อมูลสมาชิกเสร็จสิ้น');";
	echo "window.location = 'member.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('เกิดความผิดพลาด (ลองใหม่อีกครั้ง)');";
	echo "</script>";
}
?>
