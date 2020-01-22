

<?php 
require 'mysql/config.php';
$reservation_id=$_POST['reservation_id'];
$bank_id=$_POST['bank_id'];
$member_id=$_POST['member_id'];
$sumprice=$_POST['sumprice'];
$pay_date = $_POST['pay_date'];


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
        $filedestination = 'payimage/' .$filenamenew;
        move_uploaded_file($filetmpname, $filedestination);
        
          
$sql = "INSERT INTO pay (reservation_id, member_id, sumprice, bank_id , pay_date, image, pay_status ) 
VALUE ('$reservation_id', '$member_id', '$sumprice', '$bank_id', '$pay_date'  ,'$filenamenew' ,'2') ";
 $last_insert =mysqli_query($conn, $sql) or die(mysqli_error($conn));
 if($last_insert){
   $pay_id=mysqli_insert_id($conn); 

   $v1=1;
      
   $sql2 = "UPDATE reservation SET status = '2'  WHERE reservation_id = '$reservation_id'";
   $mysql =mysqli_query($conn, $sql2) or die(mysqli_error($conn));
}else{  
  echo "<script language=\"JavaScript\">";
  echo "alert('บันทึกข้อมูลไม่ได้ กรุณาลองใหม่');";
  echo "location='books_list.php' ";
  echo "</script>";   
}

    }else{
      echo "<script language=\"JavaScript\">";
      echo "alert('ขนาดไฟล์ ใหญ่เกินไป !');";
      echo "location='books_list.php' ";
      echo "</script>";   
    }
}else{
  echo "<script language=\"JavaScript\">";
  echo "alert('การอัพโหลดรูปภาพผิดพลาด!');";
  echo "location='books_list.php' ";
  echo "</script>"; 

}}}



?>

 <script>
var v1=<?php echo $v1;?>;
var vurl="books_list.php?pay_id=<?php echo $pay_id;?>";
if(v1==1){
 alert("ดำเนินการเสร็จสิ้น");
}else{
 alert("ดำเนินการผิดพลาด");
}
window.location.replace(vurl);
</script>
