
<?php 
require 'mysql/config.php';
//require 'books_config.php';
$stdate=(isset($_POST['stdate']))?$_POST['stdate']:date("Y-m-d");
$endate=(isset($_POST['endate']))?$_POST['endate']:date("Y-m-d");

    //if(isset($_GET['rmid'])){
  //      $rmid=$_GET['rmid'];
   //     $bkin=$_GET['bkin'];
 //       $bkstatus=$_GET['bkstatus'];
  //      require 'pays_status.php';
  //  }

?>
<style>
    @media print{
#no_print{display:none;}
}</style>
<?php include("adminheader.php"); ?>
<?php $nowdate=date("Y-m-d"); ?>
<div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">รายงานยอดรายได้</h4>
                            </div>
                            <div class="content">
                                <form action="report.php" method="POST" id="no_print">
                                <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="checkin_date" class="font-weight-bold text-black thaifont">เช็ควันที่</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input  type="date" name="stdate" value="<?php echo $nowdate; ?>"  class="form-control">
              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="checkout_date" class="font-weight-bold text-black thaifont">ถึงวันที่</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="date" name="endate" value="<?php echo $nowdate; ?>" class="form-control">
              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">&nbsp;</label><br>
                                                <button type="submit" class="btn btn-info btn-fill pull-right">ค้นหา</button>
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
                             รายได้ประจำวันที่<div class="font-weight-light"><?php echo date_format(date_create($stdate), "d/m/Y");?>&nbsp;ถึง&nbsp;<span class="font-weight-light"><?php echo date_format(date_create($endate), "d/m/Y");?> </span></div>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>รายการ</th>
                                    <th>ชือ-นามสกุล</th>
                                    <th>วันที่ชำระ</th>
                                    <th>เบอร์โทรผู้ชำระ</th>
                                    <th>รูปแบบการชำระเงิน</th>
                                    <th>จำนวนเงิน</th>
                                    </thead>
                                    <tbody style="font-size:15px"  class="table table-striped" >
        <?php 
         $sumprice = 0 ;
         $i =0;
        $sql="SELECT * FROM pay INNER JOIN member ON pay.member_id = member.member_id
        INNER JOIN bank ON pay.bank_id = bank.bank_id
         WHERE  pay.pay_date 
        AND pay.pay_status = 3 AND pay.pay_date  BETWEEN '$stdate' AND '$endate' 
         ORDER BY pay.pay_date ASC";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $i ++;
        ?>

    <tr>
    <td><?php echo $i; ?></td>
        <td><?php echo $row['firstname']; ?><?php echo $row['lastname']; ?></td>
        <td><?php echo date_format(date_create($row['pay_date']), "d/m/Y");?></td>
        <td><span><?php echo $row['phone']; ?></span></td>
            <td><?php echo $row['bank_name'];?></td>
            <td><?php echo number_format($row['sumprice'],2);?></td>
            
       <!-- <td><?php if($row['status']>=1){ ?><?php echo number_format($row['sumprice'],2);
        $sumprice = (int)$sumprice + (int)$row['sumprice'];?>   <?php }if($row['status']==0){ echo "ถูกยกเลิก" ; }?>
          </td>-->
         
        </tr>

        <?php
     $sumprice = (int)$sumprice + (int)$row['sumprice'];
    }?>
        
        <tr>
        <td colspan="4"></td>
        <td  >Total : </td>
        <td class="text-warning" style="font-size:30px;"> <?php echo number_format($sumprice,2) ;?><td>

        </tr>
</tbody>
</table>
                                
                            </div>
                        </div>
                    </div>


   

          <!--ปิด div container -->

</div><br/>


<?php include("adminfooter.php"); ?>
