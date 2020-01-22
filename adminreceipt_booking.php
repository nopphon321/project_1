<?php include("adminheader.php"); ?>
<?php
$reservation_id =$_GET['reservation_id'];
require 'mysql/config.php';
?>    
<?php $nowdate=date("Y-m-d"); ?>
<?php 
          $sql = "SELECT * FROM reservation INNER JOIN member ON reservation.member_id = member.member_id
          INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id 
          WHERE reservation.reservation_id = $reservation_id ";
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $member_id = $row['member_id'];
     ?>
<div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                
                            </div>
                            <div class="content">

                                <div class="row">
                                <table class="table   text-center">
                                    <thead class="text-center">
                                        <td colspan="10"  >  
                                                                
                                        <h3>ใบจองห้องพักเฮือนกิ่งกะหร่า</h3>
                                        
                                        ที่อยู่ต.เปียงหลวง อ.เวียงแหง จ.เชียงใหม่ 50350<br>
                                        เบอร์โทรศัพท์ : 0871815055<br>
                                        อีเมล : kingkara@gmail.com

                                        </td>
                                        
                                    </thead>
                                    <thead class="text-left">
                                        <td colspan="5"  >  
                                                                
                                        <div>ชื่อ - นามสกุล :<span  class="text-dark">
                 <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>
                </span></div>
                <div>ที่อยู่ :<span  class="text-dark">
                 <?php echo $row['address']; ?> 

                 <div>อีเมล :<span  class="text-dark">
                 <?php echo $row['email']; ?> 
                </span></div>

                <div>เบอร์โทรศัพท์ :<span  class="text-dark">
                 <?php echo $row['phone']; ?> 
                </span></div>
                <br>
                <div style="font-size:20px;">รายละเอียด </div>

                                        </td>
                                        
                                    </thead>
                                    <thead >
                                    <th >รายการ</th>
                                    <th >หมายเลขห้อง</th>
                                    <th >ประเภทห้อง</th>
                                    <th >วันที่เช็คอิน</th>
                                    <th >วันที่เช็คเอ้าท์</th>
                                    <th >จำนวนคืน</th>
                                    <th >ราคา</th>
                                    </thead>
                                    <?php 
        $i=0;
        $sumprice = 0;
        $reservation_id = $row['reservation_id'];
        $sql2 = "SELECT * FROM  reservation_detail INNER JOIN rooms ON reservation_detail.rmid = rooms.rmid INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype
         WHERE reservation_detail.reservation_id = $reservation_id";
        
       $result = $conn->query($sql2);
        while($row2 = $result->fetch_array(MYSQLI_ASSOC)){
    $i++;
  
     ?>
                                        
                                    
                                        <tbody>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row2['rmid']; ?></td>
      <td><?php echo $row2['tpname']; ?></td>
      <?php $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a'); ?>
      <td><?php   echo date_format(date_create($row['bkin']), "d/m/Y"); ?></td>
      <td><?php   echo date_format(date_create($row['bkout']), "d/m/Y"); ?></td>
      <td><?php echo  $days ;?></td>
      <?php  $sum = $days * $row2['rmprice']; ?>
      <td><?php echo number_format( $sum,2); ?></td>
    </tr>
  </tbody>
  <?php $sumprice = (int)$sumprice + (int)$row2['price']; }
  
  ?>
  
  <tr>
  <th colspan="5"></th>
  <th class="text-right">ราคารมทั้งหมด:</th>
  <th><?php echo number_format( $sumprice,2); ?></th>
  </tr>
                                    <?php } ?>
   
                                </table>
                                

                                  
                                <div class="clearfix"></div>
                                </form>
                 <div class="text-center">                
<form action="adminbook_pay.php" method="POST">
      <input  type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
      <input  type="hidden" name="member_id" value="<?php echo $member_id ?>">
      <input  type="hidden" name="days" value="<?php echo $days ?>">
      <button type="submit" class="btn btn-smbtn btn-dark family">ชำระเงิน</button>
      </form>
                            </div>
                        </div>
                    </div>
     

       

<?php include("adminfooter.php"); ?>