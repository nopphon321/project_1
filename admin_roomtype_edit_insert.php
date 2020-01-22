<?php 
    require "mysql/config.php";
$rmtype =$_POST['rmtype'];
$tpname =$_POST['tpname'];
$rmtype_detail = $_POST['rmtype_detail'];
$rmprice = $_POST['rmprice'];
$image = $_FILES["image"]["name"];

 
//อัพโหลด 
$ext= pathinfo(basename($_FILES["image"]["name"]) , PATHINFO_EXTENSION );
$new_image_name = 'room'.uniqid().".".$ext;
$image_path = "roomtype/";
$upload_path = $image_path.$new_image_name;
$success = move_uploaded_file($_FILES["image"]["tmp_name"], $upload_path );
 

$image = $new_image_name;

  
$sql = "UPDATE `roomtype` SET  tpname='$tpname' ,rm_image = '$image' , rm_detail = '$rmtype_detail' ,rmprice= '$rmprice' WHERE  rmtype = '$rmtype'";
 $mysql =mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($mysql){
    echo "<script language=\"JavaScript\">";
    echo "alert('อัพเดทเสร็จสิ้น');";
    echo "location='admin_roomtype.php' ";
    echo "</script>";

   
 }else{  
   echo "บันทึกข้อมูลไม่ได้ครับ";    
 }
?>
