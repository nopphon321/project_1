<?php 
require 'mysql/config.php';
$member_id=$_GET['member_id'];
$i = $_GET['i'];
$bkin=$_GET['bkin'];
$bkout=$_GET['bkout'];
$rmprice=$_GET['rmprice'];
$tpname=$_GET['tpname'];
$bkout=$_GET['bkout'];
$rmtype=$_GET['rmtype'];
$nowdate=date("Y-m-d"); 
        $rmid=$_GET['rmid'];  
        $query = "INSERT INTO reservation (member_id,  bkdate, sumprice ,sumdays , status) 
        VALUE ('$member_id', '$nowdate', '0', '0',  '1') ";
               $last_insert =mysqli_query($conn, $query) or die(mysqli_error($conn));
              if($last_insert){
                $reservation_id=mysqli_insert_id($conn); 
                $query = "INSERT INTO reservation_detail (reservation_id, rmid, bkin, bkout , price ) 
                VALUE ('$reservation_id', '$rmid', '$bkin', '$bkout', '$rmprice') ";
                $sql =mysqli_query($conn, $query) or die(mysqli_error($conn));
              }else{
                echo "เกิดความผิดพลาด" .mysqli_error($conn);
              }

   
    

  
  
  
    ?>
    <script>
    var vurl=".php?reservation_id=<?php echo $reservation_id;?>&i=<?php echo $i ?>";

    window.location.replace(vurl);
</script>
