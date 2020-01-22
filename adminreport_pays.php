


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
<?php include("adminheader.php"); ?>
<?php $nowdate=date("Y-m-d"); ?>
<style>
    @media print{
#no_print{display:none;}
}
    </style>
<div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">รายการรออนุมัติการจอง</h4>
                            </div>
                            <div class="content">
                                <form action="adminreport_pays.php" method="GET" id="no_print">
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
                            <!--<h4 class="title">รายการรออนุมัติการจอง</h4>
                                <p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class=" table-responsive table-full-width " >
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>รายการ</th>
                                    	<th>ชื่อ - นาม</th>
                                        <th>ธนาคาร</th>
                                        <th>วันที่ชำระ</th>
                                        <th>จำนวนเงิน</th>
                                        <th id="no_print"></th>
                                    </thead>
                                    <tbody>
  <?php 
  $list = 0;
  $sql="SELECT * FROM pay INNER JOIN member ON pay.member_id = member.member_id
  INNER JOIN bank ON pay.bank_id = bank.bank_id
   WHERE  pay.pay_date BETWEEN '$stdate' AND '$endate'
  AND pay.pay_status = 2
   ORDER BY pay.pay_date ASC";

        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $pay_id = $row['pay_id'];
            $reservation_id = $row['reservation_id'];
            $list ++;
        ?>
          <tr>
        <td><?php echo $list ;?></td>
<td> <?php echo $row['firstname']; ?> - <?php echo $row['lastname']; ?></td>
<td>  <?php echo $row['bank_name']; ?></td>
<td><?php echo date_format(date_create($row['pay_date']), "d/m/Y-H:i");?></td>
        <td><?php echo number_format($row['sumprice'],2);?></td>
        <td id="no_print"><form action="adminview_payreport.php" method="POST">
            <input type="hidden" name="pay_id"  value="<?php echo $pay_id;?>" class="form-control" required="required">
            <input type="hidden" name="reservation_id"  value="<?php echo $reservation_id;?>" class="form-control" required="required">
            <button type="submit" class="btn btn-dangeer  btn-info" >ดูข้อมูล</button>
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
<script>
    var vurl ="adminbooks_in.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&status="+v3;
        window.location.replace(v4);
    }
</script>


<?php include("adminfooter.php"); ?>


