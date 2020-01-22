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
          <a class="navbar-brand js-scroll-trigger font-weight-bold  thai-font1" href="home.php"><img src="icon/logoaquarium.png" width="40" height="40" alt="">เฮือนก่องกะหร่า</a><span class="text-white">ยินดีต้อนรับคุณ <?php echo $row['firstname']; ?></span>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   

          </button>
          <div class="collapse navbar-collapse thai-font1" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto ">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="memberedit.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="books_list.php">ชำระเงินค่าห้องพัก</a>
                    </li>

              
                </ul>
        </div>
    </div>
</nav>
  <?php } ?>

    
     <?php 
     require 'mysql/config.php';
     $pay_id = $_POST['pay_id'];
        $sql = "SELECT * FROM `pay` INNER JOIN reservation ON pay.reservation_id=reservation.reservation_id    INNER JOIN member on reservation.member_id=member.member_id  
        INNER JOIN prefix ON member.prefix_id = prefix.prefix_id  
        INNER JOIN rooms ON reservation.rmid = rooms.rmid 
        INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype
        INNER JOIN bank ON pay.bank_id = bank.bank_id

       WHERE pay.pay_id= $pay_id";    
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    
     ?>

<section class="site-hero inner-page overlay" style="background-image: url(img/hotel.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="thai-font6">การชำระเงิน</h1>

          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->
    
   
    <section class="section  contact-section" >
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
          <form action="userpay_update.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >
            <input type="hidden" name="pay_id" value=" <?php echo $row['pay_id'];?>" readonly class="form-control">
            
              <div class="row">             
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="firsname">ชื่อ-นามสกุล</label>
                  <div> <?php echo $row['prefix_name'];?> <?php echo $row['firstname'];?></diV>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname"> &nbsp;</label>
                  <div><?php echo $row['lastname'];?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">เบอร์โทร</label>
                  <div><?php echo $row['phone'];?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">อีเมล์</label>
                  <div><?php echo $row['email'];?></div>
                </div>
              </div>

              <div class="row">             
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="firsname">เช็คอิน</label>
  
                  <div> <?php echo date_format(date_create($row['bkin']), "d/m/Y");?></diV>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname"> &nbsp;</label>
                  <div></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">เช็คเอ้าท์</label>
                  <div><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">&nbsp;</label>
                  <div>&nbsp;</div>
                </div>
              </div>
              <div class="row">             
                <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold" for="firsname">จำนวนคืน</label>
                  <?php  
            $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
             ?>

                  <div>  <?php echo $days;?> คืน</diV>
                </div>
                <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold" for="lastname"> ประเภทห้อง</label>
                  <div><?php echo $row['tpname'];?></div>
                </div>
                <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold" for="lastname">จำนวนเงิน</label>
                  <div>
                  <input type="hidden" name="sumprice" value=" <?php echo $row['sumprice'];?>" readonly class="form-control">
            
                  <?php echo number_format($row['sumprice']);?>
                  </div>
                </div>
                
              </div>
            
           
              <div class="row text-center">
                <div class="col-md-6 form-group">
                  
                </div>
              </div>
              </div>
          <div class="col-md-5 " data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
              
              <label class="text-black font-weight-bold" for="lastname">ชำระเงินผ่าน :<span class="text-uppercase"><?php echo $row['bank_name']; ?></span> 
               
               <img src="myfile/<?php echo $row['image'];?>" class="img-thumbnail" width="300" height="500">
            </div>
          </div>
        </div>
      </div>
            </form>
          
          </div>
          
    </section>



                        <?php } ?>

<?php include("footer.php")?>
<?php } ?>