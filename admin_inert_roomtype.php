


<?php 
    require "mysql/config.php";
$rmtype =$_POST['rmtype'];
$tpname =$_POST['tpname'];
$rm_detail = $_POST['rm_detail'];
$rmprice = $_POST['rmprice'];



//อัพโหลด 
if(isset($_POST['submit'])){
$file = $_FILES['image'];

$filename = $_FILES['image']['name'];
$filetmpname = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];
$fileerror = $_FILES['image']['error'];
$filetype = $_FILES['image']['type'];

$fileext = explode('.' , $filename);
$fileactualext = strtolower(end($fileext));

$allowed = array('jpg', 'jpeg' , 'png' , 'pdf');

if(in_array($fileactualext, $allowed)){
  if($fileerror == 0){
    if($filesize < 1000000){
      $filenamenew = uniqid('', true).".".$fileactualext;
        $filedestination = 'roomtype/' .$filenamenew;
        move_uploaded_file($filetmpname, $filedestination);
        
          
$sql = "INSERT INTO roomtype (rmtype, tpname , rm_image ,rm_detail, rmprice ) 
VALUE ('$rmtype', '$tpname',  '$filenamenew', '$rm_detail', '$rmprice') ";
 $last_insert =mysqli_query($conn, $sql) or die(mysqli_error($conn));
 if($last_insert){
   $pay_id=mysqli_insert_id($conn); 

   $v1=1;
}else{    
  echo "<script language=\"JavaScript\">";
  echo "alert('บันทึกข้อมูลไม่ได้ครับ');";
  echo "location='admin_roomtype.php' ";
  echo "</script>";
}

    }else{
      echo "<script language=\"JavaScript\">";
      echo "alert('ขนาดไฟล์ ใหญ่เกินไป !');";
      echo "location='admin_roomtype.php' ";
      echo "</script>";

  
    }
}else{
  echo "<script language=\"JavaScript\">";
  echo "alert('การอัพโหลดผิดพลาด โปรดลองใหม่ !');";
  echo "location='admin_roomtype.php' ";
  echo "</script>";

}}} 


?>

 <script>
var v1=<?php echo $v1;?>;
var vurl="admin_roomtype.php";
if(v1==1){
 alert("ดำเนินการเสร็จสิ้น");
}else{
 alert("ดำเนินการผิดพลาด");
}
window.location.replace(vurl);
</script>
