<?php session_start();
    require 'mysql/config.php';
    if (!$_SESSION['member_id']) {
            header("Location: index.php");
    } else {
      ini_set('display_errors', 1);
      error_reporting(~0);
      $member_id=$_SESSION['member_id'];
      $sql = "SELECT * FROM member WHERE member_id = '".$member_id."' ";
      $result = $conn->query($sql);
      while($row = $result->fetch_array(MYSQLI_ASSOC)){
        
?>
      

<?php include("head/user_headerlogin.php") ; ?>

<nav class="navbar  navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger font-weight-bold  thai-font1" href="home.php"><img src="icon/navicon.png" width="40" height="40" alt="">เฮือนกิ่งกะหร่า</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   เมนู

          </button>
          <div class="collapse navbar-collapse thai-font1 " id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto ">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="home.php">หน้าหลัก</a>
                </li>

                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="books_list.php">แจ้งชำระเงิน</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="user_view_reservation.php">ประวัติการจองห้องพัก</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="logout.php">ออกจากระบบ</a>
                </li>
              
                </ul>
        </div>
    </div>
</nav>


 
   
    <section class="section  contact-section" style="background-color:#ffe680" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="membersave.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-5 form-group">
                <input type="hidden" name="member_id"  value="<?php echo $row['member_id']; ?>" class="form-control ">
                  <label class="text-black font-weight-bold" >ชื่อ</label>
                  <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"  class="form-control" required="required">
                </div>
                <div class="col-md-5 form-group">
                  <label class="text-black font-weight-bold" for="lastname">นามสกุล</label>
                  <input type="text" name="lastname"  value="<?php echo $row['lastname']; ?>" class="form-control" required="required">
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="username">Username</label>
                  <input type="text" name="username"  value="<?php echo $row['username']; ?>" class="form-control" required="required">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="password">Password</label>
                  <input  name="password"  value="<?php echo $row['password']; ?>" class="form-control" required="required">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="phone">phone</label>
                  <input type="phone" name="phone"  value="<?php echo $row['phone']; ?>" class="form-control" required="required">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email" name="email"  value="<?php echo $row['email']; ?>" class="form-control ">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" >Address</label>
                  <textarea cols="20" rows="4" name="address" class="form-control text-center" required="required">
                  <?php echo $row['address'] ; ?>
                  </textarea>
                </div>
              </div>

              <div class="row text-center">
                <div class="col-md-6 form-group ">
                  <input type="submit" name="submit" value="ยืนยันการแก้ไข" class="btn btn-primary text-white py-3 px-5">
                </div>
              </div>
              </div>
        
        </div>
      </div>
            </form>

          </div>
          
    </section>
<?php
mysqli_close($conn);
?>
<?php }} ?>
<?php include("footer.php"); ?>
