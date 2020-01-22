
<?php
require 'mysql/config.php';
$reservation_id = $_GET['reservation_id'];
$sumprice = $_GET['sumprice'];
$days = $_GET['days'];

$sql = "UPDATE reservation SET sumprice = '$sumprice' ,sumdays = '$days' WHERE reservation_id = '$reservation_id'";

$query = mysqli_query($conn,$sql);


?>
<script>
    var vurl="adminreceipt_booking.php?reservation_id=<?php echo $reservation_id;?>";
   

    window.location.replace(vurl);
</script>