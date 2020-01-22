 <html>
<head>
<title>edit save</title>
</head>
<body>
<?php
require 'mysql/config.php';
$pay_id = $_POST['pay_id'];
$bank_id = $_POST['bank_id'];
$image = $_FILES["image"]["name"];

if(move_uploaded_file($_FILES["image"]["tmp_name"],"myfile/".$_FILES["image"]["name"]))
{
   }
$strSQL = "UPDATE pay SET ";
$strSQL .="pay_id = '".$_POST["pay_id"]."' ";
$strSQL .=",bank_id = '".$_POST["bank_id"]."' ";
$strSQL .=",image = '".$image."' ";
$strSQL .="WHERE pay_id = '".$_POST["pay_id"]."' ";
$query = mysqli_query($conn,$strSQL);
if($query)
{
	echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดทเสร็จสิ้น');";
		echo "location='books_list.php' ";
		echo "</script>";
}else
{
	printf("Error: %s\n", $conn->error);
	exit();
}
mysql_close($strSQL);
?>
</body>
</html>