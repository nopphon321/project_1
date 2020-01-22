<?php session_start();
    require 'mysql/config.php';
    if (!$_SESSION['member_id']) {
            header("Location: index.php");
    } else {
      $member_id=$_SESSION['member_id'];
      $sql="SELECT * FROM member LEFT JOIN prefix ON member.prefix_id=prefix.prefix_id WHERE member.member_id='$member_id' ";
      $result = $conn->query($sql);
      require 'books_config.php';


      while($row = $result->fetch_array(MYSQLI_ASSOC)){
     
?>
      
  
<?php include("head/user_headerlogin.php") ; ?>
<?php 
require 'mysql/config.php';
    ?>
    <style>
      .status1 {
        color: #f1f1f1;
        background: rgb(255, 6, 6);
      }
        .status2 {
        color: #f1f1f1;
        background: rgb(248, 150, 4);
      }
      .status3 {
        color: #f1f1f1;
        background: rgb(11, 182, 68);
      }
      .status4 {
        color: #f1f1f1;
        background: rgb(11, 182, 68);
      }
      .status0 {
        color: #f1f1f1;
        background: #000000;
      }
      </style>


<nav class="navbar  navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger font-weight-bold  family" href="home.php"><img src="icon/navicon.png" width="40" height="40" alt="">เฮือนกิ่งกะหร่า</a>
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
                    <a class="nav-link js-scroll-trigger family" href="user_view_reservation.php">ประวัติการจองห้องพัก</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger family" href="logout.php">ออกจากระบบ</a>
                </li>
              
                </ul>
        </div>
    </div>
</nav>
 
<br><br>
<section class="section"  style="background-color:#ffe680"  >

<div class="container">
  <div class="row">
 <!--   <div class="col-md-7 mx-auto text-center mb-5">
      <h2 class="thaifont3">ห้องพักที่เคยจองไว้</h2>
    </div>-->
    
  </div>
  <?php 
  $i=0;
        $sql="SELECT * FROM reservation INNER JOIN member ON reservation.member_id = member.member_id
       
         WHERE reservation.member_id = $member_id   ORDER BY status DESC";

        $result=$conn->query($sql);

        while($row= $result->fetch_array(MYSQLI_ASSOC)){
          $i++ ;
        ?>
 
<section class="section"  >

<div class="container ">
  <div class="row ">
    <div class="block-32">

    <div class="row text-center  ">

            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2 ">
            <label for="checkin_date" class="font-weight-bold text-black family">วันที่จอง</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                
                <?php  echo date_format(date_create($row['bkdate']), "d/m/Y"); ?>
        
              </div>
            </div>

            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2">
              <label for="checkin_date" class="font-weight-bold text-black family"> จำนวนวัน </label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
               <?php echo $row['sumdays']; ?>
              </div>
            </div>


            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2 text-center">
              <label for="checkin_date" class="font-weight-bold text-black family"> ยอดการจอง</label>
              <div class="field-icon-wrap">
                <div class="icon "><span class="icon-calendar"></span></div>
                <?php echo number_format($row['sumprice'],2); ?>
              </div>
            </div>

            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2 text-center">
              <label for="checkin_date" class="font-weight-bold text-black family"> สถานะ</label>
              <div class="field-icon-wrap">
                <div class="icon "><span class="icon-calendar"></span></div>
               <div class="status<?php echo $row['status'];?>"> <?php echo $bookstatus[$row['status']];?></div>
              </div>
            </div>
    
<?php if($row['status']==1){?>
       
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2">
              <label for="checkin_date" class="font-weight-bold text-black family"> แจ้งชำระเงิน </label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <form action="booking_detail.php" method="POST">
                  <input name="id" type="hidden" value="<?php echo $row['reservation_id']; ?>">
                <button type="submit"  class="btn btn-sm family btn-info "><i class="far fa-bell fa-lg"></i></button>
      </form>
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2">
            <label for="checkin_date" class="font-weight-bold text-black family">ยกเลิก</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                
                <form action="cancel_book.php" method="POST">
                  <input name="reservation_id" type="hidden" value="<?php echo $row['reservation_id']; ?>">
                <button type="submit" onclick="return confirm('คุณแน่ใจแล้วใช่ไหมจะยกเลิกจองห้องพัก')" class="btn btn-sm family btn-danger"  aria-label="Delete">  <i class="fa fa-trash-o fa-lg"></i></button>
      </form>
        
              </div>
            </div>
            <?php }elseif($row['status']==2){?>

              <div class="col-md-6 mb-3 mb-lg-0 col-lg-2">
            <label for="checkin_date" class="font-weight-bold text-black family">ยกเลิก</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                
                <form action="cancel_book.php" method="POST">
                  <input name="reservation_id" type="hidden" value="<?php echo $row['reservation_id']; ?>">
                  <button type="submit" onclick="return confirm('คุณแน่ใจแล้วใช่ไหมจะยกเลิกจองห้องพัก')" class="btn btn-sm family btn-danger"  aria-label="Delete">  <i class="fa fa-trash-o fa-lg"></i></button>
      </form>
        
              </div>
            </div>
 
            <?php }elseif($row['status']==3){?>

            
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2">
            <label for="checkin_date" class="font-weight-bold text-black family">ยกเลิก</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                
                <form action="cancel_book.php" method="POST">
                  <input name="reservation_id" type="hidden" value="<?php echo $row['reservation_id']; ?>">
                  <button type="submit" onclick="return confirm('คุณแน่ใจแล้วใช่ไหมจะยกเลิกจองห้องพัก')" class="btn btn-sm family btn-danger"  aria-label="Delete">  <i class="fa fa-trash-o fa-lg"></i></button>
      </form>
        
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2">
              <label for="checkin_date" class="font-weight-bold text-black family"> พิมพ์ใบจอง </label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <form action="receipt.php" method="POST">
                  <input name="reservation_id" type="hidden" value="<?php echo $row['reservation_id']; ?>">
                <button type="submit" class="btn btn-sm btn-info family"><i class="fas fa-receipt fa-lg"></i></button>
      </form>
              </div>
            </div>

            <?php }?>

  </div>
  </div>
  </div>
</section>

  

     
      <?php } if($i=='0'){ ?>
        <section class="section"  >

<div class="container ">
  <div class="row ">
    <div class="block-32 p-5">


      <h3 class="font-weight-bold family text-center text-danger ">ไม่มีรายการใดๆ </h3>


    </div></div></div></section>

        
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