<?php include("head/admin_header.php")?>
<?php 
require 'mysql/config.php';
require 'books_config.php';
    if(isset($_GET['rmid'])){
        $rmid=$_GET['rmid'];
        $bkin=$_GET['bkin'];
        $bkstatus=$_GET['bkstatus'];
        require 'books_status.php';
    }
?>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>

<section class="site-hero inner-page overlay" style="background-image: url(img/slider-4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
          <h2 class="thaifont5w" data-aos="fade-up">รายงานการโอนเงิน/ เช็คการโอนเงิน</h2>
          <br>
          </div>
          </div>
        </div>



    </section>
    <section class="section bg-light">

<div class="container">
  <div class="row justify-content-center text-center mb-5">

  <table class="table table-striped table-dark">
    <thead>
      <tr>
              
          <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <th scope="col">ค้นหาชื่อสมาชิก
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
      <input  type="submit" value="ค้นหา"> <a href="books_list.php">รายการจองห้องพัก</a></th>
    </tr>
 
  </table>
</form>
    </tr>

<?php

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "rootroot";
   $dbName = "ginggarha";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   mysqli_set_charset($conn,'utf8');
	
   $sql = "SELECT * FROM pay WHERE firsname LIKE '%".$strKeyword."%' ";

   $query = mysqli_query($conn,$sql);

?>
          <table class="table table-striped table-dark table-hover">
    
  <thead>
    <tr>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">เบอร์โทร</th>
      <th scope="col">วันที่เข้าพัก</th>
      <th scope="col">วันที่ออก</th>
      <th scope="col">ยอดที่ชำระ</th>
      <th scope="col">จำนวนวัน</th>
      <th scope="col">หลักฐานการชำระเงิน</th>
      <th scope="col">ยืนยันสถานะ</th>
    </tr>
  </thead>
  <?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tbody>
    <tr>
      <th><?php echo $result["firsname"];?></th>
      <td><?php echo $result['phone']; ?></td>
      <td><?php echo date_format(date_create($result['bkin']), "d/m/Y");?></td>
      <td><?php echo date_format(date_create($result['bkout']), "d/m/Y");?></td>
      <td><?php echo $result['price']; ?></td>
      <td><?php echo $result['days']; ?></td>
      <td><img  width="300" height="350" src = "myfile/<?php echo $result['image']; ?>"></td>
    </td>
      <td>
      <form action="books_paystatus.php" method="GET">
      <input type="hidden" name="stdate" value="<?php echo $result['bkin']; ?>" />
        <input type="hidden" name="endate" value="<?php echo $result['bkout']; ?>" />
        <button type="submit" class="btn btn-dark">ยืนยัน</button>
        </form>
        </td>

    </tr>
   <?php  }?>
  </tbody>
</table>


</section>

    </div>

  
  </div>
</div>
</section>
<?php include("footer.php")?>