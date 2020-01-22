<style type="text/css">
@media print{
#no_print{display:none;}
}
</style>
<?php



require 'mysql/config.php';
?>
<?php include("head/user_headerlogin.php") ; ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger font-weight-bold  family" href="home.php"><img src="icon/navicon.png" width="40" height="40" alt="">เฮือนกิ่งกะหร่า</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>

          </button>
          <div class="collapse navbar-collapse thai-font1"  id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto ">
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="home.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="memberedit.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="books_list.php">แจ้งชำระเงิน</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="logout.php">ออกจากระบบ</a>
                </li>
              
                </ul>
        </div>
    </div>
</nav>

<?php $nowdate=date("Y-m-d"); ?>

    <!-- END head -->
    <?php 
    $reservation_id = $_POST['reservation_id'];
          $sql = "SELECT * FROM reservation INNER JOIN member ON reservation.member_id = member.member_id
          INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id 
          WHERE reservation.reservation_id = $reservation_id ";
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    
     ?>
    <!-- END section -->
    


    <section class="section " >
      <div class="container table-responsive-sm ">
        <div class="row bg-white p-md-5 p-4 mb-5 border table-responsive-xl">
          <div class="col-md-12 center" data-aos="fade-up" data-aos-delay="100">
            
           
            <div class="row text-center">
                <div class="col-md-12 form-group">
                  <label >
                 <div>ใบจองห้องพักเฮือนกิ่งกะหร่า</div>
                  
                  ที่อยู่ต.เปียงหลวง อ.เวียงแหง จ.เชียงใหม่ 50350<br>
                 เบอร์โทรศัพท์ : 0871815055<br>
                 อีเมล : kingkara@gmail.com

                  </label>
                  
                </div>
                
              <hr>
            <div class="row text-left">        
                <div class="col-md-12 form-group">
                  <label class="text-secondary" ><div>ชื่อ - นามสกุล :<span  class="text-dark">
                 <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>
                </span></div>
                <div>ที่อยู่ :<span  class="text-dark">
                 <?php //echo $row['location']; ?> 

                 <div>อีเมล :<span  class="text-dark">
                 <?php echo $row['email']; ?> 
                </span></div>

                <div>เบอร์โทรศัพท์ :<span  class="text-dark">
                 <?php echo $row['phone']; ?> 
                </span></div>
                <br>
                <div style="font-size:20px;">รายละเอียด </div>
                </label>
                </div>
               

              <div class="row">
                <div class="col-md-12 form-group ">
  <table class="table  ">
  <thead>
    <tr>
      <th scope="col">รายการ</th>
      <th scope="col">หมายเลขห้อง</th>
      <th scope="col">ประเภทห้อง</th>
      <th scope="col">วันที่เช็คอิน</th>
      <th scope="col">วันที่เช็คเอ้าท์</th>
      <th scope="col">จำนวนคืน</th>
      <th scope="col">ราคา</th>
    </tr>
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
</table>
</div>

<div class="col-md-12 center" data-aos="fade-up" data-aos-delay="100">            
<div class="row text-center">
                <div class="col-md-12 form-group">
                  <label >
                 <div></div>
                  

                  <a href="books_list.php" id="no_print"   class="btn btn-info btn-fill pull-center">ย้อนกลับ</a>
                  </label>
                  
                
</section>


  

    
                        <?php } ?>
                        

                      <div id="no_print">  <?php include("footer.php")?></div>



                      