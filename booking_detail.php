<?php session_start();
    require 'mysql/config.php';
    if (!$_SESSION['member_id']) {
            header("Location: index.php");
    } else {
      $member_id=$_SESSION['member_id'];
      $sql="SELECT * FROM member LEFT JOIN prefix ON member.prefix_id=prefix.prefix_id WHERE member.member_id='$member_id'";
      $result = $conn->query($sql);
      $reservation_id = $_POST['id'];
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
 
<br><br>

<form action="pay_insert.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >
<section class="section bg-light"  >

<div class="container">
  <div class="row">
 <!--   <div class="col-md-7 mx-auto text-center mb-5">
      <h2 class="thaifont3">ห้องพักที่เคยจองไว้</h2>
    </div>-->
    
  </div>
  
  <?php 
        $sql="SELECT * FROM reservation INNER JOIN member ON reservation.member_id = member.member_id
       
         WHERE reservation.reservation_id = $reservation_id";

        $result=$conn->query($sql);

        while($row= $result->fetch_array(MYSQLI_ASSOC)){
          $sumprice = $row['sumprice'];
        ?>
 


<div class="container">
  <div class="row">
    <div class="block-32 " data-aos="fade-up">
      

    <div class="row text-center">

    <div class="col-md-6 mb-3 mb-lg-0 col-lg-2">

              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <img  width="200" height="150" src = "img/room1.jpg">
        
              </div>
            </div>

    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
            <label for="checkin_date" class="font-weight-bold text-black family">รายละเอียดห้องที่จอง</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                
                <?php 
                $i = 0;
        $sql2="SELECT * FROM reservation_detail INNER JOIN rooms ON reservation_detail.rmid = rooms.rmid INNER JOIN roomtype ON rooms.rmtype = roomtype.rmtype WHERE reservation_detail.reservation_id = $reservation_id";
        
        $result=$conn->query($sql2);

        while($row2= $result->fetch_array(MYSQLI_ASSOC)){
          $bkin = $row2['bkin'];
          $bkout = $row2['bkout'];
          $i++
        ?>
        เบอร์ <?php echo $row2['rmid']; ?> <?php echo $row2['tpname']; ?><br>
        
        <?php } ?>
        
              </div>
            </div>

           

            <div class="col-md-6 mb-3 mb-lg-0 col-lg-1">
              <label for="checkin_date" class="font-weight-bold text-black family"> วัน/ห้อง</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
               <?php echo $row['sumdays']; ?>คืน <br>
               <?php echo $i; ?>ห้อง 
              </div>
            </div>


            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2 text-center">
              <label for="checkin_date" class="font-weight-bold text-black family"> เช็คอินวันที่</label>
              <div class="field-icon-wrap">
                <div class="icon "><span class="icon-calendar"></span></div>
               <?php echo date_format(date_create($bkin), "d/m/Y"); ?>
              </div>
            </div>

            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2 text-center">
              <label for="checkin_date" class="font-weight-bold text-black family"> เช็คเอ้าท์วันที่</label>
              <div class="field-icon-wrap">
                <div class="icon "><span class="icon-calendar"></span></div>
               <?php echo date_format(date_create($bkout), "d/m/Y"); ?>
              </div>
            </div>

            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2 text-center">
              <label for="checkin_date" class="font-weight-bold text-black family"> ยอดที่ต้องชำระ</label>
              <div class="field-icon-wrap">
<?php echo number_format($row['sumprice'],2); ?>

  </div>
  </div>
  </div>

<input name="reservation_id" type="hidden" value="<?php echo $row['reservation_id'] ; ?>">
<input name="member_id" type="hidden" value="<?php echo $member_id ; ?>">

  
<section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
            
            <div action="#" method="post" class="bg-white p-md-5 p-4 mb-12 border">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="name">เลขบัญชี ที่สำหรับโอนเงินเฮือนกิ่งกะหร่า</label>
                  <?php $i = 0;
                        $sql="SELECT * FROM bank ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){ $i++;
                        ?>
                          <div><?php echo $i; ?>) <?php echo $row['bank_name']; ?> / <?php echo $row['books_id']; ?></div>
                          
                          <?php } ?>

                </div>

                        </div>
                        </div>
                        </div>
              <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <div action="#" method="post" class="bg-white p-md-5 p-4 mb-12 border">
              <div class="row">
                <div class="col-md-12 form-group text-center">
                  <label class="text-black font-weight-bold" for="name">แจ้งชำระเงิน</label>
                </div>

                <div class="col-md-3 form-group">
                  ธนาคาร :
                </div>
                <div class="col-md-9 form-group">
                  
                <select name="bank_id" id="q" class="form-control text-center" required="required">
                  <option value="0" required="required">-------กรุณาเลือกธนาคาร---------</option>
                  <?php 
                        $sql="SELECT * FROM bank ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row['bank_id']; ?>" ><?php echo $row['bank_name']; ?> -<?php echo $row['books_id']; ?></option>
                          
                          <?php } ?>
                        </select>
                </div>

                <div class="col-md-12 form-group text-center">
                </div>

                <div class="col-md-3 form-group">
                  วันที่ชำระ / เวลา :
                </div>
                <div class="col-md-9 form-group">
                <?php $nowdate=date("Y-m-d"); ?>
                  <input class="form-control" type="datetime-local" name="pay_date" required="required"  >
 
                </div>

                <div class="col-md-12 form-group text-center">
                </div>
                
                <div class="col-md-3 form-group">
                
                  จำนวนเงิน :
                </div>
                <div class="col-md-9 form-group">
                  <input class="form-control" type="text" name="sumprice" required="required" 
                  placeholder="<?php echo number_format($sumprice,2); ?>" >
          
                </div>


                
                <div class="col-md-12 form-group text-center">
                </div>

                <div class="col-md-3 form-group">
                  สลิป :
                </div>
                <div class="col-md-9 form-group">
                <input type="file" name="image" required="required">
                <div style="font-size:12px" class="text-danger">*โหลดได้เฉพาะนามสกุล .jpg .jpeg .png .gif</div>
                <input name="id" type="hidden" value="<?php echo $row['reservation_id']; ?>">
                <button type="submit"  name="submit" class="btn btn-sm btn-outline-secondary family">ยืนยันการชำระ</button>
                
      </form>
          
                </div>

                        </div>
                        </div>
                        </div>
                        
                        <div class="container text-center">
                        <br>
                        <br>
                          <a href="books_list.php" class="btn btn-sm btn-outline-secondary family"> ย้อนหลับ</a></div>
                   <!--  tag-form -->     </div>

          </div>
         
            </div>
    
    </section>
    

     
      <?php } ?>
      </section>
    <?php }} ?>
    </div>
</div>
    
</body>
</html>





<script>
    var vurl ="books_list.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&bkstatus="+v3;
        window.location.replace(v4);
    }
</script>


<?php include("footer.php")?>