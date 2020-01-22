<html>
<head>
<title>edit save</title>
</head>
<body>
<?php
require 'mysql/config.php';
$prefix_id = $_POST['prefix_id'];
$member_id = $_POST['member_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['address'];
$userlevel = $_POST['userlevel'];

$strSQL = "UPDATE member SET ";
$strSQL .="prefix_id = '".$prefix_id."' ";
$strSQL .=",firstname = '".$firstname."' ";
$strSQL .=",lastname = '".$lastname."' ";
$strSQL .=",email = '".$email."' ";
$strSQL .=",phone = '".$phone."' ";
$strSQL .=",username = '".$username."' ";
$strSQL .=",password = '".$password."' ";
$strSQL .=",address = '".$address."' ";
$strSQL .=",userlevel = '".$userlevel."' ";
$strSQL .="WHERE member_id = '".$member_id."' ";
$query = mysqli_query($conn,$strSQL);
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