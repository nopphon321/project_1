
<?php 
 require 'mysql/config.php';
$reservation_id=$_GET['reservation_id'];
$i = $_GET['i'];
$m_id = $_GET['m_id'];
if($i == 0){

  $sql3 = "DELETE FROM  reservation WHERE reservation_id = '$reservation_id'";
  $result = $conn->query($sql3);
	echo "<script language=\"JavaScript\">";
		echo "alert('กรุณาจองห้องพักใหม่ เนื่องจากคุณยกเลิกห้องพักหมด');";
		echo "location='adminbooking.php' ";
		echo "</script>";

}else{


?>

<?php
require 'mysql/config.php';
$sql="SELECT * FROM reservation_detail WHERE reservation_id = $reservation_id";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
 $bkin = $row['bkin'];
 $bkout = $row['bkout'];
 $days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');

}
$q=(int)(isset($_GET['q']))?$_GET['q']: 0;




if($q>0){
    $kw=" AND roomtype.rmtype='$q'";
}else{
    $kw="";
}
?>
<?php include("adminheader.php"); ?>
<div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ข้อมูลการจองห้องพัก</h4>
                            </div>
                            <div class="content">
                            <table class="table table-hover table-striped">
                                    <thead>
                                    <th scope="col">หมายเลขห้อง</th>
                                    <th scope="col">วันที่เช็คอิน</th>
                                    <th scope="col">วันที่เช็คเอ้า</th>
                                    <th scope="col">จำนวนคืน</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">ยกเลิก</th>
                                    </thead>
                                    <?php
                                  ;
              
  $i = '0';
  $price = 0;
  $sumprice =0 ;
  $sql="SELECT * FROM reservation INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id WHERE reservation.reservation_id ='$reservation_id'";
      $result = $conn->query($sql);
      while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a')
        
?>

<?php  $i = (int)$i + '1';


?>
                                    <tbody>
                                    <tr>
      <td><?php echo $row['rmid']; ?></td>
      <td><?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?></td>
      <td><?php echo date_format(date_create($row['bkout']), "d/m/Y"); ?></td>
      <td><?php echo $days; ?></td>
      <td><?php echo number_format($row['price'],2)?></td>
      
      <td><form action="admindetail_delete.php" method="GET">
      <input  type="hidden" name="reservation_id" value="<?php echo $row['reservation_id']; ?>">
      <input  type="hidden" name="rmid" value="<?php echo $row['rmid']; ?>">
      <input  type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>">
      <input  type="hidden" name="i" value="<?php echo $i ?>">
      <button type="submit" class="btn btn-sm btn-outline-secondary family">ยกเลิกห้องนี้</button>
      </form>
      </td>
    </tr>
                                        <?php 
    
    $sumprice = (int)$sumprice + (int)$row['price'];
    }   
      ?>
          <tr>
    <td colspan="4" class="text-right">Total :</td>
    <td><?php echo number_format($sumprice,2)  ?></td>
     </tr>
                                    </tbody>
                                    
                                </table>


                                  
                                    <div class="clearfix"></div>
                                </form>
                 <div class="text-center">                
<form action="admindetail_update.php" method="GET">
      <input  type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
      <input  type="hidden" name="sumprice" value="<?php echo $sumprice ?>">
      <input  type="hidden" name="days" value="<?php echo $days ?>">
      <button type="submit" class="btn btn-smbtn btn-dark family">ตกลงการจอง</button>
      </form>
  </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ห้องพักที่ยังว่าง </h4>
                            </div>
                            <div class="content">
                                
              <br>
      <div class="row">
      <?php 
      
      $sql2="SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype " 
      . "WHERE rmid NOT IN (SELECT rmid FROM reservation_detail "
      . "WHERE ((bkin >= '$bkin' AND bkin <'$bkout') OR (bkin < '$bkin' AND bkout > '$bkin')))".$kw;
  $result2 = $conn->query($sql2);
  while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
    ?>
        <form action="adminbook_detail_insert.php" method="POST">
        <div class="col-md-3">
          <div class="card mb-1 shadow-sm">  
            <div class="card-body">
              <p class="card-text">
              <div   class="font-weight-bold text-warning text-center" style="font-size:28px">&nbsp;<?php echo number_format($row2['rmprice'],0);?><span style="font-size:15px" class="text-warning text-body"> THB &nbsp;/คืน</span> </div>
              <div style="font-size:18px" class="text-center"><?php echo $row2['tpname']; ?></div>
              <div style="font-size:15px" class="text-center">ห้องพัก<?php echo $row2['rmid']; ?></div>
<?php  $price = (int)$days * (int)$row2['rmprice']; ?>

            <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
            <input type="hidden" name="rmid" value="<?php echo $row2['rmid']; ?>" >
            <input type="hidden" name="bkin" value="<?php echo $bkin; ?>" >
            <input type="hidden" name="bkout" value="<?php echo $bkout; ?>" >
            <input type="hidden" name="rmprice" value="<?php echo $price ; ?>" >
            <input type="hidden" name="m_id" value="<?php echo $m_id; ?>" >
            <input type="hidden" name="i" value="<?php echo $i; ?>" >
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group ">
               
                  <button type="submit"  class="btn btn-light ">จองเพิ่ม</button> 
                  

                </div>

              </div>
            </div>
          </div>
        </div>
        </form>
        <?php } ?>
  
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
        document.getElementByID('q').value="<?php echo $q;?>";
    </script>
       

<?php include("adminfooter.php"); ?>
  <?php }?>