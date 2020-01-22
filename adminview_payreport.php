


<?php include("adminfooter.php"); ?>



<?php 
error_reporting(0);
require 'mysql/config.php';
//require 'books_config.php';
$stdate=(isset($_GET['stdate']))?$_GET['stdate']:date("Y-m-d");
$endate=(isset($_GET['endate']))?$_GET['endate']:date("Y-m-d");
$pay_id =$_POST['pay_id'];
$reservation_id = $_POST['reservation_id'];


//    if(isset($_GET['rmid'])){
  //      $rmid=$_GET['rmid'];
    //    $bkin=$_GET['bkin'];
      //  $bkstatus=$_GET['bkstatus'];
        //require 'pays_status.php';
    //}

?>
<?php include("adminheader.php"); ?>
<?php $nowdate=date("Y-m-d"); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">รายการ</h4>
                            </div>
                            <div class="content">

                                    <div class="row">
                                    <?php 
        $sql="SELECT * FROM pay INNER JOIN reservation ON pay.reservation_id = reservation.reservation_id 
        INNER JOIN member ON pay.member_id = member.member_id INNER JOIN bank ON pay.bank_id = bank.bank_id
        WHERE reservation.reservation_id = $reservation_id";

        $result=$conn->query($sql);

        while($row= $result->fetch_array(MYSQLI_ASSOC)){
        ?>
                                        <div class="col-md-4">
                                            <div class="form-group"   >
                                            <img   width="150" height="150" src = "payimage/<?php echo $row['image'] ;?>">
      
                                            <label>(สลิปโอนเงิน)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label >รายละเอียด ผู้จอง</label>
                                    
                                                <div> ชื่อ-นามสกุล<?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></div>
                                                <div>เบอร์โทร : <?php echo $row['phone']; ?></div>
                                                <div>อีเมล : <?php echo $row['email']; ?></div>
                                                <div>ชำระจากธนาคาร : <?php echo $row['bank_name']; ?></div>
                                                <div>วันที่ชำระเงิน : <?php echo date_format(date_create($row['pay_date']), "d/m/Y-H:i"); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        

                            <div class="header">
                                <h4 class="title">รายละเอียดการจอง</h4>
                           <!--     <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                      <th>รายการ</th>
                                    	<th>หมายเลขห้อง</th>
                                    	<th>ประเภทห้องพัก</th>
                                    	<th>วันที่เช็คอิน</th>
                                      <th>วันที่เช็คเอ้าท์</th>
                                      <th>ระยะเวลา</th>
                                      <th>ราคารวม</th>
                                    </thead>
                                    <?php 
      $i = 0;
      $sql2="SELECT * FROM reservation_detail INNER JOIN rooms ON reservation_detail.rmid = rooms.rmid INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype WHERE reservation_detail.reservation_id = $reservation_id";
      
      $result=$conn->query($sql2);

      while($row2= $result->fetch_array(MYSQLI_ASSOC)){
        $bkin = $row2['bkin'];
        $bkout = $row2['bkout'];
        $i++ ;
        $days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');
      ?>

                                    <tbody>
                                        <tr>
                                          
                                        	<td><?php echo $i ?></td>
                                        	<td><?php echo $row2['rmid']; ?></td>
                                        	<td><?php echo $row2['tpname']; ?></td>
                                        	<td><?php echo date_format(date_create($row2['bkin']), "d/m/Y"); ?></td>
                                          <td><?php echo date_format(date_create($row2['bkout']), "d/m/Y"); ?></td>
                                          <td><?php echo $days; ?></td>
                                          <td><?php echo number_format($row2['price'],2); ?></td>
                                          

                                        </tr>
                                    </tbody>
        <?php } ?>
        <tr>
          <td colspan="6" class="text-right">ราคารวม</td>
            <td><?php echo number_format($row['sumprice'],2); ?></td>
      </tr>
            <tr>
              <td colspan="6" class="text-right text-danger">ชำระแล้ว </td>
              <td class=" text-danger">
              <?php 
      $sql3="SELECT sumprice FROM pay WHERE pay_id = $pay_id";
      $resul3=$conn->query($sql3);
      while($row3= $resul3->fetch_array(MYSQLI_ASSOC)){
      ?>
              <?php echo number_format($row3['sumprice'],2); ?>
      <?php }?></td>
      </tr>
                                </table>
                                <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                <form action="adminview_payreportupdate.php" method="POST">
            <input type="hidden" name="pay_id"  value="<?php echo $pay_id;?>"  >
            <input type="hidden" name="reservation_id"  value="<?php echo $reservation_id;?>"  >
            <button type="submit" class="btn btn-default" >อนุมัติ</button>
            </form> 
                                    
                                </div>
                                <div class="col-md-8 col-md-offset-4">
                                <a href="adminreport_pays.php" class="btn btn-default" >ย้อนกลับ</a>
                                    
                                </div>
      </div>


      </div>

                </div>
            </div>
        </div>

        <?php }?>



<?php include("adminfooter.php"); ?>

