<html>
<head>
<title>edit save</title>
</head>
<body>
<?php
require 'mysql/config.php';

$admin_id = $_POST['admin_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['address'];
$userlevel = $_POST['userlevel'];



$sql = "UPDATE admin SET firstname = '$firstname' ,lastname = '$lastname' 
,username = '$username' ,password = '$password' , phone = '$phone' ,email = '$email' ,address = '$address' ,userlevel = '$userlevel'
 WHERE admin_id = '$admin_id'";
$query = mysqli_query($conn,$sql);
if($query)
{
	echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดทเสร็จสิ้น');";
		echo "location='member.php' ";
		echo "</script>";
}else
{
	printf("Error: %s\n", $conn->error);
	exit();
}

?>
</body>
</html>