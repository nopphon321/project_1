<?php include("adminheader.php"); ?>


<?php 
$member_id=$_POST['member_id'];

    require 'mysql/config.php';
    $sql="SELECT * FROM member INNER JOIN prefix ON member.prefix_id=prefix.prefix_id WHERE member_id=$member_id ";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">แก้ไข ข้อมูลสมาชิกหมายเลข<?php echo $row['member_id'] ; ?></h4>
                            </div>
                            <div class="content">
                                <form action="updatemember.php" method="POST">
                                <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <select name="prefix_id" id="q" class="form-control">
                  <option value="<?php echo $row['prefix_id']; ?>"><?php echo $row['prefix_name']; ?></option>
                  <?php 
                        $sql="SELECT * FROM prefix ORDER BY prefix_name ASC";
                        $result = $conn->query($sql);
                        while($row1 = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row1['prefix_id']; ?>"><?php echo $row1['prefix_name']; ?></option>
                          
                          <?php } ?>
                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                            <input type="hidden" name="member_id" class="form-control" value="<?php echo $row['member_id']; ?>">
                                                <label>ชื่อ</label>
                                                <input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">นามสกุล</label>
                                                <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Last Name" value="<?php echo $row['phone']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>password</label>
                                                <input type="text" class="form-control" name="password" placeholder="Last Name" value="<?php echo $row['password']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>userlevel(a=Admin,m="Member")</label> -->
                                                <input type="hidden" class="form-control" name="userlevel" value="<?php echo $row['userlevel']; ?>">
                                            <!-- </div>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ที่อยู่</label>
                                                <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <a href="member.php" class="btn btn-info btn-fill pull-left">ย้อนกลับ</a>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">ตกลงการแก้ไข</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>

        <?php } ?>
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                             <h3>ประวัติการจองห้องพัก</h3>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>วันที่จอง</th>
                                    <th>วันที่เช็คอิน</th>
                                    <th>วันที่เช็คเอ้าท์</th>
                                    <th>จำนวนห้องพัก</th>
                                    <th>สาถนะ</th>
                                    <th>ดูข้อมูล</th>
                                    </thead>
                                    <tbody style="font-size:15px"  class="table table-striped" >
        <?php 
        require 'books_config.php';
         $sumprice = 0 ;
         $sql="SELECT DISTINCT reservation.reservation_id , reservation_detail.bkin ,reservation_detail.bkout , member.firstname , member.lastname ,member.phone , member.email , reservation.bkdate , reservation.status, reservation.status   
         FROM reservation INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id INNER JOIN member ON reservation.member_id = member.member_id 
         WHERE member.member_id = $member_id   ORDER BY reservation_detail.bkin  ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $reservation_id = $row['reservation_id'];
        ?>
    <tr><?php if($row['reservation_id']>= 1){  ?>
        <td><?php echo date_format(date_create($row['bkdate']), "d/m/Y");?></td>
        <td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
        <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
        <td>
        
        <?php 
  $i=0;
  $sql3="SELECT * FROM reservation_detail WHERE reservation_id = $reservation_id ";

        $result3 = $conn->query($sql3);
        while($row3 = $result3->fetch_array(MYSQLI_ASSOC)){
            $i ++ ;} echo $i ;
        ?>

        </td>
        <td><?php echo $bookstatus[$row['status']]; ?></td>
        <td>
     
        <form action="adminview_payreport.php" method="POST">
        <input type="hidden" name="pay_id"  value="<?php echo $pay_id;?>" class="form-control" required="required">

            <input type="hidden" name="reservation_id"  value="<?php echo $reservation_id;?>" class="form-control" required="required">
            <button type="submit" class="btn btn-light pe-7s-note2" >คลิก </button>
            </form></td>
    <?php }else{  ?>
 <tr>
        <h1>ไม่มี</h1>
        <tr>
 <?php }?>

        </tr>

        <?php }?>

</tbody>
</table>
                                
                            </div>
                        </div>
                    </div>


        <?php include("adminfooter.php"); ?>