<html>
<head>
<title>edit save</title>
</head>
<body>
<?php
require 'mysql/config.php';
$bank_id = $_POST['bank_id'];
$bank_name = $_POST['bank_name'];
$books_id = $_POST['books_id'];


$strSQL = "UPDATE bank SET ";
$strSQL .="bank_id = '".$bank_id."' ";
$strSQL .=",bank_name = '".$bank_name."' ";
$strSQL .=",books_id = '".$books_id."' ";
$strSQL .="WHERE bank_id = '".$bank_id."' ";
$query = mysqli_query($conn,$strSQL);
if($query)
{
	echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดทเสร็จสิ้น');";
		echo "location='bank.php' ";
		echo "</script>";
}else
{
	printf("Error: %s\n", $conn->error);
	exit();
}

?>
</body>
</html>