
<?php 
require 'mysql/config.php';
$bkin=$_GET['bkin'];
$bkout=$_GET['bkout'];
$bkdate=$_GET['bkdate'];
$sumprice=$_GET['sumprice'];
$member_id=$_GET['member_id'];
$rmid=$_GET['rmid'];
$query = "INSERT INTO reservation (member_id, rmid,  bkin, bkout, bkdate, sumprice, status) 
VALUE ('$member_id', '$rmid',  '$bkin', '$bkout', '$bkdate', '$sumprice', '1') ";
       $last_insert =mysqli_query($conn, $query) or die(mysql_error());
      if($last_insert){
        $reservation_id=mysqli_insert_id($conn); 
        $v1=1;
      }else{
        echo "เกิดความผิดพลาด" .mysqli_error($conn);
      }
    
    ?>
    
    <script>
    var v1=<?php echo $v1;?>;
    var vurl="book_pay.php?reservation_id=<?php echo $reservation_id;?>";
    if(v1==1){
        alert("กำดำเนินการเสร็จสิ้น");
    }else{
        alert("กำดำเนินการผิดพลาด");
    }
    window.location.replace(vurl);
</script>
