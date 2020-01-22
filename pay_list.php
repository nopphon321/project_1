


<?php include("adminheader.php") ; ?>

<?php 
require 'mysql/config.php';
$pay_id=$_POST['pay_id'];
$reservation_id=$_POST['reservation_id'];
require 'books_config.php';



$sql="SELECT * FROM pay INNER JOIN reservation ON pay.reservation_id = reservation.reservation_id INNER JOIN bank ON pay.bank_id = bank.bank_id INNER JOIN member ON reservation.member_id = member.member_id INNER JOIN rooms ON reservation.rmid = rooms.rmid INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype WHERE pay_id = $pay_id ";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    
    ?>   <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title text-center">ข้อมูลการจองของ <?php echo $row['firstname'] ; ?>&nbsp;<?php echo $row['firstname'] ; ?></h4>
                        </p class="text-muted">วันที่เช็คอิน<?php echo $row['bkin']; ?><span>วันที่เช็คเอ้าท์<?php echo $row['bkout']; ?></span> </p>
                    </div>
                    <div class="content">
                       
                        <div class="row">
                        <div class="col-md-2">
                                    <div class="form-group">
                                        <label>ชื่อ-นามสกุล</label>
                                       <div><?php echo $row['firstname']; ?>&nbsp;<?php echo $row['lastname']; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>เบอร์โทร</label>
                                  <div><?php echo $row['phone']; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">อีเมล์</label>
                                       <div><?php echo $row['email']; ?></div>
                                    </div>
                                </div>
<!-- จบ 12 -->
                            </div>
                            <div class="col-md-6 text-center">
                                    <div class="form-group">
                                        <label>วันที่เช็คอิน</label>
                                       <div><?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>วันที่เช็คเอ้าท์</label>
                                  <div><?php echo date_format(date_create($row['bkout']), "d/m/Y"); ?></div>
                                    </div>
                                </div>
<!-- จบ 12 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>หมายเลขห้องพัก</label>
                                       <div><?php echo $row['rmid']; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ประเภทห้องพัก</label>
                                       <div><?php echo $row['tpname']; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ประเภทการชำระเงิน</label>
                                       <div><?php echo $row['bank_name']; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ราคา</label>
                                       <h3 class="text-warning"><?php echo number_format( $row['sumprice'],0) ;?></h3>
                                    </div>
                                </div>
<!-- จบ 12 -->
                                <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <?php 
                                        if($row['bank_id']==1){
                                    ?>
                                      <div class="text-center  text-danger" ><h1>ชำระเงินสด</h1></div>
                                        <?php }else{
                                             ?>
                                  <img src="myfile/<?php echo $row['image'] ; ?>" class="img-thumbnail" width="200" height="200">

                                     <?php   } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                <form action="pays_status.php" method="POST">
                                <input type="hidden" name="rmid" value="<?php echo $row['rmid']; ?>">
                                <input type="hidden" name="bkin" value="<?php echo $row['bkin']; ?>">
                                <button type="submit" class="btn btn-info btn-fill pull-right">ยืนยันการชำรเงิน</button></form>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                <div class="col-md-12">
                                <div class="form-group">
                                <form action="slip.php" method="POST">
                                <input type="hidden" name="pay_id" value="<?php echo $row['pay_id']; ?>">
                                <button type="submit" class="btn btn-info btn-fill pull-right bg-dark">ปริ้นใบเสร็จ</button></form>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            
                            <div class="clearfix"></div>
                        
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
                        




<?php include("adminfooter.php")?><?php } ?>