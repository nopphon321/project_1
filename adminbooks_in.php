
<?php 
require 'mysql/config.php';
//require 'books_config.php';
$stdate=(isset($_GET['stdate']))?$_GET['stdate']:date("Y-m-d");
$endate=(isset($_GET['endate']))?$_GET['endate']:date("Y-m-d");
require 'books_config.php';
    if(isset($_GET['rmid'])){
        $rmid=$_GET['rmid'];
        $bkin=$_GET['bkin'];
        $status=$_GET['status'];
        require 'books_status.php';
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
<div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ค้นหาห้องพัก</h4>
                            </div>
                            <div class="content">
                                <form action="adminbooks_in.php" method="GET">
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
                                            <label for="checkout_date" class="font-weight-bold text-black thaifont">วันที่เช็นเอาท์</label>
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
                            <h4 class="title">รายการจองห้องพัก</h4>
                                <!--<p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>เช็คอิน</th>
                                    	<th>เช็นเอ้าท์</th>
                                        <th>หมายเลขห้องพัก</th>
                                        <th>ประเภทห้องพัก</th>
                                        <th>ชื่อนามสกุลผู้จอง</th>
                                        <th>สถานะ</th>
                                        <th>ยกเลิกการจอง</th>
                                        <th>ดูหลักฐาน</th>
                                    </thead>
                                    <tbody>
  <?php 
        $sql="SELECT * FROM pay INNER JOIN reservation ON pay.reservation_id = reservation.reservation_id INNER JOIN bank ON pay.bank_id = bank.bank_id INNER JOIN member ON reservation.member_id = member.member_id INNER JOIN rooms ON reservation.rmid = rooms.rmid INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype WHERE  reservation.bkin  BETWEEN '$stdate' AND '$endate' ORDER BY reservation.bkin ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>
          <tr>
     	<td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
        <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
        <td clas="text-center"><?php echo $row['rmid']; ?></td>
        <td><?php echo $row['tpname']; ?></td>
        <td><?php echo $row['firstname']; ?>&nbsp;<?php echo $row['lastname']; ?></td>
        <td class="text-center"><?php  echo $bookstatus[$row['status']]; ?></td>
        <td><?php if($row['status']==1){ ?>
        <a class="text-danger" href="javascript:bookstatus('<?php echo $row['rmid'];?>','<?php echo $row['bkin']; ?>','0')">
            ยกเลิก
            </a><?php }?></td>
         <td><?php if($row['status']>=0){ ?><form action="pay_list.php" method="POST">
            <input type="hidden" name="pay_id"  value="<?php echo $row['pay_id'];?>" class="form-control" required="required">
            <input type="hidden" name="reservation_id"  value="<?php echo $row['reservation_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-primary pe-7s-note2">คลิก </button>
            </form><?php }?></td>
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

