
<?php
$reservation_id= $_GET['reservation_id'];
$rmid = $_GET['rmid'];
$i = $_GET['i'];
$m_id = $_GET['member_id'];
$i--;
require 'mysql/config.php';

$sql = "DELETE FROM reservation_detail WHERE  reservation_id = $reservation_id AND rmid = $rmid ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม


?>
    <script>
    var vurl="admin_booking.php?reservation_id=<?php echo $reservation_id;?>&i=<?php echo $i ?>&m_id=<?php echo $m_id ?>";

    window.location.replace(vurl);
</script>

