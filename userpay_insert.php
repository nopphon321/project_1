

<?php 
require 'mysql/config.php';
$reservation_id=$_POST['reservation_id'];
$bank_id=$_POST['bank_id'];
$image = $_FILES["image"]["name"];
if(move_uploaded_file($_FILES["image"]["tmp_name"],"myfile/".$_FILES["image"]["name"]))
{
   } 

   
$sql = "INSERT INTO pay (reservation_id, bank_id, image ,status) 
VALUE ('$reservation_id', '$bank_id', '$image' ,'2') ";
 $last_insert =mysqli_query($conn, $sql) or die(mysql_error());
 if($last_insert){
   $pay_id=mysqli_insert_id($conn); 

   $v1=1;
}else{  
  echo "บันทึกข้อมูลไม่ได้ครับ";    
}
?>

 <script>
var v1=<?php echo $v1;?>;
var vurl="user_receipt.php?pay_id=<?php echo $pay_id;?>";
if(v1==1){
 alert("กำดำเนินการเสร็จสิ้น");
}else{
 alert("กำดำเนินการผิดพลาด");
}
window.location.replace(vurl);
</script>

    




