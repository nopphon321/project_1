
<?php
require 'mysql/config.php';
$prefix_id = $_POST["prefix_id"];


$sql = "DELETE FROM prefix WHERE prefix_id='$prefix_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบข้อมูลสำเสร็จ');";
	echo "window.location = 'prefix.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('เกิดความผิดพลาด (ลองใหม่อีกครั้ง)');";
	echo "</script>";
}
?>
