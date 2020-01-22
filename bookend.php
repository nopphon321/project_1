<?php session_start();
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
<?php 
require 'mysql/config.php';
    ?>


<nav class="navbar  navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger font-weight-bold  family" href="home.php"><img src="icon/navicon.png" width="40" height="40" alt="">เฮือนก่องกะหร่า</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   
          Menu
          <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse  " style="font-size:13px;" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto ">
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="home.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="memberedit.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="logout.php">ออกจากระบบ</a>
                </li>
              
                </ul>
        </div>
    </div>
</nav>
 <br><br><br>
<section class="section contact-section" style="background-color:#ffe680" id="next">
      <div class="container" >
        <div class="row">
          <div class="col-md-7"  data-aos="fade-up" data-aos-delay="100">
            
            <div class=" p-md-5 p-4 mb-5 border bg-light">
              <div class="row text-center">
                <div class="col-md-12 form-group" style="background-color:#FFC04D; "><br>
				  <label class="font-weight-bold pb-3"  style="color:#ffffff; font-size:25px;">จองห้องพักสำเสร็จ<br></label>
				  
              </div></div>
			  <div class="row">
                <div class="col-md-12 form-group text-center">
                  <label class="text-black font-weight-bold" for="checkin_date">1.กรุณาชำระเงินก่อน</label>
				 <div> หลังจากการจองสำเร็จ 5 วัน </div>
			
				</div> <div class="row">
                <div class="col-md-12 form-group text-center">
                  <label class="text-black font-weight-bold" for="checkin_date">2.เลขบัญชีธนาคาร เฮือนกิ่งกะหร่า</label>
                  <?php 
                  $i=0;
                        $sql="SELECT * FROM bank ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                          $i++;
                        ?>
                      <div ><?php echo $i;?> ) <?php echo $row['bank_name'] ;?> - <?php echo $row['books_id'] ; ?></div>
                        <?php }?>
			
				</div>
				

			  <div class="row">
                <div class="col-md-12 form-group text-center">

            
            				</div>
                  

				</div>

                <div class="col-md-12 form-group text-center" >
                  <label class="text-black font-weight-bold" for="checkout_date">3.ชำระเงินเรียบร้อย ?</label>
                  <div>เมื่อเรายืนยันการชำรเงินของคุณแล้ว สถานะะการจองของคุณจะเปลียนเป็น "อนุมัติ"</div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12  ">
                  <label  class="font-weight-bold text-black"><div class="text-center">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;   
                  <a class="btn btn-primary text-white py-3 px-5" href="books_list.php"> แจ้งชำระเงิน </a></div></label>
               
                </div>
              </div>

              

	  </div>
	  </div>
          </div>
          <div class="col-md-5"  data-aos="fade-up" data-aos-delay="200">
            <div class="row  p-md-5 p-4 mb-5 border  bg-light"   >
              <div class="col-md-10 ml-auto contact-info">
				<div class="family p-md-10 p-10 mb-5 pt-2 pb-2 border text-center bg-danger text-white" >นโยบายการจองห้องพัก </div>
        <div class="font-weight-bold"> 1 .  หลังจากการจองสำเร็จ ดำเนินการชำระเงินภายใน 5 วัน เพื่อยืนยันการจองห้อพัก</div>
        <br>
				<div class="font-weight-bold">2 . การยกเลิกการจองห้องพัก หลังชำระเงินแล้วไม่สามารถขอคืนเงินได้ไม่ว่ากรณีใดๆ
 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

     
    
      </section>
    <?php }} ?>
    </div>
</div>
    
</body>
</html>


<?php include("footer.php") ; ?>


