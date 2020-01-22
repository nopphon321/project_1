
<?php
require 'mysql/config.php';
$reservation_id = $_GET['reservation_id'];
$sumprice = $_GET['sumprice'];
$days = $_GET['days'];

$sql = "UPDATE reservation SET sumprice = '$sumprice' ,sumdays = '$days' WHERE reservation_id = '$reservation_id'";

$query = mysqli_query($conn,$sql);
if($query)
{
	echo "<script language=\"JavaScript\">";
		echo "alert('จองห้องพักสำเร็จ');";
		echo "location='bookend.php' ";
		echo "</script>";
}else
{
	printf("Error: %s\n", $conn->error);
	exit();
}

?>
