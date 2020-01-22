<?php include("head/user_headerforform.php"); ?>


<?php
require 'mysql/config.php';
$bkin=(isset($_GET['bkin']))?$_GET['bkin']: date("Y-m-d");
$bkout=(isset($_GET['bkout']))?$_GET['bkout']: date("Y-m-d");
$q=(int)(isset($_GET['q']))?$_GET['q']: 0;
$days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');

if($days<=0)
{
  echo "<script language=\"JavaScript\">";
  echo "alert('กรุณาเลือกวันให้ถูกต้อง');";
  echo "location='books_list.php' ";
  echo "</script>";

}else{



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
$nowdate = date("Y-m-d");
?>




<section class="section bg-light"  >

  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto text-center mb-5">
        <h2 class="family">ค้นหาห้องว่าง </h2>
      </div>
      
    </div>
    <div class="row">
      <div class="block-32">

        <form action="books_form.php" method="GET">
          <div class="row">
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkin_date" class="font-weight-bold text-black family">วันที่เช็คอิน</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input  type="date" min=<?php echo $nowdate ;?>  name="bkin" value="<?php echo $bkin; ?>"  class="form-control">
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkout_date" class="font-weight-bold text-black family">วันที่เช็นเอาท์</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="date"  min=<?php echo $nowdate ;?>  name="bkout" value="<?php echo $bkout; ?>" class="form-control">
              </div>
            </div>
                   
                    
            <div class="col-md-6 mb-3 mb-md-0 col-lg-4">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="adults" class="font-weight-bold text-black family">รูปแบบห้องพัก</label>
                  <div class="field-icon-wrap family">
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
                <div class="col-md-6 col-lg-6 align-self-end">
              <button type="submit" class="btn btn-primary btn-block text-white family">ค้นหาห้องพัก</button>
        
            </div>
              </div>
            </div>
           
          </div>          
        </form>  
        <br>
        
        <div class="album py-5 bg-light">
    <div class="container">
 
              <br>
      <div class="row">
      <?php 
      
      $sql="SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype " 
      . "WHERE rmid NOT IN (SELECT rmid FROM reservation_detail "
      . "WHERE ((bkin >= '$bkin' AND bkin <'$bkout') OR (bkin < '$bkin' AND bkout > '$bkin')))".$kw;
  $result = $conn->query($sql);
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?> 

        <div class="col-md-4">
        <form action="booking.php" method="GET">
          <div class="card mb-4 shadow-sm">
          <img src="roomtype/<?php echo $row['rm_image']; ?>" class="img-thumbnail">
            <div class="card-body">
              <p class="card-text ">
              <div   class="font-weight-bold text-warning text-right family" style="font-size:28px">&nbsp;<?php echo number_format($row['rmprice'],0);?><span style="font-size:15px" class="text-warning text-body"> THB &nbsp;/คืน</span> </div>
              <div style="font-size:18px" class="text-right family"><?php echo $row['tpname']; ?></div>
              <div style="font-size:15px" class="text-right family"><?php echo $row['detail']; ?></div>
              <div   class="font-weight-bold family">  <div   class="font-weight-bold family"><?php echo $row['rm_detail']; ?> </div>
 </div>
           
            <input type="hidden" name="rmid" value="<?php echo $row['rmid']; ?>" readonly class="form-control">
            <input type="hidden" name="tpname" value="<?php echo $row['tpname']; ?>" readonly class="form-control">
            <input type="hidden" name="rmtype" value="<?php echo $row['rmtype']; ?>" readonly class="form-control">
            <input type="hidden" name="rmprice" value="<?php echo $row['rmprice']; ?>" readonly class="form-control">
            <input type="hidden" name="bkin" value="<?php echo $_GET['bkin']; ?>" readonly class="form-control">
            <input type="hidden" name="bkout" value="<?php echo $_GET['bkout']; ?>" readonly class="form-control">
           

              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
               
                  <button type="submit" class="btn btn-sm btn-outline-secondary">จอง</button> 
                  <button type="button" class="btn btn-primary" data-toggle="modal"  
                  data-target="#room<?php echo $row['rmtype']; ?>"> ดูห้องพัก </button>
                  

                </div>

              </div>
            </div>
          </div>
        </div>
        </form>
        <?php } ?>
       <!-- จบ -->
      </div>
    </div>
  </div>

        </section>

 
    <script>
        document.getElementByID('q').value="<?php echo $q;?>";
    </script>
       
         <!-- Modal -->
<div class="modal bd-example-modal-xl" id="room1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title family" id="exampleModalLabel">รูปภาพห้องพัก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="slider-item">
                <img src="img/room1.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room1-1.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room1-2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room1-3.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room1-4.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room1-5.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomitem.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet3.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet4.jpg" alt="Image placeholder" class="img-fluid">
              </div>
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary family" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- ห้องพัดลมเตียงเดี่ยว -->
<div class="modal fade bd-example-modal-xl" id="room2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title family" id="exampleModalLabel">รูปภาพห้องพัก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="slider-item">
                <img src="img/room2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room2-1.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room2-2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room1-4.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroom.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroom2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/slider-7.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomitem.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet3.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet4.jpg" alt="Image placeholder" class="img-fluid">
              </div>
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary family" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- ห้องพัดลมเตียงคู่ -->
<div class="modal fade bd-example-modal-xl" id="room3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title family" id="exampleModalLabel">รูปภาพห้องพัก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="slider-item">
                <img src="img/room3.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room3-1.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/room3-2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              
              <div class="slider-item">
                <img src="img/allroomitem.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet2.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet3.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="img/allroomtoilet4.jpg" alt="Image placeholder" class="img-fluid">
              </div>
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary family" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
  <?php }?>
        <?php include("footer.php"); ?>

