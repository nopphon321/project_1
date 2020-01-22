<?php include("head/admin_headrt.php"); ?>
<?php 

    session_start();

    if (!$_SESSION['userid']) {
            header("Location: index.php");
    } else {
?>

<?php
require 'mysql/config.php';
$bkin=(isset($_GET['bkin']))?$_GET['bkin']: date("Y-m-d");
$bkout=(isset($_GET['bkout']))?$_GET['bkout']: date("Y-m-d");
$bkcust=(isset($_GET['bkcust']))?$_GET['bkcust']: "";
$bktel=(isset($_GET['bktel']))?$_GET['bktel']: "";
$q=(int)(isset($_GET['q']))?$_GET['q']: 0;
$days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');
if($days<1){
    echo "<script>window.location.replace('books_range.php');</script>";
    exit();
}

if(isset($_GET['rmid'])){
    $rmid=$_GET['rmid'];
    $bkstatus=0;
    require 'books_status.php';
}
if($q>0){
    $kw=" AND roomtype.rmtype='$q'";
}else{
    $kw="";
}
?>
<section class="site-hero overlay" style="background-image: url(img/hero_2.jpg" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="thaifont7">ห้องพักโยกไปมา<br>ยินดีต้อนรับ</h1>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>

<section class="section bg-light"  >

  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto text-center mb-5">
        <h2 class="thaifont3">ค้นหาห้องว่าง</h2>
      </div>
      
    </div>
    <div class="row">
      <div class="block-32">

        <form action="books_form.php" method="GET">
          <div class="row">
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkin_date" class="font-weight-bold text-black thaifont">วันที่เช็คอิน</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input  type="text" name="bkin" value="<?php echo $bkin; ?>" readonly class="form-control">
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkout_date" class="font-weight-bold text-black thaifont">วันที่เช็นเอาท์</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="text" name="bkout" value="<?php echo $bkout; ?>" readonly class="form-control">
              </div>
            </div>
                    <input type="hidden" name="bkcust" value="<?php echo $bkcust;?>" />
                    <input type="hidden" name="bktel" value="<?php echo $bktel;?>" />
                    
            <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="adults" class="font-weight-bold text-black thaifont">รูปแบบห้องพัก</label>
                  <div class="field-icon-wrap">
                  <select name="q" id="q" class="form-control">
                  <option value="0">ทั้งหมด</option>
                  <?php 
                        $sql="SELECT * FROM roomtype ORDER BY rmtype ASC";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row['rmtype']; ?>"><?php echo $row['tpname']; ?></option>
                          
                          <?php } ?>
                        </select>

                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="children" class="font-weight-bold text-black thaifont"><a href="books_list.php">รายการจองห้องพัก</a></label>
                  <div class="field-icon-wrap">
                          
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 align-self-end">
              <button type="submit" class="btn btn-primary btn-block text-white thaifont">ค้นหาห้องพัก</button>
        
            </div>
          </div>          
        </form>  
        
  
        <?php require 'books_room.php'; ?><br />
<form action="books_insert.php" method="POST">

        <input type="hidden" name="bkin" value="<?php echo $bkin;?>" />
        <input type="hidden" name="bkout" value="<?php echo $bkout;?>" />
        <label>ชื่อผู้จอง</label>
        <input type="text" name="bkcust" value="<?php echo $bkcust;?>"  /> <br />
        <label>โทรศัพท์</label>
        <input type="text" name="bktel" value="<?php echo $bktel;?>"  /> <br />
        <label>เลือกห้อง</label><br />

<?php 
        $sql="SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype " 
            . "WHERE rmid NOT IN (SELECT rmid FROM books WHERE bkstatus > 0 "
            . "AND ((bkin >= '$bkin' AND bkin <'$bkout') OR (bkin < '$bkin' AND bkout > '$bkin')))".$kw;
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
<div class="container">
        <div class="site-block-half d-flex bg-white" data-aos="fade-up" data-aos-delay="100">
          <a  class="image d-block bg-image" style="background-image: url('img/img_1.jpg');"></a>
          <div class="text">
            <span class="d-block"><span class="display-4 text-primary">
            <div><input type="hidden" name="rmid" value="<?php echo $row['rmid']; ?>" /></div>
            $<?php echo number_format($row['rmprice'],0);?></span>
            ห้อง <?php echo $row['rmid']; ?> </span>
            <h2><?php echo $row['tpname']; ?></h2>
            <p class="lead">
            
            <div>- ฟรี wifi</div>
            <div>- พัดลมหนึ่งตัว</div>
            <div>- เครื่องทำน้ำอุ่น</div>
            <div>- ห้องน้ำในตัว</div>
            <div>- เสริมเตียงเพิ่ม 200บ.</div>
            </p>
            <p><button type="submit" class="btn btn-primary text-white"  >ดูห้อง</button></p>
          </div>
        </div>
        
        </form>
        <?php } ?>
        <?php } ?>

         <a href="books_list.php">ย้อนกลับ</a> 
    <script>
        document.getElementByID('q').value="<?php echo $q;?>";
    </script>
       
    
        <?php include("footer.php"); ?>