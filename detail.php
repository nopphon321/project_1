<?php   require 'mysql/config.php'; ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">รหัหการจอง</th>
      <th scope="col">หมายเลขห้อง</th>
      <th scope="col">วันที่จอง</th>
      <th scope="col">วันที่เช็คอิน</th>
      <th scope="col">วันที่เช็คเอ้า</th>
      <th scope="col">ราคา</th>
      <th scope="col">ยกเลิก</th>
    </tr>
  </thead>
  <?php
  $i = '0';
  $sumprice = 0;
  $sql="SELECT * FROM reservation INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id WHERE reservation.reservation_id ='$reservation_id'";
      $result = $conn->query($sql);
      while($row = $result->fetch_array(MYSQLI_ASSOC)){
        
?>
<?php  $i = (int)$i + '1';


?>
  <tbody>
    <tr>
      <th><?php echo $row['reservation_id']; ?></th>
      <td><?php echo $row['rmid']; ?></td>
      <td><?php echo $row['bkdate']; ?></td>
      <td><?php echo $row['bkin']; ?></td>
      <td><?php echo $row['bkout']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><form action="detail_delete.php" method="GET">
      <input  type="hidden" name="reservation_id" value="<?php echo $row['reservation_id']; ?>">
      <input  type="hidden" name="rmid" value="<?php echo $row['rmid']; ?>">
      <button type="submit" class="btn btn-sm btn-outline-secondary family">ยกเลิก</button>
      </form>
      </td>
    </tr>

    <?php 
     $sumprice = (int)$sumprice + (int)$row['price'];  
    }   echo $i;
      ?>
          <tr>
    <td colspan="5" class="text-right">Total :</td>
    <td><?php echo $sumprice; ?></td>
     </tr>
  </tbody>


</table>
