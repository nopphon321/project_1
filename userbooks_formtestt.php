<?php include("head/user_header.php"); ?>
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
$firsname=(isset($_GET['firsname']))?$_GET['firsname']: "";
$q=(int)(isset($_GET['q']))?$_GET['q']: 0;
$days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');
if($days<1){
    echo "<script>window.location.replace('userbooks_range.php');</script>";
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




<section class="section bg-light"  >

  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto text-center mb-5">
        <h2 class="thaifont3">ค้นหาห้องว่าง</h2>
      </div>
      
    </div>
    <div class="row">
      <div class="block-32">

        <form action="userbooks_form.php" method="GET">
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
                  <label for="children" class="font-weight-bold text-black thaifont">
                  <a href="userbooks_list.php">รายการจองห้องพัก</a></label>
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
        <br>
  

<form action="userbooks_insert.php" method="POST">
        <input type="hidden" name="bkout" value="<?php echo $bkout;?>" />
        <input type="hidden" name="bkin" value="<?php echo $bkin;?>" />
        <input type="hidden" name="id" value="<?php echo $_SESSION['userid']; ?>" />
        <input type="hidden" name="firsname" value="<?php echo $_SESSION['user']; ?>" />  

 



<?php 
        $sql="SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype " 
            . "WHERE rmid NOT IN (SELECT rmid FROM books WHERE bkstatus > 0 "
            . "AND ((bkin >= '$bkin' AND bkin <'$bkout') OR (bkin < '$bkin' AND bkout > '$bkin')))".$kw;
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
<div class="container">
        <div class="site-block-half d-flex bg-white" data-aos="fade-up" data-aos-delay="100">
          <a  class="image d-block bg-image" style="background-image: url('img/hotel.jpg');"></a>
          <div class="text">
            <span class="d-block"><span class="display-4 text-primary">
            <div><input type="hidden" name="rmid" value="<?php echo $row['rmid']; ?>" /></div>
            $<?php echo number_format($row['rmprice'],0);?></span>
 
            <h2><?php echo $row['tpname']; ?></h2>
            <p class="lead">
            
            <div class="thaifont2b">- ฟรี wifi</div>
            <div class="thaifont2b">- พัดลมหนึ่งตัว</div>
            <div class="thaifont2b">- เครื่องทำน้ำอุ่น</div>
            <div class="thaifont2b">- ห้องน้ำในตัว</div>
            <div class="thaifont2b">- เสริมเตียงเพิ่ม 200บ.</div>
            <div class="thaifont2r">- ว่าง</div>
            </p>
            <p><button type="submit" class="btn btn-primary text-white"  >จอง</button></p>
          </div>
        </div>
        
        </form>
        <?php } ?>
        <?php } ?>
        </section>
    <script>
        document.getElementByID('q').value="<?php echo $q;?>";
    </script>
       
    
        <?php include("footer.php"); ?>