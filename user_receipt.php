

<?php 

session_start();
require 'mysql/config.php';
if (!$_SESSION['member_id']) {
        header("Location: index.php");
} else {
  $member_id=$_SESSION['member_id'];
  $sql="SELECT * FROM member LEFT JOIN prefix ON member.prefix_id=prefix.prefix_id WHERE member.member_id='$member_id'";
  $result = $conn->query($sql);
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
 
?>

<?php include("head/user_headerlogin.php") ; ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger font-weight-bold  thai-font1" href="home.php"><img src="icon/navicon.png" width="40" height="40" alt="">เฮือนก่องกะหร่า</a><span class="text-white">ยินดีต้อนรับคุณ <?php echo $row['firstname']; ?></span>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   
          Menu
          <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse thai-font1" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto ">
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="home.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="memberedit.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="books_list.php">ประวัติการจอง</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="logout.php">ออกจากระบบ</a>
                </li>
              
                </ul>
        </div>
    </div>
</nav>
  <?php } ?>
<?php
require 'mysql/config.php';
?>

<?php $nowdate=date("Y-m-d"); ?>

    <!-- END head -->
    <?php 
    $pay_id=$_GET['pay_id'];
        $sql = "SELECT * FROM pay inner join reservation on pay.reservation_id = reservation.reservation_id inner join member on reservation.member_id = member.member_id 
        inner join prefix on member.prefix_id = prefix.prefix_id 
        inner join rooms on reservation.rmid = rooms.rmid 
        inner join roomtype on rooms.rmtype = roomtype.rmtype WHERE pay_id='$pay_id'";
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    
     ?>
    <!-- END section -->
    


    <section class="section " >
      <div class="container center">
        <div class="row">
          <div class="col-md-12 center" data-aos="fade-up" data-aos-delay="100">
            
            <form action="viewpay.php" method="GET" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >
            
            <div class="row">
                <div class="col-md-6 form-group">
                  <label >
                  เฮือนก่องกะหร่า<br>
                  087-181-5055
                  ต.เปียงหลวง อ.เวียงแหง จ.เชียงใหม่ 50350<br>
                  เลขประจำตัวผู้เสียภาษี :<input type="text" style="border:none;">
                  </label>
                  
                </div>
                <div class="col-md-6 form-group text-right">
                  <label >
                  <input type="text" class="text-center" value="ใบเสร็จรับเงิน" ><br>
                  ใบเสร็จรับเงินเลขที่ : <?php echo $row['pay_id']; ?><br>
                  วันที่ออกใบเสร็จ :<?php echo date_format(date_create($nowdate), "d/m/Y");?>
                  </label>
                 
                </div>
              </div>
              <hr>
            <div class="row">
           
                <div class="col-md-3 form-group">
                  <label class="text-secondary" ><div>ห้องพักหมายเลข :<span  class="text-dark"> <?php echo $row['rmid']; ?> </span></div></label>
          
                </div>
                <div class="col-md-3 form-group ">
                  <label class="text-secondary" ><span  class="text-dark"> <?php echo $row['tpname']; ?></span></label>
                
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-secondary" >Checkin :<span  class="text-black text-black-50">  <?php  echo date_format(date_create($row['bkin']), "d/m/Y"); ?></span></label>
                 
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-secondary" >Checkout : <span  class="text-black text-black-50"> <?php   echo date_format(date_create($row['bkout']), "d/m/Y"); ?></span></label>
                
                </div>
               
        </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label class="text-black text-black-50" ><?php echo $row['prefix_name']; ?>
                  <input class="text-right" type="text" value="<?php echo $row['firstname']; ?>" style="border:none;"> 
                 </label>

                </div>
                <div class="col-md-4 form-group ">
                <label class="text-black text-black-50" >
                  
                  <input type="text" value="<?php echo $row['lastname']; ?>" style="border:none;"></label>
                </div>
              </div>
              <div class="row">
              <div class="col-md-8 form-group">
                  <label  >ที่อยู่ :
              
                 <span> <input type="text" size="70"   placeholder="คลิกกรอกข้อมูล"  style="border:none;"></span></label>
                  </div>
                <div class="col-md-4 form-group ">
                
                </div>
              </div>
<hr>
              <div class="row text-center">            
              <div class="col-md-3 form-group">
                  <label class="" for="lastname">รายการ</label>
                  
                </div>  
                <div class="col-md-3 form-group">
                  <label class="" for="lastname">ราคาต่อหน่วย</label>
                  
                </div>
                <div class="col-md-3 form-group">
                  <label class="" for="lastname">จำนวนหน่วย / วัน</label>
                  
                </div>
                <div class="col-md-3 form-group">
                  <label class="" for="lastname">จำนวนเงิน(บาท)</label>
                  
                </div>
              </div>

<div class="row text-center">            
              <div class="col-md-3 form-group">
                  <label  class="text-black text-black-50" for="lastname"><?php echo $row['tpname']; ?></label>
                  
                </div>  
                <div class="col-md-3 form-group">
                  <label class="text-black text-black-50" for="lastname"><?php echo $row['rmprice']; ?></label>
                  <?php 
$days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a'); 
                  ?>
                </div>
                <div class="col-md-3 form-group">
                  <label  class="text-black text-black-50" for="lastname"><?php echo $days; ?></label>
                  
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black text-black-50" for="lastname"><?php echo number_format( $row['sumprice'],0); ?></label>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-9 form-group text-right">
                  <label class="text-black text-black-50">Total</label>
                 
                </div>
                <div class="col-md-3 form-group text-center">
                  <label  class="text-black text-black-50"><?php echo number_format( $row['sumprice'],0); ?></label>
                 
                </div>
              </div>  
           
            <div class="row">
           
         
             </div>
                </div>
             
              </div>
              </div>
         
          </div>
        </div>
      </div>
            </form>

          </div>
          
    </section>
    
                        <?php } ?>
                        

                        <?php include("footer.php")?><?php } ?>