<?php 
$v1 = 0 ;
if($v1==0)
{
	echo "<script language=\"JavaScript\">";
		echo "alert('กรุณาสมัครสมาชิกก่อน  หรือ เข้าสู่ระบบก่อน');";
		echo "location='login.php' ";
		echo "</script>";
}else
{
  echo "<script language=\"JavaScript\">";
  echo "alert('กรุณาสมัครสมาชิกก่อน');";
  echo "location='login.php' ";
  echo "</script>";
	exit();
}

?>