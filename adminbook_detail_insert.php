
<?php
  require 'mysql/config.php';
$reservation_id = $_POST['reservation_id'];
$rmid = $_POST['rmid'];
$bkin = $_POST['bkin'];
$bkout = $_POST['bkout'];
$price = $_POST['rmprice'];
$member_id = $_POST['m_id'];
$i =$_POST['i'];
$i++ ;
 $query = "INSERT INTO reservation_detail (reservation_id, rmid, bkin, bkout , price ) 
 VALUE ('$reservation_id', '$rmid', '$bkin', '$bkout', '$price') ";
 $sql =mysqli_query($conn, $query) or die(mysql_error());
?>

<script>
    var vurl="admin_booking.php?reservation_id=<?php echo $reservation_id;?>&i=<?php echo $i ?>";
    vurl+="&m_id=<?php echo $member_id;?>";

    window.location.replace(vurl);
</script>