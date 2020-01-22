<?php require 'mysql/config.php'; ?>

<?php 
$query_last_insert = "INSERT INTO member (member_id) VALUES('bank','male')";
$last_insert = mysql_query($query_last_insert, $tdev) or die(mysql_error());
if($last_insert){
   echo "บันทึกเรียบร้อยแล้ว <br/> ค่าไอดีที่ทำการ insert คือ : ".mysql_insert_id($tdev); 
}else{  
  echo "บันทึกข้อมูลไม่ได้ครับ";    
}
?>