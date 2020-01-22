<?php include("head/user_header.php") ; ?>

<?php 
require 'mysql/config.php';
    ?>


<section class="site-hero overlay" style="background-image: url(img/hotel.jpg" data-stellar-background-ratio="0.5" id="page-top">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="  family" style="color:#ffffff; font-size:80px;" >ห้องพักเฮือนกิ่งกะหร่า<br>ยินดีต้อนรับ<br></h1>

          </div>

        </div>
      </div>


    </section>
<?php $nowdate=date("Y-m-d"); ?>


<section class="section bg-light" id="booking" >
  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto text-center mb-5">
        <h2 style="color: rgb(0, 0, 0);" class="font-weight-bold text-black family">ค้นหาห้องว่าง</h2>
      </div>
    </div>
    <div class="row">
      <div class="block-32">

      <form action="books_form.php" method="GET">
          <div class="row">
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkin_date" style="color: rgb(0, 0, 0);" class="font-weight-bold text-black family">วันที่เช็คอิน</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input   type="date" name="bkin"  min=<?php echo $nowdate ;?> value="<?php echo $nowdate; ?>" required class="form-control">
              </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
              <label for="checkout_date" style="color: rgb(0, 0, 0);" class="font-weight-bold text-black family">วันที่เช็นเอาท์</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="date" name="bkout" min=<?php echo $nowdate ;?> value="<?php echo $nowdate; ?>" required class="form-control">
              </div>
            </div>
                   
                    
            <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="adults" style="color: rgb(0, 0, 0);" class="font-weight-bold text-black family">รูปแบบห้องพัก</label>
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
                  </label>
                  <div class="field-icon-wrap">
                          
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 align-self-end">
              <button type="submit"  style="color: rgb(0, 0, 0);" class="btn btn-primary btn-block text-white  family">ค้นหาห้องพัก</button>
        
            </div>
          </div>          
        </form>  
      </div>


    </div>
  </div>
</section>

 
</div>
</section>

<!-- test-->

<section class="section" id="rooms" >
<div class="container">
<?php 
                        $sql="SELECT * FROM roomtype ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
  <div class="row align-items-center">
    <div class="col-md-12 col-lg-7 ml-auto order-lg-2" data-aos="fade-up">
      <img src="roomtype/<?php echo $row['rm_image'];?>" alt="Image" class="img-fluid">
    </div>
    <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
    <span class="d-block text-right"><span class="display-4 text-primary family "><?php echo $row['rmprice'];?> </span>THB / คือ </span>
      <h2  class="family text-right" style="font-size:30px;"><?php echo $row['tpname'];?></h2>
      <p class="lead">

      <div class="family " style="font-size:20px; color:#000000;">
      สิ่งอำนวยความสะดวก (ในห้องพัก)<br>
      <span class="text-right"><?php echo $row['rm_detail'];?></span></div>
      
      
      <div class="center"> <button type="button" class="btn btn-primary family " data-toggle="modal"  
                  data-target="#room<?php echo $row['rmtype'];?>">ดูห้องพัก </button> </div>
      </p>
                  
    </div>
    
  </div>
                        <?php } ?>
</div>
</section>


<!-- test eng -->


<section class="section" id="food" >
<div class="container">
  <div class="row align-items-center">
    <div class="col-md-12 col-lg-7 ml-auto order-lg-2" data-aos="fade-up">
      <img src="img/1.jpg" alt="Image" class="img-fluid">
    </div>
    <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
      <h2 class="family">มีอาหาร<em>และ </em>เครื่องดื่ม บริการ</h2>
      <p class="lead family">ร้านอาหารของเราเปิดบริการ <em> 6:00-21:00 และยังมีบริการดนตรีสดทุกวันตั้งแต่เวลา 20:00-21:00 </p>
      
      <p>      <div class="center"> <button type="button" class="btn btn-primary family" data-toggle="modal"  
                  data-target="#foot">ดุร้านอาหาร</button> </div>  
    </div>
    
  </div>
</div>
</section>

<section id="image" > 
                    <div class="col-lg-12 text-center" >
                            <h2 class="section-heading text-uppercase family">อัลบั้มรูปภาพ</h2>
                            <h3 class="section-subheading text-muted family">รวมรูปบริเวณเฮือนกิ่งกะหร่า</h3>
                          </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="m-p-g">
                                    <div class="m-p-g__thumbs" data-google-image-layout data-max-height="200">
            
                                    <?php 
                        $sql2="SELECT * FROM web_image";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
      <img src="img/<?php echo $row2['w_image']; ?>" data-full="img/<?php echo $row2['w_image']; ?>" class="m-p-g__thumbs-img" />
                        <?php  } ?>
                                    </div>
                                
                                    <div class="m-p-g__fullscreen"></div>
                                </div>
                                
                    </div>
                </div>
            
            </section>
 

       <!-- Modal rooms1 ห้องพัดลมเตียงคู่ -->
       <div class="modal bd-example-modal-xl" id="room3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title family" id="exampleModalLabel">รูปภาพห้องพัก ห้องพัดลมเตียงคู่</5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 3";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

         <!-- Modal rooms1 ห้องพัดลมเตียงเดียว  -->
         <div class="modal bd-example-modal-xl" id="room2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title family" id="exampleModalLabel">รูปภาพห้องพัก ห้องพัดลมเตียงเดียว</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              
              
                  
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 2";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>


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

         <!-- Modal rooms1 ห้องแอร์เตียงเดี่ยว -->
         <div class="modal bd-example-modal-xl" id="room1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title family" id="exampleModalLabel">รูปภาพห้องพัก ห้องแอร์เตียงเดี่ยว</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 1";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal bd-example-modal-xl" id="room4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 4";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<div class="modal bd-example-modal-xl" id="room5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 5";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<div class="modal bd-example-modal-xl" id="room6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 6";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<div class="modal bd-example-modal-xl" id="room7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 7";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<div class="modal bd-example-modal-xl" id="room8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 8";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<div class="modal bd-example-modal-xl" id="room9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 9";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<div class="modal bd-example-modal-xl" id="room10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           
           
           
           
              
            
<?php 
                        $sql2="SELECT * FROM gallery  WHERE rmtype = 10";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['src_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             


            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer family">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

         <!-- Modal -->
         <div class="modal bd-example-modal-xl" id="foot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title family" id="exampleModalLabel">ร้านอาหารและ เครื่องดื่ม</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            
            
               
<?php 
                        $sql2="SELECT * FROM web_image  WHERE web_header_id = 2";
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        ?>
            
            <div class="slider-item">
                <img src="img/<?php echo $row2['w_image'] ;?>" alt="Image placeholder" class="img-fluid">
              </div>
                        <?php } ?>
             

        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary family" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

</div>

<?php include("footer.php") ; ?>


                        