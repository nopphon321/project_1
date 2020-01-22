
<?php
require 'mysql/config.php';
$bank_id = $_POST["bank_id"];


$sql = "DELETE FROM bank WHERE bank_id='$bank_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบข้อมูลเสร็จสิ้น');";
	echo "window.location = 'bank.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('เกิดความผิดพลาด (ลองใหม่อีกครั้ง)');";
	echo "</script>";
}
?>