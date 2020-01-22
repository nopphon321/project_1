
<style>
    @media print{
#no_print{display:none;}
}</style>

<?php 
require 'mysql/config.php';
include "admin_controller.php";
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
    
    if(isset($_POST['delete'])){
        $user = new User();
        $user->reservation_id =$_POST['reservation_id'];
        $user->stdate =$_POST['stdate'];
        $user->enddate= $_POST['enddate'];
        $user->delete();
    }
?>
    <style>

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
                                <h4 class="title text-center">รายงานการยกเลิกจองห้องพักทั้งหมด</h4>
                            </div>
                            <div class="content">
                                <form action="adminreport_cancelbook.php" method="GET" id="no_print">
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
                                <!--<p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>รายการ</th>
                                    	<th>ชื่อ - นาม</th>
                                        <th>รายละเอียด</th>
                                        <th>วันที่เช็คอิน</th>
                                        <th>วันที่เช็คเอ้าท์</th>
                                        <th>วันที่จอง</th>
                                        <th id="no_print">สถานะ</th>
                                        <th id="no_print"></th>
                                    </thead>
                                    <tbody>
  <?php 
  $list = 0;
        $sql="SELECT DISTINCT reservation.reservation_id , reservation_detail.bkin ,reservation_detail.bkout , member.firstname , member.lastname , reservation.bkdate , reservation.status, reservation.status   
           FROM reservation INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id INNER JOIN member ON reservation.member_id = member.member_id 
           WHERE reservation.bkdate AND reservation_detail.bkin  BETWEEN '$stdate' AND '$endate'   AND reservation.status ='0'  ORDER BY reservation_detail.bkin  ASC";

        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $reservation_id = $row['reservation_id'];
            $list ++;
        ?>
          <tr>
        <td><?php echo $list ;?></td>

<td> <?php echo $row['firstname']; ?> - <?php echo $row['lastname']; ?></td>
<td>จำนวนห้อง </td>
<td>

<?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
        <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
        <td><?php echo date_format(date_create($row['bkdate']), "d/m/Y");?></td>
        <td id="no_print" class="text-center status0"><?php  echo $bookstatus[$row['status']]; ?></td>
        <td id="no_print"><form action="adminreport_cancelbook.php" method="POST">
            <input type="hidden" name="reservation_id"  value="<?php echo $reservation_id;?>" class="form-control" required="required">
            <input type="hidden" name="stdate"  value="<?php echo $stdate;?>" class="form-control" required="required">
            <input type="hidden" name="enddate"  value="<?php echo $enddate;?>" class="form-control" required="required">
            <button type="submit" onclick="return confirm('คุณแน่ในหรือว่าจะลบข้อมูลชุดนี้ ')"  name="delete" class="btn btn-dangeer pe-7s-trash btn-danger" >ลบ</button>
            </form></td>
    </tr>
        <?php } ?>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </div>

          <!--ปิด div container -->

</div>
</div></div></div></div>



<?php include("adminfooter.php"); ?>


