<?php include("adminheader.php")?>
<?php 
require 'mysql/config.php';
$reservation_id=$_POST['reservation_id'];
$member_id=$_POST['member_id'];

      $sql = "SELECT * FROM reservation INNER JOIN member ON reservation.member_id = member.member_id 
      INNER JOIN reservation_detail ON reservation.reservation_id = reservation_detail.reservation_id
  
       WHERE reservation.reservation_id='$reservation_id'";

      
  
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
    
    ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">กรอกข้อมูลการชำระเงิน</h4>
                            </div>
                            <div class="content">
            
            <form action="adminbook_payinsert.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >

            <input type="hidden" name="member_id" value=" <?php echo $member_id;?>" readonly class="form-control">

            <input type="hidden" name="reservation_id" value=" <?php echo $reservation_id;?>" readonly class="form-control">

            
              <div class="row">             
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="firsname">ชื่อ-นามสกุล</label>
                  <div> <?php echo $row['firstname'];?></diV>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname"> &nbsp;</label>
                  <div><?php echo $row['lastname'];?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">เบอร์โทร</label>
                  <div><?php echo $row['phone'];?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">อีเมล์</label>
                  <div><?php echo $row['email'];?></div>
                </div>
              </div>

              <div class="row">             
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="firsname">เช็คอิน</label>
  
                  <div> <?php echo date_format(date_create($row['bkin']), "d/m/Y");?></diV>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname"> &nbsp;</label>
                  <div></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">เช็คเอ้าท์</label>
                  <div><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></div>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black font-weight-bold" for="lastname">&nbsp;</label>
                  <div>&nbsp;</div>
                </div>
              </div>
              <div class="row">             
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="firsname">จำนวนคืน</label>
                  <?php  
            $days = (int)date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
             ?>

                  <div>  <?php echo $days;?> คืน</diV>
                </div>
            
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="lastname">จำนวนเงิน (ที่ต้องชำระ)</label>
                  <div class="text-danger" style="font-size:40px">
                  <input type="hidden" name="sumprice" value=" <?php echo $row['sumprice'];?>" readonly class="form-control">
            
                  <?php echo number_format($row['sumprice']);?>
                  </div>
                </div>
                
              </div>
            
              <div class="row">
                <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="lastname">รูปแบบการชำระเงิน</label>
                <select name="bank_id" id="q" class="form-control">
                  <option value="0">เลือกการชำระเงิน</option>
                  <?php 
                        $sql="SELECT * FROM bank ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row['bank_id']; ?>">
                          <?php echo $row['bank_name']; ?><?php echo $row['books_id']; ?>  
                        </option>
                          
                          <?php } ?>
                        </select>
                </div>
                <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="lastname">หลักฐานการโอน(กรณีโอนเงิน) :</label><div> <input type="file" name="image" > </div>
                </div>
           
           
              </div>
              <div class="row text-center">
                <div class="col-md-6 form-group">
                  <input type="submit" name="submit" value="ตกลง" class="btn btn-primary text-white py-3 px-5">
                </div>
              </div>
        
        </div>
      </div>
            </form>

          </div>
          
    </section>
    
                        <?php } ?>




<?php include("adminfooter.php")?>