


<?php include("adminfooter.php"); ?>



<?php 
require 'mysql/config.php';

//require 'books_config.php';
$stdate=(isset($_GET['stdate']))?$_GET['stdate']:date("Y-m-d");
$endate=(isset($_GET['endate']))?$_GET['endate']:date("Y-m-d");
require 'reservation_status.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        require 'reservationstatus.php';
    }

//    if(isset($_GET['rmid'])){
  //      $rmid=$_GET['rmid'];
    //    $bkin=$_GET['bkin'];
      //  $bkstatus=$_GET['bkstatus'];
        //require 'pays_status.php';
    //}

?>
    <style>
      @media print{
#no_print{display:none;}
}
      .status1 {
        color: #f1f1f1;
        background: rgb(255, 6, 6);
      }
        .status2 {
        color: #f1f1f1;
        background: rgb(248, 150, 4);
      }
      .status3 {
        color: #f1f1f1;
        background: rgb(11, 182, 68);
      }
      .status4 {
        color: #f1f1f1;
        background: rgb(11, 182, 68);
      }
      .status0 {
        color: #f1f1f1;
        background:rgb(0, 0, 0);
      }
      </style>
<?php include("adminheader.php"); ?>
<?php $nowdate=date("Y-m-d"); ?>
<div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center" >รายงานการจองห้องพักทั้งหมด</h4>
                            </div>
                            <div class="content">
                                <form action="adminreport_reservation.php" method="GET" id="no_print">
                                <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="checkin_date" class="font-weight-bold text-black thaifont">วันที่เช็คอิน</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input  type="date" name="stdate" value="<?php echo $nowdate; ?>"  class="form-control">
              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="checkout_date" class="font-weight-bold text-black thaifont">วันที่เช็คเอาท์</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="date" name="endate" value="<?php echo $nowdate; ?>" class="form-control">
              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">&nbsp;</label><br>
                                                <button type="submit" class="btn  btn-fill pull-right">ค้นหา</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <!--<h4 class="title">รายการจองห้องพัก</h4>
                              <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            
                            <div  class=" table-responsive" >
                                <table  class=" content  table table-hover table-striped  table-full-width ">
                                    <thead>
                                        <th>รายการ</th>
                                    	<th>ชื่อ - นาม</th>
                                        <th>จำนวนห้อง</th>
                                        <th>เบอร์โทร/อีเมล</th>
                                        <th>วันที่เช็คอิน</th>
                                        <th>วันที่เช็คเอ้าท์</th>
                                        <th>วันที่จอง</th>
                                        <th id="no_print">สถานะ</th>
                                        <th id="no_print">พิมพ์ใบเสร็จ</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
  <?php 
  $list = 0;
        $sql="SELECT DISTINCT reservation.reservation_id , reservation_detail.bkin ,reservation_detail.bkout , member.firstname , member.lastname ,member.phone , member.email , reservation.bkdate , reservation.status, reservation.status   
           FROM reservation INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id INNER JOIN member ON reservation.member_id = member.member_id 
           WHERE reservation.bkdate AND reservation_detail.bkin BETWEEN '$stdate' AND '$endate'   AND reservation.status >='1'  ORDER BY reservation_detail.bkin  ASC";

        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $reservation_id = $row['reservation_id'];
            $list ++;
        ?>
          <tr>
        <td><?php echo $list ;?></td>

<td> <?php echo $row['firstname']; ?> - <?php echo $row['lastname']; ?></td>
<td class="text-center">

<?php 
  $i=0;
  $sql3="SELECT * FROM reservation_detail WHERE reservation_id = $reservation_id ";

        $result3 = $conn->query($sql3);
        while($row3 = $result3->fetch_array(MYSQLI_ASSOC)){
            $i ++ ;} echo $i ;
        ?>

</td>
<td><?php echo $row['phone']; ?><br><?php echo $row['email'] ?></td>
<td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
        <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
        <td><?php echo date_format(date_create($row['bkdate']), "d/m/Y");?></td>
        <td id="no_print" class="text-center status<?php echo $row['status'];?>"><?php  echo $bookstatus[$row['status']]; ?></td>
        <td id="no_print"><form action="adminreport_reservation_receipt.php" method="POST">
            <input type="hidden" name="reservation_id"  value="<?php echo $reservation_id;?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >พิมพ์ใบเสร็จ</button>
            </form></td>
        <td id="no_print"><form action="adminreport_reservation.php" method="GET">
            <input type="hidden" name="id"  value="<?php echo $reservation_id;?>" class="form-control" required="required">
            <button onclick="return confirm('ยืนยันการยกเลิกจองห้องพัก อีกครั้ง')" type="submit" class="btn btn-dangeer pe-7s-trash btn-danger" >ยกเลิก</button>
            </form></td>
    </tr>
        <?php } ?>
                                    </tbody>
                                </table >

                                
                            </div id="no_print">
                        </div>
                    </div>

          <!--ปิด div container -->

</div>
</div></div></div>


