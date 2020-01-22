<?php include("head/user_headerforform.php")?>
<?php 
require 'mysql/config.php';
$reservation_id=$_GET['reservation_id'];


      $sql = "SELECT * FROM reservation inner join member on reservation.member_id = member.member_id  
      inner join prefix on member.prefix_id=prefix.prefix_id
      inner join rooms on reservation.rmid=rooms.rmid inner join roomtype on rooms.rmtype=roomtype.rmtype
       WHERE reservation_id='$reservation_id'";

      
  
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    
    ?>
<section class="site-hero inner-page overlay" style="background-image: url(img/hotel.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="family" style="font-size:80px; color:#FFFFFF;">การชำระเงิน</h1>

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
            
            <form action="pay_insert.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >
            <input type="hidden" name="reservation_id" value=" <?php echo $reservation_id;?>" readonly class="form-control">
            
              <div class="row">             
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold family" for="firsname">ชื่อ-นามสกุล</label>
                  <div class="family"> <?php echo $row['prefix_name'];?> <?php echo $row['firstname'];?></diV>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold family" for="lastname"> &nbsp;</label>
                  <div class="family"><?php echo $row['lastname'];?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold family" for="lastname">เบอร์โทร</label>
                  <div class="family"><?php echo $row['phone'];?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold family" for="lastname">อีเมล์</label>
                  <div class="family"><?php echo $row['email'];?></div>
                </div>
              </div>

              <div class="row">             
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold family" for="firsname">เช็คอิน</label>
  
                  <div class="family"> <?php echo date_format(date_create($row['bkin']), "d/m/Y");?></diV>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname"> &nbsp;</label>
                  <div></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold family"  for="lastname">เช็คเอ้าท์</label>
                  <div class="family"><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">&nbsp;</label>
                  <div>&nbsp;</div>
                </div>
              </div>
              <div class="row">             
                <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold family" for="firsname">จำนวนคืน</label>
                  <?php  
            $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
             ?>

                  <div class="family">  <?php echo $days;?> คืน</diV>
                </div>
                <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold family" for="lastname"> ประเภทห้อง</label>
                  <div><?php echo $row['tpname'];?></div>
                </div>
                <div class="col-md-4 form-group">
                  <label class="text-black font-weight-bold family" for="lastname">จำนวนเงิน</label>
                  <div class="family">
                  <input type="hidden" name="sumprice" value=" <?php echo $row['sumprice'];?>" readonly class="form-control">
            
                  <?php echo number_format($row['sumprice']);?>
                  </div>
                </div>
                
              </div>
            
              <div class="row">
                <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold family" for="lastname">รูปแบบการชำระเงิน</label>
                <select name="bank_id" id="q" class="form-control family">
                  <option value="0">ทั้งหมด</option>
                  <?php 
                        $sql="SELECT * FROM bank ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row['bank_id']; ?>"><?php echo $row['bank_name']; ?></option>
                          
                          <?php } ?>
                        </select>
                </div>
                <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold family" for="lastname">หลักฐานการโอน(กรณีโอนเงิน) :</label><div> <input type="file" name="image" > </div>
                </div>
           
           
              </div>
              <div class="row text-center">
                <div class="col-md-6 form-group">
                  <input type="submit" name="submit" value="ตกลง" class="btn btn-primary text-white py-3 px-5  family">
                </div>
              </div>
              </div>
          <div class="col-md-5 " data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">

              <div class="family font-weight-bold" style="font-size:20px;"  > หมายเลขบัญชี <span class="thai-font1b" >  <?php echo $row['tpname'];?> </span></div>
             <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col" class=" family">ธนาคาร</th>
      <th scope="col" class="family">เลขบัญชี</th>
     
    </tr>
  </thead>
            <?php 
                        $sql="SELECT * FROM bank ORDER BY bank_id ASC";
                        $result = $conn->query($sql);
                        while($row1 = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
            <tbody>
            <tr>
            <td > <img src="icon/<?php echo  $row1['bank_id']; ?>.png" width="30" height="30"></td>
            <td class=" family"><?php echo  $row1['bank_name']; ?></td>
            <td class=" family"><?php echo  $row1['books_id']; ?></td>
            </tr>
            </tbody>
                        <?php } ?>
            </table>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
            </form>

          </div>
          
    </section>
    
                        <?php } ?>




<?php include("footer.php")?>