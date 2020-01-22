<?php
session_start();

$pay_id=$_POST['pay_id'];
require 'mysql/config.php';
require 'books_config.php';
$stdate=(isset($_GET['stdate']))?$_GET['stdate']:date("Y-m-d");
$endate=(isset($_GET['endate']))?$_GET['endate']:date("Y-m-d");

    if(isset($_GET['rmid'])){
        $rmid=$_GET['rmid'];
        $bkin=$_GET['bkin'];
        $bkstatus=$_GET['bkstatus'];
        require 'pays_status.php';
    }

?>
<?php include("head/admin_header.php")?>
<?php $nowdate=date("Y-m-d"); ?>





    <!-- END head -->
    <?php 
        $sql="SELECT * FROM pay  LEFT JOIN bank ON pay.bank_id = bank.bank_id  "
        ."WHERE  pay.pay_id = $pay_id";
        
        
        $result = $conn->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>

    <!-- END section -->
    


    <section class="section " >
      <div class="container center">
        <div class="row">
          <div class="col-md-12 center" data-aos="fade-up" data-aos-delay="100">
            
            <div class="bg-white p-md-5 p-4 mb-5 border"  enctype="multipart/form-data" >
            <div class="row">
                <div class="col-md-3 form-group">
                  <label class="text-black text-black-50" >วันที่ชำระเงิน</label>
                  <input type="text-body"  value="<?php echo date_format(date_create($row['bkin']), "d/m/Y");?>" class="form-control" required="required" readonly>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black text-black-50" >วันที่เข้าพัก</label>
                  <input type="text-body"   value="<?php echo date_format(date_create($row['bkin']), "d/m/Y");?>" class="form-control" required="required" readonly>
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black " >ถึงวันที่</label>
                  <input type="text-body"   value="<?php echo date_format(date_create($row['bkout']), "d/m/Y");?>"  class="form-control" required="required" readonly>
                </div>
        </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black text-black-50" >ชื่อ</label>
                  <input type="text-body"   value="<?php echo $row['firsname']; ?>" class="form-control" required="required" readonly>
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black text-black-50" >นามสกุล</label>
                  <input type="text-body"   value="<?php echo $row['lastname']; ?>"  class="form-control" required="required" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black text-black-50" >เบอร์โทร</label>
                  <input type="text-body"   value="<?php echo $row['phone']; ?>" class="form-control" required="required" readonly>
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black text-black-50" >Email</label>
                  <input type="text-body"   value="<?php echo $row['email']; ?>"  class="form-control" required="required" readonly>
                </div>
              </div>

              <div class="row">
               
              <div class="col-md-3 form-group">
                  <label class="text-black text-black-50" for="lastname">ประเภทห้องพัก :<br/><br/>
                  <div class="text-center text-body"> <?php echo $row['tpname']; ?></div></label>
                  
                </div>  
                <div class="col-md-3 form-group">
                  <label class="text-black text-black-50" for="lastname">ห้องพักหมายเลข :<br/><br/><div class="text-center text-body"> <?php echo $row['rmid']; ?></div></label>
                  
                </div>
                <div class="col-md-3 form-group">
                  <label class="text-black text-black-50" for="lastname">จำนวนเงินที่ต้องชำระ<br/><br/><div class="text-center text-body"> <?php echo number_format( $row['price'],0) ?></div></label>
                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black text-black-50" for="phone">โอนเข้าธนาคาร</label>
                  <input type="phone"  value=" <?php echo $row['bank_name']; ?>" class="form-control" required="required" readonly>
                </div>
              </div>  
            <input type="hidden"  value=" <?php echo $rmprice; ?>" readonly class="form-control">
            <div class="row">
           
                
             
              </div>
              <div class="text-center ">
              <img  src="myfile/<?php echo $row['image']; ?>" class="img-thumbnail"  width="400" height="500">
             <div class="text-center"> 
              <?php if($row['bkstatus']>=2){ ?>
            <a  class="btn btn-dark" href="javascript:bookstatus('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>','3')">
            ยืนยันการชำระเงิน
            </a>
            <?php } ?>
            <a  class="btn btn-dark" href="books_in.php"> ย้อนกลับ </a>
            <br><br>
            <form action="receipt.php" method="POST">
            <input type="hidden" name="pay_id"  value="<?php echo $row['pay_id'];?>" class="form-control" required="required">
            <button type="submit" class="btn btn-success"  >พิมพ์ใบเสร็จ</button>
            </form>
            </div>
             </div>
                </div>
             
              </div>
              </div>
         
          </div>
        </div>
      </div>
            </div>

          </div>
          
    </section>
    
                        <?php } ?>
                        
<script>
    var vurl ="books_in.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
    function bookstatus(v1,v2,v3){
        var v4= vurl+="&rmid="+v1+"&bkin="+v2+"&bkstatus="+v3;
        window.location.replace(v4);
    }
</script>
    <?php include("head/admin_footer.php")?>