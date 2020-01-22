<?php include("adminheader.php"); ?>
<?php
require 'mysql/config.php';
$bkin=(isset($_GET['bkin']))?$_GET['bkin']: date("Y-m-d");
$bkout=(isset($_GET['bkout']))?$_GET['bkout']: date("Y-m-d");
$q=(int)(isset($_GET['q']))?$_GET['q']: 0;
$days = (int)date_diff(date_create($bkin), date_create($bkout))->format('%R%a');


if(isset($_GET['submint']))
{
if($days<=0){
  echo "<script language=\"JavaScript\">";
  echo "alert('กรุณาเลือกวันให้ถูกต้อง');";
  echo "location='adminbooking.php' ";
  echo "</script>";}
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
$nowdate=date("Y-m-d");
?>  
   <div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ค้นหาห้องพัก</h4>
                            </div>
                            <div class="content">
                                <form action="adminbooking.php" method="GET">
                                <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="checkin_date" class="font-weight-bold text-black thaifont">วันที่เช็คอิน</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input  type="date" name="bkin"  min=<?php echo $nowdate ;?> value="<?php echo $nowdate; ?>"  class="form-control">
              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="checkout_date" class="font-weight-bold text-black thaifont">วันที่เช็คเอาท์</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <input type="date" name="bkout"  min=<?php echo $nowdate ;?> value="<?php echo $nowdate; ?>" class="form-control">
              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="adults" class="font-weight-bold text-black thaifont">รูปแบบห้องพัก</label>
                  <div class="field-icon-wrap">
                  <select name="q" id="q" class="form-control">
                  <option value="0">ทั้งหมด</option>
                  <?php 
                        $sql="SELECT * FROM roomtype ORDER BY rmtype ASC";
                        $result = $conn->query($sql);
                        while($row1 = $result->fetch_array(MYSQLI_ASSOC)){
                        ?>
                          <option value="<?php echo $row1['rmtype']; ?>"><?php echo $row1['tpname']; ?></option>
                          
                          <?php } ?>
                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">&nbsp;</label><br>
                                                <button type="submit" class="btn btn-info btn-fill pull-right">ค้นหาห้องพัก</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>


                                  
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">ผลการค้นหาห้องว่าง</h4>
                            </div>
                            <div class="content">
                                
              <br>
      <div class="row">
      <?php 
      
      $sql="SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype " 
      . "WHERE rmid NOT IN (SELECT rmid FROM reservation_detail "
      . "WHERE ((bkin >= '$bkin' AND bkin <'$bkout') OR (bkin < '$bkin' AND bkout > '$bkin')))".$kw;
  $result = $conn->query($sql);
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    ?>
        <form action="bookingmember.php" method="GET">
        <div class="col-md-3">
          <div class="card mb-1 shadow-sm">  
            <div class="card-body">
              <p class="card-text">
              <div   class="font-weight-bold text-warning text-center" style="font-size:28px">&nbsp;<?php echo number_format($row['rmprice'],0);?><span style="font-size:15px" class="text-warning text-body"> THB &nbsp;/คืน</span> </div>
              <div style="font-size:18px" class="text-center"><?php echo $row['tpname']; ?></div>
              <div style="font-size:15px" class="text-center">ห้องพัก<?php echo $row['rmid']; ?></div>
            <input type="hidden" name="rmid" value="<?php echo $row['rmid']; ?>" readonly class="form-control">
            
            <input type="hidden" name="tpname" value="<?php echo $row['tpname']; ?>" readonly class="form-control">
            <input type="hidden" name="rmtype" value="<?php echo $row['rmtype']; ?>" readonly class="form-control">
            <input type="hidden" name="rmprice" value="<?php echo $row['rmprice']; ?>" readonly class="form-control">
            <input type="hidden" name="bkin" value="<?php echo $_GET['bkin']; ?>" readonly class="form-control">
            <input type="hidden" name="bkout" value="<?php echo $_GET['bkout']; ?>" readonly class="form-control">
            

              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group ">
               
                  <button type="submit"  class="btn btn-light ">จอง</button> 
                  

                </div>

              </div>
            </div>
          </div>
        </div>
        </form>
        <?php } ?>
  
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
        document.getElementByID('q').value="<?php echo $q;?>";
    </script>
       

<?php include("adminfooter.php"); ?>