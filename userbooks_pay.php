<?php
session_start();
require 'mysql/config.php';
$url = $_SERVER['REQUEST_URI'];
$bkin=(isset($_GET['bkin']))?$_GET['bkin']: date("Y-m-d");
$bkout=(isset($_GET['bkout']))?$_GET['bkout']: date("Y-m-d");
$days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');
$rmprice=$_GET['rmprice'];
$rmtype=$_GET['rmtype'];
$tpname=$_GET['tpname'];
$rmid=$_GET['rmid'];
$email=$_GET['email'];
$phone=$_GET['phone'];
?>
<?php include("head/user_headerforform.php")?>
<?php $nowdate=date("Y-m-d"); ?>





    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(img/hotel.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="thai-font6">กรอกข้อมูลการชำระเงิน</h1>

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
            
            <form action="pay_insert.php" method="post" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="firsname">ชื่อ</label>
                  <input type="text" name="firsname"  value=" <?php echo $_GET['firsname']; ?>" class="form-control" required="required" readonly>
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="lastname">นามสกุล</label>
                  <input type="text" name="lastname"  value=" <?php echo $_GET['lastname']; ?>"  class="form-control" required="required" readonly>
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="phone">เบอร์โทร</label>
                  <input type="phone"  value=" <?php echo $_GET['phone']; ?>" class="form-control" required="required" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email" value=" <?php echo $_GET['email']; ?>" class="form-control " readonly>
                </div>
              </div>
                      
            <input type="hidden" name="priceroom" value=" <?php echo $rmprice; ?>" readonly class="form-control">
            <div class="row">
            <?php  
            $days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');
            $sumprice=$days *(int)$rmprice; ?>
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="price">ราคาห้องพัก :&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 35px" class="text-danger text-center"><?php echo  number_format( $sumprice,0);?></span></label>
                  <input type="hidden" name="price"  class="form-control" value="<?php echo  $rmprice;?>" readonly>
                  
                </div>
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="price">โอนเข้าธนาคาร :
                    <select name="bank_id" id="q" class="form-control">
                  <option value="0">ทั้งหมด</option>
                  <?php 
                        $sql="SELECT * FROM bank ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row['bank_id']; ?>"><?php echo $row['bank_name']; ?></option>
                          
                          <?php } ?>
                        </select>
                  </label>
                </div>
             
              </div>
              <div class="text-center">
              <img  src="img/SCB.jpg" class="img-thumbnail"  width="400" height="500">
              <div> หลักฐานการโอน : <input type="file" name="image" > </div>
                </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" name="submit" value="ตกลง" class="btn btn-primary text-white py-3 px-5">
                </div>
              </div>
              </div>
          <div class="col-md-5 " data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
              <input type="hidden" name="tpname" value=" <?php echo $tpname;?>" readonly class="form-control">
              <input type="hidden" name="rmtype" value=" <?php echo $rmtype; ?>" readonly class="form-control">
              <input type="hidden" name="rmid" value=" <?php echo $rmid; ?>" readonly class="form-control">
              <input type="hidden" name="bkin" value=" <?php echo $bkin; ?>" readonly class="form-control">
              <input type="hidden" name="bkout" value=" <?php echo $bkout; ?>" readonly class="form-control">
              <input type="hidden" name="days" value=" <?php echo $days; ?>" readonly class="form-control">
              <input type="hidden" name="email" value=" <?php echo $email; ?>" readonly class="form-control">
              <input type="hidden" name="phone" value=" <?php echo $phone; ?>" readonly class="form-control">
              <input type="hidden" name="bkdate" value=" <?php echo date("Y-m-d");?>" readonly class="form-control">
              


             <div class="thai-font1b" >  ประเภทห้อง <span class="thai-font1b" >  <?php echo $tpname;?> </span></div>
                <p ><span class="thai-font1b"><img src="img/room<?php echo $rmtype; ?>.jpg" class="img-thumbnail" width="200" height="200"></span> </p>

                    <table width="200" border="0" cellpadding="0" cellspacing="0" style="border-bottom: solid 0px #000; border-top:solid 1px #000;">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><p class="text-left" style="font-size:15px">เช็คอิน :</p></td>
                                        <td><p class="text-right" style="font-size:15px"><?php echo date_format(date_create($bkin), "d/m/Y");?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="text-left" style="font-size:15px">เช็คเอ้าท์ :</p></td>
                                        <td><p class="text-right" style="font-size:15px"><?php echo date_format(date_create($bkout), "d/m/Y");?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="text-left" style="font-size:15px">จำนวนคืน:</p></td>
                                        <td><p class="text-right" style="font-size:15px"><?php echo $days;?> คืน</p></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-success">ฟรี wifi</td>
                                        <td><img src="icon/wifi.png"></td>
                                    </tr>
                                    </table>
                                   
              </div>
            </div>
          </div>
        </div>
      </div>
            </form>

          </div>
          
    </section>
    
    
    <?php include("footer.php")?>